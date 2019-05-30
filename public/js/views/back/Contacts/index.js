console.log("contacts.js")

$(document).ready(function(){
	//$("#test").on("click", function(){
	//	alert("test")
	//})
	//
	
	var myCustomTemplates = {
	  custom1: function(context) {
	    return '<li class="pull-right"><button class="btn btn-success enviar" type="button" onclick="submit(this)">Enviar</button></li>';
	  }
	};

	var toolbar = {
					custom1: true,
				    //"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
				    //"emphasis": true, //Italics, bold, etc. Default true
				    //"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
				    //"html": false, //Button which allows you to edit the generated HTML. Default false
				    //"link": true, //Button to insert a link. Default true
				    //"image": true, //Button to insert an image. Default true,
				    "color": true, //Button to change color of font  
				    //"blockquote": true, //Blockquote  
				    //"size": <buttonsize> //default: none, other options are xs, sm, lg
				  };

	$('#responde_pannel').wysihtml5({toolbar: toolbar, customTemplates: myCustomTemplates});
	$("#pannel").on('click','.btn_response',function(e){
		e.preventDefault();
		$("#id_contact").val($(this).val());
	    $("#myModal").modal({show: 'true'});
	});

	$("#pannel").on('click','.enviar',function(e){
		responder();
	});
});


function submit(btn){
	var btnText = $(btn).prop('disbaled',true).html();
    $(btn).html('Enviando... <i class="fa fa-spin fa-spinner"></i>');

    $.ajax({
        url : HOST + "/admin/contacts/responder",
        data : {mensaje: $('#responde_pannel').val(), id_contact: $('#id_contact').val()},
        type : 'POST',
        dataType : 'JSON',
        success : function(response){
            console.log(response);
			$(btn).prop('disabled', false).html(btnText);
            if(response.result == true){
                $("#myModal").modal('hide');
                xModal.success("Respuesta enviada exitosamente!", setTimeout(()=>{location.reload();},1500));
            }else{
                xModal.danger("ERROR: "+response.mensaje);
            }
        },
        error : function(){
            xModal.danger('Error: ocurrió un error inesperado, si el error persiste, contactese con soporte.');
        }
    });
}