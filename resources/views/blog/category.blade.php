@extends('layouts.app')

@section('title', $category->name . ' | SOENDEV')

@section('content')

<section class="blog-hero">
    <div class="container">

        <span class="eyebrow">
            SOENDEV INSIGHT
        </span>

        <h1>
            {{ $category->name }}
        </h1>

        @if($category->description)
            <p>
                {{ $category->description }}
            </p>
        @else
            <p>
                Technology insights and articles from SOENDEV.
            </p>
        @endif

    </div>
</section>


<section class="blog-content">

    <div class="container">

        <div class="blog-grid">

            @forelse($posts as $post)

                <article class="blog-card">

                    <a
                        href="{{ route(
                            'blog.show',
                            [
                                'category' => $category->slug,
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

                        <div class="blog-card-category">
                            {{ $category->name }}
                        </div>

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
                                    'category' => $category->slug,
                                    'slug' => $post->slug
                                ]
                            ) }}"
                            class="blog-read"
                        >
                            Read Article →
                        </a>

                    </div>

                </article>

            @empty

                <div class="blog-empty">
                    Belum ada artikel dalam kategori ini.
                </div>

            @endforelse

        </div>

        <div class="blog-pagination">
            {{ $posts->links() }}
        </div>

    </div>

</section>

@endsection