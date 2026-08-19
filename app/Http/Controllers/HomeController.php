<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\HomepageSection;
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

        return view('home', [
            'homepageSections' => $homepageSections,
            'heroSlides' => $heroSlides,
            'serviceItems' => $serviceItems,
        ]);
    }
}