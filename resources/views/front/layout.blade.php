<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>

	<!--- basic page needs
	================================================== -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="UTF-8">
	<title>{{ isset($post) && $post->seo_title ? $post->seo_title :  __('Unión Cristiana') }}</title>
	<meta name="description" content="{{ isset($post) && $post->meta_description ? $post->meta_description : __('Iglesia Unión Cristiana') }}">
	<meta property="og:title" content="Iglesia Unión Cristiana" />
	<meta property="og:description" content="Etchevers 42, Viña Del Mar. Reuniones: Domingos 10:00hs, 11:30hs y 13:00hs " />
	<meta property="og:image" content="{{ asset('images/logos/og_image_logo.png') }}" />
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

	@php 
	$local_uuid = uniqid();
	@endphp

	<!-- favicon 
	================================================== -->
	<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type='image/x-icon' />

	<!-- CSS
	================================================== -->	
	<link rel="stylesheet" href="{{ asset('css/base.css') }}"><!-- ARCHIVO CSS CUSTOM PAGINA EJEMPLO -->
	<link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}"><!-- ARCHIVO PRINCIPAL PAGINA EJEMPLO -->
	<!--===============================================================================================-->
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	@foreach($include_css as $path)
	<link rel="stylesheet" href="{{ asset($base_css.$path).'?'.$local_uuid }}">
	@endforeach

	@foreach($include_css_full_path as $path)
	<link rel="stylesheet" href="{{ asset($path).'?'.$local_uuid }}">
	@endforeach

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

	<!-- INICIO CONTENT CSS-->
	@yield('css')
	<!-- FIN CONTENT CSS-->
	
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
		
	<script src="https://www.google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTCHA_KEY')}}"></script>
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
		@yield('main')
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

	<!-- INICIO CONTENT JAVASCRIPT-->
    @yield('scripts')
	<!-- FIN CONTENT JAVASCRIPT-->

   <!-- CUSTOM Java Script
   ================================================== -->
   <!-- Scripts -->
	<!-- Vakudadir -->
	<script src="{{ asset('js/views/back/validador.js').'?'.$local_uuid }}" type="text/javascript"></script>
	<!-- BASE -->
	<script src="{{ asset('js/views/back/base.js').'?'.$local_uuid }}" type="text/javascript"></script>

	<!--script src="{{ asset('js/app.js') }}"></script-->
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/otros/js/utils.js') }}"></script><!--  CARRUSEL Y MENU LATERAL -->
	<script type="text/javascript" src="{{ asset('plugins/otros/js/infinite_scroll.js') }}"></script><!--  INFINITE SCROLL -->
	<script type="text/javascript" src="{{ asset('plugins/otros/js/animated_head.js') }}"></script><!--  ANIMATED HEADER -->
	<script type="text/javascript" src="{{ asset('plugins/otros/js/galery.js') }}"></script><!--  galery -->
    <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- MomentJS -->
	<script src="{{ asset('adminlte/plugins/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
	<!-- Select2 4.0.6-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<!-- xModal -->
	<script src="{{ asset('js/plugins/xmodal.js') }}" type="text/javascript"></script>

	@foreach($include_javascript_full_path as $path)
		<script src="{{ asset($path).'?'.$local_uuid}}" type="text/javascript"></script>
	@endforeach

	@foreach($include_javascript as $path)
		<script src="{{ asset($base_javascript.$path).'?'.$local_uuid}}" type="text/javascript"></script>
	@endforeach


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
            var $lateralSocualMenuDiv = '<div class="youtube-theme alt-font xs-display-none"><a href="https://www.youtube.com/channel/UC-wwU93xQVE175shmbhU6Zg" target="_blank"><span>Nuestro Canal YouTube</span></a></div>';
            $lateralSocualMenuDiv += '<div class="facebook-theme alt-font xs-display-none"><a href="https://es-la.facebook.com/iglesiaunioncristiana" target="_blank"><span> Nuestro Facebook</span></a></div>';
            $lateralSocualMenuDiv += '<div class="instagram-theme alt-font xs-display-none"><a href="https://instagram.com/iglesia.unioncristiana" target="_blank"><span> Nuestro Instagram</span></a></div>';
            $lateralSocualMenuDiv += '<div class="twitter-theme alt-font xs-display-none"><a href="https://instagram.com/iglesia.unioncristiana" target="_blank"><span> Nuestro Twitter</span></a></div>';
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
                autoPlay: 5000,//3000,
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

</body>

</html>
