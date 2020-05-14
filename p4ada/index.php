<?php

include("config.php");
include("ProductController.php");
$pc = new ProductController();

//Met isset kun je controleren of er een variabele bestaat en gevuld is!
if(isset($_POST['btnOpslaan']))
{
	
	//Ophalen gegevens vanuit het form
	$artikelnaam = $_POST['txtArtikel'];
	$prijs = $_POST['txtPrijs'];
	//
	
	//test 2
	$pc->opslaanProduct($artikelnaam, $prijs);
	
}

?>

<form method="POST">
	Artikelnaam:<input type="text" name="txtArtikel"/>
	Prijs: <input type="text" name="txtPrijs"/>
	<input type="submit" name="btnOpslaan" value="Opslaan"/>
</form>


<?php

$pc->geefProducten();


?>