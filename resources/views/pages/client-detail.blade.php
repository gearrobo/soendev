@extends('layouts.app')

@section('title', $client->name . ' | SOENDEV')

@section('description', $client->short_description ?? $client->name)

@section('content')

<section class="client-detail-hero">

    <div class="container">

        <a
            href="{{ route('clients') }}"
            class="back-link"
        >
            ← Back to Our Clients
        </a>

        <div class="client-detail-layout">

            {{-- LOGO --}}
            <div class="client-detail-logo-box">

                @if ($client->logo)

                    <img
                        src="{{ asset('storage/' . $client->logo) }}"
                        alt="{{ $client->name }}"
                        class="client-detail-logo"
                    >

                @else

                    <span>
                        {{ $client->name }}
                    </span>

                @endif

            </div>


            {{-- INFORMATION --}}
            <div class="client-detail-info">

                <span class="page-eyebrow">
                    OUR CLIENT
                </span>

                <h1>
                    {{ $client->name }}
                </h1>

                @if ($client->short_description)

                    <p class="client-short-description">
                        {{ $client->short_description }}
                    </p>

                @endif

            </div>

        </div>

    </div>

</section>


<section class="content-section">

    <div class="container">

        <div class="client-description">

            <span class="section-label">
                ABOUT THE CLIENT
            </span>

            @if ($client->description)

                <div class="content">
                    {!! nl2br(e($client->description)) !!}
                </div>

            @else

                <p class="content">
                    SOENDEV is proud to work with
                    {{ $client->name }}.
                </p>

            @endif


            @if ($client->website)

                <div class="client-action">

                    <a
                        href="{{ $client->website }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn"
                    >
                        Visit Website →
                    </a>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection


@push('styles')

<style>

.client-detail-hero {
    padding: 80px 0;
    background: #f8fafc;
}


.back-link {
    display: inline-block;

    margin-bottom: 50px;

    color: #475569;

    font-size: 14px;
    font-weight: 600;

    transition: color .2s ease;
}

.back-link:hover {
    color: #111827;
}


/* DETAIL LAYOUT */

.client-detail-layout {

    display: grid;

    grid-template-columns: 420px 1fr;

    gap: 80px;

    align-items: center;
}


/* LARGE LOGO */

.client-detail-logo-box {

    width: 100%;
    height: 360px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 45px;

    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 18px;

    box-shadow: 0 20px 50px rgba(15, 23, 42, .06);
}


.client-detail-logo {

    width: 100%;
    height: 100%;

    object-fit: contain;
    object-position: center;
}


.client-detail-info h1 {

    margin-top: 12px;
    margin-bottom: 20px;

    font-size: clamp(42px, 5vw, 68px);

    line-height: 1.05;

    letter-spacing: -2px;
}


.client-short-description {

    max-width: 700px;

    color: #64748b;

    font-size: 21px;

    line-height: 1.7;
}


/* DESCRIPTION */

.client-description {

    max-width: 900px;
}


.section-label {

    display: block;

    margin-bottom: 20px;

    color: #64748b;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 2px;
}


.client-description .content {

    color: #475569;

    font-size: 18px;

    line-height: 1.9;
}


/* BUTTON */

.client-action {
    margin-top: 35px;
}


/* MOBILE */

@media (max-width: 850px) {

    .client-detail-hero {
        padding: 60px 0;
    }

    .client-detail-layout {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .client-detail-logo-box {
        height: 280px;
    }

    .client-detail-info h1 {
        font-size: 42px;
    }

}

</style>

@endpush