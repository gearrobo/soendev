@extends('layouts.app')

@section('title', 'Portfolio | SOENDEV')

@section('description', 'Selected projects and technology solutions developed by SOENDEV.')

@section('content')

<section class="portfolio-hero">

    <div class="container">

        <span class="eyebrow">
            SOENDEV INSIGHT
        </span>

        <h1>
            Our Portfolio
        </h1>

        <p>
            Selected technology projects built for real-world applications.
        </p>

    </div>

</section>


<section class="portfolio-section">

    <div class="container">

        <div class="portfolio-heading">

            <span>
                SELECTED WORK
            </span>

            <h2>
                Technology in action.
            </h2>

        </div>


        @if($portfolios->isEmpty())

            <div class="empty-state">

                <h3>
                    Portfolio coming soon.
                </h3>

                <p>
                    Projects can be added from the CMS administrator.
                </p>

            </div>

        @else

            <div class="portfolio-grid">

                @foreach($portfolios as $portfolio)

                    <a
                        href="{{ route('portfolio.show', $portfolio->slug) }}"
                        class="portfolio-card"
                    >

                        <div class="portfolio-image">

                            @if($portfolio->featured_image)

                                <img
                                    src="{{ asset('storage/' . $portfolio->featured_image) }}"
                                    alt="{{ $portfolio->title }}"
                                >

                            @else

                                <div class="portfolio-placeholder">
                                    SOENDEV
                                </div>

                            @endif

                        </div>


                        <div class="portfolio-content">

                            @if($portfolio->category)

                                <span class="portfolio-category">
                                    {{ $portfolio->category }}
                                </span>

                            @endif

                            <h3>
                                {{ $portfolio->title }}
                            </h3>

                            @if($portfolio->short_description)

                                <p>
                                    {{ $portfolio->short_description }}
                                </p>

                            @endif

                            <span class="portfolio-link">
                                View Project →
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

.portfolio-hero {
    padding: 110px 0;
    background: #0b1220;
    color: white;
}

.eyebrow {
    display: block;
    margin-bottom: 22px;
    color: #94a3b8;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 4px;
}

.portfolio-hero h1 {
    margin-bottom: 25px;
    font-size: clamp(50px, 7vw, 82px);
    line-height: 1;
    letter-spacing: -4px;
}

.portfolio-hero p {
    max-width: 650px;
    color: #cbd5e1;
    font-size: 20px;
}

.portfolio-section {
    padding: 110px 0;
}

.portfolio-heading {
    margin-bottom: 55px;
}

.portfolio-heading span {
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;
}

.portfolio-heading h2 {
    margin-top: 15px;
    font-size: clamp(38px, 5vw, 60px);
    line-height: 1;
    letter-spacing: -3px;
}

.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
}

.portfolio-card {
    display: block;
    overflow: hidden;
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    transition: .25s ease;
}

.portfolio-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 25px 60px rgba(15,23,42,.12);
}

.portfolio-image {
    height: 330px;
    overflow: hidden;
    background: #e2e8f0;
}

.portfolio-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.portfolio-card:hover .portfolio-image img {
    transform: scale(1.04);
}

.portfolio-placeholder {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #111827;
    color: #64748b;
    font-size: 22px;
    font-weight: 800;
    letter-spacing: 3px;
}

.portfolio-content {
    padding: 30px;
}

.portfolio-category {
    display: block;
    margin-bottom: 12px;
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.portfolio-content h3 {
    margin-bottom: 12px;
    font-size: 30px;
    line-height: 1.1;
    letter-spacing: -1px;
}

.portfolio-content p {
    margin-bottom: 22px;
    color: #64748b;
    line-height: 1.7;
}

.portfolio-link {
    font-weight: 700;
    color: #111827;
}

.empty-state {
    padding: 80px 30px;
    text-align: center;
    background: #f8fafc;
    border-radius: 18px;
}

.empty-state h3 {
    margin-bottom: 10px;
    font-size: 28px;
}

.empty-state p {
    color: #64748b;
}

@media (max-width: 800px) {

    .portfolio-grid {
        grid-template-columns: 1fr;
    }

    .portfolio-hero,
    .portfolio-section {
        padding: 75px 0;
    }

}

</style>

@endpush