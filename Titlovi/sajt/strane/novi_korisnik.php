<?php
	session_start();
	include('inc/konekcija.inc');
	
	if(isset($_POST['btnPrijavi']))
	{
		$korisnickoIme=trim($_REQUEST['tbKorisnickoImeLog']);
		$Lozinka=md5(trim($_REQUEST['tbLozinkaLog']));
		
		$upit="SELECT * FROM tabel_korisnici WHERE korisnicko_ime='".$korisnickoIme."'";
		$rezultat=mysql_query($upit, $konekcija);
		
		if(mysql_num_rows($rezultat)==0){
			echo "<script>alert('Niste uneli korisnicko ime i lozinku. Ponovite unos!')</script>";
		}
		else{
			$rez=mysql_fetch_array($rezultat);
			$uloga=$rez['uloga'];
			$korisnicko_ime=$rez['korisnicko_ime'];
			$id_korisnik = $rez['id_korisnik'];
			$_SESSION['uloga']=$uloga;
			$_SESSION['korisnicko_ime'] = $korisnicko_ime;
			$_SESSION['id_korisnik'] = $id_korisnik;
			
			switch($uloga){
				case 'admin':
					header('Location:admin.php');
					break;
				case 'korisnik':
					header('Location:../index.php');
					break;
			}
		}
	}
	mysql_close($konekcija);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Admin-Novi korisnik</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Admin panel, za dodavanje novog korisnika" />
	<meta name="keywords" content="registracija, novi, korisnik, admin, panel, forma, title, spisak, titlovi" />
	<link rel="shortcut icon" href="../slike/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/stil.css" />
	<link rel="stylesheet" type="text/css" href="../css/portBox.css" />
	<script type="text/javascript" src="../javascript/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../javascript/javas.js"></script>
	<script type="text/javascript" src="../javascript/jQuery.js"></script>
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../javascript/portBox.min.js"></script>
</head>

