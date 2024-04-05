<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function __invoke(?Category $category)
    {
        $brands = Brand::query()
            ->select(['id', 'title'])
            ->has('products')
            ->get();
        $categories = Category::query()
            ->select(['id', 'title', 'slug'])
            ->has('products')
            ->get();
        $products = Product::query()
            ->select(['id', 'title', 'slug', 'price', 'thumbnail'])
            ->paginate(6);
        return view('catalog.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'category' => $category
        ]);
    }
}
