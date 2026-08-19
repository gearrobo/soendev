@extends('layouts.app')

@section('title', $product->name . ' | SOENDEV')

@section('description', $product->short_description ?? $product->name)

@section('content')

<section class="page-hero">

    <div class="container">

        <span class="page-eyebrow">
            SOENDEV PRODUCT
        </span>

        <h1>
            {{ $product->name }}
        </h1>

        @if ($product->short_description)

            <p>
                {{ $product->short_description }}
            </p>

        @endif

    </div>

</section>


@if ($product->featured_image)

<section class="product-detail-image">

    <div class="container">

        <img
            src="{{ asset('storage/' . $product->featured_image) }}"
            alt="{{ $product->name }}"
        >

    </div>

</section>

@endif


<section class="content-section">

    <div class="container">

        <div class="product-detail-grid">

            <div>

                <span class="detail-label">
                    PRODUCT
                </span>

                <h2>
                    {{ $product->name }}
                </h2>

                @if ($product->category)

                    <p>
                        Category:
                        <strong>{{ $product->category }}</strong>
                    </p>

                @endif

            </div>


            <div class="product-description">

                @if ($product->description)

                    {!! nl2br(e($product->description)) !!}

                @else

                    <p>
                        Product information will be available soon.
                    </p>

                @endif


                @if ($product->product_url)

                    <a
                        href="{{ $product->product_url }}"
                        target="_blank"
                        rel="noopener"
                        class="btn"
                    >
                        {{ $product->button_text ?? 'Learn More' }}
                        →
                    </a>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection