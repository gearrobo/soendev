@extends('layouts.app')

@section('title', 'Our Products | SOENDEV')

@section('description', 'Technology products developed by SOENDEV.')

@section('content')

<section class="page-hero">

    <div class="container">

        <span class="page-eyebrow">
            SOENDEV
        </span>

        <h1>
            Our Products
        </h1>

        <p>
            Technology products developed to solve practical problems.
        </p>

    </div>

</section>


<section class="content-section">

    <div class="container">

        <div class="section-heading">

            <span>PRODUCTS</span>

            <h2>
                Technology we build.
            </h2>

        </div>


        <div class="product-grid">

            @forelse ($products as $product)

                <a
                    href="{{ route('products.show', $product->slug) }}"
                    class="product-card"
                >

                    <div class="product-image">

                        @if ($product->featured_image)

                            <img
                                src="{{ asset('storage/' . $product->featured_image) }}"
                                alt="{{ $product->name }}"
                            >

                        @else

                            <div class="product-placeholder">
                                SOENDEV
                            </div>

                        @endif

                    </div>


                    <div class="product-content">

                        @if ($product->category)

                            <span class="product-category">
                                {{ $product->category }}
                            </span>

                        @endif

                        <h3>
                            {{ $product->name }}
                        </h3>

                        @if ($product->short_description)

                            <p>
                                {{ $product->short_description }}
                            </p>

                        @endif

                        <strong>
                            Explore Product →
                        </strong>

                    </div>

                </a>

            @empty

                <div class="empty-state">

                    <h3>
                        Products coming soon.
                    </h3>

                    <p>
                        Product information can be added through the CMS.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection