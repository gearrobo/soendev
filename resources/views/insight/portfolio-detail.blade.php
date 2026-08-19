@extends('layouts.app')

@section('title', $portfolio->title . ' | SOENDEV')

@section('description', $portfolio->short_description ?? $portfolio->title)

@section('content')

<section class="portfolio-detail-hero">

    <div class="container">

        <span>
            {{ $portfolio->category ?? 'PROJECT' }}
        </span>

        <h1>
            {{ $portfolio->title }}
        </h1>

        @if($portfolio->short_description)

            <p>
                {{ $portfolio->short_description }}
            </p>

        @endif

    </div>

</section>


@if($portfolio->featured_image)

<section class="portfolio-detail-image">

    <div class="container">

        <img
            src="{{ asset('storage/' . $portfolio->featured_image) }}"
            alt="{{ $portfolio->title }}"
        >

    </div>

</section>

@endif


<section class="portfolio-detail-content">

    <div class="container">

        <div class="portfolio-detail-grid">

            <div>

                <span class="detail-label">
                    PROJECT
                </span>

                <h2>
                    {{ $portfolio->title }}
                </h2>

                @if($portfolio->client)

                    <p class="project-client">
                        Client: <strong>{{ $portfolio->client }}</strong>
                    </p>

                @endif

            </div>


            <div class="project-description">

                @if($portfolio->description)

                    {!! nl2br(e($portfolio->description)) !!}

                @else

                    <p>
                        Project information will be available soon.
                    </p>

                @endif


                @if($portfolio->project_url)

                    <a
                        href="{{ $portfolio->project_url }}"
                        target="_blank"
                        rel="noopener"
                        class="project-button"
                    >
                        {{ $portfolio->button_text ?? 'View Project' }}
                        →
                    </a>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection