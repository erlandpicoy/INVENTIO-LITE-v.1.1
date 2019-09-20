<?php

$conexion = mysqli_connect("localhost","root","Odon1234","inventiolite");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM paises WHERE id_continente = $el_continente");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_pais']. '">' . $row['nombre'] . '</option>' . "\n";
}
