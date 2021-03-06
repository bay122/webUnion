var baseURL = document.location.origin;

$(document).ready(function (){
	console.log("integrantes_index");

    check_discipulado_previo();
    check_iglesia_anterior();
    check_sin_mail();

    $("#bo_discipulado_previo").change((val)=>{
        check_discipulado_previo();
    });
    $("#bo_iglesia_anterior").change((val)=>{
        check_iglesia_anterior();
    });

    $("#bo_sin_mail").change((val)=>{
        check_sin_mail();
    });

	//Datemask dd/mm/yyyy
    //$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    
    //Date picker
    $('#fc_nacimiento').datepicker().on('changeDate', function(e){validar_edad();});
    $("#edad").change((val)=>{validar_input_edad();});

	//$('#fc_llegada_iglesia').datepicker();
	
	if($("#email").val()){
		buscarUsuario();
	}

	$("div[for='box_form']").remove();

    /*
    //Timepicker
    /*$('.timepicker').timepicker({
      showInputs: false
    });

    $("#fc_nacimiento").livequery(function(){
        $(this).datetimepicker({
            format: "DD/MM/YYYY",
            widgetPositioning: {
                vertical: 'bottom'
            },
            locale: "es"
        });

    });
    $("#hora_revision").livequery(function(){
        var dateNow = new Date();
        $(this).datetimepicker({
            defaultDate:dateNow,
            format: "LT",
            widgetPositioning: {
                vertical: 'bottom'
            },
            locale: "es"
        });
    });*/

    $( "#exportar" ).on( "click", function() {
        $.ajax({
            url : baseURL + "/admin/discipulado/asistentes/exportarExcel",
            data : {id_grupo: $(this).val()},
            type : 'POST',
            dataType : 'JSON',
            success : function(response){
                if(response.correcto){
                    var blob = new Blob(["\ufeff",response.excel], { encoding:'UTF-8',type: 'application/vnd.ms-excel;chartset=utf-8' });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = response.nombre;
                    link.click();
                }else{
                    xModal.danger('Error: No se ha podido generar el Excel.');
                }
            }, 
            error : function(err){
                    xModal.danger('Error: Intente nuevamente',function(err){
                        console.log(err)
                    });
            }
        });
    });
});

function check_discipulado_previo(){
    if($('#bo_discipulado_previo').is(':checked')){
        $("#contenedor_discipulador_anterior").fadeIn("fast");
    }else{
        $("#contenedor_discipulador_anterior").fadeOut("fast");
    }
}
function check_iglesia_anterior(){
    if($('#bo_iglesia_anterior').is(':checked')){
        $("#contenedor_nombre_otra_iglesia").fadeIn("fast");
    }else{
        $("#contenedor_nombre_otra_iglesia").fadeOut("fast");
    }
}
function check_sin_mail(){
    if($('#bo_sin_mail').is(':checked')){
        $("#contenedor_email").fadeOut("fast");
    }else{
        $("#contenedor_email").fadeIn("fast");
        $("#email").val("");
    }
}


function validar_edad(){
	var warn = false;
	var msg_warn = '';

    if($("#edad").val() != ''){
        $("label[for='edad'] i").remove();
        $("div[for='edad']").removeClass("has-warning");
        $("div[for='edad'] span").remove();
    }

    if($("#fc_nacimiento").val() != ''){
        var fecha_ingresada =  moment($("#fc_nacimiento").val(), 'DD/MM/YYYY');
        var edad = moment().diff(fecha_ingresada, 'years');

        var nr_edad_minima = parseInt($("#nr_edad_minima").val());
        var nr_edad_maxima = parseInt($("#nr_edad_maxima").val());

        if(edad<nr_edad_minima){
        	warn = true;
            msg_warn += '<b>Advertencia:</b> No cumple con la edad <b>mínima</b> para un discipulado <br/>de <b>'+$("#gl_tipo_grupo_formacion").val()+'</b>.<br/>';
            msg_warn +=' (Rango etareo: desde <b>'+$("#nr_edad_minima").val()+'</b> hasta <b>'+$("#nr_edad_maxima").val()+'</b>)';
        }
        if(edad>nr_edad_maxima){
        	warn = true;
        	msg_warn += '<b>Advertencia:</b> Supera la edad <b>máxima</b> para un discipulado <br/>de <b>'+$("#gl_tipo_grupo_formacion").val()+'</b>.<br/>';
            msg_warn +=' (Rango etareo: desde <b>'+$("#nr_edad_minima").val()+'</b> hasta <b>'+$("#nr_edad_maxima").val()+'</b>)';
        }
    }

    if(warn){
    	if($("label[for='fc_nacimiento'] i").length == 0){
	    	$("label[for='fc_nacimiento']").prepend( '<i class="fa fa-bell-o"></i>');
	    	$("div[for='fc_nacimiento']").addClass("has-warning");
	    	$("div[for='fc_nacimiento']").append( '<span for="fc_nacimiento" class="help-block">'+msg_warn+'</span>');
    	}
    }else{
    	$("label[for='fc_nacimiento'] i").remove();
    	$("div[for='fc_nacimiento']").removeClass("has-warning");
    	$("div[for='fc_nacimiento'] span").remove();
    }
}

