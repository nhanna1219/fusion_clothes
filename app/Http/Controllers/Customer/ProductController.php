<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        // $products = Product::with(['category', 'images'])->paginate(8);

        $data = [
            [
                'image' => 'product_image.png',
                'type' => 'Coats',
                'rating' => 4.8,
                'price' => 230,
                'name' => 'Ugly Black Coat'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Coats',
                'rating' => 4.8,
                'price' => 102,
                'name' => 'Trendy Black Coat'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Coats',
                'rating' => 4.8,
                'price' => 52,
                'name' => 'Beautify Red Coat'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Coats',
                'rating' => 4.8,
                'price' => 521,
                'name' => 'Wonderful Blue Coat'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Coats',
                'rating' => 4.8,
                'price' => 839,
                'name' => 'Awesome Brown Coat'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'T-Shirts',
                'rating' => 4.3,
                'price' => 175,
                'name' => 'Classic White T-Shirt'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'T-Shirts',
                'rating' => 4.5,
                'price' => 99,
                'name' => 'Vintage Black T-Shirt'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'T-Shirts',
                'rating' => 4.1,
                'price' => 120,
                'name' => 'Striped Blue T-Shirt'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'T-Shirts',
                'rating' => 4.7,
                'price' => 85,
                'name' => 'Graphic Print T-Shirt'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'T-Shirts',
                'rating' => 4.6,
                'price' => 200,
                'name' => 'Slim Fit Grey T-Shirt'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Handbags',
                'rating' => 4.9,
                'price' => 350,
                'name' => 'Leather Shoulder Bag'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Handbags',
                'rating' => 4.7,
                'price' => 280,
                'name' => 'Tote Bag'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Handbags',
                'rating' => 4.6,
                'price' => 200,
                'name' => 'Crossbody Bag'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Handbags',
                'rating' => 4.8,
                'price' => 450,
                'name' => 'Satchel Bag'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Handbags',
                'rating' => 4.5,
                'price' => 310,
                'name' => 'Backpack'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Jackets',
                'rating' => 4.8,
                'price' => 460,
                'name' => 'Denim Jacket'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Jackets',
                'rating' => 4.7,
                'price' => 580,
                'name' => 'Leather Jacket'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Jackets',
                'rating' => 4.6,
                'price' => 390,
                'name' => 'Bomber Jacket'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Jackets',
                'rating' => 4.9,
                'price' => 670,
                'name' => 'Parka Coat'
            ],
            [
                'image' => 'product_image.png',
                'type' => 'Jackets',
                'rating' => 4.5,
                'price' => 520,
                'name' => 'Quilted Jacket'
            ],
        ];

        $collection = collect($data);

        $perPage = 8;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginationItems= new LengthAwarePaginator($currentPageItems, count($collection), $perPage);

        $paginationItems->withPath(route('products.index'));

        return view('customer.products.index', compact('paginationItems'));
    }

    public function show(Request $request, $id): View
    {
        $product = Product::with(['category', 'images', 'variants.size', 'variants.color'])->findOrFail($id);

        return view('customer.products.show', compact('product'));
    }
}
