@extends('template.home')

@section('content')

<section class="page-section" style="padding-top: 140px;">
    <div class="container">

        <div class="mb-5">
            <h1>{{ $category->name }}</h1>

            @if($category->description)
                <p class="text-muted">
                    {{ $category->description }}
                </p>
            @endif

            <a href="{{ route('blog.index') }}">
                ← Semua artikel
            </a>
        </div>

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

                            <h3>
                                {{ $post->title }}
                            </h3>

                            @if($post->excerpt)
                                <p>
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <a href="{{ route('blog.show', [
                                'category' => $category->slug,
                                'slug' => $post->slug,
                            ]) }}">
                                Baca selengkapnya →
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-md-12">
                    <p>Belum ada artikel dalam kategori ini.</p>
                </div>

            @endforelse

        </div>

        {{ $posts->links() }}

    </div>
</section>

@endsection
