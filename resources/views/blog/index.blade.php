@extends('layouts.app')

@section('title', 'Blog | SOENDEV')
@section('description', 'Insight, technology, project and development stories from SOENDEV.')

@push('styles')
<style>
    .blog-hero {
        background: #0b1322;
        color: white;
        padding: 110px 0 100px;
    }

    .blog-hero .eyebrow {
        display: block;
        margin-bottom: 18px;
        color: #94a3b8;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .blog-hero h1 {
        max-width: 850px;
        font-size: clamp(48px, 7vw, 82px);
        line-height: 1;
        letter-spacing: -4px;
        margin-bottom: 25px;
    }

    .blog-hero p {
        max-width: 720px;
        color: #cbd5e1;
        font-size: 19px;
    }

    .blog-content {
        padding: 90px 0 110px;
    }

    .blog-categories {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 50px;
    }

    .blog-category {
        display: inline-flex;
        align-items: center;
        padding: 10px 17px;
        border: 1px solid #dbe1e8;
        border-radius: 999px;
        color: #334155;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
    }

    .blog-category:hover {
        background: #0f172a;
        border-color: #0f172a;
        color: white;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    .blog-card {
        display: flex;
        flex-direction: column;
        overflow: hidden;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 45px rgba(15, 23, 42, .10);
    }

    .blog-card-image {
        width: 100%;
        aspect-ratio: 16 / 9;
        background: #f1f5f9;
        overflow: hidden;
    }

    .blog-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .blog-card-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 14px;
    }

    .blog-card-body {
        padding: 25px;
    }

    .blog-card-category {
        margin-bottom: 10px;
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .blog-card h2 {
        margin-bottom: 12px;
        color: #0f172a;
        font-size: 23px;
        line-height: 1.25;
        letter-spacing: -.5px;
    }

    .blog-card-excerpt {
        color: #64748b;
        font-size: 15px;
        line-height: 1.7;
    }

    .blog-card-meta {
        margin-top: 20px;
        color: #94a3b8;
        font-size: 13px;
    }

    .blog-read {
        display: inline-block;
        margin-top: 18px;
        color: #0f172a;
        font-size: 14px;
        font-weight: 700;
    }

    .blog-empty {
        padding: 80px 20px;
        text-align: center;
        color: #64748b;
        border: 1px dashed #cbd5e1;
        border-radius: 16px;
    }

    .blog-pagination {
        margin-top: 55px;
    }

    .blog-pagination nav {
        display: flex;
        justify-content: center;
    }

    @media (max-width: 950px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 650px) {
        .blog-hero {
            padding: 80px 0;
        }

        .blog-hero h1 {
            font-size: 52px;
            letter-spacing: -2px;
        }

        .blog-content {
            padding: 65px 0 80px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

<section class="blog-hero">
    <div class="container">

        <span class="eyebrow">
            SOENDEV INSIGHT
        </span>

        <h1>
            Technology, Ideas &amp; Real World Solutions.
        </h1>

        <p>
            Explore our latest insights, technology development,
            projects, products and stories from SOENDEV.
        </p>

    </div>
</section>


<section class="blog-content">

    <div class="container">

        @if($categories->count())

            <div class="blog-categories">

                <a href="{{ route('blog.index') }}"
                   class="blog-category">
                    All
                </a>

                @foreach($categories as $category)

                    <a
                        href="{{ route('blog.category', $category->slug) }}"
                        class="blog-category"
                    >
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        @endif


        @if($posts->count())

            <div class="blog-grid">

                @foreach($posts as $post)

                    <article class="blog-card">

                        <a
                            href="{{ route(
                                'blog.show',
                                [
                                    'category' => $post->category?->slug ?? 'uncategorized',
                                    'slug' => $post->slug
                                ]
                            ) }}"
                            class="blog-card-image"
                        >

                            @if($post->featured_image)

                                <img
                                    src="{{ asset('storage/' . $post->featured_image) }}"
                                    alt="{{ $post->title }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="blog-card-placeholder">
                                    SOENDEV INSIGHT
                                </div>

                            @endif

                        </a>


                        <div class="blog-card-body">

                            @if($post->category)

                                <div class="blog-card-category">
                                    {{ $post->category->name }}
                                </div>

                            @endif

                            <h2>
                                {{ $post->title }}
                            </h2>

                            @if($post->excerpt)

                                <p class="blog-card-excerpt">
                                    {{ $post->excerpt }}
                                </p>

                            @endif

                            <div class="blog-card-meta">
                                {{ optional($post->published_at)->format('d M Y') }}
                            </div>

                            <a
                                href="{{ route(
                                    'blog.show',
                                    [
                                        'category' => $post->category?->slug ?? 'uncategorized',
                                        'slug' => $post->slug
                                    ]
                                ) }}"
                                class="blog-read"
                            >
                                Read Article →
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>


            <div class="blog-pagination">
                {{ $posts->links() }}
            </div>

        @else

            <div class="blog-empty">
                Belum ada artikel yang dipublikasikan.
            </div>

        @endif

    </div>

</section>

@endsection