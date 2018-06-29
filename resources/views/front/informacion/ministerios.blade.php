@extends('front.layout')
  
@section('title', 'Ministerios')

@section('main')
<div class="post-165 page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">Ministerios</span>
                <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">VIÑA DEL MAR</h2>
            </div>
        </div>
    </section>
    
    <!--section class="margin-four-bottom xs-margin-ten-bottom"-->
    <section class="margin-five sm-margin-eight-top xs-margin-twelve-top no-margin-lr">
        <div class="container">
            <div class="row">
                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                    <div class="toggle-button">
                        <h5 class="col-sm-11 text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                            <span>FAMILIARES</span>
                        </h5>
                            <i class="col-sm-1 text-rigth fa fa-plus-circle" style="font-size: 24px;"></i>
                    </div>
                    <div class="toggle-section" style="display: none;">
                        @php $var = "left" @endphp
                        @foreach($ministerios as $ministerio)
                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                            <figure class=" align{{$var}} width-290">
                                <img alt="{{$ministerio->name }}" src="{{ asset($ministerio->image->route) }}">
                                <figcaption class="text-center">{{$ministerio->title }}</figcaption>
                            </figure>
                            <p class="dropcap text-medium">
                                El primer equipo misionero de la Iglesia Unión Cristiana viajó en el verano del año 2001 a Quellón, Chiloé. Luego
                                de este viaje, la idea se siguió replicando cada verano. Fue el inicio de un ministerio que Dios ha venido
                                inspirando y sosteniendo en medio de esta congregación, y que es la respuesta a la inquietud de corazones que
                                arden por salir y hablar a quienes necesitan oír el evangelio de Cristo.
                            </p>
                        </div>
                        @php $var = ($var=="left")?"right":"left" @endphp
                        @endforeach
                    </div>
                    <p></p>
                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                </div>
            </div>

            <div class="row">
                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12 no-padding">
                    <div class="toggle-button">
                        <h5 class="col-sm-11 text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                            <span>ENSEÑANZA</span>
                        </h5>
                        <i class="col-sm-1 fa fa-plus-circle" style="font-size: 24px;"></i>
                    </div>
                    <div class="toggle-section" style="display: none;">
                        @php $var = "left" @endphp
                        @foreach($ministerios as $ministerio)
                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                            <figure class=" align{{$var}} width-290">
                                <img alt="{{$ministerio->name }}" src="{{ asset($ministerio->image->route) }}">
                                <figcaption class="text-center">{{$ministerio->title }}</figcaption>
                            </figure>
                            <p class="dropcap text-medium">
                                {{$ministerio->description }}
                            </p>
                        </div>
                        @php $var = ($var=="left")?"right":"left" @endphp
                        @endforeach
                    </div>
                    <p></p>
                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                </div>
            </div>

            <div class="row">
                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12  no-padding">
                    <div class="toggle-button">
                        <h5 class="col-sm-11 text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                            <span>MISIONES</span>
                        </h5>
                        <i class="col-sm-1 fa fa-plus-circle" style="font-size: 24px;"></i>
                    </div>
                    <div class="toggle-section" style="display: none;">
                        @php $var = "left" @endphp
                        @foreach($ministerios as $ministerio)
                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                            <figure class=" align{{$var}} width-290">
                                <img alt="{{$ministerio->name }}" src="{{ asset($ministerio->image->route) }}">
                                <figcaption class="text-center">{{$ministerio->title }}</figcaption>
                            </figure>
                            <p class="dropcap text-medium">
                                {{$ministerio->description }}
                            </p>
                        </div>
                        @php $var = ($var=="left")?"right":"left" @endphp
                        @endforeach
                    </div>
                    <p></p>
                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                </div>
            </div>

            <div class="row">
                <div class="paperio-text-block col-md-12 col-sm-12 col-xs-12  no-padding">
                    <div class="toggle-button">
                        <h5 class="col-sm-11 text-left title-border-right text-mid-gray font-weight-700 text-uppercase letter-spacing-1 margin-six-bottom sm-margin-four-bottom xs-margin-ten-bottom title-small xs-no-padding">
                            <span>SERVICIOS TRANSVERSALES</span>
                        </h5>
                        <i class="col-sm-1 fa fa-plus-circle" style="font-size: 24px;"></i>
                    </div>
                    <div class="toggle-section" style="display: none;">
                        @php $var = "left" @endphp
                        @foreach($ministerios as $ministerio)
                        <div class="paperio-dropcap col-md-11 col-sm-11 col-xs-11">
                            <figure class=" align{{$var}} width-290">
                                <img alt="{{$ministerio->name }}" src="{{ asset($ministerio->image->route) }}">
                                <figcaption class="text-center">{{$ministerio->title }}</figcaption>
                            </figure>
                            <p class="dropcap text-medium">
                                {{$ministerio->description }}
                            </p>
                        </div>
                        @php $var = ($var=="left")?"right":"left" @endphp
                        @endforeach
                    </div>
                    <p></p>
                    <div class="separator-line-thin bg-middle-gray seprator-line-thin bg-middle-gray margin-five-bottom xs-margin-ten-bottom no-margin-lr clear-both" style="background:#e4e4e4; height:1px;"></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection