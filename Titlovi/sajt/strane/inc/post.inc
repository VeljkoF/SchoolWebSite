<?php
	include("konekcija.inc");
	if(@$_GET['skriveno']){
		$skriveno = $_GET['skriveno'];
	}
	else{
		@$skriveno = 0;
	}
	$koliko_po_strani = 6;
	$upit1 = "SELECT * FROM fajlovi_titlovi LIMIT $koliko_po_strani OFFSET $skriveno";
	$rezultat1 = mysql_query($upit1, $konekcija);
	if(empty ($rezultat1)){
		echo "Nemate ništa uneto u bazu!";
	}
	else{
		$upit_count = "SELECT count(id_titla) FROM fajlovi_titlovi";
		$rezultat_count = mysql_query($upit_count);
		$niz_count = mysql_fetch_array($rezultat_count);
		$ukupan_zapis = $niz_count[0];
	
		$levo = $skriveno - $koliko_po_strani;
		$desno = $skriveno + $koliko_po_strani;
	
		if($levo<0){
			echo "<div class='navigator'>Početak <a href=\"index.php?skriveno=$desno\">Naredni</a></div>";
		}
		elseif($desno>$ukupan_zapis){
			echo "<div class='navigator'><a href=\"index.php?skriveno=$levo\">Predhodni</a> Kraj</div>";
		}
		else{
			echo "<div class='navigator'><a href=\"index.php?skriveno=$levo\">Predhodni</a> <a href=\"index.php?skriveno=$desno\">Naredni</a></div>";
		}
		while($red1 = mysql_fetch_array($rezultat1)){
			$fileName = $red1['putanja_title'];
			$id_titla= $red1['id_titla'];
			
			echo "<div class='post'>";
			echo "<div class='skinuti'>";
			echo "<a href='titlovi/".$fileName."' name='".$id_titla."'>";
			echo "<img src='slike/1.png' alt='filmska_rolna'>";
			echo "</a>";
			echo "</div>";
			echo "<div class='info'>";
			echo "<div class='nazivi'>";
			echo "<div class='nazivFilma'>";
			echo "<a href='titlovi/".$fileName."' name='".$id_titla."'>";
			echo "<p><b>".$red1['naziv']."</b></p>";
			echo "</a>";
			echo "</div>";
			echo "<div class='opisFilma'>";
			echo "<p><b>".$red1['opis']."</b></p>";
			echo "</div>";
			echo "</div>";
			echo "<div class='ime_datum'>";
			$upit2 = "SELECT * FROM tabel_korisnici LIMIT $koliko_po_strani OFFSET $skriveno";
			$rezultat2 = mySQL_query($upit2, $konekcija);
			$red2 = mysql_fetch_array($rezultat2);
			echo "<p><b>".$red2['korisnicko_ime']."</b>&nbsp;";
			echo "</div></div></div>";
		
		}
	}
	echo "</div>";
	mysql_close($konekcija);
?>