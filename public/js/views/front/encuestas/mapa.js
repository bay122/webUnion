/**
 * Clase para agregar mapa a formulario.
 * 
 * @requires 
 * 
 * @type MapaFormulario
 */
var infoWindow;

var getUrl = window.location;
var path = baseURL + location.pathname.substring(0, location.pathname.lastIndexOf("/") + 1)
var boIniciado = false;
var Mapa = {

    /**
     * Nombre del input de busqueda de direccion
     */
    places_input: null,
    search_places_input: null,

    /**
     * Nombre del input de busqueda de pais
     */
    country_input: null,

    /**
     * Icono utilizado para el marcador
     */
    icon: "",

    /**
     * googleMaps
     */
    mapa: null,

    /**
     * Marcador en el mapa
     */
    marker: null,

    /**
     * Identificador del contenedor html del mapa
     */
    id_div_mapa: "",

    /**
     * Latitud por defecto
     */
    latitud: -33.04864,

    /**
     * Longitud por defecto
     */
    longitud: -71.613353,

    /**
     * Id del input para rescatar longitud
     */
    input_longitud: "gl_longitud",

    /**
     * Id del input para rescatar latitud
     */
    input_latitud: "gl_latitud",

    /**
     * Id del input para rescatar coordenada utm
     */
    input_utm: "gl_utm",

    zoom: 4,

    min_zoom: 3,

    tipo_mapa: 'hybrid',

    /**
     * Área circular
     */
    area_circular: null,

    polygons: [],
    drawingManager: null,

    auto_close_info: true,

    initMap: function(id_mapa) {
        Mapa.id_div_mapa = id_mapa;
        if (!Mapa.mapa) {
            setTimeout(function() {
                var map = L.map('mapid').setView([-33.04864, -71.613353], 13);

                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(map);
                var marker = L.marker([-33.04864, -71.613353], {
                        title: "Mi ubicación",
                        alt: "Estoy Aquí",
                        draggable: true
                    })
                    .addTo(map).on('dragend', function() {
                        var coord = String(marker.getLatLng()).split(',');
                        console.log(coord);
                        var lat = coord[0].split('(');
                        console.log(lat);
                        var lng = coord[1].split(')');
                        console.log(lng);
                        marker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
                    });;

                Mapa.mapa = map;

                Mapa.places();
            }, 500);
        }
    },


    getEditing: function() {
        return Mapa.drawingManager == null
    },

    /**
     * Setea el mínimo zoom posible
     * @param {string} min_zoom
     * @return {undefined}
     */
    seteaMinZoom: function(minzoom) {
        Mapa.min_zoom = minzoom;
    },

    /**
     * Setea el tipo de mapa
     * @param {string} tipo_mapa
     * @return {undefined}
     */
    seteaMapa: function(tipo_mapa) {
        Mapa.tipo_mapa = tipo_mapa;
    },

    seteaAutoCloseInfo: function(auto_close_info) {
        Mapa.auto_close_info = auto_close_info;
    },

    /**
     * Setea el icono para el marcador
     * @param {string} icono
     * @returns {undefined}
     */
    seteaIcono: function(icono) {
        Mapa.icon = icono;
    },

    /**
     * 
     * @param {string} nombre
     * @returns {undefined}
     */
    seteaLatitudInput: function(nombre) {
        Mapa.input_latitud = nombre;
    },

    /**
     * 
     * @param {string} nombre
     * @returns {undefined}
     */
    seteaLongitudInput: function(nombre) {
        Mapa.input_longitud = nombre
    },

    /**
     * 
     * @param {string} nombre
     * @returns {undefined}
     */
    seteaUtmInput: function(nombre) {
        Mapa.input_utm = nombre
    },
    /**
     * Setea el id del input de busqueda de direcciones
     * @param {string} place
     * @returns {void}
     */
    seteaPlaceInput: function(place) {
        Mapa.places_input = place;
    },

    /**
     * Setea el valor de la latitud del centro del mapa
     * @param {string} latitud
     * @returns {undefined}
     */
    seteaLatitud: function(latitud) {
        if (latitud != "") {
            Mapa.latitud = latitud;
        }
    },

    /**
     * Setea el valor de la longitud del centro del mapa
     * @param {string} longitud
     * @returns {undefined}
     */
    seteaLongitud: function(longitud) {
        if (longitud != "") {
            Mapa.longitud = longitud;
        }
    },


    /**
     * Configuracion de busqueda de direcciones
     * @returns {void}
     */
    places: function() {
        $("#" + Mapa.places_input).keypress(function() {
            if (Mapa.places_input != null && $("#" + Mapa.places_input).val().length >= 5) {
                var direccion = document.getElementById(Mapa.places_input);

                /*
                //Ver forma de filtrar por Region y Comuna
                var comuna = $("#comuna option:selected").text();
                var region = $("#region option:selected").text();
                if (comuna.indexOf("Seleccione") > 0){
                direccion = document.getElementById(Mapa.places_input+" "+comuna);
                }
                if (region.indexOf("Seleccione") > 0){
                direccion = document.getElementById(Mapa.places_input+" "+region);
                }
                */

                /* https://en.wikipedia.org/wiki/ISO_3166-1
                 *  https://developers.google.com/maps/documentation/javascript/geocoding#ComponentFiltering
                 */
                var country_search = 'cl';
                ac = L.control.geocoder('e59de0679bd819');
                console.log(ac)

                /*L.control.geocoder('e59de0679bd819',{
                params: {
                bounded: 1,
                countrycodes: 'cl'
                }}).addTo(map)
                .on('select', function (e) {
                displayLatLon(e.feature.feature.display_name, e.latlng.lat, e.latlng.lng);
                });*/

                ac.addEventListener('place_changed', function() {
                    var place = ac.getPlace();

                    if (place && place.length === 0) {
                        return;
                    }

                    if (place !== undefined) {
                        if (place.address_components !== undefined) {
                            var index = place.address_components.length - 2;
                            var region = place.address_components[index].long_name;
                            var calle = place.address_components[1].long_name;
                            var numero = place.address_components[0].long_name;
                            var callenro = calle + " " + numero;

                            if (isNaN(numero)) {
                                callenro = numero;
                            }
                            $("#" + Mapa.places_input).val(callenro);
                            $("#" + Mapa.input_longitud).val(parseFloat(place.geometry.location.lng()));
                            $("#" + Mapa.input_latitud).val(parseFloat(place.geometry.location.lat()));
                            $("#" + Mapa.input_longitud).trigger("change");
                        }
                    }

                    //Mapa.mapa.setZoom(17);
                });
            }
        });

    },
    obtenerMapa: function() {
        return Mapa.mapa;
    },
};