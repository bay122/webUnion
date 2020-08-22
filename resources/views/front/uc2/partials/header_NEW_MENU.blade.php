<div class="header-logo">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center no-padding">
                <div class="logo">
                    <a href="{{ url('') }}" rel="home" itemprop="url">
                        <img src="" data-at2x="{{ asset('images/logos/logo@2x-1.png') }}" alt="Unión Cristiana">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<header id="js-header" class="u-header u-header--sticky-top u-header--change-logo u-header--change-appearance" data-header-fix-moment="100">

    <div class="u-header__section u-header__section--light g-bg-white  g-transition-0_3 g-py-10" data-header-fix-moment-exclude="u-header__section--light g-bg-white g-py-10" data-header-fix-moment-classes="u-header__section--dark g-bg-black g-py-0">

        <nav class="js-mega-menu navbar navbar-expand-lg">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                    <span class="hamburger hamburger--slider">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </span>
                </button>
                <!-- End Responsive Toggle Button -->
                <!-- Logo -->
                <a href="index.html" class="navbar-brand u-header__logo">
                    <img class="u-header__logo-img u-header__logo-img--main" src="{{ asset('uc2/img/logo/logotipoNegro.svg') }}" width="50%" height="60" alt="Unión Cristiana">

                    <img class="u-header__logo-img" src="{{ asset('uc2/img/logo/logotipoNegro.svg') }}" width="50%" height="60" alt="Image Description">
                </a>
                <!-- End Logo -->

                <!-- Navigation -->

                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
                    <ul class="navbar-nav ml-auto text-uppercase g-font-weight-600 u-main-nav-v5 u-sub-menu-v1">
                        <li class="nav-item g-mx-20--lg {{ currentRouteBootstrap('home') }}">
                            <a href="{{ url('') }}" class="nav-link px-0">Inicio</a>
                        </li>
                        <li class="nav-item g-mx-20--lg {{ currentRouteBootstrap('nosotros') }}">
                            <a href="{{ url('/informacion/nosotros') }}" class="nav-link px-0">
                                Esto Somos
                            </a>
                        </li>
                        <li class="nav-item g-mx-20--lg {{ currentRouteBootstrap('declaracionDeFe') }}">
                            <a href="{{ url('/informacion/declaracion_de_fe') }}" class="nav-link px-0">
                                Declaración de Fe
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item g-mx-20--lg {{ currentRouteBootstrap('ministerios') }}">
                            <a href="{{ url('/informacion/ministerios') }}" class="nav-link px-0">
                            Ministerios
                        </a>
                        </li>
                        <li class="nav-item g-mx-20--lg {{ currentRouteBootstrap('recursos') }}">
                            <a href="{{ url('/recursos') }}" class="nav-link px-0">
                                Recursos
                            </a>
                        </li>
                        <li class="nav-item g-ml-20--lg g-mr-0--lg {{ currentRouteBootstrap('contacts.create') }}">
                            <a href="{{ route('contacts.create') }}" class="nav-link px-0">
                                Contacto
                            </a>
                        </li>



                        <!-- Mega Menu Item -->
                        <li class="hs-has-mega-menu nav-item g-mx-20--lg" data-animation-in="fadeIn" data-animation-out="fadeOut" data-position="right">
                            <a id="mega-menu-label-1" class="nav-link g-px-0" href="#" aria-haspopup="true" aria-expanded="false">contenido
                                <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-5"></i>
                            </a>

                            <!-- Mega Menu -->
                            <div class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mt-17 g-mt-7--lg--scrolling" aria-labelledby="mega-menu-label-1">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <ul class="list-unstyled mb-0">
                                            <li class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
                                                <a class="g-color-main g-color-main--hover" href="#">
                                                    World
                                                </a>
                                            </li>
                                            <li class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
                                                <a class="g-color-main g-color-main--hover" href="#">
                                                    Economy
                                                </a>
                                            </li>
                                            <li class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
                                                <a class="g-color-main g-color-main--hover" href="#">
                                                    Sport
                                                </a>
                                            </li>
                                            <li class="g-brd-bottom g-brd-gray-light-v4 g-py-10">
                                                <a class="g-color-main g-color-main--hover" href="#">
                                                    Fashion
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-10">
                                        <article class="media g-mb-20">
                                            <a class="d-flex mr-3" href="#">
                                                <img class="g-width-120 g-height-70" src="assets/img-temp/500x320/img1.jpg" alt="Image Description">
                                            </a>

                                            <div class="media-body">
                                                <h3 class="h6">
                                                    <a class="g-color-main" href="#">8 health benefits and drawbacks of coffee</a>
                                                </h3>
                                                <ul class="u-list-inline g-font-size-12 g-color-gray-dark-v4">
                                                    <li class="list-inline-item">July 30, 2016</li>
                                                    <li class="list-inline-item">/</li>
                                                    <li class="list-inline-item">
                                                        <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#">
                                                            <i class="fa fa-comments-o"></i>
                                                            12
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>

                                        <article class="media g-mb-20">
                                            <a class="d-flex mr-3" href="#">
                                                <img class="g-width-120 g-height-70" src="assets/img-temp/500x320/img2.jpg" alt="Image Description">
                                            </a>

                                            <div class="media-body">
                                                <h3 class="h6">
                                                    <a class="g-color-main" href="#">5 Best cofee places with free WiFi in Victoria, BC</a>
                                                </h3>
                                                <ul class="u-list-inline g-font-size-12 g-color-gray-dark-v4">
                                                    <li class="list-inline-item">July 18, 2016</li>
                                                    <li class="list-inline-item">/</li>
                                                    <li class="list-inline-item">
                                                        <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#">
                                                            <i class="fa fa-comments-o"></i>
                                                            56
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>

                                        <article class="media g-mb-20">
                                            <a class="d-flex mr-3" href="#">
                                                <img class="g-width-120 g-height-70" src="assets/img-temp/500x320/img3.jpg" alt="Image Description">
                                            </a>

                                            <div class="media-body">
                                                <h3 class="h6">
                                                    <a class="g-color-main" href="#">Top 7 Luxury places to visit around Victoria, BC</a>
                                                </h3>
                                                <ul class="u-list-inline g-font-size-12 g-color-gray-dark-v4">
                                                    <li class="list-inline-item">July 11, 2016</li>
                                                    <li class="list-inline-item">/</li>
                                                    <li class="list-inline-item">
                                                        <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#">
                                                            <i class="fa fa-comments-o"></i>
                                                            46
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <!-- End Mega Menu Item -->
                        
                        @auth
                            @admin
                            <li class="nav-item g-ml-20--lg g-mr-0--lg">
                                <a href="{{ url('admin') }}" class="nav-link px-0 text-primary" >
                                    @lang('Administration')
                                </a>
                            </li>
                            @endadmin
                            @tripulante
                            <li class="nav-item g-ml-20--lg g-mr-0--lg">
                                <a href="{{ url('admin') }}" class="nav-link px-0 text-primary" >
                                    @lang('Administration')
                                </a>
                            </li>
                            @endtripulante
                            <li class="nav-item g-ml-20--lg g-mr-0--lg">
                                <a id="logout" href="{{ route('logout') }}" class="nav-link px-0 text-danger" itemprop="url">
                                    @lang('Logout')
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
                <!-- End Navigation -->
            </div>
        </nav>
    </div>
</header>