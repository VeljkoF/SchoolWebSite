<?php
	include("inc/konekcija.inc");
	
	$glas = $_REQUEST["glas"];
	$film = $_REQUEST["film"];
	
	$upit = "SELECT * FROM fajlovi_titlovi WHERE id_titla = ".$film;
	$rezultat = mysql_query($upit);
	if($red = mysql_fetch_array($rezultat)){
		$brGlasova = $red['glasova']; //1
		$rezultat2 = $red['rezultat']; //1
		$novBrGlasova = $brGlasova + 1; //1+1
		$novReazultat = $rezultat2 + $glas; //1+2
		$ispis = $novReazultat/$novBrGlasova; // 3/2
		
		$upit_upis = "UPDATE fajlovi_titlovi SET glasova=$novBrGlasova, rezultat=$novReazultat WHERE id_titla=$film";
		$rezultat_upis= mysql_query($upit_upis);
		if(!$rezultat_upis){
			echo "<script>alert('Greska u glasanju!');</script>".mysql_error();
		}
		echo "Glasali ste za film: ".$red['naziv'].", srednja ocena: ".round($ispis);
	}
	else{
		echo "<script>alert('Greska u upitu!');</script>".mysql_error();
	}
?>