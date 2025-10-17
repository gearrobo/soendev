@extends('template.home')

@section('content')
<div id="home" class="slider-area">
  <div class="bend niceties preview-2">
    <div id="ensign-nivoslider" class="slides">
      <img src="{{ asset('assets/img/slider/slider1.jpg') }}" alt="" title="#slider-direction-1" />
      <img src="{{ asset('assets/img/slider/slider2.jpg') }}" alt="" title="#slider-direction-2" />
      <img src="{{ asset('assets/img/slider/slider3.jpg') }}" alt="" title="#slider-direction-3" />
    </div>

    <!-- direction 1 -->
    <div id="slider-direction-1" class="slider-direction slider-one">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="title1">Software Development</h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Dashboard Monitoring Core System</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="#ourservices">Our Services</a>
                <a class="ready-btn page-scroll" href="#contact">Contact US</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- direction 2 -->
    <div id="slider-direction-2" class="slider-direction slider-two">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="title1">Internet of Things</h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Design and Development of a Remote Sensor-Based Monitoring System</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="#ourservices">Our Services</a>
                <a class="ready-btn page-scroll" href="#contact">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- direction 3 -->
    <div id="slider-direction-3" class="slider-direction slider-two">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="title1">Education Program</h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Project-Based STEM Learning through Fun Robotics Activities</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="#ourservices">Our Services</a>
                <a class="ready-btn page-scroll" href="#contact">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Start About area -->
  <div id="about" class="about-area area-padding" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Soendev</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Kolom Gambar -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <img src="{{ asset('assets/img/portfolio/project1.jpeg') }}" alt="Project Soendev" class="img-responsive" style="border-radius: 10px;">
            </div>
          </div>
        </div>

        <!-- Kolom Teks -->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <p style="text-align: justify;">
                PT Software Engineering Development (Soendev) is a private company engaged in the fields of robotics and automation systems. Starting from assembling robots, Soendev now provides a wide range of integrated automation solutions.
              </p>
              <p style="text-align: justify;">
                With a mission to simplify the way users monitor and control objects such as homes, buildings, and public facilities remotely via smartphones, Soendev delivers fast, efficient, and user-friendly solutions.
              </p>

              <p><strong>Vision</strong></p>
              <p style="text-align: justify;">
                Our vision is to implement automation systems in every building and city facility, as well as to advance robotics knowledge in both education and industry.
              </p>

              <p><strong>Mission</strong></p>
              <p style="text-align: justify;">
                Our mission is to develop ready-to-use and high-quality controller modules, build user-friendly and secure application systems, and provide the best experience in using automation systems optimally.
              </p>
            </div>
          </div>
        </div>
        <!-- End col -->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- our-skill-area start -->
  <div class="our-skill-area fix" id="ourservices" style="min-height: 100vh; display: flex; align-items: center;">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2" style="padding-top: 20px; padding-bottom: 20px; width: 100%;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p style="color: #5fbff7; font-weight: 600;">#Smart Solutions for a Smarter Future</p>
            <h2 style="color: white; font-size: 42px; font-weight: bold;">Our Services</h2>
            <p style="color: white; max-width: 900px; margin: 0 auto 40px;">
              We have developed intelligent, technology-based solutions to address our clients’ most critical challenges. Our clients come from a wide range of organizations, including government agencies, private sector companies, banking and insurance institutions, as well as the telecommunications industry.
            </p>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-6 col-sm-4 col-md-4">
            <p style="color: white;"><i class="fa fa-check-circle" style="color:#00cdf7;"></i> Building Management System</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-4">
            <p style="color: white;"><i class="fa fa-check-circle" style="color:#00cdf7;"></i> Telemetry, IoT & Robotic Industry Solution</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-4">
            <p style="color: white;"><i class="fa fa-check-circle" style="color:#00cdf7;"></i> Smart Home System</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-4">
            <p style="color: white;"><i class="fa fa-check-circle" style="color:#00cdf7;"></i> Software Development (Apps, Website, and others)</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-4">
            <p style="color: white;"><i class="fa fa-check-circle" style="color:#00cdf7;"></i> Datawarehouse & Dashboard</p>
          </div>
          <div class="col-xs-6 col-sm-4 col-md-4">
            <p style="color: white;"><i class="fa fa-check-circle" style="color:#00cdf7;"></i> Education Program</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-skill-area end -->

  <!-- Start Clients Section -->
  <div id="clients" class="about-area" style="min-height: 100vh; display: flex; align-items: center; padding-top: 100px; padding-bottom: 40px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Our Clients</h2>
          </div>
        </div>
      </div>

      <div class="row text-center">
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/tetamba.png') }}" alt="Tetamba Studio Kreasi">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/bri.png') }}" alt="Bank BRI">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/wwf.png') }}" alt="WWF Indonesia">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/Kabupaten_Bogor.png') }}" alt="Kabupaten Bogor">
          </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/dmt.png') }}" alt="DMT">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/wiennexindo.png') }}" alt="Wiennexindo Solution">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/dprd_depok.png') }}" alt="DPRD Depok">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/askrindo.png') }}" alt="Askrindo Insurance">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/satkom.png') }}" alt="Satkomindo Mediyasa">
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/moratelindo.png') }}" alt="Mora Telematika Indonesia">
          </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="client-wrapper">
            <img src="{{ asset('assets/img/clients/hm.png') }}" alt="HM Media">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Clients Section -->
@endsection