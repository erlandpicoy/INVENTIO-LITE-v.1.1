<?php
	$users = CategoryData::getAll();	
?>

<div class="row">
	<div class="col-md-12">
		<div class="btn-group pull-right">
			<a href="index.php?view=newcategory" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Marcas</a>
		</div>
		<h1>Marcas</h1>
		
		<div class="col-md-4">
			<form class="form-horizontal" role="form" method="post" action="./?action=addbook" id="addbook">

			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Marca:</label>
				<select class="form-control js-example-basic-single" id="select_name" style="width:300px" name="select_name">
					<?php foreach($users as $user){
					?>  
					<option value="<?php echo $user->name; ?>"><?php echo $user->name; ?></option>		 
					<?php 
						}
					?>       
				</select>
			</div>

			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Categoria:</label>
				<select class="form-control js-example-basic-single" id="select_name" style="width:300px" name="select_name">
					<?php foreach($users as $user){
					?>  
					<option value="<?php echo $user->categoria; ?>"><?php echo $user->categoria; ?></option>		 
					<?php 
						}
					?>       
				</select>
			</div>

			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Sub-Categoria:</label>
				<select class="form-control js-example-basic-single" id="select_name" style="width:300px" name="select_name">
					<?php foreach($users as $user){
					?>  
					<option value="<?php echo $user->subcategoria; ?>"><?php echo $user->subcategoria; ?></option>		 
					<?php 
						}
					?>       
				</select>
			</div>

		</form>
</div>
<br>
<?php
	$users = CategoryData::getAll();
	if(count($users)>0){
	// si hay usuarios
?>


	
</div>

<table  id="example" class="table table-bordered table-hover">
	<thead>	
		<th>Marca</th>
		<th>Categoria</th>
		<th>Sub-Categoria</th>
		<th></th>
	</thead>
<?php
	foreach($users as $user){
		?>
		<tr>
		<td><?php echo $user->name; ?></td>
		<td><?php echo $user->categoria; ?></td>
		<td><?php echo $user->subcategoria; ?></td> 
		</tr>
		<?php
	}
	}else{
		echo "<p class='alert alert-danger'>No hay Marcas</p>";
	}	
?>


<div>
<h2>Sub-Categorias</h2>
<select name="subcategorias" id="subcategorias">
  <option value="0">Seleccione</option>
</select>
</div>

<table class="table">
	<thead>	
		<th>Marca</th>
		<th>Categoria</th>
		<th>Sub-Categoria</th>
		<th></th>
	</thead>
	<tr name="selector" id="selector">
		<td><?php echo $user->name; ?></td>
		<td><?php echo $user->categoria; ?></td>
		<td><?php echo $user->subcategoria; ?></td> 
	</tr>
</table>

<script>
	$(document).ready(function() {  		
		$('#example').DataTable({
		//para cambiar el lenguaje a español
		"paging":   false,
					"ordering": false,
					"info":     false,
				"language": {
					"lengthMenu": "Mostrar _MENU_ registros",
					"zeroRecords": "No se encontraron resultados",
					"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					"infoFiltered": "(filtrado de un total de _MAX_ registros)",
					"sSearch": "Buscar:",
					"oPaginate": {
						"sFirst": "Primero",
						"sLast":"Último",
						"sNext":"Siguiente",
						"sPrevious": "Anterior"
					},
					"sProcessing":"Procesando...",
				}
		});     
	});


</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          nombre=$('#nombre').val();
          apellido=$('#apellido').val();
          email=$('#email').val();
          telefono=$('#telefono').val();
            agregardatos(nombre,apellido,email,telefono);
        });



        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>

<script>
	$(function(){


		// Lista de Marcas
		$.post( 'marca.php' ).done( function(respuesta)
		{
			$( '#marcas' ).html( respuesta );
		});

		// lista de Categorias	
		$('#marcas').change(function()
		{
			var la_marca = $(this).val();		
			// Lista de Categorias
			$.post( 'categorias.php', { marcas: la_marca} ).done( function( respuesta )
			{
				alert( respuesta);
				$( '#categorias' ).html( respuesta );
			});
		});

		// lista de Sub-categorias
		$('#categorias').change(function()
		{
			var la_categoria = $(this).val();
			$.post('subcategorias.php', { categorias: la_categoria } ).done( function(respuesta)
			{
				alert( respuesta);
				$('#subcategorias').html(respuesta);
			});

		});
		
		// Lista de Seleccion
		$.post( 'marca.php' ).done( function(respuesta)
		{
			$( '#marcas' ).html( respuesta );
		});
		
	})

</script>
<script>
	var table = $('#example').DataTable();
 
 	// #myInput is a <input type="text"> element
 	$('asd').on( 'keyup', function () {
	 table.search( this.value ).draw();
 } );
</script>


