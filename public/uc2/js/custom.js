var baseURL = document.location.origin;
var url_site   = window.location.protocol + '//' + window.location.hostname + window.location.pathname;
var controller_path = baseURL +  location.pathname.substring(0, location.pathname.lastIndexOf("/") + 1);

var Base = {

	ERROR_GENERAL : 'Ocurrió un error inesperado. Intente nuevamente o comuníquese con el Administrador.',

	btnText : '',
	/**
	 * Cambia apariencia de btn miestras se realiza una acción o procesamiento
	 * @param  {[type]} btn     [description]
	 * @param  {[type]} message [description]
	 * @return {[type]}         [description]
	 */
	buttonProccessStart : function(btn, message='Procesando'){
	 	var $this = this;
	 	$this.btnText = $(btn).attr('disabled',true).html();
	 	$(btn).html(message + '...<i class="fa fa-spin fa-spinner"></i>');
	},

	buttonProccessEnd : function(btn){
	 	var $this = this;
	 	$(btn).html($this.btnText).attr('disabled',false);
	},

	dataTable : function(nombreClase,bo_ordenAsc,columnDefs=null){

	 	        var $this = this;
	 	        let tipo_orden = "desc";

	 	        if(typeof bo_ordenAsc != "undefined" && bo_ordenAsc){
	 		            tipo_orden = "asc"
	 	        }

	 	$("."+nombreClase).dataTable( {
	 		"sPaginationType": "full_numbers",
	 		"autoWidth": true,
	 		                    "destroy"  : true,
					//"aaSorting": [[ 0, null]],
					"sDom": 'T<"clear">lfrtip',
					"bDeferRender": false,
					"oTableTools": {
						"sRowSelect": "multi",
						"sSwfPath": "js/swf/copy_csv_xls_pdf.swf",
						"aButtons": [ "xls" ]
					                        },
					                        "language": {
						                            "url": $this.getBaseDir() + "pub/js/plugins/DataTables/lang/"+jsonTraductor.urlJsonDataTable
					                        },
						/*"oLanguage": {
							"sEmptyTable": "Sin resultados",
							"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
							"sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
							"sInfoFiltered": "(De un total de _MAX_ registros)",
							"sLengthMenu": "_MENU_ resultados por p&aacute;gina",
							"sSearch": "Buscar:",
							"sZeroRecords": "Sin resultados",
							"oPaginate": {
								"sFirst": "Primera",
								"sLast": "&Uacute;ltima",
								"sNext": "Siguiente",
								"sPrevious": "Anterior"
							}
						},*/
                //"aoColumns" : aoColumns,
                columnDefs: columnDefs,
		} );
	 },

    
}; 

/*
 $(document).ready(function() {
    //boton para exportar tabla a excel
    $(".buttons-excel").html("<i class=\"fa fa-download\"></i> Exportar a EXCEL");
    $(".buttons-excel").removeClass("dt-button");
    $(".buttons-excel").addClass("btn btn-default btn-xs btn-excel");
    
});¨*/

function btnExcelGrilla(){
    //boton para exportar tabla a excel
    setTimeout(function(){
	        $(".buttons-excel").html("<i class=\"fa fa-download\"></i> Exportar a EXCEL");
	        $(".buttons-excel").removeClass("dt-button");
	        $(".buttons-excel").addClass("btn btn-primary btn-xs btn-excel");
    },500);
}


/**
 * Boquea el boton despues de hacer click
 * @param {type} boton
 * @param {type} e
 * @returns {buttonStartProcess.retorno}
 */
function buttonStartProcess(boton, e) {
	    e.preventDefault();
	    $(boton).prop('disabled', true);

	    var clase_boton = $(boton).children("i").attr("class");
	    $(boton).children("i").attr("class", "fas fa-redo fa-spin");

	    var retorno = {"boton": boton, "clase": clase_boton};

	    return retorno;
	    alert("SI LLEGA")
}

/**
 * Desbloquea el boton
 * @param {type} retorno
 * @returns {undefined}
 */
function buttonEndProcess(retorno) {
	    $(retorno.boton).prop('disabled', false);
	    $(retorno.boton).children("i").attr("class", retorno.clase);
} 

function replaceLast(x, y, z){
	  var a = x.split("");
	  a[x.lastIndexOf(y)] = z;
	  return a.join("");
}