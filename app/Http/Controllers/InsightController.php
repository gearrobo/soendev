<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class InsightController extends Controller
{
    public function portfolio()
    {
        $portfolios = Portfolio::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('insight.portfolio', compact('portfolios'));
    }

    public function portfolioDetail(string $slug)
    {
        $portfolio = Portfolio::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('insight.portfolio-detail', compact('portfolio'));
    }
}