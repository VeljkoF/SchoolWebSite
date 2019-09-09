<?php
	if(isset($_REQUEST['btnSubmit'])){
		include("konekcija.inc");
		@$checkbox = $_REQUEST['obrisi'];
		if($checkbox == ""){
			echo "<div id='ispis'>";
			echo "Niste odabrali fajl za brisanje";
			echo "</div>";
		}
		else{
			foreach($checkbox as $id){
				$upit2 = "DELETE FROM fajlovi_titlovi WHERE id_titla = $id";
				$rezultat2 = mysql_query($upit2);
				if($rezultat2){
					echo "<script>alert('Uspešno ste obrisali odabrane fajlove!')</script>";
				}
				else{
					echo "<div id='ispis'>";
					echo "Greska u brisanju";
					echo "</div>";
				}
			}
		}
	}
?>