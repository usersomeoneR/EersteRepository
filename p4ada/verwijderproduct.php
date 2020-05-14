<h1>Verwijderproduct</h1>
<?php

include("config.php");
include("ProductController.php");
//variabele(n) uit de URL halen
$artnummer = $_GET['artnummer'];

$pc = new ProductController();

$pc->verwijderProduct($artnummer);



?>