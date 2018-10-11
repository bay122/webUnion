<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>

	<!--- basic page needs
	================================================== -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="UTF-8">
	<title>{{ isset($post) && $post->seo_title ? $post->seo_title :  __(lcfirst('Title')) }}</title>
	<meta name="description" content="{{ isset($post) && $post->meta_description ? $post->meta_description : __('description') }}">
	<meta name="author" content="@lang(lcfirst ('Author'))">
	@if(isset($post) && $post->meta_keywords)
		<meta name="keywords" content="{{ $post->meta_keywords }}">
	@endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content="index, follow">
    <meta name="description" content="Comunion es una web que publica mensualmente boletines con informacion de interes respecto al trabajo interno que se realiza en la Iglesia Union Cristiana.">
    <meta name="keywords" content="blog, news, boletines, misiones, iglesia, Union Cristiana, cristiano, social, instagram, audio, video, twitter, Viña del mar, chile, valparaiso">

	<!-- mobile specific metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="{{ asset('css/base.css') }}"><!-- ARCHIVO CSS CUSTOM PAGINA EJEMPLO -->
	<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}"><!-- ARCHIVO PRINCIPAL PAGINA EJEMPLO -->
	<!--===============================================================================================-->
		
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/animate/animate.css') }}">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/vendor/select2/select2.min.css') }}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/css/util.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_style/css/main.css') }}">
	<!--===============================================================================================-->
	<!-- ================================================== -->
	<!-- CUSTOMS UC CSS -->
	<!-- Font Awesome -->
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"->
	<!-- Bootstrap -->
    <!--link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}"-->
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/uc.css')}}" media="all" /><!-- ARCHIVO CSS CUSTOM PAGINA COMUNION -->
    <!-- Base CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/general.css').'?'.rand()}}" media="all" /><!-- ARCHIVO PRINCIPAL PAGINA COMUNION -->
    <!-- ================================================== -->

	@yield('css')

	<style>
		.search-wrap .search-form::after {
			content: "@lang('Press Enter to begin your search.')";
		}
	</style>


	<!-- script
	================================================== -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

	<script>
        (function(html) {
            html.className = html.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement);
    </script>

    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery-1.12.4.js') }}"></script>
		

	<!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<!-- header
   ================================================== - ->
   <header class="short-header">
		@ include('partials.header')
   </header> <!-- end header -->

    <header id="masthead" class="bg-white header-style-2 navbar-fixed-top header-img navbar-top shadow-header" 
    		itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			@include('front.partials.header')
			@include('front.partials.nav')
	</header><!-- end header -->
	<div class="below-navigation clear-both"></div>

    <!-- INICIO CONTENT -->
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/FB_IMG_1535034758934.jpg');">
			<div class="wrap-login100 p-b-30">
						@if (session('confirmation-success'))
                        @component('front.components.alert')
                            @slot('type')
                                success
                            @endslot
                            {!! session('confirmation-success') !!}
                        @endcomponent
                        @endif
                        @if (session('confirmation-danger'))
                            @component('front.components.alert')
                                @slot('type')
                                    error
                                @endslot
                                {!! session('confirmation-danger') !!}
                            @endcomponent
                        @endif
				<form class="login100-form validate-form" role="form" method="POST" action="{{ route('login') }}">
                    <div class="login100-form-avatar">
						<img src="images/logos/unionCristiana@2x-1.jpg" alt="AVATAR">
                    </div>
                    </br>
                    {{ csrf_field() }}
                        @if ($errors->has('log'))
                            @component('front.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif   
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                        <input id="log" type="text" placeholder="@lang('Login')" class="input100" name="log" value="{{ old('log') }}" required autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100" >
							<i class="fa fa-user" style="margin-bottom: 5%;" ></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                        <input id="password" type="password" placeholder="@lang('Password')" class="input100"  name="password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100" >
							<i class="fa fa-lock" style="margin-bottom: 5%;"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" value="@lang('Login')">
							Login
						</button>
					</div>

					@if(false)
					<div class="text-center w-full p-t-25">
                         <a href="{{ route('password.request') }}" class="txt1">
                                @lang('Forgot Your Password?')
                        </a>
					</div>

					<div class="text-center w-full">
                        <a href="{{ route('register') }}" class="txt1">
                                @lang('Not registered?')
                                <i class="fa fa-long-arrow-right"></i>
                        </a>
					</div>
					@endif
				</form>
			</div>
		</div>
	</div>
	<!-- FIN CONTENT -->

   <!-- footer
   ================================================== -->
   <footer>
   		<!-- @ include('partials.footer') -->
		@include('front.partials.footer')
	</footer><!-- end footer -->

   <div id="preloader">
    	<div id="loader"></div>
   </div>

   <!-- Java Script
   ================================================== -->
   <!--script src="https://code.jquery.com/jquery-3.2.0.min.js"></script-->
   <script src="{{ asset('js/plugins.js') }}"></script>
   <script src="{{ asset('js/main.js') }}"></script>
   <script>
	   $(function() {
		   $('#logout').click(function(e) {
			   e.preventDefault();
			   $('#logout-form').submit()
		   })
	   })
   </script>
	
   @yield('scripts')

   <!-- CUSTOM Java Script
   ================================================== -->
   <!-- Scripts -->
	<!--script src="{{ asset('js/app.js') }}"></script-->
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/otros/js/utils.js') }}"></script><!--  CARRUSEL Y MENU LATERAL -->
	<script type="text/javascript" src="{{ asset('plugins/otros/js/infinite_scroll.js') }}"></script><!--  INFINITE SCROLL -->
	<script type="text/javascript" src="{{ asset('plugins/otros/js/animated_head.js') }}"></script><!--  ANIMATED HEADER -->
	<script type="text/javascript" src="{{ asset('plugins/otros/js/galery.js') }}"></script><!--  galery -->
    <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- ===========================
    <script type='text/javascript'>
        var mc4wp_forms_config = [];
    </script>
    =========================== -->
    <!--script defer type="text/javascript" src="{{ asset('plugins/otros/js/sourceMappingURL.js') }}"></script-->


    <!--[if lte IE 9]>
		<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/placeholders/4.0.1/placeholders.min.js'></script>
	<![endif]-->

	<!-- BOTONES LATERALES
   ================================================== -->
    <script type="text/javascript">
        /*
		<![CDATA[*/
        jQuery(document).ready(function($) {
            var $lateralSocualMenuDiv = '<div class="web-theme alt-font xs-display-none"><a href="http://www.unioncristiana.cl" target="_blank"><span> Web Union Crisiana</span></a></div><div class="quick-question alt-font xs-display-none"><a href="https://www.youtube.com/channel/UC-wwU93xQVE175shmbhU6Zg" target="_blank"><span>Canal YouTube</span></a></div>';
            $('body').append($lateralSocualMenuDiv);
        }); /*]]>*/
    </script><!-- end botones laterales -->

	<!-- CARRUSEL
   ================================================== -->
    <script type="text/javascript">
        /*
        <![CDATA[*/
        jQuery(document).ready(function() {
            jQuery(".paperio-feature-style2").owlCarousel({
                navigation: true,
                navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                pagination: true,
                autoPlay: 3000,
                stopOnHover: true,
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                itemsMobile: [767, 1]
            });
        }); /*]]>*/
	</script><!-- end carrusel -->
	<!--===============================================================================================-->	
	<script src="{{ asset('login_style/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('login_style/vendor/bootstrap/js/popper.js') }}"></script>
		<script src="{{ asset('login_style/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('login_style/vendor/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('login_style/js/main.js') }}"></script> 

</body>

</html>
