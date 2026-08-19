@extends('layouts.app')

@section('title', 'SOENDEV | Technology for Real World')

@section('description', 'SOENDEV - Software, Hardware, IoT and AI Development')

@section('content')


{{-- HERO SLIDER --}}
@php
    $hero = $homepageSections->get('hero');
@endphp

@if($hero)
<section class="hero-slider">

    @foreach($heroSlides as $index => $slide)

        <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">

            <div
                class="hero-background"
                style="
                    background-image:
                        linear-gradient(
                            90deg,
                            rgba(5, 15, 30, .88) 0%,
                            rgba(5, 15, 30, .60) 45%,
                            rgba(5, 15, 30, .20) 100%
                        ),
                      url('{{ asset('storage/' . $slide->image) }}');
                ">
            </div>

            <div class="container hero-content">

                @if($hero->subtitle)
                    <div class="hero-subtitle">
                        {{ $hero->subtitle }}
                    </div>
                @endif

                <h1>
                    {{ $hero->title }}
                </h1>

                @if($hero->content)
                    <p>
                        {{ $hero->content }}
                    </p>
                @endif

                <div class="hero-buttons">

                    @if($hero->button_text && $hero->button_url)
                        <a
                            href="{{ $hero->button_url }}"
                            class="btn btn-primary"
                        >
                            {{ $hero->button_text }}
                        </a>
                    @endif

                    <a
                        href="#about"
                        class="btn btn-outline"
                    >
                        About SOENDEV
                    </a>

                </div>

            </div>

        </div>

    @endforeach


    {{-- PREVIOUS --}}
    <button
        class="slider-prev"
        type="button"
        aria-label="Previous slide"
    >
        ‹
    </button>


    {{-- NEXT --}}
    <button
        class="slider-next"
        type="button"
        aria-label="Next slide"
    >
        ›
    </button>


    {{-- DOTS --}}
    <div class="slider-dots">

        @foreach($heroSlides as $index => $image)

            <button
                type="button"
                class="slider-dot {{ $index === 0 ? 'active' : '' }}"
                data-slide="{{ $index }}"
                aria-label="Slide {{ $index + 1 }}"
            ></button>

        @endforeach

    </div>

</section>
@endif


{{-- ABOUT --}}

@php
    $about = $homepageSections->get('about');
@endphp

@if($about)
<section id="about" class="landing-section">

    <div class="container">

        <div class="section-heading">

            @if($about->subtitle)
                <span>{{ $about->subtitle }}</span>
            @endif

            <h2>
                {{ $about->title }}
            </h2>

            @if($about->content)
                <p>
                    {{ $about->content }}
                </p>
            @endif

        </div>

        @if($about->image)

            <div class="section-image">
                <img
                    src="{{ asset('storage/' . $about->image) }}"
                    alt="{{ $about->title }}"
                >
            </div>

        @endif

    </div>

</section>
@endif


{{-- SERVICES --}}

@if($serviceItems->isNotEmpty())

<section id="services" class="landing-section light">

    <div class="container">

        <div class="section-heading">

            <span>OUR SERVICES</span>

            <h2>
                Technology from idea to implementation.
            </h2>

            <p>
                We build software, hardware, IoT and AI solutions
                for real-world applications.
            </p>

        </div>

        <div class="service-grid">

            @foreach($serviceItems as $index => $service)

                <div
                    class="service-card"
                    id="{{ $service->slug }}"
                >

                    <div class="service-number">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    @if($service->icon)

                        <img
                            src="{{ asset('storage/' . $service->icon) }}"
                            alt="{{ $service->name }}"
                            style="
                                width:50px;
                                height:50px;
                                object-fit:contain;
                                margin-bottom:25px;
                            "
                        >

                    @endif

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

                    @if($service->button_text && $service->button_url)

                        <a
                            href="{{ $service->button_url }}"
                            class="service-link"
                        >
                            {{ $service->button_text }} →
                        </a>

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</section>

