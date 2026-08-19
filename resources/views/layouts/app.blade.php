<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'SOENDEV')
    </title>

    <meta name="description"
          content="@yield('description', 'SOENDEV - Software, Hardware, IoT and AI Development')">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
            background: #ffffff;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: auto;
        }

        /* NAVBAR */

        /* =========================
        NAVBAR
        ========================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #020b18;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
        }

        .navbar-inner {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            display: block;
            width: 190px;
            height: auto;
            max-height: 58px;
            object-fit: contain;
        }

        /* =========================
        NAV MENU
        ========================= */

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: block;
            padding: 27px 15px;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff !important;
            transition: color .2s ease;
        }

        .nav-link:hover,
        .nav-item:hover > .nav-link {
            color: #087cff !important;
        }

        /* =========================
        DROPDOWN
        ========================= */

        .dropdown {
            position: absolute;
            top: calc(100% - 1px);
            left: 0;

            min-width: 240px;

            background: #071426;

            border: 1px solid rgba(8, 124, 255, 0.35);
            border-radius: 10px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .35),
                0 0 20px rgba(8, 124, 255, .08);

            padding: 8px;

            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);

            transition:
                opacity .2s ease,
                visibility .2s ease,
                transform .2s ease;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }


        /* dropdown links */

        .dropdown a {
            display: block;

            padding: 12px 14px;

            border-radius: 7px;

            font-size: 14px;
            font-weight: 500;

            color: #ffffff !important;

            transition:
                background .2s ease,
                color .2s ease;
        }

        .dropdown a:hover {
            background: rgba(8, 124, 255, 0.15);
            color: #087cff !important;
        }

        /* HERO */

        .hero {
            min-height: 680px;
            display: flex;
            align-items: center;
            background: #f8fafc;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 60px;
            align-items: center;
        }

        .hero h1 {
            font-size: clamp(48px, 7vw, 88px);
            line-height: 1;
            letter-spacing: -4px;
            margin-bottom: 25px;
        }

        .hero h2 {
            font-size: 25px;
            font-weight: 400;
            color: #4b5563;
            margin-bottom: 20px;
        }

        .hero p {
            max-width: 650px;
            color: #6b7280;
            font-size: 18px;
        }

        .hero-image img {
            width: 100%;
            max-height: 520px;
            object-fit: cover;
            border-radius: 18px;
        }

        .btn {
            display: inline-block;
            margin-top: 30px;
            padding: 14px 25px;
            border-radius: 8px;
            background: #111827;
            color: white;
            font-weight: 600;
        }

        .btn:hover {
            background: #374151;
        }

        /* SECTIONS */

        .section {
            padding: 100px 0;
        }

        .section:nth-child(even) {
            background: #f8fafc;
        }

        .section-title {
            max-width: 800px;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 46px;
            line-height: 1.1;
            letter-spacing: -2px;
            margin-bottom: 12px;
        }

        .section-title p {
            color: #6b7280;
            font-size: 18px;
        }

        .content {
            max-width: 900px;
            color: #4b5563;
            font-size: 17px;
            white-space: pre-line;
        }

        .section-image {
            margin-top: 40px;
        }

        .section-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 16px;
        }

        /* FOOTER */

        footer {
            background: #111827;
            color: white;
            padding: 60px 0;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }

        .footer-logo {
            font-size: 25px;
            font-weight: 800;
        }

        .footer-text {
            color: #9ca3af;
            margin-top: 10px;
        }

        /* MOBILE */

        @media (max-width: 850px) {

            .navbar-inner {
                flex-direction: column;
                padding: 15px 0;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-link {
                padding: 8px 7px;
            }

            .dropdown {
                display: none;
            }

            .hero {
                min-height: auto;
                padding: 80px 0;
            }

            .hero-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 58px;
            }

            .section {
                padding: 70px 0;
            }

            .section-title h2 {
                font-size: 38px;
            }

            .footer-inner {
                flex-direction: column;
            }
        }

        /* =========================================================
   INTERNAL PAGES
   ========================================================= */

.page-hero {
    background: #0b1220;
    color: #ffffff;
    padding: 150px 0 120px;
}

.page-eyebrow,
.section-eyebrow,
.section-heading > span,
.cta-section > .container > span {
    display: block;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.page-hero h1 {
    font-size: clamp(48px, 7vw, 88px);
    line-height: 1;
    letter-spacing: -4px;
    max-width: 900px;
}

.page-hero p {
    margin-top: 25px;
    font-size: 22px;
    color: #aeb8c9;
    max-width: 700px;
}

.content-section {
    padding: 110px 0;
}

.content-section.light {
    background: #f5f7fa;
}

.content-grid {
    display: grid;
    grid-template-columns: .8fr 1.2fr;
    gap: 90px;
    align-items: start;
}

.content-grid h2 {
    font-size: clamp(38px, 5vw, 62px);
    line-height: 1.05;
    letter-spacing: -2px;
}

.content-text {
    font-size: 18px;
    color: #5b6472;
}

.content-text p + p {
    margin-top: 25px;
}

.section-heading {
    max-width: 850px;
    margin-bottom: 55px;
}

.section-heading h2 {
    font-size: clamp(38px, 5vw, 62px);
    line-height: 1.05;
    letter-spacing: -2px;
}

.section-heading p {
    margin-top: 20px;
    color: #687386;
    font-size: 18px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.feature-card {
    background: #ffffff;
    padding: 40px;
    min-height: 250px;
    border: 1px solid #e5e7eb;
    transition: .25s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,.08);
}

.feature-card span {
    display: block;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #7b8493;
    margin-bottom: 35px;
}

.feature-card h3 {
    font-size: 24px;
    margin-bottom: 15px;
}

.feature-card p {
    color: #687386;
}

.service-page-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.service-page-card {
    display: block;
    padding: 50px;
    border: 1px solid #e2e6ec;
    background: #ffffff;
    transition: .25s ease;
}

.service-page-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(0,0,0,.08);
}

