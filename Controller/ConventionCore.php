<?php 

    class ConventionCore
    {
        function addConvention($nom,$prenom,$adresse,$id_entreprise,$id_stage)
        {
            $sql="INSERT INTO convention values(null,:nom,:prenom,:adresse,:id_entreprise,:id_stage);";
			$db = config::getConnexion();
			try{

	        $req=$db->prepare($sql);
	        
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