<?php
class Product{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "projet4a";
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function cleanString($str){
		return str_replace(' ','_',$str);
	}


	public function getTuteurs() {		
		$sqlQuery = "
		select Identifiant_tuteur,Nom_tuteur,Prenom_tuteur from tuteur ";
        return  $this->getData($sqlQuery);
	}

	
	
		
	
	
	public function getstudents() {
		
			
		$sql= "SELECT e.id, e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, 
		e.Tel_etudiant, e.Email_etudiant, e.STAGE_TROUVE,e.ACCORD_ETUDIANT,e.Attestation_url, s.Identifiant_stage, 
		s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,s.Nb_heures_semaine_stage,t.Identifiant_tuteur , t.nom_tuteur, t.prenom_tuteur,t.Email_tuteur
		,en.Identifiant_entreprise ,en.Nom_entreprise,en.Email_entreprise,en.rue,en.cp,en.ville,en.SIRET_entreprise,en.NAF_APE_entreprise
		 FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise having e.id is not null ";	
		if(isset($_POST['category']) && $_POST['category']!=""){			
			$sql.=" and t.Identifiant_tuteur in ('".implode("','",$_POST['category'])."')";
		}
		if(isset($_POST['material']) && $_POST['material']!="") {			
			$sql.=" and e.ACCORD_ETUDIANT in ('".implode("','",$_POST['material'])."')";
		}
		else if(isset($_POST['sorting']) && $_POST['sorting']!=""){			
			$sql.=" and e.STAGE_TROUVE in ('".implode("','",$_POST['sorting'])."')";
		}
		
		
		
		if(isset($_POST['brand']) && $_POST['brand']!=""){			
			//$sql.=" AND e.Tel_etudiant IN ('".implode("','",$_POST['brand'])."')";
			$str = array(implode(",", $_POST['brand']));
		   // $nlbr=count($str);
			
		   if(in_array('1', $str)){
			$sql.=" and e.Tel_etudiant is not null";
		   }
		   if(in_array('0', $str)){
			$sql.=" and e.Tel_etudiant is  null";
		   }
		 

			
		}
		
		if(isset($_POST['size']) && $_POST['size']!=""){			
			//$sql.=" AND e.Tel_etudiant IN ('".implode("','",$_POST['brand'])."')";
			$str2 = array(implode(",", $_POST['size']));
		   // $nlbr=count($str);
			
		   if(in_array('1', $str2)){
			$sql.=" and s.Identifiant_stage is not null ";
		   }
		   if(in_array('0', $str2)){
			$sql.=" and s.Identifiant_stage is  null ";
		   }
		 

			
		}
		 
		
		
         

		$products = $this->getData($sql);
		$productHTML = '';
		$productHTML .='<div class="container w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table id="array" class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"  style="background-color : #E5007D; color : white">
                    <th class="px-4 py-3" onclick="sort_etudiant()">Etudiant</th>
                    <th class="px-4 py-3" onclick="sort_tuteur()">Tuteur Iut</th>
                    <th class="px-4 py-3" onclick="sort_stage()">Stage Trouvé</th>
                    <th class="px-4 py-3" onclick="sort_form_etudiant()">Formulaire Etudiant</th>
                    <th class="px-4 py-3" onclick="sort_form_entreprise()">Formulaire Entreprise</th>
                    <th class="px-4 py-3" onclick="sort_accord()">Accord Etudiant</th>
                    
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
				<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="myTable">
				';
	if(isset($products) && count($products)) {			
		foreach ($products as $key => $row) {				
			/*$productHTML .= '<article class="col-md-4 col-sm-6">';
			$productHTML .= '<div class="thumbnail product">';
			$productHTML .= '<figure>';
			
			$productHTML .= '</figure>';
			$productHTML .= '<div class="caption">';
			$productHTML .= '<a href="" class="product-name">'.$product['Nom_etudiant'].'</a>';
			
			$productHTML .= '</div>';
			$productHTML .= '</div>';
			$productHTML .= '</article>';	*/

			$productHTML .= '<tr class="text-gray-700 dark:text-gray-400">
			<td class="px-4 py-3">
			  <div class="flex items-center text-sm">
				<!-- Avatar with inset shadow -->
				<div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
				  <img class="object-cover w-full h-full rounded-full"
					src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
					alt="" loading="lazy" />
				  <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
				</div><div>
				<p class="font-semibold">'.$row['Nom_etudiant']." ".$row['Prenom_etudiant'].'</p>
				<p class="text-xs text-gray-600 dark:text-gray-400">
				  Titre Stage : '.$row['Titre_stage'] .'
				</p>
			  </div>
			</div>
		  </td>
		  <td class="px-4 py-3 text-sm">';
		   if($row['Identifiant_stage'] != null) { 

			$productHTML .=$row['nom_tuteur']." ".$row['prenom_tuteur'].'
			<button class="btn btn-dark" data-title="edit" data-toggle="modal" id="'.$row['id'].'"  data-target="#myModalForTut'.$row['id'].'">';
			 if($row['Identifiant_tuteur']==null){
				$productHTML .='Affecter';}
			  else{
				$productHTML .='changer';
			  }  
			
		   
		   $productHTML .='</button>
		   
		   <!--pop up for affecter tuteur -->
		   <div class="modal" id="myModalForTut'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog ">
			  <div class="modal-content">
				   <div class="modal-header">
			   affecter Tuteur
			   <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
			   <h4 class="modal-title" id="myModalLabel">

			   </h4>
				   </div>

				 <div class="modal-body" id="user_details">
					 <center><h1 style="font-weight: bold;font-size:25px;margin-bottom:4%">Affecter/Modifier/Supprimer Tuteur</h1></center>
						 
					   <!-- Card -->
					   <form action="../Controller/affecterTuteur.php" method="POST" onsubmit="setTimeout(function(){window.location.reload();},20);">
					  
				   <div class="form-group mb-4">
					   <label for=""  style="font-weight: bold;font-size:20px;margin-bottom:2%">Choisir un Tuteur pour '.$row['Nom_etudiant']." ".$row['Prenom_etudiant'].':</label> <br>
						 <br>
					   <input type="hidden" id="custId" name="stageId" value="'.$row['Identifiant_stage'].'">
					   <input type="radio" name="affecterTuteur" value="-1"  style="height:20px; width:20px; vertical-align: middle;padding-bottom:4%;margin-left:10%;font-size:20px;">
					   <span style="font-size: 16px;color:red;font-weight:bold">Supprimer tuteur</span></input>
						 <br> 
						 <br>  ';
				
						 $listTuteurs=$this->getAllTuteurs();
						 foreach($listTuteurs as $row3) { 
							$productHTML .=' <input type="radio" name="affecterTuteur" value="'.$row3['Identifiant_tuteur'].'"  style="height:20px; width:20px; vertical-align: middle;margin-bottom:1%;margin-left:5%;font-size:20px">
						 <span style="font-size: 20px;">'.$row3['Nom_tuteur']." ".$row3['Prenom_tuteur'] .'<span></input>
						   <br> ';
						  } 


						  $productHTML .='  </div>
                            <div class="form-group mb-3">
                            <center> <button class="btn btn-light" type="submit" name="save_radio" >affecter tuteur</button><center>
                            </div>
                        </form>
            
            
        
                            </div>
                        </div>
            </div>
        </div>';
		 } else {
			$productHTML .=$row3['Nom_tuteur']." ".$row3['Prenom_tuteur'];
                     } 
					 $productHTML .='</td>
                    <td class="px-4 py-3 text-sm">
                    <i data="'.$row['id'].'" class="status_checks btn btn-success';
					 if($row['STAGE_TROUVE']) {
						$productHTML .='btn btn-success';
						
					 }else{
						$productHTML .='btn btn-danger';}
					 $productHTML .=' ">';
                     if($row['STAGE_TROUVE'] ){
						$productHTML .='stage trouvé';
					 } else{
						$productHTML .='non trouvé' ;
					 } 
					 $productHTML .=' </i>
                    </td>
                    <td class="px-4 py-3 text-xs">';
                    
                    if($row['Tel_etudiant']==null) { 
						$productHTML .='<span
                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                        Non rempli
                      </span>';
                       } else {
						$productHTML .='<span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Rempli
                      </span>';
                       } 
					
					
					   $productHTML .='   </td>
                    <td class="px-4 py-3 text-xs">';
					if($row['Identifiant_stage']==null) { 
						$productHTML .=' <span
                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                        Non rempli
                      </span>';
                    } else {
						$productHTML .=' <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Rempli
                      </span>';
                     } 
                     
					 $productHTML .='</td>
                    <td class="px-4 py-3 text-sm">
					<i data="'.$row['id'];
					$productHTML .=' " class="status_accord_checks btn btn-success';
					 if($row['ACCORD_ETUDIANT']){
						$productHTML .='btn btn-success';
					 }else{
						$productHTML .='btn btn-danger' ;;	 
					 }
					 $productHTML .='">';
				   if($row['ACCORD_ETUDIANT'] ){
					$productHTML .= 'approved';
				   }else{
					$productHTML .='not approved';
				   } 
		$productHTML .=' </i> 	
                    </td>
					<td class="px-4 py-3 text-sm">
                    <div style=" display: flex; align-content: space-between;">
                        <button class="btn btn-info " data-title="edit" data-toggle="modal" id="'.$row['id'].'"  data-target="#myModal'.$row['id'].'"><span class="mdi mdi-eye"></span></button>
                        <button class="btn btn-dark getcode"  id="'.$row['id'].'"  name="view_details"><span class="mdi mdi-pencil"></button>
                      </div>
                    </td>
                  </tr>

				  <div class="modal" id="myModal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                  		Détails
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                   		<h4 class="modal-title" id="myModalLabel"></h4>
                  </div>

				  


				  **
				  <div class="modal-body" id="user_details">
                  <center><h1 style="font-weight: bold;font-size:35px;margin-bottom:2%">'. $row['Nom_etudiant']." ".$row['Prenom_etudiant'].'</h1></center>
                    <div class=" grid  md:grid-cols-2 xl:grid-cols-4" style="">
            <!-- Card -->
            
            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:50%;width:120%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Profil</center>
                    <h3 style="margin-bottom:10px;font-weight: bold">Date de naissance : <span style="font-weight: normal" >'. $row['Date_naissance_etudiant'] .'</span></h3>
                    <h3 style="margin-bottom:10px;font-weight: bold">Telephone: <span style="font-weight: normal">'. $row['Tel_etudiant'].'</span></h3>
                    <h3 style="margin-bottom:10px;font-weight: bold">E-mail : <span style="font-weight: normal">'. $row['Email_etudiant'].'</span></h3>
                    
                    <h3 style="margin-bottom:10px;font-weight: bold">Adresse : <span style="font-weight: normal">'. $row['Adresse_etudiant'].'</span></h3>
                    
                
               
              </div>
            </div>
			
			**
			<div class="  p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="width:180%;margin-left:80%">
              
			<div >
			<center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Options</center>
			<p style="margin-bottom:1%;margin-top:1%">
			<span style="font-weight:bold;" >Formulaire Etudiant :</span> http://localhost/gestadi/View/FormEtudiant.php?token=wdbtEsuPxr
				  </p>
				  <p>
				  <span style="font-weight: bold" > Formulaire Entreprise :</span> http://localhost/gestadi/View/FormEntreprise.php?token=wdbtEsuPxr
				  </p>
			</div>
		  </div>
		</div>

		**
		<center><h1 style="margin-bottom:2%;margin-top:2%;font-weight: bold;font-size:25px">Stage</h1></center>
                   
           
          <div class=" grid  md:grid-cols-2 xl:grid-cols-4" style="">
            <!-- Card -->
            
            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:10%;width:100%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Entreprise </center>
                    <h5 style="margin-bottom:10px;font-weight: bold">Entreprise : <span style="font-weight: normal">'. $row['Nom_entreprise'].'</span></h3>
                  
                    <h5 style="margin-bottom:10px;font-weight: bold">Adresse Entreprise : <span style="font-weight: normal">'. $row['rue']." ".$row['cp']." ".$row['ville'].'	</span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">SIRET Entreprise : <span style="font-weight: normal">'. $row['SIRET_entreprise'].'	</span></h3>
                   
                    <h5 style="margin-bottom:10px;font-weight: bold"> NAF/APE entreprise : <span style="font-weight: normal">'. $row['NAF_APE_entreprise'].'	</span></h3>
                
               
              </div>
            </div>

**
<div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:18%;width:160%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> info stage </center>
                    <h5 style="margin-bottom:10px;font-weight: bold">Titre du stage : <span style="font-weight: normal" >'. $row['Titre_stage'].'</span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">Description du stage : <span style="font-weight: normal">'. $row['Description_stage'].'	</span></h3>
                    
                    <h5 style="margin-bottom:10px;font-weight: bold">Nombre heures/semaine : <span style="font-weight: normal">'. $row['Nb_heures_semaine_stage'].'</span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">Date debut : <span style="font-weight: normal">'. $row['Date_debut_stage'].'</span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">Date fin : <span style="font-weight: normal">'. $row['Date_fin_stage'].'</span></h3>
                    
                
               
              </div>
            </div>
            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:90%;width:110%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Maitre et Tuteur de stage </center>

				**
				<center><h2 style="margin:5%;font-weight: bold;text-decoration-line: underline">Maitres de stage </h2></center>';
                
              $listMaitres = $this->getMaitresStageOfStudient($row['Identifiant_entreprise']);
                      $nbr=1;
                      foreach($listMaitres as $row2) { 

				$productHTML .='
                      <h2 style="margin-bottom:2%; font-weight: bold;">Maitre de stage'.$nbr.'</h2>
                      <div style="margin-left:4%;"> 
                    
					  <h5 style="margin-bottom:10px;font-weight: bold">Nom  : <span style="font-weight: normal">'. $row2['Nom_super']." ".$row2['Prenom_super'].'	</span></h5>
                      <h5 style="margin-bottom:10px;font-weight: bold">Email   :<span style="font-weight: normal">'. $row2['Email_super'].'</span></h5>
                      <h5 style="margin-bottom:10px;font-weight: bold">Telephone  : <span style="font-weight: normal">'. $row2['Tel_super'].'	</span></h3>
                   <br>
                    </div>';
                       $nbr++ ;
                      } 

				$productHTML .='	  
				
				<center><h2 style="margin:5%;font-weight: bold;text-decoration-line: underline">Tuteur de stage </h2></center>
                    <h5 style="margin-bottom:10px;font-weight: bold">Nom  : <span style="font-weight: normal">'. $row['nom_tuteur']." ". $row['prenom_tuteur'].' 	</span></h5>
                    <h5 style="margin-bottom:10px;font-weight: bold">Email   :<span style="font-weight: normal">'. $row['Email_tuteur'].' 		</span></h5>
                  
                   
                
               
              </div>
            </div>
          </div>
                  </div>
                </div>
            </div>
        </div>';
                  
                  
        } 
		$productHTML .='</tbody>
		
		';
		  
			
			
		
	}

	$productHTML .='</table>
				</div>
				</div>';
	return 	$productHTML;	
		
	}
	
	
	
	
	
	
	
	
	
	
	
