<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::query()
            ->where('slug', 'about')
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.about', compact('page'));
    }

    public function career()
    {
        $page = Page::query()
            ->where('slug', 'career')
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.career', compact('page'));
    }

    public function services()
    {
        $services = \App\Models\Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('pages.services', compact('services'));
    }

    public function service(string $slug)
    {
        $service = \App\Models\Service::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.service-detail', compact('service'));
    }
}