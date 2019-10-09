<?php
 
      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            // $con = mysql_connect("localhost","root","Odon1234");

            // mysql_select_db('inventiolite', $con);
       
            // $sql = mysql_query("SELECT * FROM category WHERE name LIKE '%".$b."%'",$con);

            $conexion = mysqli_connect("localhost","root","Odon1234","inventiolite");

            $query  = $conexion->query("SELECT * FROM category WHERE name LIKE '%".$b."%'");       

                  while ( $row = $query->fetch_assoc() )
                    {
                        $name = $row['name'];
                        $id = $row['id'];                        
                        echo $id." - ".$name."<br /><br />";
                    } 
            
      }
       
?>