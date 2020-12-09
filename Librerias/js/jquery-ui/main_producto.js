$(buscar_datos());

function buscar_datos(consulta){
	console.log(consulta);
	$.ajax({
		url:'view/producto/producto-buscar.php',
		type:'POST',
		datatype:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	
	/*.always(function(){
		console.log("complete");
	})*/
}

$(document).on('keyup','#caja_busqueda', function(){
	var valor=$(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});

