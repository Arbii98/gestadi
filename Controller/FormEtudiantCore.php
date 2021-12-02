<?php

	class FormEtudiantCore
	{
		function AddForm($type,$debut,$fin,$entreprise,$mail,$user)
		{
			$sql="insert into form_etu values (null,:type, :debut,:fin,:entreprise,:mail,:user)";
			$db = config::getConnexion();
			try{
	        $req=$db->prepare($sql);
	        $req->bindValue(':type',$type);
			$req->bindValue(':debut',$debut);
			$req->bindValue(':fin',$fin);
			$req->bindValue(':entreprise',$entreprise);
			$req->bindValue(':mail',$mail);
			$req->bindValue(':user',$user);
	            $req->execute();
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

	}
?>