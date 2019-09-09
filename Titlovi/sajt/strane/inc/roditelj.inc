<?php
	include("konekcija.inc");
	$upit = "SELECT * FROM meni_tabel WHERE roditelj = 0";
	$rezultat = mysql_query($upit);
	
	while($red = mysql_fetch_array($rezultat)){
		echo "<option value='".$red['id_stavke']."'>".$red['naziv']."</option>";
	}
?>