function validar_input_edad(){
    var warn = false;
    var msg_warn = '';

    if($("#fc_nacimiento").val() != ''){
        $("#fc_nacimiento").val("");
        $("label[for='fc_nacimiento'] i").remove();
        $("div[for='fc_nacimiento']").removeClass("has-warning");
        $("div[for='fc_nacimiento'] span").remove();
    }
    var edad = $("#edad").val();
    var nr_edad_minima = parseInt($("#nr_edad_minima").val());
    var nr_edad_maxima = parseInt($("#nr_edad_maxima").val());

    if($("#edad").val() != ''){
        if(edad<nr_edad_minima){
            warn = true;
            msg_warn += '<b>Advertencia:</b> No cumple con la edad <b>mínima</b> para un discipulado <br/>de <b>'+$("#gl_tipo_grupo_formacion").val()+'</b>.<br/>';
            msg_warn +=' (Rango etareo: desde <b>'+$("#nr_edad_minima").val()+'</b> hasta <b>'+$("#nr_edad_maxima").val()+'</b>)';
        }
        if(edad>nr_edad_maxima){
            warn = true;
            msg_warn += '<b>Advertencia:</b> Supera la edad <b>máxima</b> para un discipulado <br/>de <b>'+$("#gl_tipo_grupo_formacion").val()+'</b>.<br/>';
            msg_warn +=' (Rango etareo: desde <b>'+$("#nr_edad_minima").val()+'</b> hasta <b>'+$("#nr_edad_maxima").val()+'</b>)';
        }
    }

    if(warn){
        if($("label[for='edad'] i").length == 0){
            $("label[for='edad']").prepend( '<i class="fa fa-bell-o"></i>');
            $("div[for='edad']").addClass("has-warning");
            $("div[for='edad']").append( '<span for="edad" class="help-block">'+msg_warn+'</span>');
        }
    }else{
        $("label[for='edad'] i").remove();
        $("div[for='edad']").removeClass("has-warning");
        $("div[for='edad'] span").remove();
    }
    
}

$("#email").on('change', function (e) {
    $("#id_usuario").val("");
    buscarUsuario();
});

function buscarUsuario(){
	if(validarEmail($("#email").val()))
	{
		$("#box_form").append('<div for="box_form" class="overlay"><i class="fa fa-refresh fa-spin"></i><div>');
	    $.ajax({
            url : baseURL + "/admin/discipulado/asistentes/buscar",
            data : {email: $("#email").val()},
            type : 'POST',
            dataType : 'JSON',
            success : function(response){
                console.log(response);
                if(response.result == true){
                    if(response.usuario != null){
                        cargarDatosUsuario(response.usuario);
                        xModal.success("Cargando datos de usuario...");
                    }
	    			//$("#datos_usuario").show();
	    			$("div[for='box_form']").remove();
                }else{
                    xModal.danger("ERROR: "+response.mensaje);
                    $("div[for='box_form']").remove();
                }
            },
            error : function(){
                xModal.danger('Error: ocurrió un error inesperado, si el error persiste, contactese con soporte.');
                $("div[for='box_form']").remove();
            }
        });
	}
	else
	{
	    //$("#datos_usuario").hide();
	    xModal.danger("ERROR: El email es incorrecto.");
	}
}

function cargarDatosUsuario(datos_usuario){
    $("#id_usuario").val(datos_usuario.id_usuario);
    
    $("#email").val(datos_usuario.email);
    if(datos_usuario.rut)
    	$("#rut").val(datos_usuario.rut);
    if(datos_usuario.nombres)
    	$("#nombres").val(datos_usuario.nombres);
    if(datos_usuario.apellido_paterno)
    	$("#apellido_paterno").val(datos_usuario.apellido_paterno);
    if(datos_usuario.apellido_materno)
    	$("#apellido_materno").val(datos_usuario.apellido_materno);
    if(datos_usuario.gl_sexo)
    	$("#gl_sexo").val(datos_usuario.gl_sexo);
    if(datos_usuario.fc_nacimiento)
    	var fc_nacimiento = moment(datos_usuario.fc_nacimiento.date).format('DD/MM/YYYY');
    	$("#fc_nacimiento").datepicker('update',fc_nacimiento);
    if(datos_usuario.nr_edad)
        $("#edad").val(datos_usuario.nr_edad);
    if(datos_usuario.fc_llegada_iglesia)
    	var fc_llegada_iglesia = moment(datos_usuario.fc_llegada_iglesia.date).format('DD/MM/YYYY');
    	$("#fc_llegada_iglesia").datepicker('update',fc_llegada_iglesia);
    if(datos_usuario.region)
    	$("#region").val(datos_usuario.region);
    if(datos_usuario.comuna)
    	$("#comuna").val(datos_usuario.comuna);
    if(datos_usuario.pais_origen)
    	$("#pais_origen").val(datos_usuario.pais_origen);
    if(datos_usuario.nacionalidad)
    	$("#nacionalidad").val(datos_usuario.nacionalidad);
    if(datos_usuario.gl_observaciones)
        $("#gl_observaciones").val(datos_usuario.gl_observaciones);

    if(datos_usuario.telefono != null){
        var telefono = JSON.parse(datos_usuario.telefono);
        $("#telefono").val(telefono[0]["gl_telefono"]);
    }
    if(datos_usuario.direccion != null){
        var direccion = JSON.parse(datos_usuario.direccion);
        $("#direccion").val(direccion[0]["gl_direccion"]);
    }
}

