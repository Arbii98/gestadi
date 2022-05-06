<?php 

    class ConventionCore
    {
        function addConvention($civilite,$nom,$prenom,$adresse,$id_entreprise,$id_stage)
        {
            $sql="INSERT INTO convention values(null,:civilite,:nom,:prenom,:adresse,:id_entreprise,:id_stage);";
			$db = config::getConnexion();
			try{

	        $req=$db->prepare($sql);
	        $req->bindValue(':civilite',$civilite);
            $req->bindValue(':nom',$nom);
            $req->bindValue(':prenom',$prenom);
            $req->bindValue(':adresse',$adresse);
            $req->bindValue(':id_entreprise',$id_entreprise);
            $req->bindValue(':id_stage',$id_stage);
	        
            $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
        }
    }


?>