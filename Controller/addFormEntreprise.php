<?php
	
	include "../DB/Config.php";
	include "EntrepriseCore.php";
	include "TokenCore.php";
    include "MaitreCore.php";

	$entrepriseC = new EntrepriseCore();
	$tokenC = new TokenCore();
    $maitreC = new MaitreCore();

	

		$entrepriseC->addEntreprise($_GET['nom_entreprise'],$_GET['numero_siret'],
			$_GET['code_naf_ape'],$_GET['nom_dirigeant'],$_GET['prenom_dirigeant'],$_GET['email_entreprise'],$_GET['rue'],$_GET['cp'],$_GET['ville']);

        $entreprise_id = $entrepriseC->getLastAddedEntreprise()[0]->Identifiant_entreprise;

        $maitreC->addMaitre($_GET['nom_maitre'],$_GET['prenom_maitre'],$_GET['statut_maitre'],$_GET['poste_maitre'],
            $_GET['telephone_maitre'],$_GET['email_maitre'],$entreprise_id);


		
		$tokenC->markUsedEntreprise($_GET['token'],$entreprise_id);
		
		
		echo "Votre saisie a été éffectué avec succés";
	

	

		




	//}

?>