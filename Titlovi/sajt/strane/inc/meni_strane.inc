<?php
	include("konekcija.inc");
	$upit_meni = "SELECT * FROM meni_tabel WHERE roditelj = 0";
	$rezultat_meni = mysql_query($upit_meni);
	echo "<ul>";
	while($red = mysql_fetch_array($rezultat_meni)){
		echo "<li><a href=".$red['putanja_strane']."><b>".$red['naziv']."</b></a>";
		pod_meni($red['id_stavke']);
		echo "</li>";
	}
	function pod_meni($roditelj){
		$upit_pod_meni = "SELECT * FROM meni_tabel WHERE roditelj = $roditelj";
		$rezultat_pod_meni = mysql_query($upit_pod_meni);
		@$ima_pod_meni = mysql_num_rows($rezultat_pod_meni);
						
		if($ima_pod_meni > 0){
			echo "<ul>";
			while($red = mysql_fetch_array($rezultat_pod_meni)){
				echo "<li><a href = ".$red['putanja_strane'].">".$red['naziv']."</a></li>";
			}
			echo "</ul>";
		}
	}
	mysql_close($konekcija);
?>