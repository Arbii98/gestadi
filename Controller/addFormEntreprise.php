<?php
	
	include "../DB/Config.php";
	include "EntrepriseCore.php";
	include "TokenCore.php";
    include "MaitreCore.php";
	include "StageCore.php";
	include "ConventionCore.php";


	$entrepriseC = new EntrepriseCore();
	$tokenC = new TokenCore();
    $maitreC = new MaitreCore();
	$stageC = new StageCore();
	$conventionC = new ConventionCore();

	

		$entrepriseC->addEntreprise($_GET['nom_entreprise'],$_GET['numero_siret'],
			$_GET['code_naf_ape'],$_GET['civilite_dirigeant'],$_GET['nom_dirigeant'],$_GET['prenom_dirigeant'],$_GET['fonction_dirigeant'],$_GET['email_entreprise'],$_GET['telephone'],$_GET['rue'],$_GET['cp'],$_GET['ville']);

        $entreprise_id = $entrepriseC->getLastAddedEntreprise()[0]->Identifiant_entreprise;
        $maitreC->addMaitre($_GET["civilite_maitre1"],$_GET['nom_maitre'],$_GET['prenom_maitre'],$_GET['statut_maitre'],$_GET['poste_maitre'],
            $_GET['telephone_maitre'],$_GET['email_maitre'],$entreprise_id);

		if($_GET['nom_maitre2']!="")
		{
			$maitreC->addMaitre($_GET["civilite_maitre2"],$_GET['nom_maitre2'],$_GET['prenom_maitre2'],$_GET['statut_maitre2'],$_GET['poste_maitre2'],
            	$_GET['telephone_maitre2'],$_GET['email_maitre2'],$entreprise_id);
		}
		
		$tokenC->markUsedEntreprise($_GET['token'],$entreprise_id);

		$etudiant_id=$tokenC->getTokenByToken($_GET['token'])[0]->id_etudiant;

		$stageC->addStage($_GET["titre_stage"],$_GET["description_stage"],$_GET["date_debut"],$_GET["date_fin"],$_GET["nb_heures"],$_GET["adresse_stage"],$_GET["ide"],$_GET["gratification"],$_GET["avantages"],$etudiant_id,$entreprise_id);

		$stage_id = $stageC->getLastAddedStage()[0]->Identifiant_stage;

		$conventionC->addConvention($_GET["civilite_signataire"],$_GET["nom_signataire"],$_GET["prenom_signataire"],"adresse statique",$entreprise_id,$stage_id);

		
		
		echo "Votre saisie a été éffectué avec succés";
	

	

		




	//}

?>