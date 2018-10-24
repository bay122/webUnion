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
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> Domingo 10:00 Hs
                        </div>
                        <div class="col-xs-12 col-sm-4 text-uppercase text-center font-weight-700 text-white text-large alt-font letter-spacing-1" style="border: 2px solid black;background: #737373;">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> Domingo 11:30 Hs
                        </div>
                        <div class="col-xs-12 col-sm-4 text-uppercase text-center font-weight-700 text-black text-large alt-font letter-spacing-1" style="border: 2px solid black;">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> Domingo 13:00 Hs
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
                <div class="col-xs-12 col-sm-{{  $configuracion->col }}">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                    {!! $configuracion->contenido !!}
                    </div>
                </div>
                @if ($configuracion->estado =='1')  
                    <div class="col-xs-12 col-sm-5">
                        {!! $configuracion->html !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection