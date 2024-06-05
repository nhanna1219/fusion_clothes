<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class SearchProducts extends Component
{
    public $query;

    public function render()
    {
        $products = [];
        if (strlen($this->query) > 2) {
            $parentCategory = ProductCategory::where('name', 'like', '%' . $this->query . '%')
                ->whereNull('parent_id')
                ->first();

            if ($parentCategory) {
                $products = Product::where('name', 'like', '%' . $this->query . '%')
                    ->orWhereHas('category', function ($query) use ($parentCategory) {
                        $query->where('parent_id', $parentCategory->id);
                    })->get();
            } else {
                $products = Product::where('name', 'like', '%' . $this->query . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('name', 'like', '%' . $this->query . '%');
                    })->get();
            }
        }
        return view('livewire.search-products', compact('products'));
    }

    public function redirectToShop()
    {
        if ($this->queryIsParentCategory()) {
            $queryParams['categories'] = $this->query;
        } else if ($this->queryIsChildCategory()) {
            $queryParams['filters'] = $this->query;
        } else {
            $queryParams['query'] = $this->query;
        }
        return redirect()->route('customer.products.index', $queryParams);
    }

    private function queryIsParentCategory()
    {
        return ProductCategory::where('name', 'like', '%' . $this->query . '%')
            ->whereNull('parent_id')
            ->exists();
    }

    private function queryIsChildCategory()
    {
        return ProductCategory::where('name', 'like', '%' . $this->query . '%')
            ->whereNotNull('parent_id')
            ->exists();
    }
}
