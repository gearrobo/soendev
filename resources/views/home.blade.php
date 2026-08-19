@extends('layouts.app')

@section('title', 'SOENDEV | Technology for Real World')

@section('description', 'SOENDEV - Software, Hardware, IoT and AI Development')

@section('content')

{{-- =========================================================
     HERO
========================================================= --}}

@php
    $hero = $homepageSections->get('hero');
@endphp

@if($hero && $heroSlides->isNotEmpty())

<section class="soendev-hero">

    @foreach($heroSlides as $index => $slide)

        <div class="soendev-hero-slide {{ $index === 0 ? 'active' : '' }}">

            <div
                class="soendev-hero-bg"
                style="
                    background-image:
                        linear-gradient(
                            90deg,
                            rgba(3, 10, 20, .90) 0%,
                            rgba(3, 10, 20, .62) 42%,
                            rgba(3, 10, 20, .15) 100%
                        ),
                        url('{{ asset('storage/' . $slide->image) }}');
                "
            ></div>

            <div class="container soendev-hero-inner">

                <div class="soendev-hero-text">

                    @if($slide->subtitle ?: $hero->subtitle)
                        <div class="soendev-eyebrow">
                            {{ $slide->subtitle ?: $hero->subtitle }}
                        </div>
                    @endif

                    <h1>
                        {{ $slide->title ?: $hero->title }}
                    </h1>

                    @if($slide->content ?: $hero->content)
                        <p>
                            {{ $slide->content ?: $hero->content }}
                        </p>
                    @endif

                    <div class="soendev-hero-buttons">

                        <a
                            href="{{ $slide->button_url ?: ($hero->button_url ?: route('services')) }}"
                            class="soendev-btn soendev-btn-primary"
                        >
                            {{ $slide->button_text ?: ($hero->button_text ?: 'Our Services') }}
                            <span>→</span>
                        </a>

                        <a
                            href="#about"
                            class="soendev-btn soendev-btn-outline"
                        >
                            About SOENDEV
                        </a>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

    <button
        type="button"
        class="soendev-slider-prev"
        aria-label="Previous"
    >‹</button>

    <button
        type="button"
        class="soendev-slider-next"
        aria-label="Next"
    >›</button>

    <div class="soendev-slider-dots">

        @foreach($heroSlides as $index => $slide)

            <button
                type="button"
                class="soendev-slider-dot {{ $index === 0 ? 'active' : '' }}"
                data-slide="{{ $index }}"
                aria-label="Slide {{ $index + 1 }}"
            ></button>

        @endforeach

    </div>

</section>

@endif


{{-- =========================================================
     ABOUT
========================================================= --}}

@php
    $about = $homepageSections->get('about');
@endphp

@if($about)

<section id="about" class="soendev-section">

    <div class="container">

        <div class="soendev-split">

            <div class="soendev-media">

                @if($about->image)

                    <img
                        src="{{ asset('storage/' . $about->image) }}"
                        alt="{{ $about->title }}"
                    >

                @else

                    <div class="soendev-media-placeholder">
                        <span>SOENDEV</span>
                    </div>

                @endif

            </div>

            <div class="soendev-copy">

                <div class="soendev-label">
                    ABOUT SOENDEV
                </div>

                <h2>
                    {{ $about->title }}
                </h2>

                @if($about->subtitle)

                    <h3>
                        {{ $about->subtitle }}
                    </h3>

                @endif

                @if($about->content)

                    <p>
                        {{ $about->content }}
                    </p>

                @endif

                <a
                    href="{{ route('about') }}"
                    class="soendev-text-link"
                >
                    Learn More <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>

@endif


{{-- =========================================================
     SERVICES
========================================================= --}}

@if($serviceItems->isNotEmpty())

