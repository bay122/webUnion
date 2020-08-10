@extends('front.uc2.layout')

@section('title', 'Jóvenes - Registro')

@section('main')



<div class="container g-color-black text-center g-py-100 pb-0 ">
    <h3 class="h1 g-font-weight-600 text-uppercase mb-2">Registro</h3>
    <p class="g-font-weight-300 g-font-size-22 ">Jóvenes</p>
</div>

<section class="g-mb-50">
    <div class="col-md-10 col-sm-10 col-xs-10 alert alert-info text-center" style=" margin: 0; left: 50%; transform: translate(-50%, 0%);">
        <b>Sabemos lo importante que es mantenernos comunicados.<br/> 
            Por eso decidimos crear nuevos medios para mantenernos informados y brindar espacios para tener comunión entre nosotros. <br/>
            Para lograrlo, te pedimos que nos ayudes registrando tus datos para que podamos conocerte.<br/>
        </b>
        Tus datos estarán resguardados y solo serán utilizados con fines de comunicación.
    </div>        
</section>

<section class="g-mb-50">
    <div class="container g-mb-20">
        <strong>
            <br/>
            <i class="fas fa-exclamation-triangle"></i> Datos Obligatorios
        </strong>
    </div>
    <form id="form_registro_jovenes" method="post">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="recap" id="recap" value=""/>
        <input type="hidden" name="locale" value="es_ES"/>
        
        <div id="accordion-10" class="u-accordion container" role="tablist" aria-multiselectable="true">
            <!-- Card -->
            <div class="card rounded-0" style="border: none;">
                <div id="accordion-10-heading-03" class="u-accordion__header g-px-0 g-py-5 " role="tab">
                    <h5 class="g-bg-secondary g-font-weight-600 g-font-size-16 mb-0 px-5">
                        <a class="d-flex justify-content-between g-color-main g-text-underline--none--hover g-brd-bottom g-brd-gray-light-v4 g-pa-15-0" href="#accordion-10-body-01" data-toggle="collapse" data-parent="#accordion-10" aria-expanded="true" aria-controls="accordion-10-body-03">
                            <span class="d-flex">
                                <div class="media">
                                    <div class="d-flex g-mr-10">
                                        <span class="u-icon-v3 u-icon-size--sm g-bg-teal g-color-white g-rounded-50x">
                                            <i class="far fa-user"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="m-0 mt-2 h5"><strong>DATOS PERSONALES</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="u-accordion__control-icon g-ml-10">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                    </h5>
                </div>
                <div id="accordion-10-body-01" class="collapse show" role="tabpanel" aria-labelledby="accordion-10-heading-03" data-parent="#accordion-10">
                    <div class="u-accordion__body g-color-gray-dark-v5 g-px-25 g-py-5">

                        <!-- Products Block -->
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
                                    <label for="fc_nacimiento" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span> Fecha de nacimiento</label>
                                    <div class="col-xs-12">
                                        <input type="date" class="form-control"id="fc_nacimiento" name="fc_nacimiento"
                                         value="" placeholder="dd/mm/aaaa">
                                    </div>
                                    {!! $errors->first('fc_nacimiento', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <!-- End Products Block -->

                    </div>
                </div>
            </div>
            <!-- End Card -->


            <!-- Card -->
            <div class="card rounded-0" style="border: none;">
                <div id="accordion-10-heading-03" class="u-accordion__header g-px-0 g-py-5 " role="tab">
                    <h5 class="g-bg-secondary g-font-weight-600 g-font-size-16 mb-0 px-5">
                        <a class="d-flex justify-content-between g-color-main g-text-underline--none--hover g-brd-bottom g-brd-gray-light-v4 g-pa-15-0" href="#accordion-10-body-02" data-toggle="collapse" data-parent="#accordion-10" aria-expanded="true" aria-controls="accordion-10-body-03">
                            <span class="d-flex">
                                <div class="media">
                                    <div class="d-flex g-mr-10">
                                        <span class="u-icon-v3 u-icon-size--sm g-bg-lightred g-color-white g-rounded-50x">
                                            <i class="far fa-address-book"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="m-0 mt-2 h5"><strong>DATOS DE CONTACTO</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <span class="u-accordion__control-icon g-ml-10">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                    </h5>
                </div>
                <div id="accordion-10-body-02" class="collapse show" role="tabpanel" aria-labelledby="accordion-10-heading-03" data-parent="#accordion-10">
                    <div class="u-accordion__body g-color-gray-dark-v5 g-px-25 g-py-5">

                        <!-- Products Block -->
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('nr_telefono') ? 'has-error' : '' }}">
                                    <label for="nr_telefono" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span> Celular</label>
                                    <div class="col-xs-12">
                                        <input type="string" name="nr_telefono" id="nr_telefono" class="form-control" value="" placeholder="991919191">
                                    </div>
                                    {!! $errors->first('nr_telefono', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group  {{ $errors->has('gl_email') ? 'has-error' : ''}}">
                                    <label for="gl_email" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span> Email</label>
                                    <div class="col-xs-12">
                                        <input type="email" name="gl_email" id="gl_email" class="form-control validado" value="" placeholder="ejemplo@ejemplo.com" onblur="validaEmail(this,'E-mail ingresado no es valido')">
                                    </div>
                                    {!! $errors->first('gl_email', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('comuna') ? 'has-error' : '' }}">
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
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('gl_ciudad') ? 'has-error' : '' }}">
                                    <label for="gl_ciudad" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Nombre Ciudad</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="gl_ciudad" id="gl_ciudad" class="form-control" value="" placeholder="Nombre Ciudad">
                                    </div>
                                    {!! $errors->first('gl_ciudad', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('gl_calle') ? 'has-error' : '' }}">
                                    <label for="gl_calle" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Calle</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="gl_calle" id="gl_calle" class="form-control" value="" placeholder="Nombre Calle">
                                    </div>
                                    {!! $errors->first('gl_calle', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group  {{ $errors->has('nr_calle') ? 'has-error' : ''}}">
                                    <label for="nr_calle" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Número de calle</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="nr_calle" id="nr_calle" class="form-control validado" value="" placeholder="Número de Calle">
                                    </div>
                                    {!! $errors->first('nr_calle', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <!-- End Products Block -->

                    </div>
                </div>
            </div>
            <!-- End Card -->


            <div class="row">
                <label style="display: none !important;">Deja este campo vacío si eres humano: 
                    <input type="text" name="_uc_hpot" id="_uc_hpot" value="" tabindex="-1" autocomplete="off"/>
                </label>

                <div class="response"></div>
            </div>

        </div>
        
        <div class="container g-mb-20">
            <div class="container">
              <div class="row">
                <div class="col align-self-end">
                 <button type="button" class="btn btn-success text-mid-white" onclick="submitValidation(this)" style="float: right; margin-right: 15px">
                    <i class="fa fa-paper-plane" style="margin-left: 0" aria-hidden="true"></i> 
                    Envíar
                </button>
                </div>
              </div>
            </div>
        </div> 
    </form>
</section>
<!-- End Accordion v9 -->

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
</style>

<script type="text/javascript">
    grecaptcha.ready(function() {
        getNewCaptcha();
    });

    function getNewCaptcha(){
        grecaptcha.execute('{{env("GOOGLE_RECAPTCHA_KEY")}}', {action: 'registro_jovenes'}).then(function(token) {
            $("#recap").val(token);
        });
    }
</script>
@endsection
               
            

            