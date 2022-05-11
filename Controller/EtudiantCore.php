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
		function stagetrouvé($num){
			
			$sql="update etudiant set STAGE_TROUVÉ=1 where id='$num'";
			$db = config::getConnexion();
			try{
                $db->query($sql);
	            
	           
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
		function getNbrFormEtudRemp(){
			$sql="SELECT COUNT(*) as nbr from etudiant WHERE  Date_naissance_etudiant is not null ";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

		function getNbrFormEntrepRemplis(){
			$sql="SELECT COUNT(*) as nbr from entreprise ";
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
			$sql="SELECT e.id, e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, 
			e.Tel_etudiant, e.Email_etudiant, e.STAGE_TROUVE,e.ACCORD_ETUDIANT,e.Attestation_url, s.Identifiant_stage, 
			s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,s.Nb_heures_semaine_stage,t.Identifiant_tuteur , t.nom_tuteur, t.prenom_tuteur,t.Email_tuteur
			,en.Identifiant_entreprise ,en.Nom_entreprise,en.Email_entreprise,en.rue,en.cp,en.ville,en.SIRET_entreprise,en.NAF_APE_entreprise
			 FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise;";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getEtudiantForConvention($id)
		{
			$sql="SELECT e.id, e.civilite ,e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, 
			e.Tel_etudiant, e.Email_etudiant, e.STAGE_TROUVE,e.ACCORD_ETUDIANT,e.Attestation_url, s.Identifiant_stage, 
			s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,s.Nb_heures_semaine_stage,t.Identifiant_tuteur , t.nom_tuteur, t.prenom_tuteur,t.Email_tuteur
			,en.Identifiant_entreprise ,en.Nom_entreprise,en.Email_entreprise,en.Telephone_entreprise,en.rue,en.cp,en.ville,en.SIRET_entreprise,en.NAF_APE_entreprise,en.civilite_dirigeant,en.nom_dirigeant_entreprise,en.fonction_dirigeant_entreprise,en.prenom_dirigeant_entreprise
			 FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise where e.id=$id";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getMaitresStageOfStudient($num){
			$sql="select * from maitre_de_stage m join entreprise en on m.Identifiant_entreprise =en.Identifiant_entreprise
			join stage s on s.Identifiant_entreprise =en.Identifiant_entreprise where m.Identifiant_entreprise='$num'";
			 $db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}
		
		function getAllTuteurs(){
			$sql="select * from tuteur";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

        function remplirEtudiantByNumero($civilite,$nom,$prenom,$datenaissance,$adresse,$telephone,$email,$num,$nom_entreprise,$email_entreprise)
        {
            $sql = "UPDATE etudiant SET civilite=:civilite ,Nom_etudiant=:nom, Prenom_etudiant=:prenom, Date_naissance_etudiant=:datenaissance, 
                Adresse_etudiant=:adresse, Tel_etudiant=:telephone, Email_etudiant=:email, nom_entreprise=:nom_entreprise, email_entreprise=:email_entreprise where Num_etudiant=:num ";
            $db = config::getConnexion();
            try{
                
                $req=$db->prepare($sql);
				$req->bindValue(':civilite',$civilite);
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


		//NEW
		

		function getData($sqlQuery) {
			$db = config::getConnexion();
			$result = $db->query($sqlQuery);
			if(!$result){
				die('Error in query: '. mysqli_error());
			}
			$data= array();
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$data[]=$row;            
			}
			return $data;
		}
		
		 function getNumRows($sqlQuery) {
			$result =$db->query($sqlQuery);
			if(!$result){
				die('Error in query: '. mysqli_error());
			}
			$numRows = mysqli_num_rows($result);
			return $numRows;
		}
		public function cleanString($str){
			return str_replace(' ','_',$str);
		}

		public function getstudents() {
		
			
			$sql= "SELECT e.id, e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, 
			e.Tel_etudiant, e.Email_etudiant, e.STAGE_TROUVE,e.ACCORD_ETUDIANT,e.Attestation_url, s.Identifiant_stage, 
			s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,s.Nb_heures_semaine_stage,t.Identifiant_tuteur , t.nom_tuteur, t.prenom_tuteur,t.Email_tuteur
			,en.Identifiant_entreprise ,en.Nom_entreprise,en.Email_entreprise,en.rue,en.cp,en.ville,en.SIRET_entreprise,en.NAF_APE_entreprise
			 FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise";	
			if(isset($_POST['category']) && $_POST['category']!=""){			
				$sql.=" having t.Identifiant_tuteur in ('".implode("','",$_POST['category'])."')";
			}
			if(isset($_POST['brand']) && $_POST['brand']!=""){			
				$sql.=" AND brand IN ('".implode("','",$_POST['brand'])."')";
			}
			if(isset($_POST['material']) && $_POST['material']!="") {			
				$sql.=" AND material IN ('".implode("','",$_POST['material'])."')";
			}		
			if(isset($_POST['size']) && $_POST['size']!="") {			
				$sql.=" AND size IN (".implode(',',$_POST['size']).")";
			}
			
			if(isset($_POST['sorting']) && $_POST['sorting']!="") {
				$sorting = implode("','",$_POST['sorting']);			
				if($sorting == 'newest' || $sorting == '') {
					$sql.=" ORDER BY id DESC";
				} else if($sorting == 'low') {
					$sql.=" ORDER BY price ASC";
				} else if($sorting == 'high') {
					$sql.=" ORDER BY price DESC";
				}
			} else {
				$sql.=" ORDER BY id DESC";
			}		
			
			$products = $this->getData($sql);		
			$productHTML = '';
			if(isset($products) && count($products)) {			
				foreach ($products  as $product) {				
					//$productHTML .= '<article class="col-md-4 col-sm-6">';
					$productHTML .= '<div class="thumbnail product">';
					
					$productHTML .= '<div class="caption">';
					$productHTML .= '<a href="" class="product-name">'.$product->Prenom_etudiant.'</a>';
					$productHTML .= '</div>';
					$productHTML .= '</div>';
					//$productHTML .= '</article>';				
				}
			}
			return 	$productHTML;	
		}
		
		function getAllTuteurs2(){
			$sql="select Identifiant_tuteur,Nom_tuteur,Prenom_tuteur from tuteur";
			$db = config::getConnexion();
			try{
                $liste=$db->query($sql);
                return $liste->fetchAll(PDO::FETCH_OBJ);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}
	

	}
?>