@extends('front.uc2.layout')

@section('title', 'Home')

@section('main')

<!-- Promo Block -->
<section id="welcome-container" style="font-family: 'Montserrat';" class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
    <div class="divimage dzsparallaxer--target w-100 g-bg-pos-bottom-center" style="height: 100%; background-image: url({{ asset('uc2/img/bg/banner.png') }});"></div>

    <div class="container g-py-200 g-pb-100">
        <div class="row">
            <div class="col-md-12">

                <div class="g-mb-50 fadeInUp u-in-viewport" data-animation="fadeInUp" data-animation-delay="200" data-animation-duration="1500" style="animation-duration: 1500ms;">
                    <h3 class="g-color-black g-font-weight-300 g-font-size-40 g-line-height-1_2 mb-4"> Bienvenidos </h3>
                </div>

                <div class="g-mb-25 fadeInUp u-in-viewport" data-animation="fadeInUp" data-animation-delay="500" data-animation-duration="1500" style="animation-duration: 1500ms;">
                    <div class="u-shadow-v1-5 alert fade show g-brd-around g-brd-red rounded-0" 
                            style="background-color: rgba(255, 255, 255, 0.7);" role="alert" >
                        <div class="media">
                            <div class="d-flex g-mr-10">
                                <span class="u-icon-v3 u-icon-size--sm g-bg-lightred g-color-white g-rounded-50x">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <div class="d-flex justify-content-between g-mb-10">
                                    <p class="m-0 g-color-black g-font-size-20">
                                    Debido a la contigencia sanitaria actual, las actividades presenciales están suspendidas hasta nuevo aviso. 
                                    Por lo que todas nuestras reuniones Dominicales serán por nuestro canal de Youtube a las <i class="icon-hotel-restaurant-003 u-line-icon-pro"></i>  11:30 hrs.
                                    ¡No te lo pierdas! 
                                    </p>
                                </div>
                                <p class="m-0 g-font-size-14 g-color-black"> 
                                <a href="https://www.youtube.com/user/IgUnionCristiana/" target="_blank" class="btn btn-md u-btn-outline-black g-mr-10 g-mb-15">Visita Nuestro Canal </a>                            
                               </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-mb-25 fadeInUp u-in-viewport" data-animation="fadeInUp" data-animation-delay="500" data-animation-duration="1500" style="animation-duration: 1500ms;">
                    <!--
                    <span class="d-block g-color-black g-font-size-25 mb-3"> Horarios de reuniones Domingos</span>
                    <button class="btn btn-md u-btn-black g-mr-10 g-mb-15"><i class="icon-hotel-restaurant-003 u-line-icon-pro"> 10:00 hrs.</i> </button>
                    <button class="btn btn-md u-btn-black g-mr-10 g-mb-15"><i class="icon-hotel-restaurant-003 u-line-icon-pro"> 11:30 hrs.</i> </button>
                    <button class="btn btn-md u-btn-black g-mr-10 g-mb-15"><i class="icon-hotel-restaurant-003 u-line-icon-pro"> 13:00 hrs.</i> </button>
                    -->
                    <br><br>
                    <a class="u-icon-v2 g-brd-facebook g-color-facebook g-color-facebook--hover u-btn-outline-black g-rounded-50x g-mr-10 g-mb-10" href="https://www.facebook.com/iglesiaunioncristiana/" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="u-icon-v2 g-brd-instagram g-color-instagram g-color-instagram--hover u-btn-outline-black g-rounded-50x g-mr-10 g-mb-10" href="https://www.instagram.com/iglesia.unioncristiana/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="u-icon-v2 g-brd-youtube g-color-youtube g-color-youtube--hover u-btn-outline-black g-rounded-50x g-mr-10 g-mb-10" href="https://www.youtube.com/user/IgUnionCristiana" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a class="u-icon-v2 g-brd-vine g-color-vine g-color-vine--hover u-btn-outline-black g-rounded-50x g-mr-10 g-mb-10" href="https://open.spotify.com/show/4BDQCBhLvjFstFxJpbv5BS?si=M5LtVHNASO-8ev-WLrrPmQ" target="_blank">
                    <i class="icon-social-spotify"></i>
                    </a>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Promo Block -->