<section id="services" class="soendev-section soendev-section-gray">

    <div class="container">

        <div class="soendev-heading">

            <div class="soendev-label">
                OUR SERVICES
            </div>

            <h2>
                Technology from idea<br>
                to implementation.
            </h2>

            <p>
                Software, hardware, IoT and AI solutions
                designed for real-world applications.
            </p>

        </div>

        <div class="soendev-service-grid">

            @foreach($serviceItems as $index => $service)

                <a
                    href="{{ route('services.show', $service->slug) }}"
                    class="soendev-service-card"
                >

                    <div class="soendev-service-number">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <h3>
                        {{ $service->name }}
                    </h3>

                    @if($service->short_description)

                        <p>
                            {{ $service->short_description }}
                        </p>

                    @elseif($service->description)

                        <p>
                            {{ $service->description }}
                        </p>

                    @endif

                    <span class="soendev-card-arrow">
                        →
                    </span>

                </a>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================================================
     TECHNOLOGY SHOWCASE / VIDEO
========================================================= --}}

<section class="soendev-showcase">

    <div class="container">

        <div class="soendev-showcase-grid">

            <div class="soendev-video">

                <div class="soendev-video-frame">

                    <div class="soendev-video-placeholder">

                        <div class="soendev-play">
                            ▶
                        </div>

                        <span>
                            SOENDEV TECHNOLOGY
                        </span>

                    </div>

                </div>

            </div>

            <div class="soendev-copy soendev-showcase-copy">

                <div class="soendev-label">
                    TECHNOLOGY SHOWCASE
                </div>

                <h2>
                    Technology that
                    works in the real world.
                </h2>

                <p>
                    From connected devices and infrastructure
                    monitoring to intelligent software platforms,
                    SOENDEV combines software, hardware, IoT and AI
                    into practical technology solutions.
                </p>

                <a
                    href="{{ route('demo') }}"
                    class="soendev-btn soendev-btn-dark"
                >
                    View Demo <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     PRODUCTS
========================================================= --}}

@if($products->isNotEmpty())

<section id="products" class="soendev-section">

    <div class="container">

        <div class="soendev-heading">

            <div class="soendev-label">
                OUR PRODUCTS
            </div>

            <h2>
                Technology products
                built by SOENDEV.
            </h2>

            <p>
                Platforms and products designed to connect
                technology, data and real-world operations.
            </p>

        </div>

        <div class="soendev-product-grid">

            @foreach($products as $product)

                <a
                    href="{{ route('products.show', $product->slug) }}"
                    class="soendev-product-card"
                >

                    <div class="soendev-product-image">

                        @if($product->image)

                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                            >

                        @else

                            <div class="soendev-product-placeholder">
                                {{ $product->category ?? 'PRODUCT' }}
                            </div>

                        @endif

                    </div>

                    <div class="soendev-product-body">

                        @if($product->category)

                            <div class="soendev-product-category">
                                {{ $product->category }}
                            </div>

                        @endif

                        <h3>
                            {{ $product->name }}
                        </h3>

                        @if($product->short_description)

                            <p>
                                {{ $product->short_description }}
                            </p>

                        @elseif($product->description)

                            <p>
                                {{ $product->description }}
                            </p>

                        @endif

                        <span class="soendev-text-link">
                            Learn More →
                        </span>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================================================
     PORTFOLIO
========================================================= --}}

@if($portfolios->isNotEmpty())

<section id="portfolio" class="soendev-section soendev-section-gray">

    <div class="container">

        <div class="soendev-heading">

            <div class="soendev-label">
                PORTFOLIO
            </div>

            <h2>
                Selected technology projects.
            </h2>

        </div>

        <div class="soendev-portfolio-grid">

            @foreach($portfolios as $portfolio)

                <a
                    href="{{ route('portfolio.show', $portfolio->slug) }}"
                    class="soendev-portfolio-card"
                >

                    @if($portfolio->image)

                        <img
                            src="{{ asset('storage/' . $portfolio->image) }}"
                            alt="{{ $portfolio->name }}"
                        >

                    @else

                        <div class="soendev-portfolio-placeholder">
                            <span>{{ $portfolio->category ?? 'PROJECT' }}</span>
                        </div>

                    @endif

                    <div class="soendev-portfolio-overlay">

                        @if($portfolio->category)

                            <span>
                                {{ $portfolio->category }}
                            </span>

                        @endif

                        <h3>
                            {{ $portfolio->name }}
                        </h3>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>

@endif


{{-- =========================================================
     CLIENTS
========================================================= --}}

@if($clients->isNotEmpty())

