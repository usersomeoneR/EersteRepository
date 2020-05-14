
<h1>Wijzigpagina</h1>

<?php
	include("config.php");
	if(isset($_POST['btnUpdate'])){
		
		$artikelnummer = $_GET['artnummer'];
		$artnaam = $_POST['txtArtikel'];
		$prijs = $_POST['txtPrijs'];
		
		$query = "UPDATE producten SET artikelnaam = '$artnaam', 
									   prijs = $prijs 
									   WHERE artikelnummer = $artikelnummer";
		$stm = $conn->prepare($query);
		if($stm->execute()){
			Header("Location: index.php");
		}else echo "OEPS er ging iets mis!!";
	}
	
	
	
	
	if(isset($_GET['artnummer']))
	{
		$artnummer = $_GET['artnummer'];
		$query = "SELECT * FROM producten WHERE artikelnummer = $artnummer";
		$stm = $conn->prepare($query);
		if($stm->execute())
		{
			$prod = $stm->fetch(PDO::FETCH_OBJ);
		?>
		<form method="POST">
			Artikelnaam:<input type="text" name="txtArtikel" value="<?php echo $prod->artikelnaam; ?>"/>
			Prijs: <input type="text" name="txtPrijs" value="<?php echo $prod->prijs; ?>"/>
			<input type="submit" name="btnUpdate" value="Wijzig"/>
		</form>

		<?php
		}
		
		echo $artnummer;
	}else Header("Location: index.php");
	

?>