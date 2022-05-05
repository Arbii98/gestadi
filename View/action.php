<?php require "header_dashboard.php"; ?>
<?php 

  include "../Controller/EtudiantCore.php";  
  include "../DB/Config.php";


  
  $etudiantC = new EtudiantCore();

  $nbEtudiants = $etudiantC->getNbrEtudiants()[0]->nbr;
  $nbStages = $etudiantC->getNbrStages()[0]->nbr;
  $nbTokens = $etudiantC->getNbrTokens()[0]->nbr;
  $nbrFormEtudRemp=$etudiantC->getNbrFormEtudRemp()[0]->nbr;
  $nbrFormentrepRemplis=$etudiantC->getNbrFormEntrepRemplis()[0]->nbr;
  
  

  if(isset($_POST['action'])){

    $sql="	
    
        SELECT e.id, e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, 
        e.Tel_etudiant, e.Email_etudiant, e.STAGE_TROUVE,e.ACCORD_ETUDIANT,e.Attestation_url, s.Identifiant_stage, 
        s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,s.Nb_heures_semaine_stage,t.Identifiant_tuteur , t.nom_tuteur, t.prenom_tuteur,t.Email_tuteur
        ,en.Identifiant_entreprise ,en.Nom_entreprise,en.Email_entreprise,en.rue,en.cp,en.ville,en.SIRET_entreprise,en.NAF_APE_entreprise
         FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise
         
         Where STAGE_TROUVE !='';";
         if(isset($_POST[' STAGE_TROUVE'])){
          $StageTrouve= implode("','",$_POST['STAGE_TROUVE']);
          $sql.="AND STAGE_TROUVE IN  ()";
    
         }
    
         if(isset($_POST[' ACCORD_ETUDIANT'])){
          $accordEtudiant= implode("','",$_POST['ACCORD_ETUDIANT']);
          $sql.="AND ACCORD_ETUDIANT IN  ()";

    
         }
        
         	$db = config::getConnexion();
           $output='';
           $liste=$db->query($sql);
           if($result->num_rows>0){
             while($row=$result->fetch_assoc()){
               $output.='<h1>result ouput </h1>';
             }
           
           else if($result->num_rows>0){
            $output.='<h1>No result found </h1>';
           }
    

   
            
      
            }
 
    ?>
