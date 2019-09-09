<?php
	include("konekcija.inc");
	if(@$_GET['skriveno']){
		$skriveno = $_GET['skriveno'];
	}
	else{
		@$skriveno = 0;
	}
	$koliko_po_strani = 8;
	$upit = "SELECT * FROM fajlovi_titlovi LIMIT $koliko_po_strani OFFSET $skriveno";
	$rezultat = mysql_query($upit, $konekcija);
	echo "<div id='galerija'>";
	if(mysql_num_rows($rezultat) == 0){
		
	}
	else{
		$upit_count = "SELECT count(id_titla) FROM fajlovi_titlovi";
		$rezultat_count = mysql_query($upit_count);
		$niz_count = mysql_fetch_array($rezultat_count);
		$ukupan_zapis = $niz_count[0];
	
		$levo = $skriveno - $koliko_po_strani;
		$desno = $skriveno + $koliko_po_strani;
		
		if($levo<0){
			echo "<div class='navigator'>Početak <a href=\"galerija.php?skriveno=$desno\">Naredni</a></div>";
		}
		elseif($desno>$ukupan_zapis){
			echo "<div class='navigator'><a href=\"galerija.php?skriveno=$levo\">Predhodni</a> Kraj</div>";
		}
		else{
			echo "<div class='navigator'><a href=\"galerija.php?skriveno=$levo\">Predhodni</a> <a href=\"index.php?skriveno=$desno\">Naredni</a></div>";
		}
		while($red = mysql_fetch_array($rezultat)){
			$brGlasova = $red['glasova'];
			$rezultati = $red['rezultat'];
			$iznos = $rezultati/$brGlasova;
			echo "<div class='gslika'>";
			echo "<a href='".$red['putanja_slike']."' data-lightbox='galerija' data-title='".$red['naziv']."'>";
			echo "<img src='".$red['putanja_slike']."' alt='".$red['naziv']."'/>";
			echo "</a><p><b><i>".$red['naziv']."</i></b></p>";
			echo "<p><form name='glasanje' method='post' action=";
			print $_SERVER['PHP_SELF'];
			echo "><select name='glas' onchange='promena(this, ".$red['id_titla'].")'><option value=0>Ocenite</option>";
			echo "<option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option>";
			echo "</select></form><div class='ocena'>Trenutna ocena: ".round($iznos)."</div></p>";
			echo "</div>";
		}
		
	}
	echo "</div>";
	echo "<div class='cisti'></div>";
	echo "<div id='prikaz2'></div>";
	mysql_close($konekcija);
?>