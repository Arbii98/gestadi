<?php

    class MaitreCore
    {
        function addMaitre($nom_maitre,$prenom_maitre,$statut_maitre,$poste_maitre,$telephone_maitre,$email_maitre,$entreprise)
        {
            $sql="INSERT INTO maitre_de_stage values(null,:nom_maitre,:prenom_maitre,:statut_maitre,:poste_maitre,:telephone_maitre,:email_maitre,:entreprise);";
			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
	        $req->bindValue(':nom_maitre',$nom_maitre);
            $req->bindValue(':prenom_maitre',$prenom_maitre);
            $req->bindValue(':statut_maitre',$statut_maitre);
            $req->bindValue(':poste_maitre',$poste_maitre);
            $req->bindValue(':telephone_maitre',$telephone_maitre);
            $req->bindValue(':email_maitre',$email_maitre);
            $req->bindValue(':entreprise',$entreprise);
	            $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
        }

    }


?>