<nav class="navbar navbar-default navbar-static-top bg-white navbar-border-bottom xs-no-border black-link-nav no-margin-top" id="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button" id="dropdown-button">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="menu-main-menu-container navbar-collapse collapse alt-font col-md-9 col-sm-9 col-xs-6">
                    <ul id="menu-main-menu" class="nav navbar-nav navbar-white paperio-default-menu">
                        <li {{ currentRoute('home') }} id="menu-item-231" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-231">
                            <a href="{{ url('') }}" itemprop="url">@lang('Home')</a>
                        </li>
                        <li {{ currentRoute('home') }} id="menu-item-231" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-231">
                            <a href="{{ url('/informacion/nosotros') }}" itemprop="url">Esto Somos</a>
                        </li>
                        <li {{ currentRoute('home') }} id="menu-item-231" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-231">
                            <a href="{{ url('/informacion/declaracion_de_fe') }}" itemprop="url">Declaración de Fe</a>
                        </li>
                        <li {{ currentRoute('home') }} id="menu-item-231" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-231">
                            <a href="{{ url('/informacion/ministerios') }}" itemprop="url">Ministerios</a>
                        </li>
                        @if (false)
                        <li id="menu-item-231" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-72 dropdown">
                            <a class="dropdown-caret-icon" data-toggle="dropdown">
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <a href="#" class="dropdown-toggle" itemprop="url">Sobre Nosotros</a>
                            <ul class="sub-menu dropdown-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-post text-nowrap" itemprop="url">
                                    <a href="{{ url('/informacion/nosotros') }}">Quienes Somos?</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-post text-nowrap" itemprop="url">
                                    <a href="{{ url('/informacion/ministerios') }}">Nuestros Ministerios</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (false)
                        <li id="menu-item-72" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-72 dropdown">
                            <a class="dropdown-caret-icon" data-toggle="dropdown">
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <a href="#" class="dropdown-toggle" itemprop="url">Comunión</a>
                            <ul class="sub-menu dropdown-menu">
                                @foreach ($categories as $category)
                                    <li class="menu-item menu-item-type-post_type menu-item-object-post text-nowrap" itemprop="url"><a href="{{ route('category', [$category->slug ]) }}">{{ $category->title }}</a></li>
                                @endforeach
                                <!--li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-135"><a href="" itemprop="url">Audio Post</a></li>
                                <li id="menu-item-136" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-136"><a href="" itemprop="url">Blockquote post</a></li>
                                <li id="menu-item-180" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-180"><a href="" itemprop="url">Full width post</a></li-->
                            </ul>
                        </li>
                        @endif  
                        @guest
                        <li {{ currentRoute('contacts.create') }} id="menu-item-232" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-232">
                            <a href="{{ route('contacts.create') }}" itemprop="url">@lang('Contact')</a>
                        </li>
                        @endguest
                    </ul>
                </div>
                @if (false)
                <div class="menu-main-menu-container navbar-collapse collapse alt-font col-md-3 col-sm-3 col-xs-6 fl-right">
                    <ul id="menu-main-menu" class="nav navbar-nav navbar-white paperio-default-menu">
                        @request('register')
                            <li class="current">
                                <a href="{{ request()->url() }}" itemprop="url">@lang('Register')</a>
                            </li>
                        @endrequest
                        @request('password/email')
                            <li class="current">
                                <a href="{{ request()->url() }}" itemprop="url">@lang('Forgotten password')</a>
                            </li>
                        @else
                            @guest
                                <li {{ currentRoute('login') }}>
                                    <a href="{{ route('login') }}" itemprop="url">@lang('Login')</a>
                                </li>
                                @request('password/reset')
                                    <li class="current">
                                        <a href="{{ request()->url() }}" itemprop="url">@lang('Password')</a>
                                    </li>
                                @endrequest
                                @request('password/reset/*')
                                    <li class="current">
                                        <a href="{{ request()->url() }}" itemprop="url">@lang('Password')</a>
                                    </li>
                                @endrequest
                            @else
                                @admin
                                    <li>
                                        <a href="{{ url('admin') }}" itemprop="url">@lang('Administration')</a>
                                    </li>
                                @endadmin
                                @redac
                                    <li>
                                        <a href="{{ url('admin/posts') }}" itemprop="url">@lang('Administration')</a>
                                    </li>
                                @endredac
                                <li>
                                    <a id="logout" href="{{ route('logout') }}" itemprop="url">@lang('Logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hide">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endguest
                        @endrequest
                        <li id="menu-item-231" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-231">
                            <a class="search-trigger" itemprop="url" href="#">Buscar <i class="fa fa-search"></i></a>
                        </li>
                    </ul>
                </div>
                <!--div class="col-md-2 col-sm-2 col-xs-6 fl-right search-box">
                    <form role="search" method="get" class="search-form navbar-form no-padding" action="">
                        <div class="input-group add-on">
                            <input type="search" class="search-field form-control" placeholder="Buscar...." value="" name="s" disabled/>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" disabled>
                                  <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div-->

                <!--div class="triggers">
                    <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
                    <a class="menu-toggle" href="#"><span>Menu</span></a>
                </div--> <!-- end triggers -->
                @endif  
            </div>
            @if (false)
            <!--div class="col-md-2 col-sm-2 col-xs-2 fl-right search-box triggers">
                <div class="menu-item menu-item-type-post_type menu-item-object-page menu-item-232">
                    <a href="{{ url('contacts/create') }}" itemprop="url">Contacto</a>
                </div>
                <div class="menu-item menu-item-type-post_type menu-item-object-page menu-item-232">
                    <a href="{{ url('contacts/create') }}" itemprop="url">Contacto</a>
                </div>
                <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
            </div-->
            @endif  
        </div>
    </div>
</nav>

@if (false)
<div class="search-wrap">
    <form role="search" method="get" class="search-form" action="{{ route('posts.search') }}">
        <label style="width: 50% !important;">
            <input type="search" class="search-field" placeholder="@lang('Type Your Keywords')"  name="search" autocomplete="off" required>
        </label>
        <input type="submit" class="search-submit" value="">
    </form>

    <a href="#" id="close-search" class="close-btn">Close</a>

</div> <!-- end search wrap -->
@endif  