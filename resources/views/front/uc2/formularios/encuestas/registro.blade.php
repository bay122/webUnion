@extends('front.uc2.layout')

@section('title', 'Encuesta - Registro')

@section('css')
    @if(!$google_maps)
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
       integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
       crossorigin=""/>
    @endif
@endsection

@section('scripts')
    @php 
        $local_uuid = uniqid();
    @endphp
    <script src="{{ asset('plugins/otros/js/confetti.js-master/confetti.min.js').'?'.$local_uuid}}" type="text/javascript"></script>
    <script src="{{ asset('plugins/mapa/places.js').'?'.$local_uuid}}" type="text/javascript"></script>

@if($google_maps)
    <!-- Google Maps API KEY -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initAutocomplete"></script>
@else
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
         crossorigin=""></script>
@endif

<script type="text/javascript" charset="utf-8">
    @if($google_maps)
    setTimeout(() => {Encuesta.iniciarMapa()}, 500)
    @else
        setTimeout(() => {Encuesta.bo_map_leaflet = 1}, 500)
        ;
    @endif
</script>
@endsection

@section('main')



<div class="container g-color-black text-center g-py-100 pb-0 ">
    <h3 class="h1 g-font-weight-600 text-uppercase mb-2">Registro</h3>
    <p class="g-font-weight-300 g-font-size-22 ">Encuesta</p>
</div>

