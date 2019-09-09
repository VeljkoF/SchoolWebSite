<?php
	echo ("<form name='form_anketa' id='rezultat' method='POST'action='anketa.php'>");
	include("inc/konekcija.inc");
	@$odgovor = $_POST['odgovor'];
	$upit_odg="SELECT * FROM anketa_odgovori WHERE id_odgovora=$odgovor";
	$rez_odg=mysql_query($upit_odg,$konekcija);
	$upisi_odgovor="UPDATE `anketa_odgovori` SET `glasovi` = glasovi +1 WHERE `id_odgovora` =$odgovor";
	$rezultat=mysql_query($upisi_odgovor,$konekcija);
	$upit="SELECT * FROM anketa WHERE aktivna=1";
	$rezultat1=mysql_query($upit,$konekcija);
	$niz=mysql_fetch_array($rezultat1);
	$id=$niz['id_ankete'];
	$upit2="SELECT * FROM anketa AS ap JOIN anketa_odgovori AS ao ON ap.id_ankete=ao.id_ankete WHERE ap.aktivna=1";
	$rezultat2=mysql_query($upit2,$konekcija);
	$upit3="SELECT SUM(glasovi) as Suma FROM anketa_odgovori WHERE id_ankete=$id";
	$suma=mysql_query($upit3,$konekcija);
	$niz3=mysql_fetch_array($suma);
	echo ("<table><th colspan='2'>Rezultati ankete:</th>");
	while($niz2=mysql_fetch_array($rezultat2)){
		if($niz3['Suma']!=0){
			$procenat = ceil((100*$niz2['glasovi'])/$niz3[0]);
		}
		else{
			$procenat = "Za sada nema glasova";
		}
		echo('<tr><td>'.$niz2['odgovor'].':</td><td>'.$niz2['glasovi'].'&nbsp glasova</td></tr><tr ><td><div><div style="width:'.$procenat.'%;height:20px;float:left;background:purple;-moz-borderradius:5px;-webkit-border-radius: 5px;border-radius: 5px;"></div></div>&nbsp'.$procenat.'%</td></tr>');
	}
	echo'</table></br></form>';
?>
