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
	<title>Autor</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Strana o autoru" />
	<meta name="keywords" content="autor, anketa, srpskom, titlovi" />
	<link rel="shortcut icon" href="../slike/icon.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="../css/stil.css" />
	<link rel="stylesheet" type="text/css" href="../css/lightbox.css"/>
	<link rel="stylesheet" type="text/css" href="../css/portBox.css" />
	<script type="text/javascript" src="../javascript/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../javascript/javas.js"></script>
	<script type="text/javascript" src="../javascript/jQuery.js"></script>
	<script type="text/javascript" src="../javascript/lightbox.min.js"></script>
	<script type="text/javascript" src="../javascript/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="../javascript/portBox.min.js"></script>
</head>

<body>
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
				<div id="search">
					<form method="GET" action="">
						<input type="text" name="tbSearch" onKeyUp="funkcijaPretraga(this.value)" placeholder="Pretraga...">
					</form>
					<span id="SkrivenText"></span>
				</div>
				<?php
					if(isset($_SESSION['uloga'])){
						if($_SESSION['uloga'] == "korisnik"){
							include("inc/meni_strane.inc");
						}
					}
					else{
						include("inc/meni_strane.inc");
					}
				?>
			</div>
		</div>
		<div id="sadrzaj">
			<h2>Veljko Fridl</h2>
			<div id="slikaja">
				<img src="../slike/veljko_fridl.jpg" alt="autor"/>
			</div>
			<div id="omeni">
				<p>
					Moje ime je Veljko Fridl. Završio sam Tehničku školu Novi Beograd, smer Tehničar optike. Kao tehničar optike 
					radio sam poslednjih 5 godina. Trenutno studiram Visoku školi strukovnih studija
					<b><q><abbr title="Informacione i komunikacione tehnologije">ICT</abbr></q></b>. Generacija 2013/2014.
				</p>
				<br/>
				<p>
					Sajt je izrađen radi ispunjenja predispitnih obaveza iz predmeta Web programiranje PHP1, na smeru Internet 
					tehnologije. Modul Web programiranje, kod profesora Nenada Kojića.
				</p>
				<br/>
			</div> 
			<div id="anketa">
				<h3><u>Anketa</u></h3>
				<?php
					include("anketa.php");
					include("anketa_rezultat.php");
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
</body>
</html>