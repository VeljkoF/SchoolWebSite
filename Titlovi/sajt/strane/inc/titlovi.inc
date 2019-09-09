<?php
	include("konekcija.inc");
	$upit = "SELECT * FROM fajlovi_titlovi";
	$rezultat = mysql_query($upit, $konekcija);
	
	if(!$rezultat){
		echo "<div id='ispis'>";
		echo "Nemate titlove u bazi!";
		echo "</div>";
	}
	else{
			echo "<div id='prikaz'>";
			echo "<table border='1'>";
			echo "<tbody>";
			echo "<tr>";
			echo "<th>Id titla</th>";
			echo "<th>Naziv</th>";
			echo "<th>Opis</th>";
			echo "<th>Titla</th>";
			echo "<th>Slika</th>";
			echo "<th>Od korisnika</th>";
			echo "</tr>";
		while($red = mysql_fetch_array($rezultat)){
			echo "<tr>";
			echo "<td>".$red['id_titla']."</td>";
			echo "<td>".$red['naziv']."</td>";
			echo "<td>".$red['opis']."</td>";
			echo "<td><img class='mala_slika'src='".$red['putanja_slike']."' alt='".$red['naziv']."'/></td>";
			$upit2 = "SELECT * FROM tabel_korisnici WHERE id_korisnik='".$red['id_korisnik']."'";
			$rezultat2 = mysql_query($upit2, $konekcija);
			$red2 = mysql_fetch_array($rezultat2);
			echo "<td>".$red2['korisnicko_ime']."</td>";
			echo "<td><a href='obrisi_title.php?title=".$red['id_titla']."'>Obriši title</a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		
	}
	mysql_close($konekcija);
?>