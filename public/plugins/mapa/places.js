// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('gl_direccion'), {types: ['geocode'], componentRestrictions: {country: 'cl'}});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component','geometry']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  console.log("autocomplete", autocomplete);
  console.log("autocomplete.getPlace()", place);
  console.log("geometry", place.geometry);

  if(place.geometry){
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();
    console.log("place.geometry.location.lat()", lat);
    console.log("place.geometry.location.lng()", lng);
    if(lat && lng){
        $("#gl_latitud").val(lat);
        $("#gl_longitud").val(lng);
        $("#gl_latitud").trigger("change");
        mapa.getMapa().setZoom(18);
    }
  }

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      /*
      Desactivo el ajuste de coordenadas por geolocalización
      ya que se ejecuta cuándo el usuario sale y vuelve a entrar en la vista
      lo que puede probocar errores si el usuario se encuentra en otro lugar
      fuera de su casa
      $("#gl_latitud").val(position.coords.latitude);
      $("#gl_longitud").val(position.coords.longitude);
      $("#gl_latitud").trigger("change");
      mapa.getMapa().setZoom(18);*/

      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}