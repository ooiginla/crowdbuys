<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }} - {{ $pagetitle }}</title>

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
	<link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon"/>
	
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	@stack('styles')
	
</head>

<body class="campaign-detail" >
	<div class="preloading">
		<div class="preloader loading">
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		</div>
	</div>
	<div id="wrapper">
		
		@include('pages.header')

		<main id="main" class="site-main">

			@yield('content')

			{{ $slot }}
		</main><!-- .site-main -->

		@include('pages.footer')
		
	</div><!-- #wrapper -->
	<!-- jQuery -->    
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('libs/popper/popper.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('libs/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('libs/owl-carousel/carousel.min.js') }}"></script>
    <script src="{{ asset('libs/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('libs/wow/wow.min.js') }}"></script>
    <script src="{{ asset('libs/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('libs/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('libs/magicsuggest/magicsuggest-min.js') }}"></script>
    <script src="{{ asset('libs/quilljs/js/quill.core.js') }}"></script>
    <script src="{{ asset('libs/quilljs/js/quill.js') }}"></script>
    <!-- orther script -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
    	function validate(evt) {
		  var theEvent = evt || window.event;
		  var key = theEvent.keyCode || theEvent.which;
		  key = String.fromCharCode( key );
		  var regex = /[0-9]|\./;
		  if( !regex.test(key) ) {
		    theEvent.returnValue = false;
		    if(theEvent.preventDefault) theEvent.preventDefault();
		  }
		}
	</script>

	@stack('scripts')
</body>
</html>