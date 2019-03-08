// formateo de datepicker
$(function () {
	$(".datepicker").datepicker({
		//locale: "es",
		//format: "DD/MM/YYYY",
		autoclose: true,
      	clearBtn: true,
      	toggleActive: true,
      	todayHighlight: true,
      	language: 'es',
      	format: 'dd/mm/yyyy',
	});

	$(".select2").select2({
	    language: "es",
	    tags: false,
	    width: '100%',
	    style: 'border: 1px solid #ccc'
	});
});

/*//Formateo de hora para timepicker
 $(function () {
    $(".timepicker").datetimepicker({
        format: "LT"
    });
});
*/

/**
 * [colorbox description]
 * @param  {[type]} url [description]
 * @return {[type]}     [description]
 */
function colorbox(url) {
	$().colorbox({
		iframe: true,
		href: url,
		width: "90%",
		height: "90%"
	});
}

var url = window.location.pathname;
url = url.split("index.php");
if (url[0] !== undefined) {
	var url_base = url[0];
} else {
	var url_base = '/';
}

var BASE_URI = url_base;
var HOST = window.location.protocol + "//" + window.location.hostname;



var tablas;

$(document).ready(function () {
	//called when key is pressed in textbox
	$(".numbers").keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});


	/**
	 * Boquea el boton despues de hacer click
	 * @param {type} boton
	 * @param {type} e
	 * @returns {buttonStartProcess.retorno}
	 */
	/*
	function buttonStartProcess(boton, e) {
		e.preventDefault();
		$(boton).prop('disabled', true);

		var clase_boton = $(boton).children("i").attr("class");
		$(boton).children("i").attr("class", "fa fa-refresh fa-spin");

		var retorno = {"boton": boton, "clase": clase_boton};
		
		return retorno;
		alert("SI LLEGA")
	}*/

	/**
	 * Desbloquea el boton
	 * @param {type} retorno
	 * @returns {undefined}
	 */
	/*
	function buttonEndProcess(retorno) {
		$(retorno.boton).prop('disabled', false);
		$(retorno.boton).children("i").attr("class", retorno.clase);
	}*/
	

	/*
	tablas = new Array();

	var tablas = $("table.dataTable");
	var tabla = $("table.dataTable");
	
	tablas.each(function(index, item){
		tabla = $(item);

		if(tabla.data('row')) {
            var filas = parseInt(tabla.data("row"));
        } else {
            var filas = 10;
		}
		
		if(tabla.data('no-export')) {
            var buttons = [];
        } else {
            var buttons = [
				{
				extend: 'excelHtml5',
				text: 'Exportar a Excel',
				filename: 'Grilla',
				exportOptions: {
					modifier: {
						page: 'all'
					}
				}}];
        }

		var dataOptions = {
			pageLength	: filas,
			//sorting	: [],
			language	: {
							"url": url_base + "static/js/plugins/DataTables/lang/es.json"
						},
			fnDrawCallback: function (oSettings) {
				$(this).fadeIn("slow");
			},
			dom			: 'Bflrtip',
			buttons: buttons
		}; 

		if(tabla.data('columnas')) {
			var aoColumns = [];
			if(tabla.data('columnas') == 'supervisor'){
				aoColumns = [ 
						{ "sClass": "center" },
						{ "sClass": "center","sType": "eu_date" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center","sType": "eu_date" },
					];
				if(tabla.data('bandeja') && (tabla.data('bandeja') == 'nacional' || tabla.data('bandeja') == 'admin')){
					aoColumns.splice(3, 0, { "sClass": "center" });
				}
			}
			else if(tabla.data('columnas') == 'seremi'){
				aoColumns = [ 
						{ "sClass": "center" },
						{ "sClass": "center","sType": "eu_date" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center" },
						{ "sClass": "center","sType": "eu_date" },
					];
				if(tabla.data('bandeja') && (tabla.data('bandeja') == 'nacional' || tabla.data('bandeja') == 'admin')){
					aoColumns.splice(3, 0, { "sClass": "center" });
				}
			}

			dataOptions.aoColumns = aoColumns;
        }
        if(tabla.data('sorting')) {
        	if(tabla.data('sorting-order')){
        		var order = tabla.data('sorting-order');
        	}else{
        		var order = "desc";
        	}
            var sorting = [[ parseInt(tabla.data('sorting')), order ]];
			dataOptions.aaSorting = sorting;
        }

		tabla.DataTable(dataOptions);
	});*/


});