@endif

{{-- PORTFOLIO --}}

<section id="portfolio" class="landing-section">

    <div class="container">

        <div class="section-heading">

            <span>PORTFOLIO</span>

            <h2>
                Selected technology projects.
            </h2>

        </div>

        <div class="portfolio-grid">

            @for($i = 1; $i <= 6; $i++)

                <div class="portfolio-card">

                    <img
                        src="{{ asset('assets/img/portfolio/' . $i . '.jpg') }}"
                        alt="SOENDEV Portfolio {{ $i }}">

                    <div class="portfolio-overlay">
                        <span>Project {{ $i }}</span>
                    </div>

                </div>

            @endfor

        </div>

    </div>

</section>



{{-- PRODUCT --}}

<section id="products" class="landing-section">

    <div class="container">

        <div class="section-heading">

            <span>OUR PRODUCT</span>

            <h2>
                Technology products built by SOENDEV.
            </h2>

            <p>
                Explore our products, platforms and technology
                solutions.
            </p>

        </div>

    </div>

</section>


{{-- DEMO --}}

<section id="demo" class="landing-section demo-section">

    <div class="container">

        <div class="demo-content">

            <span>DEMO</span>

            <h2>
                See our technology in action.
            </h2>

            <p>
                Explore demonstrations of software,
                hardware, IoT and AI solutions developed
                by SOENDEV.
            </p>

            <a href="#" class="btn btn-light">
                View Demo
            </a>

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

.hero-slider {
    position: relative;
    height: calc(100vh - 76px);
    min-height: 650px;
    overflow: hidden;
    background: #0b1220;
}

.hero-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    transition: opacity 1s ease;
}

.hero-slide.active {
    opacity: 1;
    visibility: visible;
}

.hero-background {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    transform: scale(1.02);
}

.hero-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
    max-width: 1180px;
}

.hero-subtitle {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 5px;
    margin-bottom: 28px;
    text-transform: uppercase;
}

.hero-content h1 {
    max-width: 850px;
    font-size: clamp(55px, 7vw, 100px);
    line-height: .95;
    letter-spacing: -5px;
    margin-bottom: 30px;
}

.hero-content p {
    max-width: 650px;
    font-size: 19px;
    color: rgba(255,255,255,.78);
    line-height: 1.7;
}

.hero-buttons {
    display: flex;
    gap: 14px;
    margin-top: 35px;
}

.btn {
    display: inline-block;
    padding: 14px 25px;
    border-radius: 5px;
    font-weight: 700;
    transition: .25s ease;
}

.btn-primary {
    background: #ffffff;
    color: #111827;
}

.btn-primary:hover {
    background: #e5e7eb;
}

.btn-outline {
    border: 1px solid rgba(255,255,255,.6);
    color: white;
}

.btn-outline:hover {
    background: white;
    color: #111827;
}

.btn-light {
    background: white;
    color: #111827;
}

.slider-prev,
.slider-next {
    position: absolute;
    top: 50%;
    z-index: 10;
    width: 50px;
    height: 50px;
    border: 1px solid rgba(255,255,255,.4);
    background: rgba(0,0,0,.15);
    color: white;
    font-size: 35px;
    cursor: pointer;
    transform: translateY(-50%);
}

.slider-prev {
    left: 30px;
}

.slider-next {
    right: 30px;
}

.slider-prev:hover,
.slider-next:hover {
    background: white;
    color: #111827;
}

.slider-dots {
    position: absolute;
    z-index: 10;
    bottom: 35px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
}

.slider-dot {
    width: 35px;
    height: 3px;
    border: 0;
    background: rgba(255,255,255,.4);
    cursor: pointer;
}

.slider-dot.active {
    background: white;
}

.landing-section {
    padding: 110px 0;
}

.landing-section.light {
    background: #f7f8fa;
}

.section-heading {
    max-width: 850px;
    margin-bottom: 55px;
}

