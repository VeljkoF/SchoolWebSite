<?php
	include("konekcija.inc");
	if(@$_GET['skriveno']){
	$skriveno = $_GET['skriveno'];
	}
	else{
		@$skriveno = 0;
	}
	$koliko_po_strani = 10;
	$upit1 = "SELECT * FROM fajlovi_titlovi WHERE id_korisnik=".$_SESSION['id_korisnik']." LIMIT $koliko_po_strani OFFSET $skriveno";
	$rezultat1 = mysql_query($upit1, $konekcija);
	
	
	if(mysql_num_rows($rezultat1) == 0){
		echo "<div id='ispis2'>";
		echo "Nemate unete titlove!";
		echo "</div>";
	}
	else{
		
		echo "<br/><h4>Obeližite title za brisanje</h4><br/>";
		
		$upit_count = "SELECT count(id_titla) FROM fajlovi_titlovi";
		$rezultat_count = mysql_query($upit_count);
		$niz_count = mysql_fetch_array($rezultat_count);
		$ukupan_zapis = $niz_count[0];
	
		$levo = $skriveno - $koliko_po_strani;
		$desno = $skriveno + $koliko_po_strani;
	
		if($levo<0){
			echo "<div class='navigator2'>Početak <a href=\"obrisi.php?skriveno=$desno\">Naredni</a></div>";
		}
		elseif($desno>$ukupan_zapis){
			echo "<div class='navigator2'><a href=\"obrisi.php?skriveno=$levo\">Predhodni</a> Kraj</div>";
		}
		else{
			echo "<div class='navigator2'><a href=\"obrisi.php?skriveno=$levo\">Predhodni</a> <a href=\"index.php?skriveno=$desno\">Naredni</a></div>";
		}
		
		echo "<br/><table border='1'>";
		echo "<tbody>";
		echo "<tr>";
		echo "<th>Obeleži</th>";
		echo "<th>Naziv filma</th>";
		echo "<th>Opis filma</th>";
		echo "<th>Preuzmi</th>";
		echo "</tr>";
		while($red = mysql_fetch_array($rezultat1)){
			echo "<tr>";
			echo "<td>";
			echo "<input type='checkbox' name='obrisi[]' value='".$red['id_titla']."'>";
			echo "</td>";
			echo "<td>";
			echo $red['naziv'];
			echo "</td>";
			echo "<td>";
			echo $red['opis'];
			echo "</td>";
			echo "<td>";
			echo "<a href='".$red['putanja_title']."'>Skini fajl</a>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "<div id='dugmici'>";
		echo "<input class='dugme' type='submit' name= 'btnSubmit' value=' Obriši '/>&nbsp;&nbsp;&nbsp;";
		echo "<input class='dugme' type='reset' value=' Poništi '/>";
		echo "</div>";
	}
	

	mysql_close($konekcija);
?>