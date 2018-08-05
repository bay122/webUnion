@extends('front.layout')
  
@section('title', 'Home')

@section('main')
    <!-- masonry
    ================================================== -->
    <section id="bricks">

        <div class="row masonry">
        @if (false)
            @isset($info)
                @component('front.components.alert')
                    @slot('type')
                        info
                    @endslot
                    {!! $info !!}
                @endcomponent
            @endisset
            @if ($errors->has('search'))
                @component('front.components.alert')
                    @slot('type')
                        error
                    @endslot
                    {{ $errors->first('search') }}
                @endcomponent
            @endif
        @endif  
        </div> <!-- end row -->
    </section> <!-- end bricks -->
    <section class="margin-two-bottom sm-margin-six-bottom">
        @include('front.partials.corrusel')
    </section>
    <section class="margin-four-bottom xs-margin-ten-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <span style="display: block;background: black;" class="text-uppercase font-weight-700 text-center text-white text-large alt-font letter-spacing-1">Horario de Reuniones Generales</span>
                    <div>
                        <div class="col-xs-12 col-sm-4 text-uppercase text-center font-weight-700 text-black text-large alt-font letter-spacing-1" style="border: 2px solid black;">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> Domingos 10:00 Hs
                        </div>
                        <div class="col-xs-12 col-sm-4 text-uppercase text-center font-weight-700 text-white text-large alt-font letter-spacing-1" style="border: 2px solid black;background: #737373;">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> Domingos 11:30 Hs
                        </div>
                        <div class="col-xs-12 col-sm-4 text-uppercase text-center font-weight-700 text-black text-large alt-font letter-spacing-1" style="border: 2px solid black;">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> Domingos 13:00 Hs
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="margin-four-bottom xs-margin-ten-bottom">
        <div class="container">
            @if (false)
            <!--div class="row">
                @ foreach($categories as $category)
                <div class="promo-area col-md-4 col-sm-4 col-xs-12 margin-bottom-30 xs-margin-six-bottom">
                    <div class="text-center promo-item cover-background" style="background:url({ { asset($category->image->route) }})">
                        <a class="promo-linking" href="{ {$category->route}}" target="_self"></a>
                        <div class="promo-border">
                            <p class="text-shadow text-uppercase text-extra-small letter-spacing-3 text-white promo-title padding-three-bottom">{ {$category->name }}</p>
                            <span class="text-uppercase text-black text-small alt-font letter-spacing-1">{ {$category->description->label}}</span>
                        </div>
                    </div>
                </div>
                @ endforeach
            </div-->
            @endif  

            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1pV7i5mvkbo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <div class="padding-five fl-left bg-gray width-100">
                        <div class="blog-details text-center">
                            <h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six no-margin-bottom text-uppercase entry-title blog-layout-title">
                                <a rel="bookmark" href="http://wpdemos.themezaa.com/paperio/anchali/first-for-celebrity-news/">Ácimos</a>
                            </h2>
                            <div class="margin-two-bottom no-margin-lr letter-spacing-2 text-extra-small text-uppercase border-bottom-mid-gray padding-one-bottom xs-margin-six display-inline-block">
                                <ul class="post-meta-box meta-box-style2 blog-layout-meta">
                                    <li>
                                        <a rel="category tag" class="text-link-light-gray blog-layout-meta-link" href="#">1° Corintios 5:6-8</a>
                                    </li>
                                    <li class="published">25 Abril 2018</li>
                                </ul>
                            </div>
                            <p class="margin-four-bottom xs-margin-eight-bottom sm-margin-five-bottom width-80 sm-width-100 margin-lr-auto entry-summary">
                                6 No es buena vuestra jactancia. ¿No sabéis que un poco de levadura leuda toda la masa?
                                7 Limpiaos, pues, de la vieja levadura, para que seáis nueva masa, sin levadura como sois; porque nuestra pascua, que es Cristo, ya fue sacrificada por nosotros.
                                8 Así que celebremos la fiesta, no con la vieja levadura, ni con la levadura de malicia y de maldad, sino con panes sin levadura, de sinceridad y de verdad.
                            </p>
                            <!--
                                <ul class="col-md-12 col-sm-12 col-xs-12 blog-post-meta-style3 blog-meta text-uppercase padding-top-25 border-top-mid-gray alt-font no-padding-lr blog-layout-meta">
                                    <li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center vcard author">By 
                                        <a class="text-small fn blog-layout-meta-link" href="">admin</a>
                                    </li>
                                    <li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center xs-margin-top-10">
                                        <a href="" class="text-uppercase font-weight-400 text-small alt-font blog-layout-meta-link">Read More</a>
                                    </li>
                                    <li class="col-md-4 col-sm-4 col-xs-12 no-padding text-center">
                                        <ul class="blog-listing-comment blog-layout-meta general-blog-listing-comment">
                                            <li>
                                                <a href="" class="comment text-small blog-layout-comment-link">
                                                    <i class="far fa-comment"></i>
                                                    <span>2 Comments</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="sl-button text-small blog-layout-comment-link sl-button-137" data-nonce="6a0961c078" data-post-id="137" data-iscomment="0" title="Like">
                                                    <i class="far fa-heart"></i>
                                                    <span>43 </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            -->
                        </div>
                    </div>
                </div>
                
                <!--div class="promo-area col-md-6 col-sm-6 col-xs-12">
                    <div class="text-center promo-item cover-background" style="background:url(images/categories/NOTAS.jpg)">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/1pV7i5mvkbo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div-->
            </div>
        </div>
    </section>
@endsection