<section id="clients" class="soendev-section">

    <div class="container">

        <div class="soendev-heading soendev-heading-center">

            <div class="soendev-label">
                OUR CLIENTS
            </div>

            <h2>
                Trusted by organizations.
            </h2>

            <p>
                Technology solutions developed for
                real-world organizations and businesses.
            </p>

        </div>

        <div class="soendev-client-grid">

            @foreach($clients as $client)

                <div class="soendev-client-logo">

                    <img
                        src="{{ asset('storage/' . $client->logo) }}"
                        alt="{{ $client->name }}"
                    >

                </div>

            @endforeach

        </div>

        <div class="soendev-center-link">

            <a
                href="{{ route('clients') }}"
                class="soendev-text-link"
            >
                View All Clients →
            </a>

        </div>

    </div>

</section>

@endif


{{-- =========================================================
     CTA
========================================================= --}}

<section class="soendev-cta">

    <div class="container">

        <div class="soendev-cta-inner">

            <div>

                <div class="soendev-label">
                    LET'S BUILD SOMETHING
                </div>

                <h2>
                    Technology for<br>
                    real-world needs.
                </h2>

            </div>

            <a
                href="#contact"
                class="soendev-btn soendev-btn-primary"
            >
                Contact Us <span>→</span>
            </a>

        </div>

    </div>

</section>


@endsection


@push('styles')

<style>

:root {
    --sd-blue: #0066d6;
    --sd-dark: #06101f;
    --sd-text: #14213d;
    --sd-muted: #667085;
    --sd-light: #f5f7fa;
    --sd-border: #e5e7eb;
}


/* =========================================================
   GENERAL
========================================================= */

.soendev-section {
    padding: 110px 0;
    background: #fff;
}

.soendev-section-gray {
    background: var(--sd-light);
}

.soendev-heading {
    max-width: 780px;
    margin-bottom: 55px;
}

.soendev-heading-center {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

.soendev-heading h2,
.soendev-copy h2 {
    margin: 0 0 22px;
    color: var(--sd-text);
    font-size: clamp(38px, 5vw, 64px);
    line-height: 1.04;
    letter-spacing: -3px;
}

.soendev-heading p,
.soendev-copy p {
    color: var(--sd-muted);
    font-size: 18px;
    line-height: 1.8;
}

.soendev-label {
    margin-bottom: 16px;
    color: var(--sd-blue);
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 3px;
}


/* =========================================================
   HERO
========================================================= */

.soendev-hero {
    position: relative;
    height: calc(100vh - 76px);
    min-height: 650px;
    overflow: hidden;
    background: #07111f;
}

.soendev-hero-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    transition: opacity .8s ease;
}

.soendev-hero-slide.active {
    opacity: 1;
    visibility: visible;
}

.soendev-hero-bg {
    position: absolute;
    inset: 0;
    background-position: center;
    background-size: cover;
}

.soendev-hero-inner {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    align-items: center;
}

.soendev-hero-text {
    max-width: 700px;
    color: #fff;
}

.soendev-eyebrow {
    margin-bottom: 25px;
    font-size: 15px;
    font-weight: 800;
    letter-spacing: 5px;
}

.soendev-hero-text h1 {
    margin: 0 0 25px;
    font-size: clamp(58px, 7vw, 100px);
    line-height: .96;
    letter-spacing: -5px;
    color: #fff;
}

.soendev-hero-text p {
    max-width: 650px;
    margin: 0;
    color: rgba(255,255,255,.82);
    font-size: 19px;
    line-height: 1.7;
}

.soendev-hero-buttons {
    display: flex;
    gap: 14px;
    margin-top: 35px;
}

.soendev-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 15px 25px;
    border-radius: 5px;
    font-weight: 700;
    transition: .25s ease;
}

.soendev-btn-primary {
    background: #fff;
    color: #111827;
}

.soendev-btn-primary:hover {
    background: var(--sd-blue);
    color: #fff;
}

.soendev-btn-outline {
    color: #fff;
    border: 1px solid rgba(255,255,255,.65);
}

.soendev-btn-outline:hover {
    background: #fff;
    color: #111827;
}

.soendev-btn-dark {
    background: var(--sd-dark);
    color: #fff;
}

.soendev-btn-dark:hover {
    background: var(--sd-blue);
}

