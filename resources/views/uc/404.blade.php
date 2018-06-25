@extends('templates.main')

@section('title', 'Contacto')

@section('content')
    <section class="below-navigation">
        <div class="container">
            <div class="row margin-five-bottom">
                <div class="col-md-12 col-sm-12 text-center margin-eight-top">
                    <img src="{{asset('images/404-error.jpg')}}" data-bg-srcset="" alt="">
                    <span class="title-extra-larger alt-font text-uppercase font-weight-700 display-block margin-five-top text-black">Lo sentimos, </span>
                    <span class="text-large text-uppercase alt-font"> No encontramos la página solicitada.</span>
                </div>
            </div>
            <div class="row margin-ten-bottom margin-five-top">
                <div class="col-md-12 col-sm-12 text-center margin-lr-auto float-none">
                    <a href="http://wpdemos.themezaa.com/paperio/anchali" class="btn btn-border text-uppercase btn-large">Ve a la página principal</a>
                    <div class="not-found-or-text">o</div>
                    <form role="search" method="get" class="search-form" action="">
                        <input type="text" id="search" placeholder="Busca Aquí..." value="" name="s" class="form-control-404 big-input">
                        <button type="submit" class="btn btn-default btn-404">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('templates.partials.suscribe_socials')
@endsection
