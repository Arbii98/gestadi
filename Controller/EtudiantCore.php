<?php

	class EtudiantCore
	{
		function getEtudiantByNumero($num)
		{
			$sql="SELECT * FROM etudiant where Num_etudiant='$num'";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}


        function remplirEtudiantByNumero($nom,$prenom,$datenaissance,$adresse,$telephone,$email,$num,$nom_entreprise,$email_entreprise)
        {
            $sql = "UPDATE etudiant SET Nom_etudiant=:nom, Prenom_etudiant=:prenom, Date_naissance_etudiant=:datenaissance, 
                Adresse_etudiant=:adresse, Tel_etudiant=:telephone, Email_etudiant=:email, nom_entreprise=:nom_entreprise, email_entreprise=:email_entreprise where Num_etudiant=:num ";
            $db = config::getConnexion();
            try{
                
                $req=$db->prepare($sql);
	            $req->bindValue(':nom',$nom);
                $req->bindValue(':prenom',$prenom);
                $req->bindValue(':datenaissance',$datenaissance);
                $req->bindValue(':adresse',$adresse);
                $req->bindValue(':telephone',$telephone);
                $req->bindValue(':email',$email);
                $req->bindValue(':num',$num);
				$req->bindValue(':nom_entreprise',$nom_entreprise);
				$req->bindValue(':email_entreprise',$email_entreprise);
	            $req->execute();
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
            
        }

	}
?>