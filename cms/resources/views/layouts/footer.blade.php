@section('footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- Global Vendor -->
<script src="{{asset('assets/vendors/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.migrate.min.js')}}"></script>
<script src="{{asset('assets/vendors/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Components Vendor  -->
<script src="{{asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.parallax.js')}}"></script>

<!-- Theme Settings and Calls -->
<script src="{{asset('assets/js/global.js')}}"></script>

<!-- Theme Components and Settings -->
<script src="{{asset('assets/js/vendors/parallax.js')}}"></script>
<!-- END JAVASCRIPTS -->
      <script src="{{ secure_asset('js/function.js') }}"></script>


<!-- Github and Google Plus Buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<!-- End Github and Google Plus Buttons -->
@endsection