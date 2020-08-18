<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->

<head>

    <!--- basic page needs  -->
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
    <meta name="description" content="Iglesia Unión Cristiana: Somos una iglesia que busca glorificar y amar a dios por sobre todo, y que enseña el evangelio de cristo tanto local como globalmente con palabras y obras.">
    <meta name="keywords" content="blog, news, boletines, misiones, iglesia, Union Cristiana, cristiano, cristianismo, sana doctrina, social, instagram, audio, video, twitter, Viña del mar, chile, valparaiso">

    <!-- mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    @php 
        $local_uuid = uniqid();
    @endphp


    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type='image/x-icon' />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ asset('uc2/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/bootstrap/offcanvas.css') }}">
    <!-- CSS Global Icons -->
    {{--<link rel="stylesheet" href="{{ asset('uc2/vendor/icon-awesome/css/font-awesome.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('uc2/vendor/fontawesome-5.14/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/icon-line/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/icon-etlinefont/style.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/icon-line-pro/style.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/icon-hs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/dzsparallaxer/dzsparallaxer.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/dzsparallaxer/dzsscroller/scroller.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/dzsparallaxer/advancedscroller/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/custombox/custombox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/vendor/fancybox/jquery.fancybox.css') }}">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="{{ asset('uc2/css/unify-core.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/css/unify-components.css') }}">
    <link rel="stylesheet" href="{{ asset('uc2/css/unify-globals.css') }}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ asset('uc2/css//custom.css') }}">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0"></script>

    @foreach($include_css as $path)
        <link rel="stylesheet" href="{{ asset($base_css.$path).'?'.$local_uuid }}">
    @endforeach

    @foreach($include_css_full_path as $path)
        <link rel="stylesheet" href="{{ asset($path).'?'.$local_uuid }}">
    @endforeach



    <!-- INICIO CONTENT CSS-->
    @yield('css')
    <!-- FIN CONTENT CSS-->

    <style>
        .search-wrap .search-form::after {
            content: "@lang('Press Enter to begin your search.')";
        }       

    </style>


    <!-- script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

    <script>
        (function(html) {
            html.className = html.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement);
    </script>

    <!--script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.12.4.js') }}"></script-->

    <script src="https://www.google.com/recaptcha/api.js?render={{env('GOOGLE_RECAPTCHA_KEY')}}"></script>
    <!-- favicons  -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <main>
        <!-- Header -->
        @include('front.uc2.partials.header')
        <!-- End Header -->

        <!-- INICIO CONTENT -->
        @yield('main')
        <!-- FIN CONTENT -->


        <!-- Footer -->
        @include('front.uc2.partials.footer')
        <!-- End Footer -->

        <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
                "bottom": 15,
                "right": 15
            }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">

            <i class="hs-icon hs-icon-arrow-top"></i>

        </a>
        <div class="social">
          <ul class="cm">
            <li>
              <a class="u-shadow-v1-1 g-bg-youtube" href="https://www.youtube.com/user/IgUnionCristiana" target="_blank">
                <i class="fab fa-youtube icon"></i>
              </a>
            </li>
            <li>
              <a class="u-shadow-v1-1" href="https://es-la.facebook.com/iglesiaunioncristiana" target="_blank">
                <i class="fab fa-facebook-f icon"></i>
              </a>
            </li>
            <li>
              <a class="u-shadow-v1-1 g-bg-instagram" href="https://instagram.com/iglesia.unioncristiana" target="_blank">
                <i class="fab fa-instagram icon"></i>
              </a></li>
            <li>
              <a class="u-shadow-v1-1  g-bg-vine" href="https://open.spotify.com/show/4BDQCBhLvjFstFxJpbv5BS?si=M5LtVHNASO-8ev-WLrrPmQ" target="_blank">
                <i class="icon-social-spotify icon"></i>
              </a>
            </li>
          </ul>
        </div>
    </main>

    <!-- JS Global Compulsory -->
    <script src="{{ asset('uc2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('uc2/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
    <script src="{{ asset('uc2/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('uc2/vendor/bootstrap/bootstrap.min.js')}}"></script>

    <script src="{{ asset('uc2/vendor/bootstrap/offcanvas.js')}}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('uc2/vendor/dzsparallaxer/dzsparallaxer.js')}}"></script>
    <script src="{{ asset('uc2/vendor/dzsparallaxer/dzsscroller/scroller.js')}}"></script>
    <script src="{{ asset('uc2/vendor/dzsparallaxer/advancedscroller/plugin.js')}}"></script>
    <script src="{{ asset('uc2/vendor/masonry/dist/masonry.pkgd.min.js')}}"></script>
    <script src="{{ asset('uc2/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('uc2/vendor/slick-carousel/slick/slick.js')}}"></script>
    <script src="{{ asset('uc2/vendor/fancybox/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('uc2/vendor/appear.js')}}"></script>
    <script src="{{ asset('uc2/vendor/custombox/custombox.min.js')}}"></script>

    <!-- JS Unify -->
    <script src="{{ asset('uc2/js/hs.core.js')}}"></script>

    <script src="{{ asset('uc2/js/components/hs.header.js')}}"></script>
    <script src="{{ asset('uc2/js/helpers/hs.hamburgers.js')}}"></script>

    <script src="{{ asset('uc2/js/components/hs.popup.js')}}"></script>
    <script src="{{ asset('uc2/js/components/hs.carousel.js')}}"></script>
    <script src="{{ asset('uc2/js/components/hs.modal-window.js')}}"></script>

    <script src="{{ asset('uc2/js/components/hs.go-to.js')}}"></script>

    <!-- JS Custom -->
    <script src="{{ asset('uc2/js/custom.js').'?'.$local_uuid }}"></script>
<!-- JS Logout -->
    <script>
     $(function() {
         $('#logout').click(function(e) {
             e.preventDefault();
             $('#logout-form').submit()
         })
     })
    </script>

    <!-- JS Plugins Init. -->
    <script>
      $(document).ready(function() {
          $.HSCore.components.HSCarousel.init('.js-carousel');
           // initialization of autonomous popups
                        $.HSCore.components.HSModalWindow.init('.js-autonomous-popup', {
                          autonomous: true
                        });


          $('#carousel1').slick('setOption', 'customPaging', function(slider, i) {
              var title = $(slider.$slides[i]).data('title');

              return '<i class="u-dot-line-v1 g-brd-gray-light-v2--before g-brd-gray-light-v2--after g-mb-15--sm"><span class="u-dot-line-v1__inner g-bg-white g-bg-primary--before g-brd-gray-light-v2 g-brd-primary--active g-transition--ease-in g-transition-0_2"></span></i><span class="g-hidden-sm-down g-color-black g-font-size-15">' + title + '</span>';
          }, true);

          @if ( !isCurrentRoute('login') )
            @if ( false )
            let  redesSociales=`<div id="rrss-icons">
            <a class="js-go-to  u-icon-v1 g-bg-youtube g-color-white g-color-white--hover  g-rounded-50x g-mr-20 g-mb-10" href="#!" data-type="fixed" data-position='{
                "bottom": 500,
                "right": -10
            }'>
            <i class="fab fa-youtube"></i>
            </a>

            <a class="js-go-to  u-icon-v1 g-bg-facebook g-color-white g-color-white--hover  g-rounded-50x g-mr-20 g-mb-10" href="#!" data-type="fixed" data-position='{
                "bottom": 444,
                "right": -10
            }'>
            <i class="fab fa-facebook-f"></i>
            </a>

            <a class="js-go-to  u-icon-v1 g-bg-instagram g-color-white g-color-white--hover  g-rounded-50x g-mr-20 g-mb-10" href="#!" data-type="fixed" data-position='{
                "bottom": 388,
                "right": -10
            }'>
            <i class="fab fa-instagram"></i>
            </a>

            <a class="js-go-to  u-icon-v1 g-bg-vine g-color-white g-color-white--hover  g-rounded-50x g-mr-20 g-mb-10" href="#!" data-type="fixed" data-position='{
                "bottom": 332,
                "right": -10
            }'>
            <i class="fab icon-social-spotify"></i>
            </a>
            </div> `;
            @endif
            let  redesSociales=''
            $('.social').append(redesSociales);
            setTimeout(()=>{
              //$('.social').show('slow');
              $( "ul.cm li" ).first().show( "fast", function showNext() {
                  $( this ).next( "ul.cm li" ).show( "fast", showNext );
                });
              },1000);
          @endif

      });
      $(window).on('load', function() {
          // initialization of header
          $.HSCore.components.HSHeader.init($('#js-header'));
          $.HSCore.helpers.HSHamburgers.init('.hamburger');
          //$.HSCore.components.HSGoTo.init('.js-go-to');
      });
    </script>

     <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- MomentJS -->
    <script src="{{ asset('adminlte/plugins/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <!-- Select2 4.0.6-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- xModal -->
    <script src="{{ asset('js/plugins/xmodal.js') }}" type="text/javascript"></script>

    <!--script type="text/javascript" src="{{ asset('plugins/otros/js/fireworks.js?1') }}"></script--><!--  fuegos artificiales diciembre -->
    <!--<script type="text/javascript" src="{{ asset('plugins/otros/js/confetti.js') }}">--></script><!--  confetti (colores configurables en js)-->
    <!--<script type="text/javascript" src="{{ asset('plugins/otros/js/nieve.js') }}"></script>--><!--  confetti (colores configurables en js)-->
    <!--<script type="text/javascript" src="{{ asset('plugins/otros/js/fireworks2.js') }}"></script>--><!--  confetti (colores configurables en js)-->

    <!-- validador -->
    <script src="{{ asset('js/views/back/validador.js').'?'.$local_uuid }}" type="text/javascript"></script>

    <!-- INICIO CONTENT JAVASCRIPT-->
    @yield('scripts')
    <!-- FIN CONTENT JAVASCRIPT-->

    @foreach($include_javascript_full_path as $path)
        <script src="{{ asset($path).'?'.$local_uuid}}" type="text/javascript"></script>
    @endforeach

    @foreach($include_javascript as $path)
        <script src="{{ asset($base_javascript.$path).'?'.$local_uuid}}" type="text/javascript"></script>
    @endforeach

    <!--script defer type="text/javascript" src="{{ asset('plugins/otros/js/sourceMappingURL.js') }}"></script-->


    <!--[if lte IE 9]>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/placeholders/4.0.1/placeholders.min.js'></script>
    <![endif]-->


</body>

</html>
