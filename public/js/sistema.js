$(document).ready(function(){
	$('#crear').hide();
	

	$.fn.mostrarCrear=function(){
		$('#crear').show();
		$('#listado').hide();
	}
	$('#agregar').click(function(){
		$('#modo').val('C');
		$(this).mostrarCrear();
	});

	$.fn.limpiar=function(){
		$('input:not([type=hidden])').val('');
		$('input:checkbox').prop('checked',false);
	};

	$('#cerrar').click(function(){
		$(this).limpiar();
		$('#crear').hide();
		$('#listado').show();
	});

	$.fn.iniciaDataTable=function(id, colDefs){
		return $(id).DataTable(
				{
					"scrollY": "400px",
					paging: true,
					info: true,
					lengthMenu: [50, 100, 200, 500],
					lengthChange: true,
					ordering: true,	
					language:{
						lengthMenu: "Muestra _MENU_  registros por página",
						zeroRecords: "No se ha encontrado datos...",
						info: "Mostrando página _PAGE_ de _PAGES_",
						infoEmpty: "No hay datos",
						infoFiltered: "(Filtrando un total de _MAX_ registros)",
						loadingRecords: "Cargando...",
						search: "Buscar:",
						processing: "Procesando la información...",
						paginate: {
							first: "Primera",
							last: "Última",
							next: "Siguiente",
							previous: "Anterior"
						}
					},
					columnDefs: colDefs,
					sorting: [[1, 'asc']],
					fnDrawCallback: function(){
						$('.Editar').on('click', function(event){
							event.stopPropagation();
							event.stopImmediatePropagation();
							var data=$(this).closest('tr');										
							$(this).Editar($(this).data("id"), data);
										
						});
						$('.Eliminar').on('click', function(event){
							event.stopPropagation();
							event.stopImmediatePropagation();
							$(this).Eliminar($(this).data("id"));
						});
					}
				});
	};	

	$.fn.mostrarResultado=function(titulo, mensaje, mensajeerror, error){
		$('#mdTitulo').text(titulo);
		
		if(error){
			$('#mdIcono').removeClass('fa-check');
			$('#mdIcono').removeClass('text-success');
			$('#mdIcono').addClass('fa-ban');
			$('#mdIcono').addClass('text-danger');
			$('#mdMensaje').text(mensajeerror);
		}else{
			$('#mdMensaje').text(mensaje);
			$('#mdIcono').removeClass('fa-ban');
			$('#mdIcono').removeClass('text-danger');
			$('#mdIcono').addClass('fa-check');
			$('#mdIcono').addClass('text-success');
		}
		$('#mdGrabado').modal('show');	
	};
	
});