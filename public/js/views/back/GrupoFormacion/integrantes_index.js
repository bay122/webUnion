var baseURL = document.location.origin;

$(document).ready(function (){
	console.log("integrantes_index");

	//Datemask dd/mm/yyyy
    //$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    
    //Date picker
    $('#fc_nacimiento').datepicker().on('changeDate', function(e){validar_edad();});

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
});


function validar_edad(){
	var warn = false;
	var msg_warn = '';
	var fecha_ingresada =  moment($("#fc_nacimiento").val(), 'DD/MM/YYYY');
	var edad = moment().diff(fecha_ingresada, 'years');

    var nr_edad_minima = parseInt($("#nr_edad_minima").val());
	var nr_edad_maxima = parseInt($("#nr_edad_maxima").val());

    if(edad<nr_edad_minima){
    	warn = true;
        msg_warn += '<b>Advertencia:</b> No cumple con la edad <b>mínima</b> para un discipulado de <b>'+$("#gl_tipo_grupo_formacion").val()+'</b>.<br/>';
        msg_warn +=' (Rango etareo: desde <b>'+$("#nr_edad_minima").val()+'</b> hasta <b>'+$("#nr_edad_maxima").val()+'</b>)';
    }
    if(edad>nr_edad_maxima){
    	warn = true;
    	msg_warn += '<b>Advertencia:</b> Supera la edad <b>máxima</b> para un discipulado de <b>'+$("#gl_tipo_grupo_formacion").val()+'</b>.<br/>';
        msg_warn +=' (Rango etareo: desde <b>'+$("#nr_edad_minima").val()+'</b> hasta <b>'+$("#nr_edad_maxima").val()+'</b>)';
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

$("#email").on('change', function (e) {
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
	    			$("#datos_usuario").show();
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
	    $("#datos_usuario").hide();
	    xModal.danger("ERROR: El email es incorrecto.");
	}
}

function cargarDatosUsuario(datos_usuario){
    $("#id_usuario").val(datos_usuario.id_usuario);
    //$("#email").val(datos_usuario.email);
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
    
    if(datos_usuario.telefono != null){
        var telefono = JSON.parse(datos_usuario.telefono);
        $("telefono").val(telefono[0]["gl_telefono"]);
    }
    if(datos_usuario.direccion != null){
        var direccion = JSON.parse(datos_usuario.direccion);
        $("direccion").val(direccion[0]["gl_direccion"]);
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
    if($("#email").val() == ''){
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
        //buttonEndProcess(button_process);
        $("#form").submit();
    }
}
