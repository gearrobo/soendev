<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('pages.clients', compact('clients'));
    }

    public function show(string $slug)
    {
        $client = Client::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.client-detail', compact('client'));
    }
}