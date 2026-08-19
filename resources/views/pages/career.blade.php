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
                JOIN SOENDEV
            </span>

            <h2>
                Work with technology that matters.
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

            <span>OPEN POSITIONS</span>

            <h2>
                Current Opportunities
            </h2>

        </div>

        <div class="job-card">

            <div>

                <span class="job-type">
                    TECHNOLOGY
                </span>

                <h3>
                    Software Developer
                </h3>

                <p>
                    Laravel / PHP / JavaScript
                </p>

            </div>

            <a href="#" class="btn">
                Apply
            </a>

        </div>

        <div class="job-card">

            <div>

                <span class="job-type">
                    TECHNOLOGY
                </span>

                <h3>
                    IoT Engineer
                </h3>

                <p>
                    Embedded System / IoT / MQTT
                </p>

            </div>

            <a href="#" class="btn">
                Apply
            </a>

        </div>

    </div>

</section>

@endsection