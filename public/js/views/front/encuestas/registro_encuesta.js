$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var mapa = new MapaFormulario("map");
var lfMap = null;
var lfMarker = null;

function onLocationFound(e) {
    //https://leafletjs.com/examples/mobile/
    //https://stackoverflow.com/questions/14173815/update-marker-location-with-leaflet-api
    lfMarker.setLatLng(e.latlng).
        bindPopup("Usted está aquí.").openPopup();
}

var Encuesta = {
    bo_map_leaflet: 0,

    init : function(){

        $(document).ready(function () {
            $("#id_pais").trigger("change");
            /*var isDisabled = $("#region").is(':disabled');
            var longitud_region = $("#region").children(":selected").attr("name");
            var latitud_region = $("#region").children(":selected").attr("id");
            if (isDisabled) {
                $("#gl_longitud").val(longitud_region);
                $("#gl_latitud").val(latitud_region);
                $("#gl_latitud").trigger("change");
            }
            */
        });
    },

    iniciarMapa     :   function(tipomapa = 0,latitud = '', longitud = ''){
        if(tipomapa == 1){
            mapa.seteaMapa("roadmap");
            if (latitud != '' && longitud != '') {
                mapa.seteaLongitud(longitud);
                mapa.seteaLatitud(latitud);
            }
        }else{
            mapa.seteaLatitudInput("gl_latitud");
            mapa.seteaLongitudInput("gl_longitud");
        }
       
        mapa.seteaZoom(15);
        //mapa.seteaIcono("/web/assets/img/persona3.png"),
        //mapa.seteaPlaceInput("direccion");
        mapa.inicio();
        mapa.setMarkerInputs();
        mapa.cargaMapa();
        mapa.seteaAutoCloseInfo(false);
        
        if($("#bo_editar").val() == 1){
            mapa.getMapa().setZoom(10);
            $("#gl_latitud").trigger("change");
        }
        else{
            //var extras = $("#id_pais").children(":selected").data('extras');
            var longitud_pais = -71.55002760000002;//extras.gl_longitud;
            var latitud_pais  = -33.01534809999999;//extras.gl_latitud;
            
            $("#gl_longitud").val(longitud_pais);
            $("#gl_latitud").val(latitud_pais);
            $("#gl_latitud").trigger("change");
        }

        //mapa.seteaMarker();
    },

    initMapaLeaflet : function (){
        if(lfMap == null){
            var longitud_pais = -71.55002760000002;//extras.gl_longitud;
            var latitud_pais  = -33.01534809999999;//extras.gl_latitud;
            
            $("#gl_longitud").val(longitud_pais);
            $("#gl_latitud").val(latitud_pais);
            $("#gl_latitud").trigger("change");
            lfMap = L.map('map').setView([latitud_pais,longitud_pais], 15);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGVzYXJyb2xsb3VjIiwiYSI6ImNrZHl2bjA4aDF3ZW8zM21jdms5dmloankifQ.VZ9M333kAS1p-MY1Rnv8qg', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'
            }).addTo(lfMap);

            lfMarker = L.marker([latitud_pais, longitud_pais],{draggable: true}).addTo(lfMap);
            lfMarker.on("drag", function(e) {
                var marker = e.target;
                var position = marker.getLatLng();
                $("#gl_longitud").val(position.lng);
                $("#gl_latitud").val(position.lat);
                $("#gl_latitud").trigger("change");
                //lfMap.panTo(new L.LatLng(position.lat, position.lng));
            });
            lfMarker.on("dragend", function(e) {
                var marker = e.target;
                var position = marker.getLatLng();
                lfMap.panTo(new L.LatLng(position.lat, position.lng));
            });

             // the timeout wait the view to render
            setTimeout(function () {
                //console.log(lfMap)
                // this rebuild the map
                lfMap.invalidateSize()
                lfMap.locate({setView: true, maxZoom: 16});
                lfMap.on('locationfound', onLocationFound);
            }, 2000);
        }
    }
};

Encuesta.init();


$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel).trigger('change');
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('u-btn-primary text-white').addClass('u-btn-outline-primary text-back');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('u-btn-outline-primary text-back').addClass('u-btn-primary text-white');
})

$("#bo_participa_ministerio").change(function(){
    if($("#bo_participa_ministerio").val() == 1){
        $("#contenedor_participa_ministerio").show('medium');
    }
    else{
        $("#contenedor_participa_ministerio").hide('medium');
    }
});
$("#bo_vive_con_ninos").change(function(){
    if($("#bo_vive_con_ninos").val() == 1){
        $("#contenedor_nr_vive_con_ninos").show('medium');
    }
    else{
        $("#contenedor_nr_vive_con_ninos").hide('medium');
    }
});
$("#bo_vive_con_adolescentes").change(function(){
    if($("#bo_vive_con_adolescentes").val() == 1){
        $("#contenedor_nr_vive_con_adolescentes").show('medium');
    }
    else{
        $("#contenedor_nr_vive_con_adolescentes").hide('medium');
    }
});