<div class="g-bg-gray-light-v5 g-py-50" style="background-image: url({{ asset('uc2/img/bg/pattern2.png') }});">
    
    <section class="g-mb-50">
        <div class="col-md-8 col-sm-8 col-xs-8 alert alert-info text-center" style=" margin: 0; left: 50%; transform: translate(-50%, 0%);">
            <b>Sabemos lo importante que es mantenernos comunicados.<br/> 
                Por eso decidimos crear nuevos medios para mantenernos informados y brindar espacios para tener comunión entre nosotros. <br/>
                Para lograrlo, te pedimos que nos ayudes registrando tus datos para que podamos conocerte.<br/>
            </b>
            Tus datos estarán resguardados y solo serán utilizados con fines de comunicación.
        </div>        
    </section>

    <section class="g-mb-50">
        <form id="form_registro_encuesta" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="recap" id="recap" value=""/>
            <input type="hidden" name="locale" value="es_ES"/>

            <div class="container g-mb-20">
                <div class="wizard u-shadow-v2 g-brd-around g-brd-gray-light-v4">
                    <div class="wizard-inner">
                        <!--div class="connecting-line"></div-->
                        <div class="connecting-line shortcode-html">
                            <div class="progress rounded-0 g-mb-20">
                                <div class="progress-bar u-progress-bar--xs" role="progressbar" id="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs wizard-tab" role="tablist">
                            <li role="presentation" class="active" data-barsize="10%">
                                <a class="disabled" href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                    <span class="round-tab">
                                        <i class="far fa-user"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" disabled data-barsize="40%">
                                <a class="disabled" href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <span class="round-tab">
                                        <i class="far fa-address-book"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" disabled data-barsize="72%">
                                <a class="disabled" href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <span class="round-tab">
                                        <i class="fas fa-church"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" disabled data-barsize="100%">
                                <a class="disabled" href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                    <span class="round-tab">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-content g-pa-40" style="padding-top: 0px !important;border-top: none !important;">
                        <div class="g-bg-white tab-pane active" role="tabpanel" id="step1">
                            <div class="col-md-12 g-mb-30" style="display: flex; padding-left: 0px;">
                                <div class="col-md-6">
                                    <span class="d-flex">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="d-flex justify-content-between">
                                                    <p class="m-0 mt-2 h5"><strong>DATOS PERSONALES</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-6" style="text-align: right;padding-top: 10px;padding-bottom: 20px !important;">
                                        <strong>
                                        <i class="fas fa-exclamation-triangle"></i> Datos Obligatorios
                                        </strong>
                                </div>
                            </div>
                            <!-- Products Block -->

                            <div class="row g-mb-20">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="gl_sexo" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Sexo</label>
                                        <div class="col-xs-12">
                                            <div class="input-group">
                                                <div id="radioBtn" class="btn-group">
                                                    <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="gl_sexo" data-title="H">
                                                    <b>Hombre</b>
                                                    </a>
                                                    <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="gl_sexo" data-title="M">
                                                    <b>Mujer</b>
                                                    </a>
                                                </div>
                                                <input type="hidden" name="gl_sexo" id="gl_sexo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="gl_nombres" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span> Nombre(s)</label>
                                        <div class="col-xs-12">
                                            <input type="text" name="gl_nombres" id="gl_nombres" class="form-control" value="" placeholder="Nombres">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="gl_apellidos" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span> Apellido(s)</label>
                                        <div class="col-xs-12">
                                            <input type="text" name="gl_apellidos" id="gl_apellidos" class="form-control" value="" placeholder="Apellidos">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('gl_rut') ? 'has-error' : '' }}">
                                        <label for="gl_rut" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Rut</label>

                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" id="gl_rut" name="gl_rut" value="" maxlength="12"
                                            onkeyup="formateaRut(this), this.value = this.value.toUpperCase()" onkeypress ="return soloNumerosYK(event)"
                                            onblur="ValidaRut(this)"  placeholder="Rut"/>
                                            <p style="margin: 0 0 0 8px;color: green;font-weight: 400;font-size: 10px;">Este dato nos sirve para no confundirte con otra persona</p>
                                        </div>
                                        {!! $errors->first('gl_rut', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('fc_nacimiento') ? 'has-error' : '' }}">
                                        <label for="fc_nacimiento" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"> Fecha de nacimiento</label>
                                        <div class="col-xs-12">
                                            <input type="date" class="form-control"id="fc_nacimiento" name="fc_nacimiento"
                                             value="" placeholder="dd/mm/aaaa">
                                        </div>
                                        {!! $errors->first('fc_nacimiento', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group {{ $errors->has('nr_telefono') ? 'has-error' : '' }}">
                                        <label for="nr_telefono" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"> Celular</label>
                                        <div class="col-xs-12">
                                            <input type="string" name="nr_telefono" id="nr_telefono" class="form-control" value="" placeholder="991919191">
                                        </div>
                                        {!! $errors->first('nr_telefono', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group  {{ $errors->has('gl_email') ? 'has-error' : ''}}">
                                        <label for="gl_email" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Email</label>
                                        <div class="col-xs-12">
                                            <input type="email" name="gl_email" id="gl_email" class="form-control validado" value="" placeholder="ejemplo@ejemplo.com" onblur="validaEmail(this,'E-mail ingresado no es valido')">
                                        </div>
                                        {!! $errors->first('gl_email', '<small class="help-block">:message</small>') !!}
                                    </div>
                                </div>
                            </div>
                            <!-- End Products Block -->

                            <div class="container g-mt-30">
                                <div class="row">
                                    <div class="col align-self-end">
                                       <button type="button" class="btn btn-xl g-bg-pink g-mr-10 g-mb-15 text-white"
                                        style="float: right; margin-right: 15px" onclick="validarDatosPersonales(this)">
                                            <i class="far fa-arrow-alt-circle-right g-mr-5"></i>
                                            <b>Siguiente</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="g-bg-white tab-pane" role="tabpanel" id="step2">
                            <div class="col-md-12 g-mb-30" style="display: flex; padding-left: 0px;">
                                <div class="col-md-6">
                                    <span class="d-flex">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="d-flex justify-content-between">
                                                    <p class="m-0 mt-2 h5"><strong>¿DÓNDE VIVES?</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-6" style="text-align: right;padding-top: 10px;padding-bottom: 20px !important;">
                                        <strong>
                                        <i class="fas fa-exclamation-triangle"></i> Datos Obligatorios
                                        </strong>
                                </div>
                            </div>

                            <!-- Products Block -->
                            <div class="contenedor-ubicacion">
                                <div class="col-lg-5 col-md-12">
                                    
                                    <div class="row">
                                        <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}" style="width: 100%;">
                                            <label for="region" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Región</label>
                                            <div class="col-xs-12">
                                                <select id="region" name="region" class="form-control select2" onchange="cargarComunasPorRegion(this.value, 'comuna')">
                                                    @foreach($regiones as $region)
                                                    <option value="{{ $region->id_region }}" {{ ($region->id_region == $regionDefault) ? 'selected' : '' }}>{{ $region->gl_nombre_corto }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('region', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group {{ $errors->has('comuna') ? 'has-error' : '' }}" style="width: 100%;">
                                            <label for="comuna" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Comuna</label>
                                            <div class="col-xs-12">
                                                <select id="comuna" name="comuna" class="form-control select2">
                                                    @foreach($comunas as $comuna)
                                                    <option value="{{ $comuna->id_comuna }}" {{ ($comuna->id_comuna == $comunaDefault) ? 'selected' : '' }}>{{ $comuna->gl_nombre_comuna }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('comuna', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group {{ $errors->has('gl_ciudad') ? 'has-error' : '' }}" style="width: 100%;">
                                            <label for="gl_ciudad" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Nombre Ciudad</label>
                                            <div class="col-xs-12">
                                                <input type="text" name="gl_ciudad" id="gl_ciudad" class="form-control" value="" placeholder="Nombre Ciudad">
                                            </div>
                                            {!! $errors->first('gl_ciudad', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    @if($google_maps)
                                    <div class="row">
                                        <div class="form-group {{ $errors->has('gl_direccion') ? 'has-error' : '' }}" style="width: 100%;"  id="locationField">
                                            <label for="gl_direccion" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Dirección</label>
                                            <div class="col-xs-12">
                                                <input type="text" name="gl_direccion" id="gl_direccion" class="form-control" value="" placeholder="Ingrese su dirección" onFocus="geolocate()">
                                            </div>
                                            {!! $errors->first('gl_direccion', '<small class="help-block">:message</small>') !!}
                                            <input type="hidden" id="street_number" name="street_number"/>
                                            <input type="hidden" id="route" name="route"/>
                                            <input type="hidden" id="locality" name="locality"/>
                                            <input type="hidden" id="administrative_area_level_1" name="administrative_area_level_1"/>
                                            <input type="hidden" id="postal_code" name="postal_code"/>
                                            <input type="hidden" id="country" name="country"/>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="form-group {{ $errors->has('gl_calle') ? 'has-error' : '' }}" style="width: 100%;">
                                            <label for="gl_calle" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Nombre Calle</label>
                                            <div class="col-xs-12">
                                                <input type="text" name="gl_calle" id="gl_calle" class="form-control" value="" placeholder="Nombre Calle">
                                            </div>
                                            {!! $errors->first('gl_calle', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="form-group  {{ $errors->has('nr_calle') ? 'has-error' : ''}}" style="width: 100%;">
                                            <label for="nr_calle" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Número de calle</label>
                                            <div class="col-xs-12">
                                                <input type="text" name="nr_calle" id="nr_calle" class="form-control validado" value="" placeholder="Número de Calle">
                                            </div>
                                            {!! $errors->first('nr_calle', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-12">
                                    <div class="row">
                                        <div id="map" data-editable="1" style="height:350px; width:90%; margin: 20px 10px auto auto;"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8" style = "margin: 0 auto;">
                                          <!-- Info Alert -->
                                          <div class="alert alert-info" role="alert">
                                            <strong><i class="fas fa-info-circle"></i> Información:</strong> Puedes mover el marcador del mapa en caso de ser necesario.
                                          </div>
                                          <!-- End Info Alert -->
                                        </div>
                                        <div id="coordenadas-container" style="display: none;">
                                            <!--    LATITUD    -->
                                            <div class="form-group row col-md-6">
                                                <label class="col-sm-5 col-form-label" for="gl_latitud"><i class="fas fa-map-marker-alt text-green"></i>Latitud</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="gl_latitud" name="gl_latitud" value="" readonly/>
                                                </div>
                                            </div>
                                            <!--    LONGITUD    -->
                                            <div class="form-group row col-md-6">
                                                <label class="col-sm-5 col-form-label" for="gl_longitud"><i class="fas fa-map-marker-alt text-green"></i>Longitud</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="gl_longitud" name="gl_longitud" value="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Products Block -->
                            <div class="container g-mt-30">
                                <div class="row">
                                    <div class="col align-self-end">
                                        <button type="button" class="btn btn-xl g-bg-pink g-mr-10 g-mb-15 text-white"
                                         style="float: right; margin-right: 15px" onclick="validarDatosUbicacion(this)">
                                            <i class="far fa-arrow-alt-circle-right g-mr-5"></i>
                                            <b>Siguiente</b>
                                        </button>
                                        <button type="button" class="btn btn-xl u-btn-darkgray g-mr-10 g-mb-15 prev-step text-white" style="float: right; margin-right: 15px">
                                            <i class="far fa-arrow-alt-circle-left g-mr-5"></i>
                                            <b>Anterior</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="g-bg-white tab-pane" role="tabpanel" id="step3">
                            <div class="col-md-12 g-mb-30" style="display: flex; padding-left: 0px;">
                                <div class="col-md-6">
                                    <span class="d-flex">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="d-flex justify-content-between">
                                                    <p class="m-0 mt-2 h5"><strong>VIDA DE IGLESIA</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-6" style="text-align: right;padding-top: 10px;padding-bottom: 20px !important;">
                                        <strong>
                                        <i class="fas fa-exclamation-triangle"></i> Datos Obligatorios
                                        </strong>
                                </div>
                            </div>
                            <div class="container g-mb-20">
                                <div class="row g-mb-20">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group {{ $errors->has('id_llegada_iglesia') ? 'has-error' : '' }}">
                                            <label for="id_llegada_iglesia" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">¿Cuándo llegó a la iglesia?</label>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <div id="radioBtn" class="btn-group">
                                                        @foreach($rangoLlegadaIglesia as $rango)
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="id_llegada_iglesia" data-title="{{ $rango->id_llegada_iglesia }}">
                                                        <b>{{ $rango->gl_nombre }}</b>
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                    <input type="hidden" name="id_llegada_iglesia" id="id_llegada_iglesia">
                                                </div>
                                            </div>
                                            {!! $errors->first('id_llegada_iglesia', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div> 

                                <div class="row g-mb-20">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group {{ $errors->has('bo_participa_ministerio') ? 'has-error' : '' }}">
                                            <label for="bo_participa_ministerio" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">¿Participa de algún minsiterio?</label>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="bo_participa_ministerio" data-title="1">
                                                        <b>SI</b>
                                                        </a>
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="bo_participa_ministerio" data-title="0">
                                                        <b>NO</b>
                                                        </a>
                                                    </div>
                                                    <input type="hidden" name="bo_participa_ministerio" id="bo_participa_ministerio">
                                                </div>
                                            </div>
                                            {!! $errors->first('bo_participa_ministerio', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12" id="contenedor_participa_ministerio" style="display: none;">
                                        <div class="form-group">
                                            <label for="gl_ministerio" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"> ¿Cuál?/¿Cuáles?</label>
                                            <div class="col-xs-12">
                                                <input type="text" name="gl_ministerio" id="gl_ministerio" class="form-control" value="" placeholder="¿Cuál?/¿Cuáles?">
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row g-mb-20">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group {{ $errors->has('id_tipo_participacion') ? 'has-error' : '' }}">
                                            <label for="id_tipo_participacion" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">¿Cómo ha participado de las reuniones?</label>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="id_tipo_participacion" data-title="1">
                                                        <b>Online y Presencial</b>
                                                        </a>
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="id_tipo_participacion" data-title="0">
                                                        <b>Solo Online</b>
                                                        </a>
                                                    </div>
                                                    <input type="hidden" name="id_tipo_participacion" id="id_tipo_participacion">
                                                </div>
                                            </div>
                                            {!! $errors->first('id_tipo_participacion', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                </div> 

                                <div class="row g-mb-20">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group {{ $errors->has('bo_vive_con_ninos') ? 'has-error' : '' }}">
                                            <label for="bo_vive_con_ninos" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">¿Vive con niños? (6-12 años)</label>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="bo_vive_con_ninos" data-title="1">
                                                        <b>SI</b>
                                                        </a>
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="bo_vive_con_ninos" data-title="0">
                                                        <b>NO</b>
                                                        </a>
                                                    </div>
                                                    <input type="hidden" name="bo_vive_con_ninos" id="bo_vive_con_ninos">
                                                </div>
                                            </div>
                                            {!! $errors->first('bo_vive_con_ninos', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12" id="contenedor_nr_vive_con_ninos" style="display: none;">
                                        <div class="form-group">
                                            <label for="nr_vive_con_ninos" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"> ¿Cuántos?</label>
                                            <div class="col-xs-12">
                                                <input type="number" min="0" name="nr_vive_con_ninos" id="nr_vive_con_ninos" class="form-control" value="" placeholder="¿Cuántos?">
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row g-mb-20">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group {{ $errors->has('bo_vive_con_adolescentes') ? 'has-error' : '' }}">
                                            <label for="bo_vive_con_adolescentes" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">¿Vive con Adolescentes? (12-17 años)</label>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="bo_vive_con_adolescentes" data-title="1">
                                                        <b>SI</b>
                                                        </a>
                                                        <a class="btn btn-md u-btn-inset u-btn-outline-primary text-back" style="width: 150px" data-toggle="bo_vive_con_adolescentes" data-title="0">
                                                        <b>NO</b>
                                                        </a>
                                                    </div>
                                                    <input type="hidden" name="bo_vive_con_adolescentes" id="bo_vive_con_adolescentes">
                                                </div>
                                            </div>
                                            {!! $errors->first('bo_vive_con_adolescentes', '<small class="help-block">:message</small>') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12" id="contenedor_nr_vive_con_adolescentes" style="display: none;">
                                        <div class="form-group">
                                            <label for="nr_vive_con_adolescentes" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"> ¿Cuántos?</label>
                                            <div class="col-xs-12">
                                                <input type="number" min="0" name="nr_vive_con_adolescentes" id="nr_vive_con_adolescentes" class="form-control" value="" placeholder="¿Cuántos?">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container g-mt-30">
                                    <div class="row">
                                        <div class="col align-self-end">
                                            <button type="button" class="btn btn-xl btn-success g-mr-10 g-mb-15 text-white"
                                             style="float: right; margin-right: 15px" onclick="validarDatosVidaDeIglesia(this)">
                                                <i class="fa fa-paper-plane g-mr-5"></i>
                                                <b>Finalizar</b>
                                            </button>
                                            <button type="button" class="btn btn-xl u-btn-darkgray g-mr-10 g-mb-15 prev-step text-white" style="float: right; margin-right: 15px">
                                                <i class="far fa-arrow-alt-circle-left g-mr-5"></i>
                                                <b>Anterior</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="g-bg-white tab-pane text-center" role="tabpanel" id="complete">
                            <div class="col-md-12 g-mb-30" style="padding-left: 0px;">
                                <a class="u-icon-v2 g-rounded-50x g-mb-20" href="javascript:void(0);">
                                  <i class="fas fa-check"></i>
                                </a>
                                <p class="m-0 mt-2 h2"><strong>¡Muchas Gracias!</strong>
                                </p>
                            </div>
                            <p class="h5">Gracias por participar de nuestra encuesta</p>
                            <div class="container g-mt-30">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <a href="{{ url('') }}" class="btn btn-xl btn-success g-mb-15 text-white">
                                            <i class="fas fa-home g-mr-5"></i>
                                            <b>Volver al inicio</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="container g-mt-10">
                                <div class="row">
                                    <div class="col align-self-center">
                                        <button type="button" class="btn btn-md g-mb-15 " style="color: #17a2b8;background: none;" onclick="location.reload();">
                                            <i class="fas fa-arrow-left"></i>
                                            <b>Ingresar Otra Encuesta</b>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row">
                        <label style="display: none !important;">Deja este campo vacío si eres humano: 
                            <input type="text" name="_uc_hpot" id="_uc_hpot" value="" tabindex="-1" autocomplete="off"/>
                        </label>

                        <div class="response"></div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>



<!---------------------------------------------------------------------------------------------------->

<style type="text/css">
    /*.form-group{
        min-width: 100% !important; 
        width: 100% !important;
    }
    .form-group>label{
        font-size: 12px;
    }
    .form-group>div>.form-control{
        font-size:15px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 0px;
    }*/
    .fa-exclamation-triangle {
        color:#f0ad4e;
    }
    label{
        font-weight: bold;
    }
    .form-control{
        font-size:15px;
        border: 1px solid #ccc;
        border-color: #ccc !important;
        box-sizing: border-box;
        border-radius: 0px;
        color: #2d2a2a !important
    }
    .btn{border-radius: 0;}
    .input-group div a{ white-space: unset;}
    @media( min-width : 991px ) {
        .contenedor-ubicacion{
            display: flex;
        }
    }
</style>

<script type="text/javascript">
    grecaptcha.ready(function() {
        getNewCaptcha();
    });

    function getNewCaptcha(){
        grecaptcha.execute('{{env("GOOGLE_RECAPTCHA_KEY")}}', {action: 'registro_encuesta'}).then(function(token) {
            $("#recap").val(token);
        });
    }
</script>
@endsection
               
            

            