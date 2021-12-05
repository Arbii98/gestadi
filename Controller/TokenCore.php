<?php

	class TokenCore
	{
		function addToken($token)
		{
			$sql="insert into token values (null,:token,0,0)";
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

	}
?>