//boton para exportar tabla a excel
$(function () {
	console.log("@TODO: usar livequery");
   $(".buttons-excel").html("<i class=\"fa fa-download\"></i> Exportar a EXCEL");
   $(".buttons-excel").removeClass("dt-button");
   $(".buttons-excel").addClass("btn btn-primary btn-xs");
   $(".buttons-excel").css("margin-bottom", "10px");
   $(".buttons-excel").css("margin-left", "30px");

});
/*
$(".buttons-excel").livequery(function(){
	console.log('$(".buttons-excel").livequery');
   $(this).html("<i class=\"fa fa-download\"></i> Exportar a EXCEL");
   $(this).removeClass("dt-button");
   $(this).addClass("btn btn-primary btn-xs");
});

$(".buttons-pdf").livequery(function(){
	console.log('$(".buttons-pdf").livequery');
   $(this).html("<i class=\"fa fa-file-pdf-o\"></i> EXPORTAR a PDF");
   $(this).removeClass("dt-button");
   $(this).addClass("btn btn-success btn-xs");
});

$(".buttons-print").livequery(function(){
	console.log('$(".buttons-print").livequery');
   $(this).html("<i class=\"fa fa-print\"></i> Imprimir");
   $(this).removeClass("dt-button");
   $(this).addClass("btn btn-default btn-xs");
});
*/

/*$(document).ajaxStart(function() {
	$('#cargando').fadeIn();
}).ajaxStop(function() {
	$('#cargando').fadeOut();

});

$.fn.hasAttr = function (name) {
	return this.attr(name) !== undefined;
};*/

/**
 * Procesa los errores en la validacion de formularios
 * Ilumina los input con error
 * @param {type} errores
 * @returns {undefined}
 * @TODO: implementar procesar errores
 */
/*
function procesaErrores(errores) {
	$.each(errores, function (i, valor) {
		var parent = getFormParent($("#" + i).parent(), 1);

		if (parent != null) {
			if (valor != "") {
				$(parent).addClass("has-error");
				$(parent).children(".help-block").removeClass("hidden");
				$(parent).children(".help-block").html("<i class=\"fa fa-warning\"></i> " + valor);
			} else {
				$(parent).removeClass("has-error");
				$(parent).children(".help-block").addClass("hidden");
			}
		}
	});
}

function limpiaErrores(errores) {
	$.each(errores, function (i) {
		var parent = getFormParent($("#" + i).parent(), 1);

		if (parent != null) {
				$(parent).removeClass("has-error");
				$(parent).children(".help-block").addClass("hidden");
				$(parent).children(".help-block").html("");
		}
	});
}

$(".infoTip").livequery(function(){
	var titulo	= 'Explicación de la Funcionalidad';
	var texto	= '';
    var pos = '';

	if($(this).attr("data-titulo") != "" && $(this).attr("data-titulo") != "undefined"){
        titulo = $(this).attr("data-titulo");
    }
	if($(this).attr("data-texto") != "" && $(this).attr("data-texto") != "undefined"){
        texto = $(this).attr("data-texto");
    }
	
    var auxPos = $(this).attr("data-pos");
    if(auxPos == "pull-right")
    {
        var pos = "top right";
    }
    else
    {
        var pos = "top left";
    }

	$(this).qtip({
		show	: 'click',
		hide	: 'click',
		content	: {
					button	: true,
					title	: titulo,
					text	: texto
				},
      position: {
                 my: pos, 
                 at: 'bottom left'
            },
		events	: {
					render: function(event, api) {
						var elem = api.elements.overlay;
					}
				}
	});
});

//datatable con Funcionalidad de Elegir Columnas a Exportar, Titulo del archivo
$(".datatable.datatableNew").livequery(function(){
    
    if($(this).parent().hasAttr('data-row')) {
        var filas = parseInt($(this).parent().attr("data-row"));
    } else {
        var filas = 10;
    }
    
    var id			= $(this).attr("id");
	var columnas	= ':visible';
	var titulo		= 'Prevencion_de_Femicidios';
    var buttons		= [];

	if($(this).hasAttr('data-exportar')) {
        columnas	= $(this).attr("data-exportar");
    }
	if($(this).hasAttr('data-titulo')) {
        titulo		+= ' - '+$(this).attr("data-titulo");
    }

	buttons	= [
				{
					extend	: 'excelHtml5',
					title	: titulo,
					exportOptions: {
						columns: [columnas]
					}
				},
				{
					extend	: 'pdfHtml5',
					title	: titulo,
					exportOptions: {
						columns: [columnas]
					}
				}
			];

    var tb = $(this).DataTable({
        "lengthMenu"	: [[5,10, 20, 25, 50, 100], [5, 10, 20, 25, 50, 100]],
        "pageLength"	: filas,
        "destroy"		: true,
        "aaSorting"		: [],
        "deferRender"	: true,
        dom				: 'Bfrtip',
        buttons			: buttons,
        language		: {
							"url": url_base + "static/js/plugins/DataTables/lang/es.json"
						 },
        "fnDrawCallback": function( oSettings ) {
            $("#" + id).removeClass("hidden");
         }
    });
});
*/

