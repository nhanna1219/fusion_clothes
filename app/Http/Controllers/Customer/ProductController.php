<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $size = 8;
        $q_filters = $request->query('filters') ? $request->query('filters') : "";
        $q_categories = $request->query('categories') ? $request->query('categories') : "";
        $range = $request->query('range') ? $request->query('range') : "0,1000";
        $sort = $request->query('sort') ? $request->query('sort') : "price";

        $min = explode(',', $range)[0];
        $max = explode(',', $range)[1];

        $products = Product::with(['category', 'images']);

        if (!empty($q_categories) && empty($q_filters)) {
            $products->whereHas('category', function ($query) use ($q_categories) {
                $query->whereHas('parent', function ($query) use ($q_categories) {
                    $query->whereIn('name', explode(',', $q_categories));
                });
            })->get();
        } elseif (empty($q_categories) && !empty($q_filters)) {
            $products->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->whereIn('product_categories.name', explode(',', $q_filters))
                ->select('products.*')
                ->get();
        } else if (!empty($q_categories) && !empty($q_filters)) {
            $products->whereHas('category', function ($query) use ($q_filters, $q_categories) {
                $query->whereIn('name', explode(',', $q_filters))
                    ->whereHas('parent', function ($query) use ($q_categories) {
                        $query->whereIn('name', explode(',', $q_categories));
                    });
            })->get();
        }

        $products = $products->whereBetween('price', array($min, $max))->orderBy($sort)->paginate($size);

        $childCategories = ProductCategory::whereNotNull('parent_id')->select('name')->distinct()->get();
        $parentCategories = ProductCategory::whereNull('parent_id')->get();

        return view('customer.products.index', compact('products', 'childCategories', 'parentCategories', 'q_categories', 'q_filters', 'range', 'sort'));
    }

    public function show(Request $request, $id): View
    {
        // if ($request->has('buy_now')) {
        //     return $this->buyNow($request, $id);
        // }

        $product = Product::with(['category', 'images', 'variants.size', 'variants.color'])->findOrFail($id);

        $sizes = $product->variants->map(function ($variant) {
            return [
                'id' => optional($variant->size)->id,
                'description' => optional($variant->size)->size_description,
            ];
        })->filter(function ($size) {
            return !is_null($size['id']);
        })->unique('id');

        $colors = $product->variants->map(function ($variant) {
            return [
                'id' => optional($variant->color)->id,
                'name' => optional($variant->color)->color_name,
            ];
        })->filter(function ($color) {
            return !is_null($color['id']);
        })->unique('id');

        return view('customer.products.details', compact('product', 'sizes', 'colors'));
    }
}
