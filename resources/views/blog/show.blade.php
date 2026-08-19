@extends('layouts.app')

@section('title', $post->title . ' | SOENDEV')

@section('description', $post->excerpt ?? $post->title)

@push('styles')
<style>
    .article-hero {
        background: #0b1322;
        color: white;
        padding: 100px 0;
    }

    .article-category {
        display: inline-block;
        margin-bottom: 20px;
        color: #94a3b8;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .article-hero h1 {
        max-width: 950px;
        font-size: clamp(42px, 6vw, 72px);
        line-height: 1.05;
        letter-spacing: -3px;
    }

    .article-date {
        margin-top: 25px;
        color: #94a3b8;
        font-size: 14px;
    }

    .article-content {
        padding: 80px 0 110px;
    }

    .article-layout {
        max-width: 900px;
        margin: auto;
    }

    .article-image {
        width: 100%;
        margin-bottom: 55px;
        border-radius: 18px;
        overflow: hidden;
        background: #f1f5f9;
    }

    .article-image img {
        width: 100%;
        max-height: 600px;
        object-fit: cover;
        display: block;
    }

    .article-body {
        color: #334155;
        font-size: 18px;
        line-height: 1.9;
    }

    .article-body h2 {
        margin: 45px 0 15px;
        color: #0f172a;
        font-size: 32px;
    }

    .article-body h3 {
        margin: 35px 0 12px;
        color: #0f172a;
        font-size: 25px;
    }

    .article-body p {
        margin-bottom: 22px;
    }

    .article-body img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
    }

    .article-back {
        display: inline-block;
        margin-top: 50px;
        color: #0f172a;
        font-weight: 700;
    }
</style>
@endpush

@section('content')

<section class="article-hero">

    <div class="container">

        @if($post->category)

            <a
                href="{{ route('blog.category', $post->category->slug) }}"
                class="article-category"
            >
                {{ $post->category->name }}
            </a>

        @endif

        <h1>
            {{ $post->title }}
        </h1>

        <div class="article-date">
            {{ optional($post->published_at)->format('d F Y') }}
        </div>

    </div>

</section>


<section class="article-content">

    <div class="container">

        <article class="article-layout">

            @if($post->featured_image)

                <div class="article-image">

                    <img
                        src="{{ asset('storage/' . $post->featured_image) }}"
                        alt="{{ $post->title }}"
                    >

                </div>

            @endif


            <div class="article-body">

                {!! $post->content !!}

            </div>


            <a
                href="{{ route('blog.index') }}"
                class="article-back"
            >
                ← Back to Insight
            </a>

        </article>

    </div>

</section>

@endsection