<!-- Testimonials -->
<section class="container g-py-100 g-pb-70">
    <div class="row justify-content-between">
        <div class="col-sm-5">
            <h2 class="g-color-black g-font-weight-600 g-mb-35">
                <span class="g-color-primary">Mira</span> nuesto<br>último <span class="g-color-primary">Video:</span></h2>
        </div>

        <div class="col-sm-7" id="flecha-home" style="position: absolute;">
            <style>
                /* Pretty Stuff? */
                .arrcontent {
                    transform: rotate(115deg) scaleY(-1);
                }

                .arrthings>.arrcontent {
                    float: left;
                    /*width: 0px;*/
                    height: 10px;
                    left: 146px;
                    top: -12px;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    position: relative;
                }

                /* Arrow */

                .arrarrow {
                    position: relative;
                    margin: 0 auto;
                    width: 50px;
                }

                .arrarrow .arrcurve {
                    border: 2px solid #000;
                    border-color: transparent transparent transparent #000;
                    height: 260px;
                    width: 160px;
                    border-radius: 230px 0 0 150px;
                }

                .arrarrow .arrpoint {
                    position: absolute;
                    left: 40px;
                    top: 315px;
                }

                .arrarrow .arrpoint:before,
                .arrarrow .arrpoint:after {
                    border: 1px solid #000;
                    height: 25px;
                    content: "";
                    position: absolute;
                }

                .arrarrow .arrpoint:before {
                    top: -102px;
                    left: -23px;
                    transform: rotate(-74deg);
                    -webkit-transform: rotate(-74deg);
                    -moz-transform: rotate(-74deg);
                    -ms-transform: rotate(-74deg);
                }

                .arrarrow .arrpoint:after {
                    top: -111px;
                    left: -9px;
                    transform: rotate(12deg);
                    -webkit-transform: rotate(12deg);
                    -moz-transform: rotate(12deg);
                    -ms-transform: rotate(12deg);
                }
            </style>
            <div class="arrthings">
                <div class="arrcontent">
                    <div class="arrarrow">
                        <div class="arrcurve"></div>
                        <div class="arrpoint"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-between">
        @if ($configuracion->estado =='1')
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 g-mb-30">
            <div class="g-font-size-17">
                {!! $configuracion->html !!}
            </div>
        </div>
        @endif

        <style type="text/css" media="screen">
            .video-home {
                position: relative;
                display: block;
            }
        </style>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-{{  $configuracion->col }}">
            <!-- Article -->
            <div class="video-home">
                <!-- 16:9 aspect ratio -->
                {!! $configuracion->contenido !!}
            </div>
            <!-- End Article -->
        </div>
        <!-- END OLD FUNCTION -->
    </div>
</section>

