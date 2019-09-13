<?php
			$users = CategoryData::getAll();
			if(count($users)>0){
				// si hay usuarios
			
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
				<label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
				<div class="col-lg-10">
					<select name="category_id" class="form-control">
					<option value="">-- SELECCIONE --</option>
						<?php foreach($categories as $p):?>
						<option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
					<div class="col-lg-10">
					<select name="editorial_id" class="form-control">
					<option value="">-- SELECCIONE --</option>
					<?php foreach($users as $user){
						?>
						<!-- <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option> -->						
						<option value=""><?php echo $user->name." ".$user->lastname; ?></option>		 
					<?php 
				}
				}else{
					echo "<p class='alert alert-danger'>No hay Marcas</p>";
				}	
					?>
					</select>
				</div>
			</div>

			<!-- <div class="form-group">
				<label for="inputEmail1" class="col-lg-2 control-label">Subcategoria</label>
				<div class="col-lg-10">
				<select name="author_id" class="form-control">
				<option value="">-- SELECCIONE --</option>
				<?php foreach($authors as $p):?>
					<option value="<?php echo $p->id; ?>"><?php echo $p->name." ".$p->lastname; ?></option>
				<?php endforeach; ?>
				</select>
				</div>
			</div> -->

			</form>
			</div>

		<br>

		
		<?php
			$users = CategoryData::getAll();
			if(count($users)>0){
			// si hay usuarios
		?>
			<table class="table table-bordered table-hover">
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
					<td><?php echo $user->name." ".$user->lastname; ?></td>
					<td><?php echo $user->categoria; ?></td>
					<td><?php echo $user->subcategoria; ?></td> 
					</tr>
					<?php
				}
				}else{
					echo "<p class='alert alert-danger'>No hay Marcas</p>";
				}		
			?>

		</div>
	</div>