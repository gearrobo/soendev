@extends('layouts.app')

@section('title', $service->name . ' | SOENDEV')

@section('description', $service->short_description ?? $service->name)

@section('content')

<section class="service-detail-hero">

    <div class="container">

        <div class="service-detail-grid">

            <div>

                <span class="page-eyebrow">
                    SOENDEV SERVICES
                </span>

                <h1>
                    {{ $service->name }}
                </h1>

                @if($service->short_description)

                    <p class="service-detail-subtitle">
                        {{ $service->short_description }}
                    </p>

                @endif

            </div>


            @if($service->image)

                <div class="service-detail-image">

                    <img
                        src="{{ asset('storage/' . $service->image) }}"
                        alt="{{ $service->name }}"
                    >

                </div>

            @endif

        </div>

    </div>

</section>


<section class="service-detail-content">

    <div class="container">

        <div class="service-content-grid">

            <div>

                <span class="content-eyebrow">
                    ABOUT THIS SERVICE
                </span>

                <h2>
                    {{ $service->name }}
                </h2>

            </div>


            <div class="service-description">

                @if($service->description)

                    {!! nl2br(e($service->description)) !!}

                @else

                    <p>
                        Information about this service will be available soon.
                    </p>

                @endif


                @if($service->button_text && $service->button_url)

                    <a
                        href="{{ $service->button_url }}"
                        class="service-detail-button"
                    >
                        {{ $service->button_text }}
                        →
                    </a>

                @endif

            </div>

        </div>

    </div>

</section>


<section class="service-detail-cta">

    <div class="container">

        <div>

            <span>
                HAVE A PROJECT IN MIND?
            </span>

            <h2>
                Let's build something useful.
            </h2>

        </div>

        <a href="/contact" class="cta-button">
            Contact SOENDEV →
        </a>

    </div>

</section>

@endsection


@push('styles')

<style>

.service-detail-hero {
    background: #0b1220;
    color: white;
    padding: 100px 0;
}

.service-detail-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 70px;
    align-items: center;
}

.service-detail-hero h1 {
    margin-bottom: 25px;
    font-size: clamp(48px, 6vw, 78px);
    line-height: 1;
    letter-spacing: -3px;
}

.service-detail-subtitle {
    max-width: 600px;
    color: #cbd5e1;
    font-size: 20px;
    line-height: 1.7;
}

.service-detail-image img {
    width: 100%;
    height: 460px;
    object-fit: cover;
    border-radius: 18px;
}

.service-detail-content {
    padding: 110px 0;
}

.service-content-grid {
    display: grid;
    grid-template-columns: .7fr 1.3fr;
    gap: 100px;
}

.content-eyebrow {
    display: block;
    margin-bottom: 15px;
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;
}

.service-content-grid h2 {
    font-size: 42px;
    line-height: 1.1;
    letter-spacing: -2px;
}

.service-description {
    color: #475569;
    font-size: 19px;
    line-height: 1.9;
}

.service-detail-button {
    display: inline-block;
    margin-top: 35px;
    padding: 15px 24px;
    border-radius: 8px;
    background: #111827;
    color: white;
    font-weight: 700;
}

.service-detail-cta {
    padding: 80px 0;
    background: #f8fafc;
}

.service-detail-cta .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
}

.service-detail-cta span {
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;
}

.service-detail-cta h2 {
    margin-top: 12px;
    font-size: 38px;
    letter-spacing: -1px;
}

.cta-button {
    padding: 16px 25px;
    border-radius: 8px;
    background: #111827;
    color: white;
    font-weight: 700;
    white-space: nowrap;
}


@media (max-width: 800px) {

    .service-detail-grid,
    .service-content-grid {
        grid-template-columns: 1fr;
        gap: 45px;
    }

    .service-detail-hero {
        padding: 70px 0;
    }

    .service-detail-image img {
        height: 320px;
    }

    .service-content-grid {
        gap: 35px;
    }

    .service-detail-cta .container {
        flex-direction: column;
        align-items: flex-start;
    }

}

</style>

@endpush