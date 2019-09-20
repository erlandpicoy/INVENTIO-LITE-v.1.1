<?php

if(count($_POST)>0){
	$user = new CategoryData();

	$user->name = $_POST["select_name"];
	$user->categoria = $_POST["select_categoria"];
	$user->subcategoria = $_POST["select_subcategoria"];	
	$user->add();


	// if(isset($_POST['formSubmit'])) 
	// {
	// 	$aCountries = $_POST['formCountries'];
		
	// 	if(!isset($aCountries)) 
	// 	{
	// 		echo("<p>You didn't select any countries!</p>\n");
	// 	} 
	// 	else 
	// 	{
	// 		$nCountries = count($aCountries);
			
	// 		echo("<p>You selected $nCountries countries: ");
	// 		for($i=0; $i < $nCountries; $i++)
	// 		{
	// 			echo($aCountries[$i] . " ");
	// 		}
	// 		echo("</p>");
	// 	}
	// }

print "<script>window.location='index.php?view=categories';</script>";


}


?>