	//****************************************************************************** */

	function getEtudiantByNumero($num)
		{
			$sql="SELECT * FROM etudiant where Num_etudiant='$num'";
			
			try{
                
                return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}
		function stagetrouvé($num){
			
			$sql="update etudiant set STAGE_TROUVÉ=1 where id='$num'";
			//$db = config::getConnexion();
			try{
                return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

		function getNbrEtudiants()
		{
			$sql="SELECT count(*) as nbr FROM etudiant";
			
			try{
				return $this->getData($sql);
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getNbrStages()
		{
			$sql="SELECT count(*) as nbr FROM stage";
			
			try{
				return $this->getData($sql);
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}
		function getNbrFormEtudRemp(){
			$sql="SELECT COUNT(*) as nbr from etudiant WHERE  Date_naissance_etudiant is not null ";
			
			try{
                return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

		function getNbrFormEntrepRemplis(){
			$sql="SELECT COUNT(*) as nbr from entreprise ";
			
			try{
                
				return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

		function getNbrTokens()
		{
			$sql="SELECT count(*) as nbr FROM token";
			
			try{
				return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getAllEtudiants()
		{
			$sql="SELECT * FROM etudiant";
			
			try{
				return $this->getData($sql);
	           
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
			 FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise";
			
			try{
				return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

		}

		function getMaitresStageOfStudient($num){
			$sql="select * from maitre_de_stage m join entreprise en on m.Identifiant_entreprise =en.Identifiant_entreprise
			join stage s on s.Identifiant_entreprise =en.Identifiant_entreprise where m.Identifiant_entreprise='$num'";
			 
			try{
                return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}
		
		function getAllTuteurs(){
			$sql="select * from tuteur";
			
			try{
                return $this->getData($sql);
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}
		function getAllTuteurs2(){
			$sql="select Identifiant_tuteur,Nom_tuteur,Prenom_tuteur from tuteur";
			
			try{
				return $this->getData($sql);
	            
	           
	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }
		}

      





	
	//**************************************************************************** */	
	}

?>