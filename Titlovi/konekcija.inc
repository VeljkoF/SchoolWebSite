<?php
	$ime_servera = "sql308.byethost13.com";
	$kor_ime = "b13_16335609";
	$lozinka = "71026800";
	
	$ime_baze = "b13_16335609_site";
	
	$konekcija = mysql_connect($ime_servera, $kor_ime, $lozinka);
	
	$izbor_baze = mysql_select_db($ime_baze, $konekcija);
	
	$greske= array();
	
	if(!$konekcija){
		$greske[] = "Nije uspela konekcija sa serverom baze!";		
	}
	else{
		if(!$izbor_baze){
			$greske[] = "Greska prilikom izbora baze podataka!";
		}
	}
	mysql_set_charset('utf8');
?>