.section-heading span {
    display: block;
    margin-bottom: 15px;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 4px;
    color: #64748b;
}

.section-heading h2 {
    font-size: clamp(40px, 5vw, 68px);
    line-height: 1;
    letter-spacing: -3px;
    margin-bottom: 20px;
}

.section-heading p {
    color: #64748b;
    font-size: 18px;
}

.service-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.service-card {
    padding: 35px;
    background: white;
    border: 1px solid #e5e7eb;
    min-height: 280px;
    transition: .25s ease;
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(0,0,0,.08);
}

.service-number {
    font-size: 14px;
    font-weight: 800;
    color: #94a3b8;
    margin-bottom: 60px;
}

.service-card h3 {
    font-size: 23px;
    margin-bottom: 15px;
}

.service-card p {
    color: #64748b;
}

.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.portfolio-card {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    background: #e5e7eb;
}

.portfolio-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .5s ease;
}

.portfolio-card:hover img {
    transform: scale(1.08);
}

.portfolio-overlay {
    position: absolute;
    inset: auto 0 0 0;
    padding: 25px;
    color: white;
    background: linear-gradient(
        transparent,
        rgba(0,0,0,.8)
    );
}

.client-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

.client-logo {
    height: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border: 1px solid #e5e7eb;
    padding: 25px;
}

.client-logo img {
    max-width: 100%;
    max-height: 70px;
    object-fit: contain;
}

.demo-section {
    background: #101827;
    color: white;
}

.demo-content {
    max-width: 800px;
}

.demo-content > span {
    font-size: 13px;
    letter-spacing: 4px;
    font-weight: 800;
}

.demo-content h2 {
    margin: 20px 0;
    font-size: clamp(40px, 6vw, 75px);
    line-height: 1;
    letter-spacing: -3px;
}

.demo-content p {
    color: #9ca3af;
    font-size: 18px;
    margin-bottom: 30px;
}

@media (max-width: 900px) {

    .hero-slider {
        height: 700px;
    }

    .hero-content h1 {
        letter-spacing: -3px;
    }

    .service-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .portfolio-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .client-grid {
        grid-template-columns: repeat(3, 1fr);
    }

}

@media (max-width: 600px) {

    .hero-slider {
        height: 680px;
    }

    .hero-content {
        padding: 0 25px;
    }

    .hero-content h1 {
        font-size: 52px;
    }

    .hero-subtitle {
        font-size: 11px;
        letter-spacing: 3px;
    }

    .hero-buttons {
        flex-direction: column;
        align-items: flex-start;
    }

    .slider-prev {
        left: 15px;
    }

    .slider-next {
        right: 15px;
    }

    .service-grid,
    .portfolio-grid {
        grid-template-columns: 1fr;
    }

    .client-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

.service-link {
    display: inline-block;
    margin-top: 20px;
    font-weight: 700;
    font-size: 14px;
}

.service-link:hover {
    text-decoration: underline;
}

</style>

@endpush


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');

    if (slides.length <= 1) {
        return;
    }

    let current = 0;
    let timer;

    function showSlide(index) {

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });

        current = index;
    }

    function nextSlide() {
        showSlide((current + 1) % slides.length);
    }

    function previousSlide() {
        showSlide(
            (current - 1 + slides.length) % slides.length
        );
    }

    function startSlider() {
        timer = setInterval(nextSlide, 6000);
    }

    function resetSlider() {
        clearInterval(timer);
        startSlider();
    }

    document
        .querySelector('.slider-next')
        ?.addEventListener('click', function () {
            nextSlide();
            resetSlider();
        });

    document
        .querySelector('.slider-prev')
        ?.addEventListener('click', function () {
            previousSlide();
            resetSlider();
        });

    dots.forEach((dot, index) => {

        dot.addEventListener('click', function () {
            showSlide(index);
            resetSlider();
        });

    });

    startSlider();

});

</script>

@endpush