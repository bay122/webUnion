@extends('front.uc2.layout')

@section('title', 'Jóvenes - Registro')

@section('main')



<div class="container g-color-black text-center g-py-100 pb-0 ">
    <h3 class="h1 g-font-weight-600 text-uppercase mb-2">Encuesta</h3>
    <p class="g-font-weight-300 g-font-size-22 ">Jóvenes</p>
</div>

<section class="g-mb-50">
    <div class="col-md-10 col-sm-10 col-xs-10 alert alert-info text-center" style=" margin: 0; left: 50%; transform: translate(-50%, 0%);">
        <b>Querido, la razon por la cual les pedimos que puedan rellenar esta encuesta,<br/> 
        es para tener información sobre ustedes durante este verano <br/>
        y saber cuales serían las mejores condiciones para poder reunirnos de forma presencial  y segura durante la pandemia.<br/>
        </b>
    </div>        
</section>

<section class="g-mb-50">
    <div id="msj_registro_jovenes" class="col-md-10 col-sm-10 col-xs-10 alert alert-warning text-center" style=" margin: 0; left: 50%; transform: translate(-50%, 0%); display:none">
        <b>Querido, para poder continuar con la encuesta es necesario que estes registrado en nuestra base de datos de jovenes.<br/> 
        Te invitamos a hacerlo, no tomara mucho tiempo.<br/>
        <a href="https://desarrollo.unioncristiana.cl/jovenes/registro">Haz click aqui para ir al registro de jovenes</a>
        </b>
    </div>        
</section>

