<?php

$conexion = mysqli_connect("localhost","root","Odon1234","inventiolite");

$la_marca = $_POST['marcas'];

// $query = $conexion->query("SELECT * FROM category WHERE name = $la_marca");

$query = $conexion->query("SELECT * FROM category WHERE name = '$la_marca' GROUP BY categoria");



echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['categoria']. '">' . $row['categoria'] . '</option>' . "\n";
}

?>