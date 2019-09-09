<?php
	$id = $_GET['meni'];
	include("inc/konekcija.inc");
	$upit_brisi = "DELETE FROM meni_tabel WHERE id_stavke = $id";
	$rez = mysql_query($upit_brisi, $konekcija);
	
	if($rez){
		header('Location: admin.php');
	}
	else{
		echo "Niste uspeli da obrisete stavku menija".mysql_error();
	}
	mysql_close($konekcija);
?>