@extends('layouts.app')

@section('title', 'Demo | SOENDEV')

@section('description', 'SOENDEV Demo - Device monitoring and real-time status.')

@push('styles')

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

<style>

    .demo-hero {
        background: #0b1322;
        color: white;
        padding: 100px 0;
    }

    .demo-eyebrow {
        display: block;
        margin-bottom: 18px;
        color: #94a3b8;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .demo-hero h1 {
        max-width: 850px;
        font-size: clamp(48px, 7vw, 82px);
        line-height: 1;
        letter-spacing: -4px;
        margin-bottom: 25px;
    }

    .demo-hero p {
        max-width: 700px;
        color: #cbd5e1;
        font-size: 19px;
    }


    .demo-content {
        padding: 70px 0 100px;
        background: #f8fafc;
    }


    /*
    |--------------------------------------------------------------------------
    | STATISTICS
    |--------------------------------------------------------------------------
    */

    .demo-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .demo-stat {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 28px;
    }

    .demo-stat-label {
        color: #64748b;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .demo-stat-value {
        color: #0f172a;
        font-size: 42px;
        font-weight: 800;
        line-height: 1;
    }

    .demo-stat-online .demo-stat-value {
        color: #16a34a;
    }

    .demo-stat-offline .demo-stat-value {
        color: #dc2626;
    }


    /*