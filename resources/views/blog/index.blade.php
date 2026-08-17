@extends('template.home')

@section('content')

<section class="page-section" style="padding-top: 140px;">
    <div class="container">

        <div class="text-center mb-5">
            <h1>Blog</h1>
            <p class="text-muted">
                Artikel, teknologi, project, dan informasi SOENDEV.
            </p>
        </div>

        @if($categories->count())
            <div class="row mb-5">
                <div class="col-md-12 text-center">

                    <a href="{{ route('blog.index') }}"
                       class="btn btn-outline-dark m-1">
                        Semua
                    </a>

                    @foreach($categories as $category)
                        <a href="{{ route('blog.category', $category->slug) }}"
                           class="btn btn-outline-dark m-1">
                            {{ $category->name }}
                        </a>
                    @endforeach

                </div>
            </div>
        @endif

        <div class="row">

            @forelse($posts as $post)

                <div class="col-md-4 mb-4">

                    <article class="card h-100">

                        @if($post->featured_image)
                            <img
                                src="{{ Storage::disk('public')->url($post->featured_image) }}"
                                class="card-img-top"
                                alt="{{ $post->title }}"
                            >
                        @endif

                        <div class="card-body">

                            @if($post->category)
                                <small class="text-muted">
                                    {{ $post->category->name }}
                                </small>
                            @endif

                            <h3 class="mt-2">
                                {{ $post->title }}
                            </h3>

                            @if($post->excerpt)
                                <p>
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <a href="{{ route('blog.show', [
                                'category' => $post->category?->slug ?? 'blog',
                                'slug' => $post->slug,
                            ]) }}">
                                Baca selengkapnya →
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-md-12 text-center">
                    <p>Belum ada artikel.</p>
                </div>

            @endforelse

        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>
</section>

@endsection
