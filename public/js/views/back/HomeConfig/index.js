$(document).ready(function (){
	console.log("index_1");	
});


function quitarFoto(id){
	$('#current_img_carrusel'+id).remove();
	$('#contenedor_current_img_carrusel'+id).show();
}
