@extends('template.home')

@section('content')

<section class="page-section" style="padding-top: 140px;">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                @if($post->category)
                    <a href="{{ route('blog.category', $post->category->slug) }}">
                        {{ $post->category->name }}
                    </a>
                @endif

                <h1 class="mt-3">
                    {{ $post->title }}
                </h1>

                @if($post->published_at)
                    <p class="text-muted">
                        {{ $post->published_at->format('d F Y') }}
                    </p>
                @endif

                @if($post->featured_image)
                    <img
                        src="{{ Storage::disk('public')->url($post->featured_image) }}"
                        class="img-fluid mb-4"
                        alt="{{ $post->title }}"
                    >
                @endif

                <article class="blog-content">
                    {!! $post->content !!}
                </article>

                <div class="mt-5">
                    <a href="{{ route('blog.index') }}">
                        ← Kembali ke Blog
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection
