<?php

$conexion = mysqli_connect("localhost","root","Odon1234","inventiolite");

$la_categoria = $_POST['categorias'];

$query = $conexion->query("SELECT * FROM category WHERE categoria = '$la_categoria' GROUP BY subcategoria");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc())
{
	echo '<option value="' . $row['subcategoria']. '">' . $row['subcategoria'] . '</option>' . "\n";
}

?>