function cargarComunasPorRegion(id_region,combo,comuna){
    //console.log(region);
    if(id_region != 0){
        $.ajax({
            url : baseURL + "/jovenes/filtrarComuna",
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


function validarDatosPersonales(btn){
    Base.buttonProccessStart(btn);
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
    /*if($("#fc_nacimiento").val() == ''){
         msg_error += "- Debe ingresar la fecha de nacimiento.<br/>";
    }*/

    if(msg_error != ""){
        xModal.warning(msg_error, function(){
            Base.buttonProccessEnd(btn);
        });
    }else{
        Base.buttonProccessEnd(btn);
        if(Encuesta.bo_map_leaflet){
            Encuesta.initMapaLeaflet()
        }
        nextStepWizard();
    }
}
function validarDatosUbicacion(btn){
    Base.buttonProccessStart(btn);
    var msg_error = "";

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
        xModal.warning(msg_error, function(){
            Base.buttonProccessEnd(btn);
        });
    }else{
        Base.buttonProccessEnd(btn);
        nextStepWizard();
    }
}
function validarDatosVidaDeIglesia(btn){
    Base.buttonProccessStart(btn);
    var msg_error = "";
    if(msg_error != ""){
        xModal.warning(msg_error, function(){
            Base.buttonProccessEnd(btn);
        });
    }else{
        Base.buttonProccessEnd(btn);
        submitValidation(btn)
    }

}
function submitValidation(btn){ 
	Base.buttonProccessStart(btn, 'Guardando');
    var fc_nacimiento = null;
    var day = $("#day").val();
    var month = $("#month").val();
    var year = $("#year").val();
    if(day && month && year){
        fc_nacimiento = year+'-'+month+'-'+day;
    }
    var data = {
        gl_sexo                     : $("#gl_sexo").val(),
        gl_nombres                  : $("#gl_nombres").val(),
        gl_apellidos                : $("#gl_apellidos").val(),
        gl_rut                      : $("#gl_rut").val(),
        //fc_nacimiento             : $("#fc_nacimiento").val(),
        fc_nacimiento               : fc_nacimiento,
        nr_telefono                 : $("#nr_telefono").val(),
        gl_email                    : $("#gl_email").val(),
        region                      : $("#region").val(),
        comuna                      : $("#comuna").val(),
        gl_ciudad                   : $("#gl_ciudad").val(),
        gl_direccion                : $("#gl_direccion").val(),
        street_number               : $("#street_number").val(),
        route                       : $("#route").val(),
        locality                    : $("#locality").val(),
        administrative_area_level_1 : $("#administrative_area_level_1").val(),
        postal_code                 : $("#postal_code").val(),
        country                     : $("#country").val(),
        gl_calle                    : $("#gl_calle").val(),
        nr_calle                    : $("#nr_calle").val(),
        gl_latitud                  : $("#gl_latitud").val(),
        gl_longitud                 : $("#gl_longitud").val(),
        id_llegada_iglesia          : $("#id_llegada_iglesia").val(),
        id_tipo_participacion       : $("#id_tipo_participacion").val(),
        bo_participa_ministerio     : $("#bo_participa_ministerio").val(),
        gl_ministerio               : $("#gl_ministerio").val(),
        bo_vive_con_ninos           : $("#bo_vive_con_ninos").val(),
        nr_vive_con_ninos           : $("#nr_vive_con_ninos").val(),
        bo_vive_con_adolescentes    : $("#bo_vive_con_adolescentes").val(),
        nr_vive_con_adolescentes    : $("#nr_vive_con_adolescentes").val(),
        _uc_hpot                    : $("#_uc_hpot").val(),
        recap                       : $("#recap").val(),
    }

    $.ajax({
        url : controller_path+"registrarNuevaRespuesta",
        data : data,
        type : 'POST',
        dataType : 'JSON',
        success : function(response){
            Base.buttonProccessEnd(btn);
            if(response.correcto){
                /*xModal.success(response.msj, function(){
                    location.reload();
                });*/
                nextStepWizard();
                confetti.start()
            }
            else{
                xModal.warning(response.msj, function(){
                    Base.buttonProccessEnd(btn);
                    getNewCaptcha();
                });
            }
        }, 
        error : function(err){
            Base.buttonProccessEnd(btn);
            getNewCaptcha();
            xModal.danger('Error: Intente nuevamente',function(err){
                console.log(err)
            });
        }
    });
}



