$(document).ready(function (){
	console.log("index_1");	
});

$("#tabla-discipulados").dataTable({
    "lengthMenu": [5,10, 20, 25, 50, 100],
    "pageLength": 20,
    "language"  : {"url": HOST + "/js/plugins/DataTables/lang/es.json"},
    "destroy" : true,
    "aaSorting": [],
    "deferRender": true,
    dom: 'B<"col-md-12" <"col-md-6" l > <"col-md-6" f > >rtip',
    //dom: 'Bflrtip',
    //dom: 'Rlfrtip',
    buttons: [{
        extend: 'excelHtml5',
        text: 'Exportar a Excel',
        filename: 'Grilla',
        exportOptions: {
            modifier: {
                page: 'all'
            }
        }
    }],
    /*ajax: {
        "method": "POST",
        "url": BASE_URI + 'index.php/Buscar/recargarGrillaBuscar',
        "data" : arr,
    },
    columns: [
            { "data": "folio",              "class": "text-center"},
            { "data": "fc_ingreso",         "class": "text-center"},
            { "data": "establecimiento",    "class": "text-center"},
            { "data": "gl_region_mordedor", "class": "text-center"},
            { "data": "gl_comuna_mordedor", "class": "text-center"},
            { "data": "fc_mordedura",       "class": "text-center"},
            { "data": "dias_mordedura",     "class": "text-center"},
            { "data": "dias_bandeja",       "class": "text-center"},
            { "data": "fiscalizador",       "class": "text-center"},
            { "data": "estado",             "class": "text-center"},
            { "data": "resultado_obs",      "class": "text-center"},
            { "data": "resultado_lab",      "class": "text-center"},
            { "data": "grupo_mordedor",     "class": "text-center"},
            { "data": "bo_paciente_observa","class": "text-center"},
            { "data": "opciones",           "class": "text-center"}
        ]*/
});

