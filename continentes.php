
<?php 
$conexion = mysqli_connect("localhost","root","Odon1234","inventiolite");

$query = $conexion->query("SELECT * FROM category");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
 {
 	echo '<option value="' . $row['id']. '">' . $row['name'] . '</option>' . "\n";
 } 

