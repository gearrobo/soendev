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
                <h2 class="title1">The Best Business Information </h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">We're In The Business Of Helping You Start Your Business</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                <a class="ready-btn page-scroll" href="#about">Learn More</a>
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
                <h2 class="title1">The Best Business Information </h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">We're In The Business Of Get Quality Business Service</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                <a class="ready-btn page-scroll" href="#about">Learn More</a>
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
                <h2 class="title1">The Best business Information </h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Helping Business Security  & Peace of Mind for Your Family</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                <a class="ready-btn page-scroll" href="#about">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Sondev</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="assets/img/about/1.jpg" alt="">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head"></h4>
              </a>
              <p>
              An IT Software Engineering Development company is a modern organization focused on developing innovative software solutions. With a team of professionals, a futuristic work environment, and advanced technology, the company delivers high-quality digital solutions through collaboration and creativity.
              </p>
              <ul>
                <li>
                  <i class="fa fa-check"></i> Building Management System
                </li>
                <li>
                  <i class="fa fa-check"></i> Smart Home System
                </li>
                <li>
                  <i class="fa fa-check"></i> Software Development Apps, Website others
                </li>
                <li>
                  <i class="fa fa-check"></i> Telemetry IoT Robotic Industry Solution
                </li>
                <li>
                  <i class="fa fa-check"></i> Education Program
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Our Services</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-code"></i>
										</a>
                  <h4>Mobile App Development</h4>
                  <p>
                  From concept to deployment, we create user-friendly mobile applications for iOS and Android platforms.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-bolt"></i>
										</a>
                  <h4>PLC and Electric Developer</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-wordpress"></i>
										</a>
                  <h4>Wordpress Developer</h4>
                  <p>
                    will have to make sure the prototype looks finished by inserting text or photo.make sure the prototype looks finished by.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-industry"></i>
										</a>
                  <h4>IoT Solutions Development</h4>
                  <p>
                  We build smart IoT systems that connect devices, sensors, and data to enable real-time monitoring, automation, and analytics.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-bar-chart"></i>
										</a>
                  <h4>Web Application Development</h4>
                  <p>
                  We deliver responsive, secure, and high-performing web applications that support your business growth.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
											<i class="fa fa-ticket"></i>
										</a>
                  <h4>Maintenance & Support</h4>
                  <p>
                  We provide continuous support and maintenance services to keep your systems running smoothly and up to date.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

   <!-- our-skill-area start -->
   <div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <!-- section-heading end -->
        <div class="row">
          <div class="skill-text">
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="95" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Web Design</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="85" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Graphics Design</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Php Developer</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="65" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Java Script</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-skill-area end -->
@endsection