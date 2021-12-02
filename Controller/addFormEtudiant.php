<?php
	
	include "../DB/Config.php";
	include "FormEtudiantCore.php";

	session_start();

	$formEtudiant = new FormEtudiantCore();

	//if(isset($_POST['submit']))
	//{
		$formEtudiant->AddForm($_POST['type'],$_POST['datedebut'],$_POST['datefin'],$_POST['entreprise'],$_POST['email'],$_SESSION['id']);

		$header="MIME-Version: 1.0\r\n";
	$header.='From:"IUT Laval"<no-reply@gestadi.com>'."\n";
	$header.='Content-Type:text/html; charset="uft-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';

	$message='
	<html>
		<body>
			<center>Nous vous invitons à remplir ce formulaire de stage pour l etudiant X !</center>
		</body>
	</html>
	';

	mail($_POST['email'], "Stage !", $message, $header);
		

	

		




	//}

?>