.soendev-slider-prev,
.soendev-slider-next {
    position: absolute;
    top: 50%;
    z-index: 5;
    width: 52px;
    height: 52px;
    border: 1px solid rgba(255,255,255,.4);
    background: rgba(0,0,0,.12);
    color: #fff;
    font-size: 34px;
    cursor: pointer;
    transform: translateY(-50%);
}

.soendev-slider-prev {
    left: 30px;
}

.soendev-slider-next {
    right: 30px;
}

.soendev-slider-prev:hover,
.soendev-slider-next:hover {
    background: #fff;
    color: #111827;
}

.soendev-slider-dots {
    position: absolute;
    z-index: 5;
    bottom: 28px;
    left: 50%;
    display: flex;
    gap: 9px;
    transform: translateX(-50%);
}

.soendev-slider-dot {
    width: 36px;
    height: 3px;
    padding: 0;
    border: 0;
    background: rgba(255,255,255,.45);
    cursor: pointer;
}

.soendev-slider-dot.active {
    background: #fff;
}


/* =========================================================
   ABOUT / SPLIT
========================================================= */

.soendev-split {
    display: grid;
    grid-template-columns: 1.05fr .95fr;
    gap: 75px;
    align-items: center;
}

.soendev-media img {
    display: block;
    width: 100%;
    max-height: 520px;
    object-fit: cover;
    border-radius: 14px;
}

.soendev-media-placeholder {
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg,#07111f,#1266b4);
    border-radius: 14px;
    color: #fff;
    font-size: 42px;
    font-weight: 800;
    letter-spacing: 8px;
}

.soendev-copy h3 {
    margin: -8px 0 20px;
    color: #344054;
    font-size: 24px;
    font-weight: 600;
}

.soendev-text-link {
    display: inline-flex;
    gap: 10px;
    margin-top: 25px;
    color: var(--sd-blue);
    font-weight: 800;
}


/* =========================================================
   SERVICES
========================================================= */

.soendev-service-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
}

.soendev-service-card {
    position: relative;
    min-height: 310px;
    padding: 35px;
    background: #fff;
    border: 1px solid var(--sd-border);
    transition: .3s ease;
}

.soendev-service-card:hover {
    transform: translateY(-7px);
    border-color: #b9d7f8;
    box-shadow: 0 20px 45px rgba(15,23,42,.09);
}

.soendev-service-number {
    margin-bottom: 75px;
    color: #98a2b3;
    font-size: 13px;
    font-weight: 800;
}

.soendev-service-card h3 {
    margin-bottom: 15px;
    color: var(--sd-text);
    font-size: 23px;
}

.soendev-service-card p {
    color: var(--sd-muted);
    line-height: 1.7;
}

.soendev-card-arrow {
    position: absolute;
    right: 30px;
    bottom: 25px;
    color: var(--sd-blue);
    font-size: 24px;
}


/* =========================================================
   VIDEO SHOWCASE
========================================================= */

.soendev-showcase {
    padding: 110px 0;
    background: #07111f;
}

.soendev-showcase-grid {
    display: grid;
    grid-template-columns: 1.25fr .75fr;
    gap: 70px;
    align-items: center;
}

.soendev-video-frame {
    overflow: hidden;
    aspect-ratio: 16 / 9;
    border-radius: 14px;
    background: #111827;
}

.soendev-video-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    background:
        radial-gradient(
            circle at center,
            #174d7e 0,
            #07111f 60%
        );
    color: #fff;
}

.soendev-play {
    width: 72px;
    height: 72px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-left: 4px;
    border-radius: 50%;
    background: #fff;
    color: var(--sd-blue);
    font-size: 24px;
}

.soendev-video-placeholder span {
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 3px;
}

.soendev-showcase-copy h2 {
    color: #fff;
}

.soendev-showcase-copy p {
    color: #aab4c2;
}


/* =========================================================
   PRODUCTS
========================================================= */

.soendev-product-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.soendev-product-card {
    overflow: hidden;
    border: 1px solid var(--sd-border);
    background: #fff;
    transition: .3s ease;
}

.soendev-product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(15,23,42,.09);
}

.soendev-product-image {
    height: 280px;
    background: #eef3f8;
}

