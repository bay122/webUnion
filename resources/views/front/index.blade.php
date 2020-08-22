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
    <section class="margin-four-bottom xs-margin-six-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <span class="horarios_component_title text-uppercase font-weight-700 text-center text-white text-large alt-font letter-spacing-1">Horario de Reuniones Domingos</span>
                    <div>
                        <div class="col-xs-12 col-sm-4 horarios_component horarios_component_left horarios_component_separador text-center font-weight-700 text-large alt-font letter-spacing-1" style="">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> 10:00 hrs.

                        </div>
                        <div class="col-xs-12 col-sm-4 horarios_component horarios_component_center horarios_component_separador text-center font-weight-700 text-large alt-font letter-spacing-1" style="">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> 11:30 hrs.

                        </div>
                        <div class="col-xs-12 col-sm-4 horarios_component horarios_component_rigth text-center font-weight-700 text-large alt-font letter-spacing-1" style="">
                            <i class="fa fa-clock-o text-large" style="font-weight: initial;"></i> 13:00 hrs.

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
                </br>
                <div class="col-xs-12 col-sm-{{  $configuracion->col }}" style="margin-top: 20px;">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://drive.google.com/file/d/1skQXXt99uwWiC9kfuaFSeAI55_fhzOM2/preview" width="560" height="315" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
                    </div>
                </div>
                @if ($configuracion->estado =='1')  
                    <div class="col-xs-12 col-sm-5" style="margin-top: 20px;">
                    <div class="padding-five fl-left bg-gray width-100"><div class="blog-details text-center"><h2 class="alt-font font-weight-600 title-small text-mid-gray margin-six no-margin-bottom text-uppercase entry-title blog-layout-title"><a rel="bookmark">Aniversario</a></h2><div class="margin-two-bottom no-margin-lr letter-spacing-2 text-extra-small text-uppercase border-bottom-mid-gray padding-one-bottom xs-margin-six display-inline-block"><ul class="post-meta-box meta-box-style2 blog-layout-meta"><li><a rel="category tag" class="text-link-light-gray blog-layout-meta-link" href="#">6 Agosto</a></li><li class="published"></li></ul></div><p class="margin-four-bottom xs-margin-eight-bottom sm-margin-five-bottom width-80 sm-width-100 margin-lr-auto entry-summary" id="descripcion">Por la inmensa misericordia y bondad de nuestro Dios, este 6 de agosto cumplimos 31 años como iglesia; vivamos un momento de celebracion y agradecimiento al Señor por su fidelidad y bondad. Disfrutemos de una noche especial, llena de alegría, canciones, risas y bailes para la gloria de Dios.<br></p></div></div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection