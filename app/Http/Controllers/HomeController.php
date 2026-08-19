<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HeroSlide;
use App\Models\HomepageSection;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $homepageSections = HomepageSection::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('section_key');

        $heroSlides = HeroSlide::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $serviceItems = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $products = Product::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $portfolios = Portfolio::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $clients = Client::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', [
            'homepageSections' => $homepageSections,
            'heroSlides' => $heroSlides,
            'serviceItems' => $serviceItems,
            'products' => $products,
            'portfolios' => $portfolios,
            'clients' => $clients,
        ]);
    }
}