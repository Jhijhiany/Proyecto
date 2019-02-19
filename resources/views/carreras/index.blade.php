<div class="row" id="listado">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Listado de Carreras</h3>
				<div class="box-tools pull-rigth">
					<button type="button" id="agregar" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
				</div>
			</div>

			<div class="box-body">
				<table id="lista" class="table table-bordered table-striped dt-responsive nowrap">
					<thead>
						<tr>
							<th></th>
							<th>Descripción</th>
							<th>Alias</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row" id="crear">
	<div class="col-md-12">
		<form id="formulario">			
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Crea/Modifica Carrera</h3>
					
				</div>

				<div class="box-body">
					<div class="col-md-6">
						<label>Codigo</label>
						<input type="text" id="codigo" name="codigo" class="form-control" readonly="readonly">
						<input type="hidden" id="modo" name="modo">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					</div>
					<div class="col-md-6">
						<label>Nombre</label>
						<input type="text" id="nombre" name="nombre" class="form-control" maxlength="25">
					</div>
					<div class="col-md-6">
						<label>Alias</label>
						<input type="text" id="alias" name="alias" class="form-control" maxlength="10">
					</div>
					<div class="col-md-6">
						<label>Estado: </label>
						<input type="checkbox" class="flat-red" id="estado" name="estado" value="A">
						
					</div>
					
				</div>
				<div class="box-footer">
					<button id="grabar" type="button" class="btn btn-success" ><i class="fa fa-save"></i> Grabar</button>
					<button id="cerrar" type="button" class="btn btn-danger" ><i class="fa fa-ban"></i> Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- scripts -->
<script src="/Taller/js/sistema.js"></script>
<script>
	$(document).ready(function(){
		//iCheck for checkbox and radio inputs
	    $('#estado').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	    });

		$('#crear').hide();

		var defCols=[
			{
				targets:[0],
				visible: true,
				orderable: false,
				searchable: false,
				sClass: "colCenter"
			},
			{
				targets:[1,3],
				visible: true,
				orderable: true,
				searchable: true,
				sClass: "colLeft"
			}
		];

		$.fn.Editar=function(id, data){
			$('#codigo').val(id);
			$('#nombre').val(data.find('td').eq(1).text());
			$('#alias').val(data.find('td').eq(2).text());
			$('#estado').iCheck(data.find('td').eq(3).text()=="Activo"?'check':'uncheck');
			//$('#estado').attr('checked',data.find('td').eq(3).text()=="Activo"?true:false);
			$('#modo').val('E');
			$(this).mostrarCrear();
		};

		var tabla=$(this).iniciaDataTable('#lista',defCols);

		$('#cerrar').click(function(){
			//$(this).click();
			$(this).obtenerData();
		});

		$.fn.obtenerData=function(){
			console.log("load");
			$.ajax({
				type:'GET',
				url:'/Taller/listarCarreras',
				data:$('#filtro').serialize(),
				dataType:'JSON',
				success: function(recive){
					tabla.clear().draw();
					tabla.rows.add(recive).draw();
					$('#processAjax').modal('hide');
				},
				error:function(){

				}
			});
		};

		$('#grabar').click(function(){
			$.ajax({
				type:'post',
				url:'/Taller/grabarcarrera',
				data:$('#formulario').serialize(),
				dataType:'json',
				success: function(recive){
					//$('#_token').val(recive.token);					
					$(this).mostrarResultado("Info",recive.mensaje,recive.codigo==0?true:false);
				},
				error:function(){

				}

			});
		});



		$(this).obtenerData();
	});
</script>