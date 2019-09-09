<form name='novi' action='<?php print $_SERVER['PHP_SELF'];?>'method='post' accept-charset='utf=8'>
	<fieldset>
		<table>
			<tbody>
				<tr>
					<td>Naziv:</td>
					<td>
						<input class='polje'type='text' id='tbNaziv' name='tbNaziv'>
					</td>
				</tr>
				<tr>
					<td>Putanja pocetne strane: </td>
					<td>
						<input class='polje'type='text' id='tbPocetna' name='tbPocetna'>
					</td>
				</tr>
				<tr>
					<td>Putanja ostale strane: </td>
					<td>
						<input class='polje'type='text' id='tbStrane' name='tbStrane'>
					</td>
				</tr>
				<tr>
					<td>Izaberite gde želite da smestite podmeni:</td>
					<td>
						<select name='ddlRoditelj'>
							<option value='izaberite'>Izaberite roditelja</option>
							<?php
								include("roditelj.inc");
							?>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<div id='dugmici'>
		<input type='submit' name='btnDodaj' class='izaberite' value='Dodaj novu stavku'/>
		<input class='izaberite' type='reset' value='Poništi'/>
	</div>
</form>

<?php
	if(isset($_REQUEST['btnDodaj'])){
		
		$naziv = $_REQUEST['tbNaziv'];
		$pocetna = $_REQUEST['tbPocetna'];
		$strane = $_REQUEST['tbStrane'];
		$roditelj = $_REQUEST['ddlRoditelj'];
		
		$greske = array();
		
		if(!$naziv){
			$greske[] = "Niste uneli naziv podmenija!";
		}
		if(!$pocetna){
			$greske[] = "Niste uneli putanju za pocetnu stranu podmenija!";
		}
		if(!$strane){
			$greske[] = "Niste uneli putanju za strane podmenija!";
		}
		if(!$roditelj){
			$greske[] = "Niste gde zelite da smestite podmeni!";
		}
		
		if(count($greske) != 0){
			echo "<div id='ispis'>";
			foreach($greske as $g){
				echo "<i>". $g."</i><br/>";
			}
			echo "</div>";
		}
		else{
			include("konekcija.inc");
			$upit = "INSERT INTO meni_tabel VALUES ('','$naziv', '$pocetna', '$strane', $roditelj)";
			$rezultat = mysql_query($upit);
		
			if($rezultat){
				echo "Ispesno ste dodali novi podmeni";
			}
			else{
				echo "Niste uneli podatke. Sva polja su obavezna";
			}
		}
	}
?>