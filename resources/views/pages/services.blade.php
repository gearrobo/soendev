@extends('layouts.app')

@section('title', 'Services | SOENDEV')

@section('description', 'SOENDEV technology services including software, hardware, IoT and AI development.')

@section('content')

<section class="services-hero">

    <div class="container">

        <span class="page-eyebrow">
            SOENDEV SERVICES
        </span>

        <h1>
            Technology for<br>
            Real World Applications.
        </h1>

        <p>
            We build software, hardware and intelligent technology
            solutions designed around real-world needs.
        </p>

    </div>

</section>


<section class="services-section">

    <div class="container">

        <div class="section-heading">

            <span>WHAT WE DO</span>

            <h2>
                Our Services
            </h2>

            <p>
                From software development to connected devices and
                intelligent systems, we build technology that works.
            </p>

        </div>


        @if($services->isEmpty())

            <div class="empty-services">
                <h3>No services available.</h3>

                <p>
                    Services can be added from the CMS administrator.
                </p>
            </div>

        @else

            <div class="service-page-grid">

                @foreach($services as $index => $service)

                    <a
                        href="{{ route('services.show', $service->slug) }}"
                        class="service-page-card"
                    >

                        <div class="service-card-top">

                            <span class="service-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            @if($service->icon)
                                <img
                                    src="{{ asset('storage/' . $service->icon) }}"
                                    alt="{{ $service->name }}"
                                    class="service-icon"
                                >
                            @endif

                        </div>


                        <div class="service-card-content">

                            <h3>
                                {{ $service->name }}
                            </h3>

                            @if($service->short_description)

                                <p>
                                    {{ $service->short_description }}
                                </p>

                            @endif

                        </div>


                        <div class="service-card-bottom">

                            <span>
                                Explore Service
                            </span>

                            <span class="service-arrow">
                                →
                            </span>

                        </div>

                    </a>

                @endforeach

            </div>

        @endif

    </div>

</section>

@endsection


@push('styles')

<style>

.services-hero {
    min-height: 560px;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            120deg,
            #0b1220 0%,
            #111827 55%,
            #1e3a5f 100%
        );
    color: white;
}

.services-hero .container {
    padding-top: 80px;
    padding-bottom: 80px;
}

.page-eyebrow {
    display: inline-block;
    margin-bottom: 25px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: #94a3b8;
}

.services-hero h1 {
    max-width: 850px;
    font-size: clamp(48px, 7vw, 82px);
    line-height: 1.02;
    letter-spacing: -4px;
    margin-bottom: 30px;
}

.services-hero p {
    max-width: 680px;
    color: #cbd5e1;
    font-size: 20px;
    line-height: 1.7;
}

.services-section {
    padding: 110px 0;
    background: #ffffff;
}

.section-heading {
    max-width: 850px;
    margin-bottom: 65px;
}

.section-heading > span {
    display: block;
    margin-bottom: 15px;
    color: #64748b;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 3px;
}

.section-heading h2 {
    margin-bottom: 18px;
    font-size: clamp(42px, 5vw, 64px);
    line-height: 1;
    letter-spacing: -3px;
    color: #111827;
}

.section-heading p {
    max-width: 700px;
    color: #64748b;
    font-size: 18px;
}

.service-page-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.service-page-card {
    position: relative;
    min-height: 360px;
    padding: 35px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    overflow: hidden;
    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.service-page-card:hover {
    transform: translateY(-7px);
    border-color: #cbd5e1;
    box-shadow: 0 25px 60px rgba(15, 23, 42, .10);
}

.service-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.service-number {
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #94a3b8;
}

.service-icon {
    width: 52px;
    height: 52px;
    object-fit: contain;
}

.service-card-content {
    padding: 40px 0;
}

.service-card-content h3 {
    margin-bottom: 15px;
    font-size: 32px;
    line-height: 1.1;
    letter-spacing: -1px;
    color: #111827;
}

.service-card-content p {
    max-width: 520px;
    color: #64748b;
    font-size: 16px;
    line-height: 1.7;
}

.service-card-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 20px;
    border-top: 1px solid #e2e8f0;
    color: #111827;
    font-size: 14px;
    font-weight: 700;
}

.service-arrow {
    font-size: 22px;
    transition: transform .2s ease;
}

.service-page-card:hover .service-arrow {
    transform: translateX(6px);
}

.empty-services {
    padding: 80px 30px;
    text-align: center;
    background: #f8fafc;
    border-radius: 16px;
}

.empty-services h3 {
    margin-bottom: 10px;
    font-size: 28px;
}

.empty-services p {
    color: #64748b;
}


@media (max-width: 800px) {

    .services-hero {
        min-height: 500px;
    }

    .services-hero h1 {
        font-size: 52px;
        letter-spacing: -2px;
    }

    .service-page-grid {
        grid-template-columns: 1fr;
    }

    .services-section {
        padding: 75px 0;
    }

}

@media (max-width: 500px) {

    .services-hero h1 {
        font-size: 42px;
    }

    .services-hero p {
        font-size: 17px;
    }

    .service-page-card {
        min-height: 320px;
        padding: 25px;
    }

    .service-card-content h3 {
        font-size: 27px;
    }

}

</style>

@endpush