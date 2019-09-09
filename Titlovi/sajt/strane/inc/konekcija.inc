<?php
	$ime_servera = "localhost";
	$kor_ime = "root";
	$lozinka = "";
	
	$ime_baze = "site";
	
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