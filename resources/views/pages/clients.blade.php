@extends('layouts.app')

@section('title', 'Our Clients | SOENDEV')

@section('description', 'Organizations and businesses working with SOENDEV.')

@section('content')

<section class="page-hero">
    <div class="container">

        <span class="page-eyebrow">
            OUR CLIENTS
        </span>

        <h1>
            Trusted by organizations
            across different industries.
        </h1>

        <p>
            We are proud to work with a diverse range of organizations
            from various sectors and industries.
        </p>

    </div>
</section>


<section class="content-section">

    <div class="container">

        <div class="client-grid">

            @forelse ($clients as $client)

                <a
                    href="{{ route('clients.show', $client->slug) }}"
                    class="client-card"
                >

                    <div class="client-logo-box">

                        @if ($client->logo)

                            <img
                                src="{{ asset('storage/' . $client->logo) }}"
                                alt="{{ $client->name }}"
                                class="client-logo-image"
                            >

                        @else

                            <div class="client-logo-placeholder">
                                {{ $client->name }}
                            </div>

                        @endif

                    </div>

                    <div class="client-name">
                        {{ $client->name }}
                    </div>

                </a>

            @empty

                <div class="empty-state">
                    <h3>No clients available.</h3>
                    <p>Client information will be published here.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection


@push('styles')

<style>

.client-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}


/* CLIENT CARD */

.client-card {
    display: block;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    overflow: hidden;
    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.client-card:hover {
    transform: translateY(-5px);
    border-color: #cbd5e1;
    box-shadow: 0 15px 35px rgba(15, 23, 42, .08);
}


/* LOGO CONTAINER */

.client-logo-box {
    width: 100%;
    height: 170px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 25px;

    background: #ffffff;
}


/* LOGO */

.client-logo-image {
    display: block;

    width: 100%;
    height: 100%;

    object-fit: contain;
    object-position: center;
}


/* NAME */

.client-name {
    min-height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 12px 15px;

    border-top: 1px solid #f1f5f9;

    font-size: 15px;
    font-weight: 600;
    text-align: center;

    color: #111827;
}


/* PLACEHOLDER */

.client-logo-placeholder {
    font-size: 18px;
    font-weight: 700;
    color: #64748b;
    text-align: center;
}


/* MOBILE */

@media (max-width: 1000px) {

    .client-grid {
        grid-template-columns: repeat(3, 1fr);
    }

}


@media (max-width: 700px) {

    .client-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .client-logo-box {
        height: 140px;
        padding: 20px;
    }

}


@media (max-width: 450px) {

    .client-grid {
        grid-template-columns: 1fr;
    }

}

</style>

@endpush