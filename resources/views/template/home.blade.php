@include('template.header')

<header>
    <!-- header-area start -->
    @include('template.navbar')
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  @yield('content')
  <!-- End Slider Area -->


  <!-- Start Footer bottom Area -->
 @include('template.footer')

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/lib/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/lib/knob/jquery.knob.js') }}"></script>
  <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('assets/lib/parallax/parallax.js') }}"></script>
  <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('assets/lib/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/lib/appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('assets/contactform/contactform.js') }}"></script>

  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async></script>

  @yield('scripts')
</body>

</html>
