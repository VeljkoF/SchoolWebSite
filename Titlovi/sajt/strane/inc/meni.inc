<?php
	include("konekcija.inc");
	$upit = "SELECT * FROM meni_tabel";
	$rezultat = mysql_query($upit, $konekcija);
	
	if(!$rezultat){
		echo "<div id='ispis'>";
		echo "Nemate nikakve stavke u meniju!";
		echo "</div>";
	}
	else{
			echo "<div id='prikaz'>";
			echo "<table border='1'>";
			echo "<tbody>";
			echo "<tr>";
			echo "<th>Id stavke</th>";
			echo "<th>Naziv</th>";
			echo "<th>Putanja pocetne strane</th>";
			echo "<th>Putanja osatalih strana</th>";
			echo "<th>Roditelj</th>";
			echo "</tr>";
		while($red = mysql_fetch_array($rezultat)){
			echo "<tr>";
			echo "<td>".$red['id_stavke']."</td>";
			echo "<td>".$red['naziv']."</td>";
			echo "<td>".$red['putanja_pocetna']."</td>";
			echo "<td>".$red['putanja_strane']."</td>";
			echo "<td>".$red['roditelj']."</td>";
			echo "<td><a href='obrisi_meni.php?meni=".$red['id_stavke']."'>Obriši stavku</a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<div id='dugmici'>";
		echo "<a href='novi_meni.php'><input type='button' name='btnDodaj' class='izaberite' value='Dodaj novu stavku'/></a>";
		echo "</div>";
		echo "</div>";
	}
	mysql_close($konekcija);
?>