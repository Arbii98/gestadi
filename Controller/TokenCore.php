<?php

	class TokenCore
	{
		function addToken($token,$id)
		{
			$sql="insert into token values (null,:token,0,0,:id,null)";
			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
	        $req->bindValue(':token',$token);
			$req->bindValue(':id',$id);
	            $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getAllTokens(){
			$sql="SELECT * from token";
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste->fetchAll(PDO::FETCH_OBJ);
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}


		function getTokenByToken($token){
			$sql="SELECT t.id, t.token, t.validerEtudiant, t.validerEntreprise, t.id_etudiant, t.id_entreprise, e.Nom_etudiant, e.Prenom_etudiant, e.Num_etudiant from token t join etudiant e on t.id_etudiant = e.id where t.token='$token'";
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste->fetchAll(PDO::FETCH_OBJ);
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function markUsedEtudiant($token,$id_etudiant)
		{
			$sql = "UPDATE token set validerEtudiant = 1, id_etudiant=$id_etudiant where token=:token";
            $db = config::getConnexion();
            try{
                
                $req=$db->prepare($sql);
	            $req->bindValue(':token',$token);
	            $req->execute();
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

		function markUsedEntreprise($token,$id_entreprise)
		{
			$sql = "UPDATE token set validerEntreprise = 1, id_entreprise=$id_entreprise where token=:token";
            $db = config::getConnexion();
            try{	
                
                $req=$db->prepare($sql);
	            $req->bindValue(':token',$token);
	            $req->execute();
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}
		
		
		
	}


?>