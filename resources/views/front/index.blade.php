@extends('front.layout')
  
@section('title', 'Home')

@section('main')
    <!-- masonry
    ================================================== -->
    <section id="bricks">

        <div class="row masonry">
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
        </div> <!-- end row -->
    </section> <!-- end bricks -->
    <section class="margin-two-bottom sm-margin-six-bottom xs-margin-twelve-bottom">
        @include('uc.templates.partials.corrusel')
    </section>
    <section class="margin-four-bottom xs-margin-ten-bottom">
        <div class="container">
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

            <div class="row">
                <div class="promo-area col-md-6 col-sm-6 col-xs-12">
                    <div class="text-center promo-item cover-background" style="height:350px;background:url(images/categories/NOTAS.jpg)">
                        <!--a class="promo-linking" href="#" target="_self"></a-->
                        <div class="promo-border" style=" background: rgba(0, 0, 0, .5)">
                            <h3 class="text-uppercase letter-spacing-3 text-white promo-title">Nuestras Reuniones:</h3>
                            <span style="display: block;" class="text-uppercase text-black text-small alt-font letter-spacing-1">Primera Reunión: Domingos 10:00 hs</span>
                            <span style="display: block;" class="text-uppercase text-black text-small alt-font letter-spacing-1">Segunda Reunión: Domingos 11:30 hs</span>
                            <span style="display: block;" class="text-uppercase text-black text-small alt-font letter-spacing-1">Tercera Reunión: Domingos 13:00 hs</span>
                        </div>
                    </div>
                </div>
                <div class="promo-area col-md-6 col-sm-6 col-xs-12">
                    <div class="text-center promo-item cover-background" style="background:url(images/categories/NOTAS.jpg)">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/1pV7i5mvkbo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection