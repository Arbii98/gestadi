<?php 

    class StageCore
    {

        function addStage($titre,$description,$date_debut,$date_fin,$nb,$adresse,$ide,$gratification,$avantages,$id_etudiant,$id_entreprise)
		{
			$sql="insert into stage values (null,:titre,:description,:date_debut,:date_fin,:nb,1,:adresse,:ide,:gratification,:avantages,:id_etudiant,:id_entreprise,null)";
			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
	        $req->bindValue(':titre',$titre);
            $req->bindValue(':description',$description);
            $req->bindValue(':date_debut',$date_debut);
            $req->bindValue(':date_fin',$date_fin);
            $req->bindValue(':nb',$nb);
            $req->bindValue(':adresse',$adresse);
            $req->bindValue(':ide',$ide);
            $req->bindValue(':gratification',$gratification);
            $req->bindValue(':avantages',$avantages);
            $req->bindValue(':id_etudiant',$id_etudiant);
            $req->bindValue(':id_entreprise',$id_entreprise);

	            $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

        function getLastAddedStage()
        {
            $sql="SELECT * from stage order by Identifiant_stage desc limit 1";
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