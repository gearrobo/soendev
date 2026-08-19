<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('pages.products', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.product-detail', compact('product'));
    }
}