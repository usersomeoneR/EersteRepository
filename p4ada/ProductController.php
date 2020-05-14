<?php

class ProductController
{
	private $conn;
	public function __construct(){
		include ("config.php");
		$this->conn = $conn;
	}
	
	public function opslaanProduct($artikelnaam, $prijs){
		
		$query = "INSERT INTO producten (artikelnaam, prijs) 
			  VALUES ('$artikelnaam', $prijs)";
	
		$stm = $this->conn->prepare($query);
		if($stm->execute())
		{
			//Een verwijzing maken naar een andere pagina
			Header("Location: index.php");
		}
	
		
	}
	
	public function verwijderProduct($artnummer){
		
		$query = "DELETE FROM producten WHERE artikelnummer = $artnummer";

		$stm = $this->conn->prepare($query);
		if($stm->execute()){
			Header("Location: index.php");
		} else echo "OEPS";
	}
	
	public function geefProducten()
	{
				//Maken van een query
		$query = "SELECT * FROM producten";

		//Voorbereiden
		$stm = $this->conn->prepare($query);
		if($stm->execute()){
			//Tekst op het scherm plaatsen m.b.v. echo
			
			
			/* Wanneer er meerdere resultaten zijn, gebruik dan fetchAll()
			 * Wanneer er 1 resultaat zal zijn, gebruik dan fetch()
			 */
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			echo "<h1>Productoverzicht</h1>";
			echo "<table>";
			foreach($result as $prod){
				
				echo "<tr>
						<td>".$prod->artikelnummer."</td>
						<td>".$prod->artikelnaam."</td>
						<td>€ ".$prod->prijs."</td>
						<td><a href='verwijderproduct.php?artnummer=$prod->artikelnummer'><img src='delete.png' height='30px' width='30px'/></a></td>
						<td><a href='wijzigproduct.php?artnummer=$prod->artikelnummer'>
							<img src='wijzig.jpg' height='30px' width='30px'/></a></td>
					  </tr>";
				
			}
			echo "</table>";
			
			
			
		} else echo "OOPS!!";
			}
			
}



?>