<section class="g-bg-gray-light-v5 g-py-50" style="background-image: url({{ asset('uc2/img/bg/pattern2.png') }});">
    <div class="container">
        <header class="g-mb-10">
            <h3 class="h5 g-font-weight-300 g-mb-5">No te pierdas esta oportunidad</h3>
            <h2 class="h1 g-font-weight-300 text-uppercase">AVISOS </h2>
        </header>
        <div class="d-sm-flex text-center">
            @include('front.uc2.partials.avisos')
            <!-- End Testimonials -->
            <section class="container g-py-50 g-pb-70">
                @php 
                    $local_uuid = uniqid();
                @endphp
                <!-- Banners -->
                <div class="row">
                    <div class="col-lg-6 g-mb-30" style="margin:auto;">
                        <!-- Article -->
                        <article class="row align-items-stretch text-center mx-0">
                            <!--Article Content-->
                            <div class="col-sm-6 g-bg-black g-px-30 g-py-45">
                                <h3 class="h4 g-color-white g-font-weight-600 text-uppercase g-mb-25">Encuesta
                                    <span class="d-block g-color-primary g-font-weight-700">Anual</span>
                                </h3>
                                <p class="g-color-gray-dark-v5 g-mb-25">Participa de nuestra encuesta anual y ayudanos a conocerte.</p>
                                <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="{{ url('/encuesta/registro') }}">Comenzar Ahora</a>
                            </div>
                            <!-- End Article Content -->

                            <!-- Article Image -->
                            <div class="col-sm-6 px-0 g-bg-size-cover" data-bg-img-src="{{ asset('/uc2/img/img3.jpg') }}"></div>
                            <!-- End Article Image -->
                        </article>
                        <!-- End Article -->
                    </div>
                </div>
                <!-- End Banners -->
                <div class="row">
                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/1.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/1.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/2.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/2.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/3.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/3.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/4.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/4.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/5.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/5.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/6.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/6.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/7.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/7.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/8.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/8.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/9.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/9.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/10.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/10.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/11.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/11.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/12.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/12.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/13.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/13.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/14.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/14.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>

                    <div class="col-md-4 g-mb-30">
                        <a class="js-fancybox-thumbs" href="javascript:;" data-fancybox="lightbox-gallery-2" data-src="{{ asset('uc2/img/avisos/15.jpg').'?'.$local_uuid }}" data-caption="Lightbox Gallery" data-speed="500" data-slideshow-speed="1000">
                            <img class="img-fluid" src="{{ asset('uc2/img/avisos/15.jpg').'?'.$local_uuid }}" alt="Image Description">
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>


<!-- Page Title -->
<section class="auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options="{direction: 'reverse', settings_mode_oneelement_max_offset: '150'}">
    <!-- Parallax Image -->
    <div style="height: 200%; " class="divimage dzsparallaxer--target w-100 g-bg-repeat g-bg-gray-light-v4"></div>
    <!-- End Parallax Image -->

    <div class="container g-z-index-1 g-py-100">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h1 class="g-font-weight-300 g-letter-spacing-1 g-mb-15">Redes</h1>

                <div class="lead g-font-weight-400 g-line-height-2 g-letter-spacing-0_5">
                    <div class="fb-page" data-href="https://www.facebook.com/iglesiaunioncristiana/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">

                        <blockquote cite="https://www.facebook.com/iglesiaunioncristiana/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/iglesiaunioncristiana/">Iglesia Unión Cristiana</a>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <h1 class="g-font-weight-300 g-letter-spacing-1 g-mb-15">Agenda Semanal Cuarentena</h1>

                <!--Basic Table-->
                <div class="table-responsive">
                    <table class="table table-bordered u-table--v2">
                        <thead class="text-uppercase g-letter-spacing-1">
                            <tr>
                                <th class="g-font-weight-300 g-color-black g-min-width-200">Día</th>
                                <th class="g-font-weight-300 g-color-black">Actividades</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="align-middle">Domingo</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        11:30 • Culto (YouTube)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        13:00 • Clase de Niños (YouTube)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Lunes</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        18:00 • Estudio Bíblico (YouTube)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Martes</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        16:00 • Años Dorados (ZOOM)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Miércoles</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        10:00 • Oración (ZOOM)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        18:00 • Tarde de Alabanza (YouTube)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        TODO EL DÍA • Ayuno & Oración (Primer Miércoles del mes)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Jueves</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        16:00 • Mujeres (ZOOM)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        18:00 • Reunión de Oración (YouTube)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Jueves</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        17:00 • Preadolescentes (ZOOM)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        19:45 • Adolescentes (ZOOM)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        20:00 • Intermedios (ZOOM)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        20:00 • Adultos (YouTube)
                                    </span>
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        20:00 • Hombres (ZOOM)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Sábado</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        19:00 • Matrimonios (ZOOM) - (1er y 3er Sábado del mes)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">Todos los días</td>
                                <td class="align-middle text-nowrap">
                                    <span class="d-block g-mb-5">
                                        <i class="icon-hotel-restaurant-003 u-line-icon-pro g-font-size-16 g-color-gray-dark-v5 g-pos-rel g-top-2 g-mr-5"></i>
                                        10:00 y 22:00 • Oración 10&10
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--End Basic Table-->
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->
@endsection