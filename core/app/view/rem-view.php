<div class="row">
	<div class="col-md-12">
		<h2>Lista de Pedidos</h2>
		<p><b>Buscar y Agregar productos a la lista:</b></p>
		<form>
			<div class="row">
				<div class="col-md-3">
					<input type="hidden" name="view" value="rem">
					<input type="text" name="product" class="form-control">
				</div>
				<div class="col-md-3">
					<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				</div>
			</div>
		</form>
	</div>

	<?php if(isset($_GET["product"])):?>
	<?php
		$products = ProductData::getLike($_GET["product"]);
		if(count($products)>0){
	?>
<!-- <h3>Resultados de la Busqueda</h3> -->
<!-- <div class="table-responsive">   -->

	<div class="col-md-12">
		<table id="example" class="table table-bordered  table-hover">
			<thead>
				<th>Codigo1</th>
				<th>Producto</th>
				<!-- <th>Unidad</th> -->
				<th>Costo unitario</th>
				<th>En inventario</th>
				<th>Cantidad</th>
				<th style="width:100px;"></th>
			</thead>
			<?php
		$products_in_cero=0;
			foreach($products as $product):
		$q= OperationData::getQYesF($product->id);
			?>
			<form method="post" action="index.php?view=addtorem">
				<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
				<td style="width:80px;"><?php echo $product->id; ?></td>
				<td><?php echo $product->name; ?></td>
				<!-- <td><?php echo $product->unit; ?></td> -->
				<td><b>$<?php echo $product->price_in; ?></b></td>
				<td>
					<?php echo $q; ?>
				</td>
				<td>
				<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
				<input type="" class="form-control" required name="q" placeholder="Cantidad de producto ..."></td>
				<td style="width:100px;">
					<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> Agregar</button>
				</td>
				</tr>
			</form>
			<?php endforeach;?>
		</table>
	</div>
	<!-- </div> -->

	<?php
}
?>
<div class="col-md-12">
<br><hr>
<hr><br>
<?php else:
?>
<?php endif; ?>
<?php if(isset($_SESSION["errors"])):?>

	<h2>Errores</h2>
	<p></p>
	<table class="table table-bordered table-hover">
	<tr class="danger">
		<th>Codigo</th>
		<th>Producto</th>
		<th>Mensaje</th>
	</tr>
	<?php foreach ($_SESSION["errors"]  as $error):
	$product = ProductData::getById($error["product_id"]);
	?>
	<tr class="danger">
		<td><?php echo $product->id; ?></td>
		<td><?php echo $product->name; ?></td>
		<td><b><?php echo $error["message"]; ?></b></td>
	</tr>
	</div>

<?php endforeach; ?>
</table>
<?php
unset($_SESSION["errors"]);
 endif; ?>


<!--- Carrito de compras :) -->
<?php if(isset($_SESSION["reabastecer"])):
$total = 0;
?>
<h2>Lista:</h2>
<table class="table table-bordered">
<thead >
	<th style="width:30px;">Codigo</th>
	<th style="width:30px;">Cantidad</th>
	<th style="width:30px;">Unidad</th>
	<th style="width:30px;">Producto</th>
	<th style="width:30px;">Precio Unitario</th>
	<th style="width:30px;">Precio Total</th>
	<th ></th>
</thead>
<?php foreach($_SESSION["reabastecer"] as $p):
$product = ProductData::getById($p["product_id"]);
?>
<tr >
	<td><?php echo $product->id; ?></td>
	<td ><?php echo $p["q"]; ?></td>
	<td><?php echo $product->unit; ?></td>
	<td><?php echo $product->name; ?></td>
	<td><b>$ <?php echo number_format($product->price_in); ?></b></td>
	<td><b>$ <?php  $pt = $product->price_in*$p["q"]; $total +=$pt; echo number_format($pt); ?></b></td>
	<!-- <td style="width:30px;"><a href="index.php?view=clearre&product_id=<?php echo $product->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td> -->
	<td style="width:30px;"><a href="index.php?view=clearrem&product_id=<?php echo $product->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
</tr>

<?php endforeach; ?>
</table>



<form method="post" class="form-horizontal" id="processsellm" action="index.php?view=processrem">
	<h2>Costo:</h2>
	
	<div class="form-group">
    	<label for="inputEmail1" class="col-lg-1 control-label">Proveedor</label>
    	<div class="col-lg-4">
			<?php 
				$clients = PersonData::getProviders();
			?>
			<select name="client_id" class="form-control">
				<option value="">-- NINGUNO --</option>
				<?php foreach($clients as $client):?>
					<option value="<?php echo $client->id;?>"><?php echo $client->name." ".$client->lastname;?></option>
				<?php endforeach;?>
			</select>
    	</div>
  	</div>

	<div class="form-group">
    	<label for="inputEmail1" class="col-lg-1 control-label">Efectivo</label>
    	<div class="col-lg-4">
      		<input type="text" name="money" required class="form-control" id="money" placeholder="Efectivo" value= "<?php echo  $total ?>">
    	</div>
	  </div> 

	  <div class="form-group">
		<div class="col-md-4 col-md-offset-1">
			<table class="table table-bordered table-striped">
				<tr>
					<td><p>Subtotal</p></td>
					<td><p><b>$ <?php echo number_format($total*.84); ?></b></p></td>
				</tr>
				<tr>
					<td><p>IVA</p></td>
					<td><p><b>$ <?php echo number_format($total*.16); ?></b></p></td>
				</tr>
				<tr>
					<td><p>Total</p></td>
					<td><p><b>$ <?php echo number_format($total); ?></b></p></td>
				</tr>
			</table>
		<!-- <div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
			<div class="checkbox">
				<label>
				<input name="is_oficial" type="hidden" value="1">
				</label>
			</div>
			</div>
		</div> -->

		
		<!-- <div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
			
				<label>
				<a href="index.php?view=clearrem" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> ccCancelar</a>
				<button class="btn btn-lg btn-primary"><i class="fa fa-refresh"></i> Procesar Reabastecimiento</button>
				</label>
			
			</div>
		</div> -->
		
		<a href="index.php?view=clearrem" class="btn btn-lg btn-danger" style="margin: 10px"> Cancelar</a>
		<button class="btn btn-lg btn-primary">Ingresar Mercaderia</button>

			
		
</form>


<script>
	$("#processsell").submit(function(e){
		money = $("#money").val();
		if(money< <?php echo $total;?>){
			alert("No se puede efectuar la operacion");
			e.preventDefault();
		}else{
			go = confirm("Cambio: $"+(money-<?php echo $total;?>));
			if(go){}
				else{e.preventDefault();}
		}
	});
</script>

<script>
	$(document).ready(function() {  
		//  
		$('#examplee').DataTable({
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

</div>
</div>

<br><br><br><br><br>
<?php endif; ?>

</div>