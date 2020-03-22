var baseURL = document.location.origin;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var path = baseURL +  location.pathname.substring(0, location.pathname.lastIndexOf("/") + 1)
$(document).ready(function (){
	console.log("integrantes_index");
});

function cargarComunasPorRegion(id_region,combo,comuna){
    //console.log(region);
    if(id_region != 0){
        $.ajax({
            url : path+"filtrarComuna",
            data : {id_region: id_region},
            type : 'POST',
            dataType : 'JSON',
            success : function(response){
               if(response.correcto){
                    var total = response.comunas.length;
                    var options = '<option value="0">Seleccione una Comuna</option>';
                    for(var i=0; i<total; i++){
                        if(comuna == response.comunas[i].id_comuna){
                            options += '<option value="'+response.comunas[i].id_comuna+'" selected >'+response.comunas[i].gl_nombre_comuna+'</option>';    
                        }else{
                            options += '<option value="'+response.comunas[i].id_comuna+'" >'+response.comunas[i].gl_nombre_comuna+'</option>';
                        }
                        
                    }
                    $('#'+combo).html(options);
                }
            }, 
            error : function(err){
                xModal.danger('Error: Intente nuevamente',function(err){
                    console.log(err)
                });
            }
        });
    }else{
        $('#'+combo).html('<option value="0">Seleccione una Comuna</option>');
    }
}



function submit(btn){ 
	//var button_process	= buttonStartProcess($(this), e);
    var btnText = $(btn).prop('disbaled',true).html();
    $(btn).html('Guardando... <i class="fa fa-spin fa-spinner"></i>');
   
    var msg_error = "";

    if($("#gl_nombres").val() == ''){
        msg_error += "- Debe ingresar el/los nombre/s.<br/>";
    }
    if($("#gl_apellidos").val() == ''){
        msg_error += "- Debe ingresar el/los apellidos.<br/>";
    }
    /*if($("#gl_rut").val() == ''){
        msg_error += "- Debe ingresar el rut.<br/>";
    }*/
    if($("#fc_nacimiento").val() != ''){
        //var fecha_ingresada =  moment($("#fc_nacimiento").val(), 'DD/MM/YYYY');
        var fecha_ingresada =  moment($("#fc_nacimiento").val());
        var fecha_actual = moment();
        if(fecha_ingresada.isAfter(fecha_actual)){
            msg_error += '- La Fecha de nacimiento ingresada no puede ser mayor a la fecha actual.<br/>';
        }
        else{
            var years = moment().diff($("#fc_nacimiento").val(), 'years');
            if(years < 17){
                var msg_error = 'Según la edad ingresada, tu perteneces al grupo de adolescentes.<br/>';
                msg_error += 'Puedes contactarte con el ministerio de adolescentes a través del correo:<br/>';
                msg_error += '<b>adolescentes.iuc@gmail.com<b/>';
                xModal.closeAll();
                $(btn).prop('disabled', false).html(btnText);
                xModal.warning(msg_error);
            }
        }
    }
    if($("#nr_telefono").val() == ''){
        msg_error += "- Debe ingresar el teléfono.<br/>";
    }
    if($("#gl_email").val() == ''){
        msg_error += "- Debe ingresar el mail.<br/>";
    }
    /*if($("#region").val() == ''){
        msg_error += "- Debe ingresar la región.<br/>";
    }
    if($("#comuna").val() == ''){
        msg_error += "- Debe ingresar la comuna.<br/>";
    }
    if($("#gl_ciudad").val() == ''){
        msg_error += "- Debe ingresar la ciudad.<br/>";
    }
    if($("#gl_calle").val() == ''){
        msg_error += "- Debe ingresar la dirección.<br/>";
    }
    if($("#nr_calle").val() == ''){
        msg_error += "- Debe ingresar el número de calle.<br/>";
    }*/    

    if(msg_error != ""){
    	//xModal.danger(mensaje_error,function(){buttonEndProcess(button_process);});
        xModal.warning(msg_error, function(){
        	//buttonEndProcess(button_process);
            $(btn).prop('disabled', false).html(btnText);
        });
    }else{
        var data = {
            gl_nombres    : $("#gl_nombres").val(),
            gl_apellidos  : $("#gl_apellidos").val(),
            gl_rut        : $("#gl_rut").val(),
            fc_nacimiento : $("#fc_nacimiento").val(),
            nr_telefono   : $("#nr_telefono").val(),
            gl_email      : $("#gl_email").val(),
            region        : $("#region").val(),
            comuna        : $("#comuna").val(),
            gl_ciudad     : $("#gl_ciudad").val(),
            gl_calle      : $("#gl_calle").val(),
            nr_calle      : $("#nr_calle").val(),
            _uc_hpot      : $("#_uc_hpot").val(),
            recap         : $("#recap").val(),
        }
       $.ajax({
            url : path+"registrarNuevoJoven",
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
                $(btn).prop('disabled', false).html(btnText);
                getNewCaptcha();
                xModal.danger('Error: Intente nuevamente',function(err){
                    console.log(err)
                });
            }
        });
    }
}



