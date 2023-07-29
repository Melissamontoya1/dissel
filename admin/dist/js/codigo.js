   $(document).ready(function(){
   	$("#editar_datos").on("click",editar_datos);
   });

   function editar_datos(){
	var id_vehiculo = $('#id_vehiculo').val(); // Extract info from data-* attributes
		var placa = $('#placa').val(); 
		var color = $('#color').val(); 
		var marca = $('#marca').val();
		var motor = $('#motor').val(); 
		var modelo = $('#modelo').val();
		var soat = $('#soat2').val();  
		var tecnomecanica = $('#tecnomecanica').val(); 
		

		var datosV= {'id_vehiculo':id_vehiculo,'placa':placa,'color':color,'marca':marca,'motor':motor,'modelo':modelo,'soat':soat,'tecnomecanica':tecnomecanica};
		$.ajax({
			type:'POST',
			url:'editar_vehiculo.php',
			data: datosV,
			success:function(editarDatos){
        swal('Se modifico la informacion con exito');
				window.location.href='vehiculos.php';
				

          //window.open("facturaPos.php?documento=" + documento, "_blank");


			}

		});

}