.soendev-product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.soendev-product-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--sd-blue);
    font-size: 22px;
    font-weight: 800;
}

.soendev-product-body {
    padding: 30px;
}

.soendev-product-category {
    margin-bottom: 10px;
    color: var(--sd-blue);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.soendev-product-body h3 {
    margin-bottom: 12px;
    color: var(--sd-text);
    font-size: 27px;
}

.soendev-product-body p {
    color: var(--sd-muted);
    line-height: 1.7;
}


/* =========================================================
   PORTFOLIO
========================================================= */

.soendev-portfolio-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.soendev-portfolio-card {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16 / 10;
    background: #101827;
}

.soendev-portfolio-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .5s ease;
}

.soendev-portfolio-card:hover img {
    transform: scale(1.05);
}

.soendev-portfolio-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg,#07111f,#165e9d);
    color: #fff;
    font-size: 25px;
    font-weight: 800;
}

.soendev-portfolio-overlay {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 35px;
    color: #fff;
    background: linear-gradient(
        transparent,
        rgba(0,0,0,.85)
    );
}

.soendev-portfolio-overlay span {
    color: #70b6ff;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
}

.soendev-portfolio-overlay h3 {
    margin-top: 7px;
    font-size: 27px;
}


/* =========================================================
   CLIENTS
========================================================= */

.soendev-client-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
}

.soendev-client-logo {
    height: 145px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 25px;
    border: 1px solid var(--sd-border);
    background: #fff;
    transition: .25s ease;
}

.soendev-client-logo:hover {
    border-color: #b9d7f8;
    box-shadow: 0 10px 30px rgba(15,23,42,.07);
}

.soendev-client-logo img {
    max-width: 100%;
    max-height: 80px;
    object-fit: contain;
}

.soendev-center-link {
    margin-top: 40px;
    text-align: center;
}


/* =========================================================
   CTA
========================================================= */

.soendev-cta {
    padding: 90px 0;
    background: var(--sd-blue);
    color: #fff;
}

.soendev-cta-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 50px;
}

.soendev-cta .soendev-label {
    color: rgba(255,255,255,.75);
}

.soendev-cta h2 {
    margin: 0;
    color: #fff;
    font-size: clamp(40px,5vw,68px);
    line-height: 1;
    letter-spacing: -3px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 950px) {

    .soendev-service-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .soendev-client-grid {
        grid-template-columns: repeat(3,1fr);
    }

    .soendev-split,
    .soendev-showcase-grid {
        grid-template-columns: 1fr;
        gap: 45px;
    }

}

@media (max-width: 700px) {

    .soendev-section,
    .soendev-showcase {
        padding: 75px 0;
    }

    .soendev-hero {
        min-height: 650px;
        height: calc(100vh - 70px);
    }

    .soendev-hero-text h1 {
        font-size: 58px;
        letter-spacing: -3px;
    }

    .soendev-hero-buttons {
        flex-wrap: wrap;
    }

    .soendev-service-grid,
    .soendev-product-grid,
    .soendev-portfolio-grid {
        grid-template-columns: 1fr;
    }

    .soendev-client-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .soendev-cta-inner {
        flex-direction: column;
        align-items: flex-start;
    }

}

</style>

@endpush


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.soendev-hero-slide');
    const dots = document.querySelectorAll('.soendev-slider-dot');
    const prev = document.querySelector('.soendev-slider-prev');
    const next = document.querySelector('.soendev-slider-next');

    if (!slides.length) return;

    let current = 0;
    let timer;

    function showSlide(index) {

        current = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === current);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === current);
        });
    }

    function startAutoPlay() {

        clearInterval(timer);

        timer = setInterval(function () {
            showSlide(current + 1);
        }, 6000);

    }

    prev?.addEventListener('click', function () {
        showSlide(current - 1);
        startAutoPlay();
    });

    next?.addEventListener('click', function () {
        showSlide(current + 1);
        startAutoPlay();
    });

    dots.forEach((dot, index) => {

        dot.addEventListener('click', function () {
            showSlide(index);
            startAutoPlay();
        });

    });

    showSlide(0);
    startAutoPlay();

});

</script>

@endpush