function submit(btn){
	//var button_process	= buttonStartProcess($(this), e);
    var btnText = $(btn).prop('disbaled',true).html();
    $(btn).html('Guardando... <i class="fa fa-spin fa-spinner"></i>');

    var msg_error = "";

    if($("#nombres").val() == ''){
        msg_error += "- Debe ingresar el/los nombre/s.<br/>";
    }
    if($("#apellido_paterno").val() == ''){
        msg_error += "- Debe ingresar el apellido paterno.<br/>";
    }
    if(($("#email").val() == '') && (!$('#bo_sin_mail').is(':checked'))){
        msg_error += "- Debe ingresar el mail.<br/>";
    }

    if($("#gl_sexo").val() == ''){
        msg_error += "- Debe ingresar el sexo.<br/>";
    }

    //$("#id_usuario").val();
    //$("#id_grupo_formacion").val();
    //$("#bo_moderador").val();
    //$("#datos_usuario").val();
    //$("#apellido_materno").val();
    //$("#direccion").val();
    //$("#telefono").val();
    //$("#ministerio").val();
    //$("#region").val();
    //$("#comuna").val();
    //$("#pais_origen").val();
    //$("#nacionalidad").val();

    console.warn("@TODO: validar rut en submit");
    //$("#rut").val();
    
    if($("#fc_nacimiento").val() != ''){
        var fecha_ingresada =  moment($("#fc_nacimiento").val(), 'DD/MM/YYYY');
        var fecha_actual = moment();
        if(fecha_ingresada.isAfter(fecha_actual)){
            msg_error += '- La Fecha de nacimiento ingresada no puede ser mayor a la fecha actual.<br/>';
        }
    }

    if($("#fc_llegada_iglesia").val() != ''){
        var fecha_ingresada =  moment($("#fc_llegada_iglesia"), 'DD/MM/YYYY');
        var fecha_actual = moment();
        if(fecha_ingresada.isAfter(fecha_actual)){
            msg_error += '- La Fecha de llegada a la iglesia ingresada no puede ser mayor a la fecha actual.<br/>';
        }
        
    }

    if(msg_error != ""){
    	//xModal.danger(mensaje_error,function(){buttonEndProcess(button_process);});
        xModal.warning(msg_error, function(){
        	//buttonEndProcess(button_process);
            $(btn).prop('disabled', false).html(btnText);
        });
    }else{
        console.log("SUBMIT")
        if($('#bo_sin_mail').is(':checked')){
            var nombre = $("#nombres").val().replace(/\s/g, '');
            var apellido_paterno = $("#apellido_paterno").val().replace(/\s/g, '');
            var apellido_materno = $("#apellido_materno").val().replace(/\s/g, '');
            var random = Date.now();
            var sin_mail = nombre+apellido_paterno+apellido_materno+random+'@sinmail.com';
            $("#email").val(sin_mail);
        }

        //buttonEndProcess(button_process);
        $("#form").submit();
    }
}



function verDatosUsuario(obj){
    clearModal()
    $.ajax({
        url : baseURL + "/admin/discipulado/asistentes/buscar",
        data : {id_usuario: $(obj).data("usuario")},
        type : 'POST',
        dataType : 'JSON',
        success : function(response){
            console.log(response);
            if(response.result == true){
                if(response.usuario != null){
                    cargarDatosUsuario(response.usuario);
                    $("#myModal").modal({show: 'true'});
                }
            }else{
                xModal.danger("ERROR: "+response.mensaje);
            }
        },
        error : function(){
            xModal.danger('Error: ocurrió un error inesperado, si el error persiste, contactese con soporte.');
        }
    });
}

function clearModal(){
    $("#email").val("");
    $("#rut").val("");
    $("#nombres").val("");
    $("#apellido_paterno").val("");
    $("#apellido_materno").val("");
    $("#direccion").val("");
    $("#fc_nacimiento").val("");
    $("#edad").val("");
    $("#region").val("");
    $("#comuna").val("");
    $("#pais_origen").val("");
    $("#nacionalidad").val("");
    $("#telefono").val("");
    $("#gl_sexo").val("");
    $("#fc_llegada_iglesia").val("");
    $("#bo_discipulado_previo").val("");
    $("#gl_discipulador_anterior").val("");
    $("#bo_iglesia_anterior").val("");
    $("#gl_otra_iglesia").val("");
    $("#gl_observaciones").val("");
}