<section class="g-mb-50">
    <div class="container g-mb-20" id="icon_datos_obligatorios">
        <strong>
            <br/>
            <i class="fas fa-exclamation-triangle"></i> Datos Obligatorios
        </strong>
    </div>

    <form id="form_encuesta_rut" method="post">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="recap" id="recap" value=""/>
        <input type="hidden" name="locale" value="es_ES"/>
            <div class="container">
                <!-- Products Block -->
                <div class="row">                
                <div class="col-sm-6 col-md-12 col-xs-12">
                        <div class="form-group {{ $errors->has('gl_rut') ? 'has-error' : '' }}">
                            <label for="gl_rut" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15">Rut</label>
                            <div class="col-xs-12">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" id="gl_rut" name="gl_rut" value="" maxlength="12"
                                onkeyup="formateaRut(this), this.value = this.value.toUpperCase()" onkeypress ="return soloNumerosYK(event)"
                                onblur="ValidaRut(this)"  placeholder="Rut"/>
                                <p style="margin: 0 0 0 8px;color: green;font-weight: 400;font-size: 10px;">Este dato nos sirve para no confundirte con otra persona</p>
                            </div>
                            {!! $errors->first('gl_rut', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                </div>
            </div>
        <div class="container g-mb-20">
            <div class="container">
              <div class="row">
                <div class="col align-self-end">
                 <button type="button" class="btn btn-success text-mid-white" onclick="checkRut(this)" style="float: right; margin-right: 15px">
                    <i class="fa fa-paper-plane" style="margin-left: 0" aria-hidden="true"></i> 
                    Continuar
                </button>
                </div>
              </div>
            </div>
        </div> 
    </form>
    <form id="form_encuesta_jovenes" method="post" style="display:none">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="recap" id="recap" value=""/>
        <input type="hidden" name="locale" value="es_ES"/>
        
        
            <!-- Card -->               
                    
            <div class="container">
                        <!-- Products Block -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_ciudad_verano" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>1. ¿En que ciudad te encontraras durante el verano? </label>
                                    <textarea class="form-control" id="gl_ciudad_verano" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_participarias" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>2. ¿Participarías de actividades presenciales con todos los cuidados y reglas sanitarias? explícanos tu respuesta. </label>
                                    <textarea class="form-control" id="gl_participarias" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_ciudades" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>3. Durante los meses de Enero y Febrero, ¿En qué ciudad podrías juntarte? Puedes seleccionar mas de una opcion</label>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gl_ciudad1" value="valparaiso">
                                    <label class="form-check-label" for="inlineCheckbox1">Valparaiso</label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gl_ciudad2" value="vina del mar">
                                    <label class="form-check-label" for="inlineCheckbox2">Viña del Mar</label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gl_ciudad3" value="quilpue">
                                    <label class="form-check-label" for="inlineCheckbox3">Quilpue</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_dias" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>4. En caso que hiciéramos una actividad presencial ¿qué días podrías ir?  Puedes seleccionar mas de una opcion</label>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gl_dia_actividad1" value="lunes-jueves">
                                    <label class="form-check-label" for="gl_dia1">Entre lunes y jueves por la tarde</label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gl_dia_actividad2" value="sabado">
                                    <label class="form-check-label" for="inlineCheckbox2">Sábado por la mañana</label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gl_dia_actividad3" value="domingo">
                                    <label class="form-check-label" for="inlineCheckbox3">Domingo por la tarde</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_fin_semestre" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>5. ¿Cuándo terminas el semestre/año 2020 de universidad/instituto? o ¿cuándo tomarás vacaciones?</label>
                                    <textarea class="form-control" id="gl_fin_semestre" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_tematica_clubs" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>6. En relación a Club H y Club M, ¿qué temáticas generales o relacionado a la mujer o hombre te gustaría que se aborden el próximo año?</label>
                                    <textarea class="form-control" id="gl_tematica_clubs" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_retiro" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>7. ¿Participarías de un “retiro” por zoom?</label>
                                    <textarea class="form-control" id="gl_retiro" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_nombres" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>8. ¿Qué fecha podrías participar del “retiro” por zoom?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gl_dia_retiro1" value="marzo-abril">
                                        <label class="form-check-label" for="inlineCheckbox1">Entre Marzo y Abril</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gl_dia_retiro2" value="octubre-noviembre">
                                        <label class="form-check-label" for="inlineCheckbox2">Entre Octubre y Noviembre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_seminario" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>9. ¿Participarías de un seminario por zoom?</label>
                                    <textarea class="form-control" id="gl_seminario" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_nombres" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>10. ¿Qué fecha podrías participar del seminario por zoom?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gl_dia_seminario1" value="marzo-abril">
                                        <label class="form-check-label" for="inlineCheckbox1">Entre Marzo y Abril</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gl_dia_seminario2" value="octubre-noviembre">
                                        <label class="form-check-label" for="inlineCheckbox2">Entre Octubre y Noviembre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="gl_actividades" class="col-xs-12 g-color-gray-dark-v2 g-font-size-15"><span class="fas fa-exclamation-triangle"></span>11. ¿Qué actividades (considerando que estamos en época de pandemia) te gustaría que se realizara? </label>
                                    <textarea class="form-control" id="gl_actividades" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- End Products Block -->
            </div>
                    
                
            
            <!-- End Card -->


           

        
        
        <div class="container g-mb-20">
            <div class="container">
              <div class="row">
                <div class="col align-self-end">
                 <button type="button" class="btn btn-success text-mid-white" onclick="submitValidation2(this)" style="float: right; margin-right: 15px">
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
    var gl_rut = null;
    function checkRut(){
        gl_rut = document.getElementById("gl_rut").value;
        var data = document.getElementById("gl_rut").value;
        $.ajax({
            url: 'https://desarrollo.unioncristiana.cl/jovenes/checkRut',
            type: 'post',
            data: {'rut':data,"_token": $('#token').val()},
            datatype: 'JSON',
            beforeSend: function() {},
            success: function(resp) {
                console.log(resp)
                if(resp == 1){ 
                    $('#form_encuesta_rut').css('display', 'none');
                    $('#form_encuesta_jovenes').css('display', 'block');
                    
                }else{                    
                    $('#msj_registro_jovenes').css('display', 'block');
                    $('#icon_datos_obligatorios').css('display', 'none');
                    $('#form_encuesta_rut').css('display', 'none');
                }
            }
        });
    }

    grecaptcha.ready(function() {
        getNewCaptcha();
    });

    function getNewCaptcha(){
        grecaptcha.execute('{{env("GOOGLE_RECAPTCHA_KEY")}}', {action: 'registro_jovenes'}).then(function(token) {
            $("#recap").val(token);
        });
    }
    function submitValidation2(btn){ 
        //var button_process	= buttonStartProcess($(this), e);
        var btnText = $(btn).prop('disbaled',true).html();
        $(btn).html('Guardando... <i class="fa fa-spin fa-spinner"></i>');

        var msg_error = "";
        if($("#gl_ciudad_verano").val() == ''){
            msg_error += "- Debes responder la pregunta 1<br/>";
        } 
        if($("#gl_participarias").val() == ''){
            msg_error += "- Debes responder la pregunta 2<br/>";
        }            
        if(!( $('#gl_ciudad1').prop('checked') || $('#gl_ciudad2').prop('checked') || $('#gl_ciudad3').prop('checked'))) {
            msg_error += "- Debes seleccionar al menos una opcion de la pregunta 3<br/>";
        }
        if(!( $('#gl_dia_actividad1').prop('checked') || $('#gl_dia_actividad2').prop('checked') || $('#gl_dia_actividad3').prop('checked'))) {
            msg_error += "- Debes seleccionar al menos una opcion de la pregunta 4<br/>";
        }
        if($("#gl_fin_semestre").val() == ''){
            msg_error += "- Debes responder la pregunta 5<br/>";
        }
        if($("#gl_tematica_clubs").val() == ''){
            msg_error += "- Debes responder la pregunta 6<br/>";
        }
        if($("#gl_retiro").val() == ''){
            msg_error += "- Debes responder la pregunta 7<br/>";
        }
        if(!( $('#gl_dia_retiro1').prop('checked') || $('#gl_dia_retiro2').prop('checked'))) {
            msg_error += "- Debes seleccionar al menos una opcion de la pregunta 8<br/>";
        }
        if($("#gl_seminario").val() == ''){
            msg_error += "- Debes responder la pregunta 9<br/>";
        }
        if(!( $('#gl_dia_seminario1').prop('checked') || $('#gl_dia_seminario2').prop('checked'))) {
            msg_error += "- Debes seleccionar al menos una opcion de la pregunta 10<br/>";
        }
        if($("#gl_actividades").val() == ''){
            msg_error += "- Debes responder la pregunta 11<br/>";
        }
        if(msg_error != ""){
            //xModal.danger(mensaje_error,function(){buttonEndProcess(button_process);});
            xModal.warning(msg_error, function(){
                //buttonEndProcess(button_process);
                $(btn).prop('disabled', false).html(btnText);
            });
        }else{
            var data = {
                gl_rut              : gl_rut,
                gl_ciudad_verano    : $("#gl_ciudad_verano").val(),
                gl_participarias    : $("#gl_participarias").val(),
                gl_ciudad           : $('#gl_ciudad1').val() + ' ' +$('#gl_ciudad2').val() + ' ' +$('#gl_ciudad3').val(),
                gl_dia_actividad    : $('#gl_dia_actividad1').val() + ' ' +$('#gl_dia_actividad2').val() + ' ' +$('#gl_dia_actividad3').val(),
                gl_fin_semestre     : $("#gl_fin_semestre").val(),
                gl_tematica_clubs   : $("#gl_tematica_clubs").val(),
                gl_retiro           : $("#gl_retiro").val(),
                gl_dia_retiro       : $('#gl_dia_retiro1').val() + ' ' +$('#gl_dia_retiro2').val(),
                gl_seminario        : $("#gl_seminario").val(),
                gl_dia_seminario    : $('#gl_dia_seminario1').val() + ' ' +$('#gl_dia_seminario2').val(),
                gl_actividades      : $("#gl_actividades").val()
            }
            $.ajax({
                url : 'https://desarrollo.unioncristiana.cl/jovenes/registrarNuevaEncuesta',
                data : data,
                type : 'POST',
                dataType : 'JSON',
                success : function(response){
                    $(btn).prop('disabled', false).html(btnText);
                    if(response.correcto){
                        xModal.success(response.msj, function(){
                            location.reload();
                        });
                    }
                    else{
                        xModal.warning(response.msj, function(){
                            //buttonEndProcess(button_process);
                            $(btn).prop('disabled', false).html(btnText);
                            getNewCaptcha();
                        });
                    }
                }, 
                error : function(err){
                   /*  $(btn).prop('disabled', false).html(btnText);
                    getNewCaptcha();
                    xModal.danger('Error: Intente nuevamente',function(err){
                        console.log(err)
                    }); */
                }
            });
        }
        console.log(data)
        /* 
        } */
    }
</script>
@endsection
               
            

            