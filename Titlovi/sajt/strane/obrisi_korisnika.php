<?php
	$korisnik = $_GET['korisnik'];
	include("inc/konekcija.inc");
	$upit_brisi = "DELETE FROM tabel_korisnici WHERE id_korisnik = $korisnik";
	$rez = mysql_query($upit_brisi, $konekcija);
	
	if($rez){
		header('Location: admin.php');
	}
	else{
		echo "Niste uspeli da obrisete stavku menija".mysql_error();
	}
	mysql_close($konekcija);
?>