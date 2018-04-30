<!DOCTYPE html>
<html lang="es">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
	    <title>@yield('title', 'Home') | Comunion</title>
	    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" media="all" />
	</head>

	<head>
	    <link rel="stylesheet" type="text/css" href="{{asset('css/general.css')}}" media="all" /><!-- CSS GENERAL DE LA PAGINA -->
	    <!--link rel="profile" href="../../../gmpg.org/xfn/11.html"-->
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <script>
	        (function(html) {
	            html.className = html.className.replace(/\bno-js\b/, 'js')
	        })(document.documentElement);
	    </script>

	    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery-1.12.4.js') }}"></script>
		
	    <meta name="robots" content="index, follow">
	    <meta name="description" content="Comunion es una web que publica mensualmente boletines con informacion de interes respecto al trabajo interno que se realiza en la Iglesia Union Cristiana.">
	    <meta name="keywords" content="blog, news, boletines, misiones, iglesia, Union Cristiana, cristiano, social, instagram, audio, video, twitter, Viña del mar, chile, valparaiso">
	    
	    <!--rel='dns-prefetch' href='../../../fonts.googleapis.com/index.html' /-->
	    <!--link rel='dns-prefetch' href='../../../s.w.org/index.html' /-->
	    <!--link rel="alternate" type="application/rss+xml" title="Anchali &raquo; Feed" href="feed/index.html" /-->
	    <!--link rel="alternate" type="application/rss+xml" title="Anchali &raquo; Comments Feed" href="comments/feed/index.html" /-->
	    <!--link rel='stylesheet' id='paperio-google-font-css' href='../../../fonts.googleapis.com/css34e9.css?family=Open+Sans%3A100%2C300%2C400%2C500%2C600%2C700%2C900%7CMontserrat%3A100%2C300%2C400%2C500%2C600%2C700%2C900&amp;subset=latin%2Clatin-ext%2Ccyrillic%2Ccyrillic-ext%2Cgreek%2Cgreek-ext%2Cvietnamese&amp;ver=4.7.2' type='text/css' media='all' /-->
	    <!--link rel='https://api.w.org/' href='wp-json/index.html' /-->
	    <!--link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" /-->
	    <!--link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" /-->
	    <!--link rel="icon" href="wp-content/uploads/2016/04/favicon.png" sizes="32x32" /-->
	    <!--link rel="icon" href="wp-content/uploads/2016/04/favicon.png" sizes="192x192" /-->
	    <!--link rel="apple-touch-icon-precomposed" href="wp-content/uploads/2016/04/favicon.png" /-->
	    <!--meta name="msapplication-TileImage" content="http://wpdemos.themezaa.com/paperio/anchali/wp-content/uploads/2016/04/favicon.png" /-->
	    
	</head>


	<body>
		<header id="masthead" class="bg-white header-style-2 navbar-fixed-top header-img navbar-top shadow-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			@include('templates.partials.header')
			@include('templates.partials.nav')
		</header>
		<div class="below-navigation clear-both"></div>

		<!-- INICIO CONTENT -->
		@yield('content')
		<!-- FIN CONTENT -->

		<footer>
			@include('templates.partials.footer')
		</footer>
		


		<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
		<!-- Scripts -->
    	<script src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
		<script type="text/javascript" src="{{ asset('plugins/otros/js/utils.js') }}"></script><!--  CARRUSEL Y MENU LATERAL -->
		<script type="text/javascript" src="{{ asset('plugins/otros/js/infinite_scroll.js') }}"></script><!--  INFINITE SCROLL -->
		<script type="text/javascript" src="{{ asset('plugins/otros/js/animated_head.js') }}"></script><!--  ANIMATED HEADER -->
		<script type="text/javascript" src="{{ asset('plugins/otros/js/galery.js') }}"></script><!--  galery -->
	    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- -------------------------------------
	    <script type='text/javascript'>
	        var mc4wp_forms_config = [];
	    </script>
	    <script defer type="text/javascript" src="wp-content/cache/minify/6be6e.js"></script>
	    ------------------------------------------------ -->


	    <!--[if lte IE 9]>
			<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/placeholders/4.0.1/placeholders.min.js'></script>
		<![endif]-->

		<!-- ???????????????????????????????????????????????? -->
		<script type='text/javascript'>
	        var paperioajaxurl = {
	            "ajaxurl": "http:\/\/wpdemos.themezaa.com\/paperio\/anchali\/wp-admin\/admin-ajax.php",
	            "theme_url": "http:\/\/wpdemos.themezaa.com\/paperio\/anchali\/wp-content\/themes\/paperio",
	            "loading_image": "http:\/\/wpdemos.themezaa.com\/paperio\/anchali\/wp-content\/themes\/paperio\/assets\/images\/spin.gif"
	        };
	        var simpleLikes = {
	            "ajaxurl": "http:\/\/wpdemos.themezaa.com\/paperio\/anchali\/wp-admin\/admin-ajax.php",
	            "like": "Like",
	            "unlike": "Unlike"
	        };
	    </script>
		<!-- ???????????????????????????????????????????????? -->

		<!-- ------------- BOTONES LATERALES ----------- -->
	    <script type="text/javascript">
	        /*
			<![CDATA[*/
	        jQuery(document).ready(function($) {
	            var $lateralSocualMenuDiv = '<div class="web-theme alt-font xs-display-none"><a href="http://www.unioncristiana.cl" target="_blank"><span> Web Union Crisiana</span></a></div><div class="quick-question alt-font xs-display-none"><a href="https://www.youtube.com/channel/UC-wwU93xQVE175shmbhU6Zg" target="_blank"><span>Canal YouTube</span></a></div>';
	            $('body').append($lateralSocualMenuDiv);
	        }); /*]]>*/
	    </script>


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
        </script>

	</body>
</html>
