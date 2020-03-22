@extends('front.layout')

@section('title', 'Recursos')

@section('main')

<style type="text/css">
    .form-group{
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
    }
    .fa-warning {
        color:#f0ad4e;
    }

    .form-container{
        /*border-bottom: 3px solid #f9edc8;*/
    }
</style>

<div class="page type-page status-publish has-post-thumbnail hentry">
    <section class="page-title-small border-bottom-mid-gray border-top-mid-gray blog-single-page-background bg-gray">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center"><span class="text-extra-small text-uppercase alt-font right-separator blog-single-page-meta">Jóvenes</span>
                <h2 class="title-small position-reletive font-weight-700 text-uppercase text-mid-gray blog-headline right-separator entry-title blog-single-page-title no-margin-bottom">Registro</h2>
            </div>
        </div>
    </section>

    <section class="margin-three">
        <div class="col-md-10 col-sm-10 col-xs-10 alert alert-info text-center" style=" margin: 0; left: 50%; transform: translate(-50%, 0%);">
            <b>Sabemos lo importante que es mantenernos comunicados.<br/> 
                Por eso decidimos crear nuevos medios para mantenernos informados y brindar espacios para tener comunión entre nosotros. <br/>
                Para lograrlo, te pedimos que nos ayudes registrando tus datos para que podamos conocerte.<br/>
            </b>
            Tus datos estarán resguardados y solo serán utilizados con fines de comunicación.
        </div>    
    </section>

    <section class="margin-three no-margin-lr">
        <div class="container">
            <form id="form_registro_jovenes" method="post">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <input type="hidden" name="recap" id="recap" value=""/>
                <input type="hidden" name="locale" value="es_ES"/>
                <div class="row padding-left-15 sm-padding-l-40">
                    <strong>
                        <br/>
                        <span class="fa fa-warning"></span> Datos Obligatorios
                    </strong>
                </div>
                <div class="row">
                    <div class="widget col-xs-12 margin-four-top" >
                        <h5 class="widget-title font-weight-600 text-mid-gray text-uppercase title-border-right no-background">
                            <span>Datos de personales:</span>
                        </h5>
                    </div>
                    
                    <div class="form-container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_nombres" class="col-xs-12"><span class="fa fa-warning"></span> Nombre(s)</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="gl_nombres" id="gl_nombres" class="form-control" value="" placeholder="Nombres">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_apellidos" class="col-xs-12"><span class="fa fa-warning"></span> Apellido(s)</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="gl_apellidos" id="gl_apellidos" class="form-control" value="" placeholder="Apellidos">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('gl_rut') ? 'has-error' : '' }}">
                                    <label for="gl_rut" class="col-xs-12">Rut</label>

                                    <div class="col-xs-12">
                                        <input type="text" class="form-control" id="gl_rut" name="gl_rut" value="" maxlength="12"
                                        onkeyup="formateaRut(this), this.value = this.value.toUpperCase()" onkeypress ="return soloNumerosYK(event)"
                                        onblur="ValidaRut(this)"  placeholder="Rut"/>
                                        <p style="margin: -20px 0 0 8px;color: green;font-weight: 400;font-size: 10px;">Este dato nos sirve para no confundirte con otra persona</p>
                                    </div>
                                    {!! $errors->first('gl_rut', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('fc_nacimiento') ? 'has-error' : '' }}">
                                    <label for="fc_nacimiento" class="col-xs-12"><span class="fa fa-warning"></span> Fecha de nacimiento</label>
                                    <div class="col-xs-12">
                                        <input type="date" class="form-control"id="fc_nacimiento" name="fc_nacimiento"
                                         value="" placeholder="dd/mm/aaaa">
                                    </div>
                                    {!! $errors->first('fc_nacimiento', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="widget col-xs-12  margin-two-top" >
                        <h5 class="widget-title font-weight-600 text-mid-gray text-uppercase title-border-right no-background">
                            <span>Datos de contacto:</span>
                        </h5>
                    </div>

                    <div class="form-container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{ $errors->has('nr_telefono') ? 'has-error' : '' }}">
                                    <label for="nr_telefono" class="col-xs-12"><span class="fa fa-warning"></span> Celular</label>
                                    <div class="col-xs-12">
                                        <input type="string" name="nr_telefono" id="nr_telefono" class="form-control" value="" placeholder="991919191">
                                    </div>
                                    {!! $errors->first('nr_telefono', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group  {{ $errors->has('gl_email') ? 'has-error' : ''}}">
                                    <label for="gl_email" class="col-xs-12"><span class="fa fa-warning"></span> Email</label>
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
                                    <label for="region" class="col-xs-12">Región</label>
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
                                    <label for="comuna" class="col-xs-12">Comuna</label>
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
                                    <label for="gl_ciudad" class="col-xs-12">Nombre Ciudad</label>
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
                                    <label for="gl_calle" class="col-xs-12">Calle</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="gl_calle" id="gl_calle" class="form-control" value="" placeholder="Nombre Calle">
                                    </div>
                                    {!! $errors->first('gl_calle', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group  {{ $errors->has('nr_calle') ? 'has-error' : ''}}">
                                    <label for="nr_calle" class="col-xs-12">Número de calle</label>
                                    <div class="col-xs-12">
                                        <input type="text" name="nr_calle" id="nr_calle" class="form-control validado" value="" placeholder="Número de Calle">
                                    </div>
                                    {!! $errors->first('nr_calle', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <label style="display: none !important;">Deja este campo vacío si eres humano: 
                        <input type="text" name="_uc_hpot" id="_uc_hpot" value="" tabindex="-1" autocomplete="off"/>
                    </label>

                    <div class="response"></div>
                </div>
            </form>

            <div class="form-control">
                <button type="button" class="btn btn-success fl-right text-mid-white" onclick="submit(this)">
                    <i class="fa fa-paper-plane" style="margin-left: 0" aria-hidden="true"></i> 
                    Envíar
                </button>
            </div>
        </div>  
    </section>
</div>

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

