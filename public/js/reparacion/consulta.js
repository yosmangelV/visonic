$(document).ready(function(){

	$('#btSearchRepair').bind('click', function(e){
		e.preventDefault();
		$('#repairData').hide();
		$('#emptyData').hide();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var method = $('#method').val();
		var validacion=validarFormularioReparacion();
		if(validacion.flag){
		    swal({
				title: "Error",
				text: validacion.error,
				type: "warning",
				showCancelButton: false,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'OK',
				closeOnConfirm: true
			},
				function(){ 
			});
		    return false;
		}

	    var data={  
            'numero_serie': document.formRepairSearch.serie_number.value,
		}

		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		   type: 'post',
		   dataType: 'json', 
		   data : data,
		   error: function(data){
		        var errors = '';
	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos] + '<br>';
	            }
	            swal({
					title: "Error",
					text: errors,
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'OK',
					closeOnConfirm: true
				},
					function(){ 
				}); //this is my div with messages
	      	},
		   success: function(result) {
		   		if(result.status=="998"){
		   			$('#emptyData').show();
		   		}else if(result.status=="999"){
		   			swal({
						title: "Error",
						text: result.mensaje,
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK',
						closeOnConfirm: true
					},
						function(){ 
					});
		   		}else{
		   			
		   			$("#fecha_entrada").empty();
					$("#fecha_entrada").append(result.reparacion['Fecha_Entrada']);
		   			$("#modelo").empty();
					$("#modelo").append(result.reparacion['Modelo']);
		   			$("#garantia").empty();
					$("#garantia").append(result.reparacion['Garantia']);
		   			$("#marca").empty();
					$("#marca").append(result.reparacion['Marca']);
		   			$("#estado").empty();
					$("#estado").append(result.mensaje);
		   			$('#repairData').show();
		   		}
		    }
		});
	});

});

function validarFormularioReparacion(){
	var numero_serie=document.formRepairSearch.serie_number.value;
	
	var flag=false;
	var errors="";

	if(numero_serie==null || numero_serie=="" || numero_serie==undefined){
		errors += "Debe ingresar el número de serie para realizar la búsqueda.";
		flag=true;
	}else if(numero_serie.length<3){
		errors += "El número de serie debe tener al menos 3 carácteres.";
		flag=true;
	}

	var resultado={
		'flag':flag,
		'error':errors,
	};

	return resultado; 
}

function validaEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function validaCaracteres(texto) {
    return /^[a-zA-Z," ",áéíóúñÑ]+$/i.test(texto);
}

function validaNumeros(numeros) {
    return /^[0-9]+$/i.test(numeros);

}