.service-page-card > span {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #7b8493;
}

.service-page-card h3 {
    font-size: 30px;
    margin: 25px 0 15px;
}

.service-page-card p {
    color: #687386;
    font-size: 17px;
    margin-bottom: 30px;
}

.service-page-card strong {
    font-size: 14px;
}

.job-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    padding: 35px;
    background: #ffffff;
    border: 1px solid #e2e6ec;
    margin-bottom: 20px;
}

.job-type {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #7b8493;
}

.job-card h3 {
    font-size: 25px;
    margin: 8px 0;
}

.job-card p {
    color: #687386;
}

.cta-section {
    padding: 120px 0;
    background: #0b1220;
    color: #ffffff;
}

.cta-section h2 {
    font-size: clamp(40px, 6vw, 72px);
    line-height: 1;
    letter-spacing: -3px;
    max-width: 800px;
    margin-bottom: 35px;
}

.cta-section .btn {
    background: #ffffff;
    color: #0b1220;
}

@media (max-width: 850px) {

    .page-hero {
        padding: 100px 0 80px;
    }

    .content-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .feature-grid {
        grid-template-columns: 1fr;
    }

    .service-page-grid {
        grid-template-columns: 1fr;
    }

    .job-card {
        flex-direction: column;
        align-items: flex-start;
    }

}

.product-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
}

.product-card {
    display: block;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    transition: .25s ease;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 50px rgba(0,0,0,.09);
}

.product-image {
    height: 280px;
    background: #f1f5f9;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.04);
}

.product-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #111827;
    color: #64748b;
    font-size: 20px;
    font-weight: 800;
    letter-spacing: 3px;
}

.product-content {
    padding: 28px;
}

.product-category {
    display: block;
    margin-bottom: 10px;
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.product-content h3 {
    margin-bottom: 12px;
    font-size: 27px;
    line-height: 1.15;
}

.product-content p {
    margin-bottom: 20px;
    color: #64748b;
    line-height: 1.7;
}

.product-content strong {
    font-size: 14px;
    color: #111827;
}

.product-detail-image {
    padding: 70px 0 0;
}

.product-detail-image img {
    width: 100%;
    max-height: 600px;
    object-fit: cover;
    border-radius: 20px;
}

.product-detail-grid {
    display: grid;
    grid-template-columns: .7fr 1.3fr;
    gap: 90px;
}

.product-detail-grid h2 {
    margin: 12px 0 20px;
    font-size: 42px;
    line-height: 1.1;
}

.product-description {
    color: #475569;
    font-size: 18px;
    line-height: 1.9;
}

.detail-label {
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;
}

@media (max-width: 900px) {

    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .product-detail-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

}

@media (max-width: 600px) {

    .product-grid {
        grid-template-columns: 1fr;
    }

}
    </style>

    @stack('styles')
</head>

<body>

<nav class="navbar">
    <div class="container navbar-inner">

        <a href="{{ route('home') }}" class="logo">
            <img
                src="{{ asset('assets/img/soendev.png') }}"
                alt="SOENDEV"
            >
        </a>

        <ul class="nav-menu">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    Profile ▾
                </a>

                <div class="dropdown">

                    <a href="{{ route('about') }}">
                        About Us
                    </a>

                    <a href="{{ route('career') }}">
                        Career
                    </a>

                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('services') }}" class="nav-link">
                    Services ▾
                </a>

               <div class="dropdown">

                    <a href="{{ route('services.show', 'software-development') }}">
                        Software Development
                    </a>

                    <a href="{{ route('services.show', 'hardware-development') }}">
                        Hardware Development
                    </a>

                    <a href="{{ route('services.show', 'iot') }}">
                        IoT
                    </a>

                    <a href="{{ route('services.show', 'ai-development') }}">
                        AI Development
                    </a>

                </div>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    Insight ▾
                </a>

                <div class="dropdown">

                    <a href="{{ route('portfolio') }}">
                        Portfolio
                    </a>

                    <a href="{{ route('clients') }}">
                        Our Client
                    </a>

                    <a href="{{ route('products') }}">
                        Our Product
                    </a>

                    <a href="{{ route('blog.index') }}">
                        Blog
                    </a>

                    <a href="{{ route('demo') }}">
                        Demo
                    </a>

                </div>
            </li>

        </ul>

    </div>
</nav>

@yield('content')

<footer>
    <div class="container footer-inner">

        <div>
            <div class="footer-logo">
                {{-- LOGO --}}
                <a href="{{ route('home') }}" class="logo">
                    <img
                        src="{{ asset('assets/img/soendev.png') }}"
                        alt="SOENDEV"
                    >
                </a>
            </div>

            <div class="footer-text">
                Software • Hardware • IoT • AI
            </div>
        </div>

        <div class="footer-text">
            © {{ date('Y') }} SOENDEV. All rights reserved.
        </div>

    </div>
</footer>

@stack('scripts')

</body>
</html>