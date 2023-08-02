   $(document).ready(function(){
   	$("#editar_datos").on("click",editar_datos);
   	$("#btnedit").on("click",editar_empresa);
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

function editar_empresa(){
	
	var id_empresa = $('#id_empresa').val(); // Extract info from data-* attributes
	var nombre_empresa = $('#nombre_empresa').val(); 
	var direccion_empresa = $('#direccion_empresa').val(); 
	var telefono_empresa = $('#telefono_empresa').val();
	var correo_empresa = $('#correo_empresa').val(); 
	var datosE= {'id_empresa':id_empresa,'nombre_empresa':nombre_empresa,'direccion_empresa':direccion_empresa
	,'telefono_empresa':telefono_empresa,'correo_empresa':correo_empresa}
//alert(id_empresa+nombre_empresa+direccion_empresa+telefono_empresa+correo_empresa);
	$.ajax({
		type:'POST',
		url:'editar_empresa.php',
		data: datosE,
		success:function(result){
			if (result="1") {
				swal("Buen Trabajo!", "Se editaron lo datos con éxito", "success").then(function() {
				window.location.replace("empresa_personal.php");
				});
			}else{
				swal("ERROR!", "Lo sentimos ocurrió un error ", "error");
			}
			//swal('Se modifico la informacion con exito');
			//window.location.href='vehiculos.php';
		}

	});

}
