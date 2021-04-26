<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#061948">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#061948">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
		<title>Charles-Business-Consulting HTML Template</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('depan/images/fav-icon/icon.png')}}">
		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('depan/css/style.css')}}">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="{{ asset('depan/css/responsive.css')}}">

		<!-- Fix Internet Explorer ______________________________________-->
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->	
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>

			

			<!-- 
			=============================================
				Theme Header One
			============================================== 
			-->
			@include('component.shared.header')
			<!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			
			@yield('content')
			<!-- 
			=============================================
				Top Feature
			============================================== 
			-->
		
			<!-- 
			=============================================
				About Company
			============================================== 
			-->
		

			<!-- 
			=============================================
				Feature Banner
			============================================== 
			-->
		

			<!-- aboout
        service
			=============================================
				Service Style One
			============================================== 
			-->

			<!--
        
			=====================================================
				Testimonial Slider
			=====================================================
			-->
			 <!-- /.testimonial-section -->


			<!--
			=====================================================
				Our Team
			=====================================================
			-->
		<!-- /.our-team -->


			<!--
			=====================================================
				Theme Counter
			=====================================================
			-->
			 <!-- /.theme-counter -->


			<!--
			=====================================================
				Free Consultation
			=====================================================
			-->
		 <!-- /.consultation-form -->



			<!--
			=====================================================
				Partner Slider
			=====================================================
			-->
			 <!-- /.partner-section -->


			<!--
			=====================================================
				Footer
			=====================================================
			-->
			@include('component.shared.footer')

			 <!-- /.theme-footer -->
			

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="{{ asset('depan/vendor/jquery.2.2.3.min.js') }}"></script>
		<!-- Popper js -->
		<script src="{{ asset('depan/vendor/popper.js/popper.min.js') }}"></script>
		<!-- Bootstrap JS -->
		<script src="{{ asset('depan/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- Camera Slider -->
		<script src='{{ asset('depan/vendor/Camera-master/scripts/jquery.mobile.customized.min.js') }}'></script>
	    <script src='{{ asset('depan/vendor/Camera-master/scripts/jquery.easing.1.3.js') }}'></script> 
	    <script src='{{ asset('depan/vendor/Camera-master/scripts/camera.min.js') }}'></script>
	    <!-- menu  -->
		<script src="{{ asset('depan/vendor/menu/src/js/jquery.slimmenu.js') }}"></script>
		<!-- WOW js -->
		<script src="{{ asset('depan/vendor/WOW-master/dist/wow.min.js') }}"></script>
		<!-- owl.carousel -->
		<script src="{{ asset('depan/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
		<!-- js count to -->
		<script src="{{ asset('depan/vendor/jquery.appear.js') }}"></script>
		<script src="{{ asset('depan/vendor/jquery.countTo.js') }}"></script>
		<!-- Fancybox -->
		<script src="{{ asset('depan/vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>

		<!-- Theme js -->
		<script src="{{ asset('depan/js/theme.js') }}"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>