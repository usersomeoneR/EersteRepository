<?php

$host = "localhost";
$gebruiker = "root";
$wachtwoord = "";
$dbnaam = "mediamarkt";

//Verbinding naar de mysql database
$conn = new PDO("mysql:host=$host;dbname=$dbnaam",$gebruiker,$wachtwoord);

//Dit is een test

?>
