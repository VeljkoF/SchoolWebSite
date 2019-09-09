<?php
	include("inc/konekcija.inc");
	echo("<form method='POST' name='form_anketa' id='pitanje' action='autor.php'>");
	$upit="SELECT * FROM anketa WHERE aktivna=1";
	$rezultat1=mysql_query($upit,$konekcija);
	$niz=@mysql_fetch_array($rezultat1);
	$upit2="SELECT * FROM anketa AS ap JOIN anketa_odgovori AS ao ON ap.id_ankete=ao.id_ankete WHERE ap.aktivna=1";
	$rezultat2=mysql_query($upit2,$konekcija);
	echo("<table ><th><h4>".$niz['pitanje']."</h4></th>");
	while($niz2=mysql_fetch_array($rezultat2)){
	echo("<tr><td><input type='radio' name='odgovor'value='".$niz2['id_odgovora']."' id='".$niz2['odgovor']."' class='odgovor'>".$niz2['odgovor']."</td></tr>");
	}
	echo("</div></table><div id='glasaj'><input type='submit' name='anketa_glasaj' value='Glasaj' id='dugmici4'></div></form>");?>