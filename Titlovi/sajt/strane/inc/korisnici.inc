<?php
	include("konekcija.inc");
	$upit = "SELECT * FROM tabel_korisnici";
	$rezultat = mysql_query($upit, $konekcija);
	
	if(!$rezultat){
		echo "<div id='ispis'>";
		echo "Nemate korisnike!";
		echo "</div>";
	}
	else{
			echo "<div id='prikaz'>";
			echo "<table border='1'>";
			echo "<tbody>";
			echo "<tr>";
			echo "<th>Id korisnika</th>";
			echo "<th>Korisnicko ime</th>";
			echo "<th>Email</th>";
			echo "<th>Ime</th>";
			echo "<th>Prezime</th>";
			echo "<th>Pol</th>";
			echo "<th>Slika</th>";
			echo "<th>Uloga</th>";
			echo "</tr>";
		while($red = mysql_fetch_array($rezultat)){
			echo "<tr>";
			echo "<td>".$red['id_korisnik']."</td>";
			echo "<td>".$red['korisnicko_ime']."</td>";
			echo "<td>".$red['email']."</td>";
			echo "<td>".$red['ime']."</td>";
			echo "<td>".$red['prezime']."</td>";
			echo "<td>".$red['pol']."</td>";
			echo "<td><img class='mala_slika'src='".$red['putanja_slike']."' alt='".$red['ime']."_".$red['prezime']."'/></td>";
			echo "<td>".$red['uloga']."</td>";
			echo "<td><a href='obrisi_korisnika.php?korisnik=".$red['id_korisnik']."'>Obriši korisnika</a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<div id='dugmici'>";
		echo "<a href='novi_korisnik.php'><input type='button' name='btnDodaj' class='izaberite' value='Dodaj novog korisnika'/></a>";
		echo "</div>";
		echo "</div>";
	}
	mysql_close($konekcija);
?>