<?php

    class EntrepriseCore
    {
        function addEntreprise($nom,$siret,$naf_ape,$nom_dirigeant,$prenom_dirigeant,$email_entreprise,$rue,$cp,$ville)
        {
            $sql="INSERT INTO entreprise values(null,:nom,:siret,:naf_ape,:nom_dirigeant,:prenom_dirigeant,:email_entreprise,:rue,:cp,:ville);";
			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
	        $req->bindValue(':nom',$nom);
            $req->bindValue(':siret',$siret);
            $req->bindValue(':naf_ape',$naf_ape);
            $req->bindValue(':nom_dirigeant',$nom_dirigeant);
            $req->bindValue(':prenom_dirigeant',$prenom_dirigeant);
            $req->bindValue(':email_entreprise',$email_entreprise);
            $req->bindValue(':rue',$rue);
            $req->bindValue(':cp',$cp);
            $req->bindValue(':ville',$ville);
	            $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
        }

        function getLastAddedEntreprise()
        {
            $sql="SELECT * from entreprise order by Identifiant_entreprise desc limit 1";
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste->fetchAll(PDO::FETCH_OBJ);
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }
    }


?>