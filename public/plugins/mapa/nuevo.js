var mapa = new MapaFormulario("map");

$( "#id_direccion_ciudad" ).change(function() {
    var extras = $("#id_direccion_ciudad").children(":selected").data('extras');
    var longitud_pais = extras.gl_longitud;
    var latitud_pais    = extras.gl_latitud;
      
    $("#gl_longitud").val(longitud_pais);
    $("#gl_latitud").val(latitud_pais);
    $("#gl_latitud").trigger("change");
});

var Establecimiento = {
    current_tipo_establecimiento : 0,
    div_campos_adicionales: "div_contenedor_campos_adicionales",

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
       
        mapa.seteaZoom(10);
        //mapa.seteaIcono("/web/assets/img/persona3.png"),
        mapa.seteaPlaceInput("direccion");
        mapa.seteaSearchPlaceInput("direccion_hidden");
        mapa.inicio();
        mapa.setMarkerInputs();
        mapa.cargaMapa();
        mapa.seteaAutoCloseInfo(false);
        
        if($("#bo_editar").val() == 1){
            mapa.getMapa().setZoom(10);
            $("#gl_latitud").trigger("change");
        }
        else{
            var extras = $("#id_pais").children(":selected").data('extras');
            var longitud_pais = extras.gl_longitud;
            var latitud_pais    = extras.gl_latitud;
            
            $("#gl_longitud").val(longitud_pais);
            $("#gl_latitud").val(latitud_pais);
            $("#gl_latitud").trigger("change");
        }

        //mapa.seteaMarker();
    },

    buscarDireccion : function(){
        $("#direccion_hidden").val($("#direccion").val()).trigger("change");;
    },

    agregarClasificacion : function(){
        if($("#id_tipo_establecimiento").val() > 0){
            $.ajax({
                data : {"id_tipo_establecimiento": $("#id_tipo_establecimiento").val()},
                url : Base.getBaseUri() + "Establecimiento/Clasificacion/Autorizacion/nuevo/",
                dataType : 'html',
                type : 'post',
                success : function(response){
                    $("#div_nueva_autorizacion").html(response);
                    $("#div_nueva_autorizacion").show("middle");
                }
            });
        }else{
            xModal.info("Debe seleccionar el tipo de establecimiento.");
        }
    },

    editarClasificacion : function(key, gl_autorizacion){
        if($("#id_tipo_establecimiento").val() > 0){
            $.ajax({
                data : {"id_tipo_establecimiento": $("#id_tipo_establecimiento").val(), "key": key, "gl_autorizacion": gl_autorizacion},
                url : Base.getBaseUri() + "Establecimiento/Clasificacion/Autorizacion/editar/",
                dataType : 'html',
                type : 'post',
                success : function(response){
                    $("#div_nueva_autorizacion").html(response);
                    $("#div_nueva_autorizacion").show("middle");
                }
            });
        }else{
            xModal.info("Debe seleccionar el tipo de establecimiento.");
        }
    },

    cambiarTipoEstablecimiento: function(tipo_establecimiento){
        if(tipo_establecimiento.value > 0 ){
            if(Establecimiento.current_tipo_establecimiento > 0 && Establecimiento.current_tipo_establecimiento != tipo_establecimiento.value){
                xModal.confirm("Esta acción borrará las clasificaciones ingresadas.<br/> ¿Está seguro que desea cambiar el Tipo de Establecimiento?",
                    function(){
                        Establecimiento.current_tipo_establecimiento = tipo_establecimiento.value;
                        Establecimiento.cargarDatosAdicionales(tipo_establecimiento.value);
                        $.ajax({
                            data : null,
                            url : Base.getBaseUri() + "Establecimiento/Clasificacion/Autorizacion/borrarClasificacionesIngresadas/",
                            dataType : 'json',
                            type : 'post',
                            success : function(response){
                                $("#div_nueva_autorizacion").html('');
                                $("#div_nueva_autorizacion").show("middle");
                                $.ajax({
                                    data : null,
                                    url : Base.getBaseUri() + "Establecimiento/Clasificacion/Autorizacion/cargarGrilla",
                                    dataType : 'html',
                                    type : 'post',
                                    success : function(response){
                                        $("#div_grilla_autorizacion").html(response);
                                    }
                                });
                            }
                        });
                    }, function(){
                        $(tipo_establecimiento).val(Establecimiento.current_tipo_establecimiento)
                    })
            }else{
                Establecimiento.cargarDatosAdicionales(tipo_establecimiento.value);
                Establecimiento.current_tipo_establecimiento = tipo_establecimiento.value;
            }
        }
        else{
            $("#div_datos_adicionales_establecimiento").hide("middle");   
            $("#"+Establecimiento.div_campos_adicionales).html('');
        }
    },

    cargarDatosAdicionales : function(tipo_establecimiento, json_datos_adicionales = null){
        $.ajax({
            data : {id_tipo_establecimiento: tipo_establecimiento},
            url : Base.getBaseUri() + "Establecimiento/Mantenedor/Establecimiento/cargarDatosAdicionales/",
            dataType : 'html',
            type : 'post',
            success : function(response){
                if(response != ''){
                    $("#"+Establecimiento.div_campos_adicionales).html(response);
                    $("#div_datos_adicionales_establecimiento").show("middle");
                    if(json_datos_adicionales != null){
                        setTimeout(function(){
                            var datos_adicionales = JSON.parse(json_datos_adicionales);
                            Object.keys(datos_adicionales).forEach((key)=>{
                                $("#"+key).val(datos_adicionales[key].value);
                            })
                        },300);
                    }
                }
                else{
                    $("#div_datos_adicionales_establecimiento").hide("middle");   
                    $("#"+Establecimiento.div_campos_adicionales).html('');
                }
            }
        });
    },

    toggleOtraProfesion : function(input, idSelected = null) {

        let id_form         = input.form.id;
        let id_profesion    = input.value;

        // console.group('toggleOtraProfesion');
        // console.log('form ' + id_form);
        // console.log('id_profesion ' + id_profesion);
        // console.log('idSelected ' + idSelected);
        // console.groupEnd('toggleOtraProfesion');
        if (id_profesion == IDProfesion.MEDICO_CIRUJANO 
            || id_profesion == IDProfesion.CIENCIAS_SOCIALES 
            || id_profesion == IDProfesion.TECNOLOGO_MEDICO
            || id_profesion == IDProfesion.OTRA) {
            
            $("#" + id_form + " [id='div_otra_profesion']").hide(400);
        } else {
            $("#" + id_form + " [id='div_otra_profesion']").hide(400);
            $("#" + id_form + " [id='otra_profesion_persona']").val("");
        }
    },

    guardar : function(btn){
        //$("#form").removeClass('was-validated')
        var form = document.getElementById('form');
        form.classList.add('was-validated');

        var e = jQuery.Event( "click" );
        var button_process    = buttonStartProcess(btn, e);

        var disabled = $("#form").find('select:disabled').removeAttr('disabled');
        var parametros = $("#form :not(#div_datos_adicionales_establecimiento *)").serializeArray();
        disabled.attr('disabled','disabled');

        var mensaje_error = "";

        if ($("#rut").val() === "") {
            mensaje_error += '- El campo RUT es Obligatorio<br>';
        }

        if ($("#gl_nombre_legal").val() == '') {
            mensaje_error += '- El campo Nombre Legal es Obligatorio<br>';
        }
        if ($("#pais option:selected").val() === "0") {
            mensaje_error += '- Debe seleccionar País<br>';
        }
        if ($("#gl_nombres_encargado").val() == "") {
            mensaje_error += '- Debe ingresar Nombres del Encargado Establecimiento.<br>';
        }
        if ($("#gl_apellidos_encargado").val() == "") {
            mensaje_error += '- Debe ingresar Apellidos de Encargado Establecimiento.<br>';
        }

        /*if ($.trim($("#grilla_autorizacion").html()) == "") {
            mensaje_error += '- Debe ingresar Datos de Autorización.<br>';
        }*/

        //valido campos adicionales dinámicos
        mensaje_error += FormDinamico.validarRequire(Establecimiento.div_campos_adicionales);

        if(mensaje_error != ""){
            xModal.danger(mensaje_error,function(){buttonEndProcess(button_process);});
        }else {
            var datos_adicionales = $("#"+Establecimiento.div_campos_adicionales).serializeFullArray();
            if(datos_adicionales && datos_adicionales.length > 0){
                console.log("hay datos adicionales");
                parametros.push({'name': 'datos_adicionales', 'value': JSON.stringify(datos_adicionales)});
            }
            console.log(parametros);

            /*parametros.push({
                "name": 'region',
                "value": $("#region").val()
            });*/

            $.ajax({
                dataType: "json",
                cache: false,
                async: true,
                data: parametros,
                type: "post",
                url: Base.getBaseUri() + "Establecimiento/Mantenedor/Establecimiento/guardarEstablecimiento",
                error: function (xhr, textStatus, errorThrown) {
                    buttonEndProcess(button_process);
                    xModal.danger('Error: No se pudo Ingresar un nuevo Registro ' + errorThrown);
                },
                success: function (data) {
                    buttonEndProcess(button_process);
                    // console.log(data);
                    if (data.correcto) {

                        var btn = ''//<button type="button" class="btn btn-info" onclick="Establecimiento.verDocumento(\''+data.token+'\')" id="doc"><i class="fa fa-wpforms"></i> Ver</button>'

                        xModal.success(data.mensaje,function(){
                            location.href = Base.getBaseUri() + "Establecimiento/Home/Bandeja/index";
                        }, btn);
                    } else {
                        xModal.danger('Error: ' + data.mensaje);
                    }
                }
            });
        }
    },

    cargarPersona : function(inputRut, idInputNombres, idInputApellidos, idBoCargaWS = ""){

        let rut         = $.trim(inputRut.value);
        let id_form     = inputRut.form.id;
        let idCargaWS   = "bo_carga_ws" + idBoCargaWS;

        if (rut != "") {
            console.group('cargarPersona');
            console.log('cargando rut ' + rut);
            $.ajax({
                dataType: "json",
                cache: false,
                async: true,
                data: {rut: rut},
                type: "post",
                url: Base.getBaseUri() + "Establecimiento/Home/Generales/cargarPersona",
                error: function (xhr, textStatus, errorThrown) {},
                success: function (data) {
                    if (data.correcto && data.persona) {

                        let persona     = data.persona;

                        if (persona != null && persona != '' && persona.validado == 1) {
                            $("#" +id_form+ " [id='" +idInputNombres+ "']").val(persona.nombresPersona).prop('readonly', true);
                            $("#" +id_form+ " [id='" +idInputApellidos+ "']").val(persona.primerApellidoPersona + ' ' + persona.segundoApellidoPersona).prop('readonly', true);
                            $("#" +id_form+ " [id='" +idCargaWS + "']").val(1);
                        }else {
                            $("#" +id_form+ " [id='" +idInputNombres + "']").val("").prop('readonly', false);
                            $("#" +id_form+ " [id='" +idInputApellidos + "']").val("").prop('readonly', false);
                            $("#" +id_form+ " [id='" +idCargaWS + "']").val(0);
                        }
                    }
                }
            });
            console.groupEnd('cargarPersona');
        }else {
            $("#" +id_form+ " [id='" +idInputNombres + "']").val("").prop('readonly', false);
            $("#" +id_form+ " [id='" +idInputApellidos + "']").val("").prop('readonly', false);
            $("#" +id_form+ " [id='" +idCargaWS + "']").val(0);
        }
    },

    cargarEspecialidades : function(id_profesion, id_especialidad = null) {

        $.ajax({
            dataType: "json",
            cache: false,
            async: true,
            data: {id_profesion: id_profesion},
            type: "post",
            url: Base.getBaseUri() + "Establecimiento/Home/Generales/cargarEspecialidades",
            error: function (xhr, textStatus, errorThrown) {},
            success: function (data) {
                if (data) {

                    // console.log(data);
                    var options     = '<option value="0">Seleccione</option>';

                    for (var i = 0; i < data.length; i++) {

                        var selected    = '';

                        if (id_especialidad && data[i].id_especialidad == id_especialidad) {
                            selected = 'selected';
                        }
                        options += '<option value="'+data[i].id_especialidad+'" '+selected+'>'+data[i].gl_especialidad+'</option>';
                    }

                    $('#especialidad_persona').html(options);
                    $('#div_especialidad_persona').fadeIn();
                }
            }
        });
    },

    disableInputValidado : function() {

        if ($("#bo_validado").val() == 1) {

            $("#form").find('input.validado').prop('readonly', true);
            $("#form").find('textarea.validado').prop('readonly', true);
            $("#form").find('select.validado').attr('disabled','disabled');
        }
    },

    disableCargadoPorWS : function(form = "form", sufijo = "") {

        if ($("#" + form + " #bo_carga_ws" + sufijo).val() == 1) {
            $("#" + form).find('input.no-editable').prop('readonly', true);
        }
    },

    cambiarTelefono : function(){

        if ($('#gl_telefono').val() != "") {
            $("#bo_informa_telefono").prop("checked",false);
        }else{
            $("#bo_informa_telefono").prop("checked",true);
        }
    },

    verDocumento : function(token) {

        setTimeout(function () {
            location.href = Base.getBaseUri() + "Establecimiento/Home/Bandeja/index/?r=0";
        }, 3000);

        window.open(Base.getBaseUri() + "Establecimiento/Home/Adjunto/verByToken/?token="+token, '_blank');
    },
};

Establecimiento.init();