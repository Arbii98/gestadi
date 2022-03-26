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

		function getNbrEtudiants()
		{
			$sql="SELECT count(*) as nbr FROM etudiant";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getNbrStages()
		{
			$sql="SELECT count(*) as nbr FROM stage";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getNbrTokens()
		{
			$sql="SELECT count(*) as nbr FROM token";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getAllEtudiants()
		{
			$sql="SELECT * FROM etudiant";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getAllEtudiantsForDashboard()
		{
			$sql="SELECT e.id, e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, e.Tel_etudiant, e.Email_etudiant, e.Attestation_url,
			s.Identifiant_stage, s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,
			t.nom_tuteur, t.prenom_tuteur
			FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur = s.Identifiant_tuteur";
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