<?php
	
	include "../DB/Config.php";
	include "EtudiantCore.php";
	include "TokenCore.php";

	$etudiantC = new EtudiantCore();
	$tokenC = new TokenCore();

	if(count($etudiantC->getEtudiantByNumero($_GET['num_etudiant']))==0)
	{
		echo "Mauvais numero étudiant";
	}
	else
	{

		$etudiantC->remplirEtudiantByNumero($_GET['nom'],$_GET['prenom'],
			$_GET['date_naissance'],$_GET['adresse'],$_GET['numero'],$_GET['email'],$_GET['num_etudiant'],$_GET['nom_entreprise'],$_GET['email_entreprise']);

		$id_etudiant = $etudiantC->getEtudiantByNumero($_GET['num_etudiant'])[0]->id;
		
		$tokenC->markUsedEtudiant($_GET['token'],$id_etudiant);
		
		
		echo "Votre saisie a été éffectué avec succés";
	}

	

		




	//}

?>