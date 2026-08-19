@extends('layouts.app')

@section('title', $page->title . ' | SOENDEV')

@section('description', $page->subtitle)

@section('content')

<section class="page-hero">

    <div class="container">

        <span class="page-eyebrow">
            PROFILE
        </span>

        <h1>
            {{ $page->title }}
        </h1>

        @if($page->subtitle)
            <p>
                {{ $page->subtitle }}
            </p>
        @endif

    </div>

</section>


<section class="content-section">

    <div class="container content-grid">

        <div>

            <span class="section-eyebrow">
                WHO WE ARE
            </span>

            <h2>
                Building technology that works in the real world.
            </h2>

        </div>

        <div class="content-text">

            {!! nl2br(e($page->content)) !!}

        </div>

    </div>

</section>


<section class="content-section light">

    <div class="container">

        <div class="section-heading">

            <span>OUR APPROACH</span>

            <h2>
                Technology with purpose.
            </h2>

        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <span>01</span>
                <h3>Understand</h3>
                <p>
                    We understand the real problem before
                    designing the technology.
                </p>
            </div>

            <div class="feature-card">
                <span>02</span>
                <h3>Build</h3>
                <p>
                    We design and develop practical
                    technology solutions.
                </p>
            </div>

            <div class="feature-card">
                <span>03</span>
                <h3>Deliver</h3>
                <p>
                    We focus on reliable implementation
                    and long-term usability.
                </p>
            </div>

        </div>

    </div>

</section>


<section class="cta-section">

    <div class="container">

        <span>LET'S WORK TOGETHER</span>

        <h2>
            Have a technology challenge?
        </h2>

        <a href="{{ route('services') }}" class="btn">
            Explore Our Services
        </a>

    </div>

</section>

@endsection