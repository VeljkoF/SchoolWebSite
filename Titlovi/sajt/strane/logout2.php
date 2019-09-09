<?php
	@session_start();
	if(isset($_SESSION['uloga']))
	{
		unset($_SESSION['uloga']);
		unset($_SESSION['korisnicko_ime']);
		unset($_SESSION['id_korisnik']);
		
		session_destroy();
		header('Location:autor.php');
	}
?>