<body>
<?php
	if(!isset($_SESSION['uloga']) == "admin"){
		
		echo "<div id='niste2'>";
		echo "<h2>Niste se prijavili ako Administrator sajta!</h2><br/><br/>";
		echo "<a href='../index.php'>Kliknite ovde da se vratite na početnu stranu!</a>";
		echo "</div>";
	}
	else{
		
?>
	<div id="omot">
		<div id="gost">
			Dobro došli,
			<?php
				if(!isset($_SESSION['uloga'])){
				echo "<a href='#' data-display='mySite' class='button'>";
				echo "Prijavite se";
				echo "</a>";
			?>						
			<div id="mySite" class="portBox">
				<div class="project">
					<form method="POST" action="<?php print $_SERVER['PHP_SELF'];?>">
						<table>
							<tr>
								<td>Korisničko ime:</td>
								<td>
									<input type="text" class="PoljeLog" name="tbKorisnickoImeLog" id="tbKorisnickoImeLog"  maxlength="15"/>
								</td>
							</tr>
							<tr>
								<td>Lozinka:</td>
								<td>
									<input type="password" class="PoljeLog" name="tbLozinkaLog" id="tbLozinkaLog"  maxlength="15"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" class="DugmeLog" id="dugmici2" name="btnPrijavi" value="Prijavi se" class="dugme"/>
								</td>
								<td>
									<a href="registracija.php"><input id="dugmici3"type="button" class="DugmeLog" name="btnRegistruj" value="Registruj se" class="dugme"/></a>
								</td>
							</tr>
						</table>
					</form>
				</div>							
			</div>
			<?php
			}
			if(isset($_SESSION['uloga'])){
				echo $_SESSION['korisnicko_ime'];
				echo "&nbsp;<a href='logout.php'>Logout</a>";
			}
			?>
		</div>	
		<div id="head">
			<img id="p_slika" src="../slike/giphy.gif" alt="filmska_rolna"/>
			<a id="titlovi" href="../index.php"><h1>Titlovi</h1></a>
			<a id="na_srpskom" href="../index.php"><img src="../slike/titlovi.png" alt="natpis_sajta"/></a>
			
			<div class="meni">
				<?php
					if(isset($_SESSION['uloga'])){
						if($_SESSION['uloga'] == "korisnik"){
							include("strane/inc/meni_pocetna.inc");
						}
						else{
							echo "<ul>";
							echo "<li><b><a href='admin.php'>ADMIN PANEL</a></b></li>";
							echo "</ul>";
						}
					}
					else{
						include("strane/inc/meni_pocetna.inc");
					}
				?>
			</div>
		</div>
		<div id="sadrzaj">
			<div class="cisti"></div>
			<div id="obrisi2">
				<h2>Dodavanje novog korisnika:</h2>
				<form name="registracija" action="<?php print $_SERVER['PHP_SELF'];?>"method="post" accept-charset="utf=8"enctype="multipart/form-data">
					<fieldset>
						<table>
							<tbody>
								<tr>
									<td>Korisničko ime:</td> 
									<td><input class="polje"type="text" id="tbKorisnickoIme" name="tbKorisnickoIme"></td>
								</tr>
								<tr>
									<td></td>
									<td class="reg">Treba da sadrži min 6 slova i da se završava brojem.</td>
								</tr>
								<tr>
									<td>Lozinka: </td>
									<td><input class="polje"type="password" id="tbLozinka" name="tbLozinka"></td>
								</tr>
								<tr>
									<td></td>
									<td class="reg">Treba da sadrži min 6 i max 15 slova ili brojeva.</td>
								</tr>
								<tr>
									<td>Ponovni unos lozinke: </td>
									<td><input class="polje"type="password" id="tbPonovoLozinka" name="tbPonovoLozinka"></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Email: </td>
									<td><input class="polje"type="text" id="tbEmail" name="tbEmail"></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Uloga: </td>
									<td>
										<select name="ddlUloga">
											<option value="izaberi">Izaberite ulogu</option>
											<option value="admin">Admin</option>
											<option value="korianik">Korisnik</option>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</fieldset>
					<h3>Personalni podaci novog korisnika:</h3>
					<fieldset>
						<table>
							<tbody>
								<tr>
									<td>Ime: </td>
									<td><input class="polje"type="text" id="tbIme" name="tbIme"></td>
								</tr>
								<tr>
									<td></td>
									<td class="reg">Treba da počne velikim slovom.</td>
								</tr>
								<tr>
									<td>Prezime:</td>
									<td><input class="polje"type="text" id="tbPrezime" name="tbPrezime"></td>
								</tr>
								<tr>
									<td></td>
									<td class="reg">Treba da počne velikim slovom.</td>
								</tr>
								<tr>
									<td rowspan="2">Pol:</td>
									<td><input type="radio" name="rbPol" value="muski">Muški</td>
								</tr>
								<tr>
									<td><input type="radio" name="rbPol" value="zenski">Ženski</td>
								</tr>
								<tr>
									<td>Slika:</td>
									<td>
										<input type="file" id="fSlika" name="fSlika"/>
									</td>
								</tr>
								<tr>
									<td></td>
									<td class="reg">Morate uneti sliku.</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
					<div id="dugmici">
						<input class="dugme" type="submit" name= "btnSubmit" value=" Prijavi "/>&nbsp;&nbsp;&nbsp;
						<input class="dugme" type="reset" value=" Poništi "/>
					</div>
				</form>
				<?php
					if(isset($_REQUEST['btnSubmit'])){
						
						$korisnickoIme = $_REQUEST['tbKorisnickoIme'];
						$lozinka = $_REQUEST['tbLozinka'];
						$ponovoLozinka = $_REQUEST['tbPonovoLozinka'];
						$email = $_REQUEST['tbEmail'];
						$uloga = $_REQUEST['ddlUloga'];
						
						$ime = $_REQUEST['tbIme'];
						$prezime = $_REQUEST['tbPrezime'];
			
						@$pol = $_REQUEST['rbPol'];
			
						$imeFajla = $_FILES['fSlika']['name'];
						$privremenoImeFajla = $_FILES['fSlika']['tmp_name'];
			
						$putanjaSlike = "../slike/korisnici/".$imeFajla;
						
						$regKorisnickoIme = "/^\w{6,}\d$/";
						$regLozinka = "/^[A-Za-z\d]{6,15}$/";
						$regEmail = "/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/";
						
						$regIme = "/^[A-Z]{1}[a-z]{2,60}$/";
						$regPrezime = "/^[A-Z]{1}[a-z]{2,60}$/";
						
						$regImeFajla = "/^\S+\.(gif|jpg|jpeg|png)$/";
						
						$greske = array();
						
						if(!preg_match($regKorisnickoIme, $korisnickoIme)){
							$greske[] = "Korisnicko ime nije u dobrom formatu!";
						}
						
						if(!preg_match($regLozinka, $lozinka)){
							$greske[] = "Lozinka nije u dobrom formatu!";
						}
						else{
							if(!$lozinka = $ponovoLozinka){
								$greske[] = "Ponovljena lozinka nije ista!";
							}								
						}
						$lozinkaMD5 = md5($lozinka);
						
						if(!preg_match($regEmail, $email)){
							$greske[] = "Email nije u dobrom formatu!";
						}
						
						if($uloga == "izaberi"){
							$greske[] = "Morate izabrati ulogu!";
						}
						
						if(!preg_match($regIme, $ime)){
							$greske[] = "Ime nije u dobrom formatu!";
						}
						
						if(!preg_match($regPrezime, $prezime)){
							$greske[] = "Prezime nije u dobrom formatu!";
						}
		
						if(empty($pol)){
							$greske[] = "Izaberite pol!";
						}
						
						if(empty($imeFajla)){
							$greske[] = "Morate uneti sliku!";
						}
						else{
							if(!preg_match($regImeFajla, $imeFajla)){
								$greske[] = "Slika nije dobar format!";
							}
						}
						
						if(count($greske) != 0){
							echo "<div id='ispis'>";
							foreach($greske as $g){
								echo "<i>". $g."</i><br/>";
							}
							echo "</div>";
						}
						else{
							include("inc/konekcija.inc");
							if(move_uploaded_file($privremenoImeFajla, $putanjaSlike)){
								$upit_upis = "INSERT INTO tabel_korisnici VALUES('', '$korisnickoIme', '$lozinkaMD5', '$email', '$ime', '$prezime', '$pol', '$putanjaSlike', '$uloga')";
								$rez_upis = mysql_query($upit_upis, $konekcija);
				
								if(!$rez_upis){
									echo "<div id='ispis'><i>";
									echo "Greska prilikom upisa - ".mysql_error();
									echo "</i></div>";
								}
								else{
									echo "<div id='ispis4'><i>";
									echo "Uspesno ste kreirali novog korisnika!!!";
									echo "</i></div>";
								}
							}
							mysql_close($konekcija);
						}
					}
				?>
			</div>
		</div>
		<div id="footer">
			<div id="copy">
				<p>
					Copyright &copy; 2015 <a href="strane/autor.php"> by Freeky </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="strane/mapa_sajta.xml">Mapa sajta</a>
				</p>
			</div>
			<div id="icon">
				<a href="strane/rss.xml"><img src="../slike/icon/rss.png" alt="icon_rss"/></a>
				<a href="https://www.facebook.com/"><img src="../slike/icon/facebook.png" alt="icon_facebook"/></a>
				<a href="https://twitter.com/"><img src="../slike/icon/twitter.png" alt="icon_twitter"/></a>
				<a href="https://www.youtube.com/"><img src="../slike/icon/youtube.png" alt="icon_youtube"/></a>
			</div>
		</div>
	</div>
		<?php
		}
	?>
</body>
</html>