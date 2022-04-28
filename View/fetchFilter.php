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
  
  

  if($_POST['request']){
    $request=$_POST['request'];
    $query="	
    
        SELECT e.id, e.Num_etudiant, e.Nom_etudiant, e.Prenom_etudiant, e.Date_naissance_etudiant, e.Adresse_etudiant, 
        e.Tel_etudiant, e.Email_etudiant, e.STAGE_TROUVE,e.ACCORD_ETUDIANT,e.Attestation_url, s.Identifiant_stage, 
        s.Titre_stage, s.Description_stage, s.Date_debut_stage, s.Date_fin_stage,s.Nb_heures_semaine_stage,t.Identifiant_tuteur , t.nom_tuteur, t.prenom_tuteur,t.Email_tuteur
        ,en.Identifiant_entreprise ,en.Nom_entreprise,en.Email_entreprise,en.rue,en.cp,en.ville,en.SIRET_entreprise,en.NAF_APE_entreprise
         FROM etudiant e left join stage s on s.id_etudiant = e.id left join tuteur t on t.Identifiant_tuteur =s.Identifiant_tuteur left join entreprise en on en.Identifiant_entreprise =s.Identifiant_entreprise
         
         Where STAGE_TROUVE='$request';";
    

  

         $db = config::getConnexion();
         try{
             $liste=$db->query($sql);
             return $liste->fetchAll(PDO::FETCH_OBJ);
             
            
         }
         catch (Exception $e){
             echo 'Erreur: '.$e->getMessage();
         }
         $result = mysql_query($con,$query);
$count=mysql_num_rows($result);
    ?>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table id="array" class="w-full whitespace-no-wrap">
                  <?php
                  if($count){
                    
                  ?>
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"  style="background-color : #E5007D; color : white">
                    <th class="px-4 py-3" >Etudiant</th>
                    <th class="px-4 py-3" >Tuteur Iut</th>
                    <th class="px-4 py-3" >Stage Trouvé</th>
                    <th class="px-4 py-3" >Formulaire Etudiant</th>
                    <th class="px-4 py-3" >Formulaire Entreprise</th>
                    <th class="px-4 py-3">Accord Etudiant</th>
                    <th class="px-4 py-3">Date Debut</th>
                    <th class="px-4 py-3">Date Fin</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                  <?php
                  }else{
                      echo 'no record found sorry';
                  }
                  ?>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="myTable">
                  
<?php 
while($row=mysqli_fetch_assoc($result)){
?>
                    <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <!-- Avatar with inset shadow -->
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full"
                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                            alt="" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold"><?=$row->Nom_etudiant." ".$row->Prenom_etudiant?></p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            Titre Stage : <?=$row->Titre_stage ?>
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <?php if($row->Identifiant_stage!=null) { ?>

                      <?=$row->nom_tuteur." ".$row->prenom_tuteur?>
                      <button class="btn btn-dark" data-title="edit" data-toggle="modal" id="<?=$row->id?>"  data-target="#myModalForTut<?php echo $row->id ?>">
                      <?php if($row->Identifiant_tuteur==null){
                        echo "Affecter";}
                        else{
                    echo "changer";
                        }  
                      
                      ?>
                      </button>
                    
                      <!--pop up for affecter tuteur -->
                    <div class="modal" id="myModalForTut<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <label for=""  style="font-weight: bold;font-size:20px;margin-bottom:2%">Choisir un Tuteur pour <?php echo $row->Nom_etudiant." ".$row->Prenom_etudiant ?>:</label> <br>
                                  <br>
                                <input type="hidden" id="custId" name="stageId" value="<?php echo $row->Identifiant_stage?>">
                                <input type="radio" name="affecterTuteur" value="-1"  style="height:20px; width:20px; vertical-align: middle;padding-bottom:4%;margin-left:10%;font-size:20px;">
                                <span style="font-size: 16px;color:red;font-weight:bold">Supprimer tuteur</span></input>
                                  <br> 
                                  <br>
                                  
                                  
                               <?php 
                                $listTuteurs=$etudiantC->getAllTuteurs();
                                foreach($listTuteurs as $row3) { ?>
                                <input type="radio" name="affecterTuteur" value="<?php echo $row3->Identifiant_tuteur ?>"  style="height:20px; width:20px; vertical-align: middle;margin-bottom:1%;margin-left:5%;font-size:20px">
                                <span style="font-size: 20px;"><?php echo $row3->Nom_tuteur." ".$row3->Prenom_tuteur ?><span></input>
                                  <br> 
                                <?php } ?>
                                
                                
                            </div>
                            <div class="form-group mb-3">
                            <center> <button class="btn btn-light" type="submit" name="save_radio" >affecter tuteur</button><center>
                            </div>
                        </form>
            
            
        
                            </div>
                        </div>
            </div>
        </div>






                    
                      <?php } else {?>
                        <?=$row->nom_tuteur." ".$row->prenom_tuteur?>
                    <?php } ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <i data="<?php echo ($row->id);?>" class="status_checks btn btn-success<?php echo ($row->STAGE_TROUVE)?'btn btn-success': 'btn btn-danger'?>">
                    <?php echo ($row->STAGE_TROUVE )? 'stage trouvé' : 'non trouvé'?>
                        </i>
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <?php if($row->Tel_etudiant==null) { ?>
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                        Non rempli
                      </span>
                      <?php } else {?>
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Rempli
                      </span>
                      <?php } ?>
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <?php if($row->Identifiant_stage==null) { ?>
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                        Non rempli
                      </span>
                    <?php } else {?>
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Rempli
                      </span>
                      <?php } ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <i data="<?php echo ($row->id);?>" class="status_accord_checks btn btn-success<?php echo ($row->ACCORD_ETUDIANT)?'btn btn-success': 'btn btn-danger'?>">
                    <?php echo ($row->ACCORD_ETUDIANT )? 'approved' : 'not approved'?>
 </i>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?=$row->Date_debut_stage?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <?=$row->Date_fin_stage?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <div style=" display: flex; align-content: space-between;">
                        <button class="btn btn-info " data-title="edit" data-toggle="modal" id="<?=$row->id?>"  data-target="#myModal<?php echo $row->id ?>"><span class="mdi mdi-eye"></span></button>
                        <button class="btn btn-dark getcode"  id="<?=$row->id?>"  name="view_details"><span class="mdi mdi-pencil"></button>
                      </div>
                    </td>
                  </tr>

        <div class="modal" id="myModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                  		Détails
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                   		<h4 class="modal-title" id="myModalLabel"></h4>
                  </div>

                  <div class="modal-body" id="user_details">
                  <center><h1 style="font-weight: bold;font-size:35px;margin-bottom:2%"><?php echo $row->Nom_etudiant." ".$row->Prenom_etudiant ?></h1></center>
                    <div class=" grid  md:grid-cols-2 xl:grid-cols-4" style="">
            <!-- Card -->
            
            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:50%;width:120%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Profil</center>
                    <h3 style="margin-bottom:10px;font-weight: bold">Date de naissance : <span style="font-weight: normal" ><?php echo $row->Date_naissance_etudiant ?></span></h3>
                    <h3 style="margin-bottom:10px;font-weight: bold">Telephone: <span style="font-weight: normal"><?php echo $row->Tel_etudiant ?></span></h3>
                    <h3 style="margin-bottom:10px;font-weight: bold">E-mail : <span style="font-weight: normal"><?php echo $row->Email_etudiant ?></span></h3>
                    
                    <h3 style="margin-bottom:10px;font-weight: bold">Adresse : <span style="font-weight: normal"><?php echo $row->Adresse_etudiant?></span></h3>
                    
                
               
              </div>
            </div>
        

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
          <center><h1 style="margin-bottom:2%;margin-top:2%;font-weight: bold;font-size:25px">Stage</h1></center>
                   
           
          <div class=" grid  md:grid-cols-2 xl:grid-cols-4" style="">
            <!-- Card -->
            
            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:10%;width:100%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Entreprise </center>
                    <h5 style="margin-bottom:10px;font-weight: bold">Entreprise : <span style="font-weight: normal"><?php echo $row->Nom_entreprise?>	</span></h3>
                  
                    <h5 style="margin-bottom:10px;font-weight: bold">Adresse Entreprise : <span style="font-weight: normal"><?php echo $row->rue." ".$row->	cp." ".$row->ville ?>	</span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">SIRET Entreprise : <span style="font-weight: normal"><?php echo $row->SIRET_entreprise ?>	</span></h3>
                   
                    <h5 style="margin-bottom:10px;font-weight: bold"> NAF/APE entreprise : <span style="font-weight: normal"><?php echo $row->NAF_APE_entreprise ?>	</span></h3>
                
               
              </div>
            </div>

            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:18%;width:160%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> info stage </center>
                    <h5 style="margin-bottom:10px;font-weight: bold">Titre du stage : <span style="font-weight: normal" ><?php echo $row->Titre_stage ?></span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">Description du stage : <span style="font-weight: normal"><?php echo $row->Description_stage ?>	</span></h3>
                    
                    <h5 style="margin-bottom:10px;font-weight: bold">Nombre heures/semaine : <span style="font-weight: normal"><?php echo $row->Nb_heures_semaine_stage ?></span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">Date debut : <span style="font-weight: normal"><?php echo $row->Date_debut_stage ?></span></h3>
                    <h5 style="margin-bottom:10px;font-weight: bold">Date fin : <span style="font-weight: normal"><?php echo $row->Date_fin_stage ?></span></h3>
                    
                
               
              </div>
            </div>
            <div class="  p-8 bg-white rounded-lg shadow-xs dark:bg-gray-800" style="margin-left:90%;width:110%;">
              
              <div >
                <center style="margin-bottom:10px;font-weight: bold;color:#dc3545"> Maitre et Tuteur de stage </center>
                
               
                
                
                
                
                
                
                
                
                <center><h2 style="margin:5%;font-weight: bold;text-decoration-line: underline">Maitres de stage </h2></center>
                
                <?php $listMaitres = $etudiantC->getMaitresStageOfStudient($row->Identifiant_entreprise);
                      $nbr=1;
                      foreach($listMaitres as $row2) { ?>

  
                      <h2 style="margin-bottom:2%; font-weight: bold;">Maitre de stage <?php echo $nbr?></h2>
                      <div style="margin-left:4%;"> 
                    
                      <h5 style="margin-bottom:10px;font-weight: bold">Nom  : <span style="font-weight: normal"><?php echo $row2->Nom_super." ".$row2->Prenom_super  ?>	</span></h5>
                      <h5 style="margin-bottom:10px;font-weight: bold">Email   :<span style="font-weight: normal">	<?php echo $row2->Email_super ?>	</span></h5>
                      <h5 style="margin-bottom:10px;font-weight: bold">Telephone  : <span style="font-weight: normal"><?php echo $row2->Tel_super ?>	</span></h3>
                   <br>
                    </div>
                         <?php $nbr++ ?>
                      <?php } ?>

                  
                  
                   
                      <center><h2 style="margin:5%;font-weight: bold;text-decoration-line: underline">Tuteur de stage </h2></center>
                    <h5 style="margin-bottom:10px;font-weight: bold">Nom  : <span style="font-weight: normal"><?php echo $row->nom_tuteur." ".$row->prenom_tuteur ?>	</span></h5>
                    <h5 style="margin-bottom:10px;font-weight: bold">Email   :<span style="font-weight: normal"><?php echo $row->Email_tuteur ?>		</span></h5>
                  
                   
                
               
              </div>
            </div>
          </div>
                  </div>
                </div>
            </div>
        </div>
                  
                  
        <?php } ?>

                </tbody>
              </table>
            </div>
            
          </div>


</div>
</main>



<div class="modal" id="myModal<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                  		Détails
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                   		<h4 class="modal-title" id="myModalLabel"></h4>
                  </div>

                  <div class="modal-body" id="user_details">
                    <center><h1><?php echo $row->id ?></h1></center>
                    <div class="container table-responsive py-5" style="width:100%"> 
                          <table class="table table-bordered table-hover" style="width:100%">
                              <thead class="thead-dark">
                              <tr>
                                  <th>E-mail</th>
                                  <th>Telephone</th>
                                  <th>Adresse</th>
                                  <th>Date de naissance</th>
                              </tr>
                              </thead>
                              <tr>
                                  <td>arbisaidi8@gmail.com</td>
                                  <td>0668259886</td>
                                  <td>16 Boulevard Charles Nicolle</td>
                                  <td>15/10/1998</td>
                              <tr>
                          </table>
                    </div>
                    <center><h1>Stage</h1></center>
                    <div class="container table-responsive py-5" style="width:100%"> 
                          <table class="table table-bordered table-hover" style="width:100%">
                              <thead class="thead-dark">
                              <tr>
                                  <th>Tuteur IUT</th>
                                  <th>Titre du stage</th>
                                  <th>Description du stage</th>
                                  <th>Entreprise</th>
                                  <th>Adresse Entreprise</th>
                                  <th>Maitre de stage</th>
                                  <th>Email Maitre de stage</th>
                                  <th>Telephone Maitre de stage</th>
                                  <th>Date debut</th>
                                  <th>Date fin</th>
                                  <th>Durée en semaines</th>
                              </tr>
                              </thead>
                              <tr>
                                  <td><button class="btn btn-dark">Affecter</button></td>
                                  <td>Stage Développement Informatique</td>
                                  <td>Gestion d'un projet informatique (analyse, développement, phase de test, mise en production)</td>
                                  <td>Althea Solution</td>
                                  <td>12 Boulevard Latouche 72000 La Fleche</td>
                                  <td>Lionel Hardy</td>
                                  <td>lionel.hardy@althea-solutions.fr</td>
                                  <td>07.83.35.22.88</td>
                                  <td>04/04/2022</td>
                                  <td>26/06/2022</td>
                                  <td>12 semaines</td>
                              <tr>
                          </table>
                    </div>
                    <br><br>
                    <center>
                        <button class="btn btn-success">Formulaire Etudiant</button>
                        <button class="btn btn-danger">Formulaire Entreprise</button>
                        <button class="btn btn-dark">Accord Etudiant</button>
                      </center>
                    <p>
                      Formulaire Etudiant : http://localhost/gestadi/View/FormEtudiant.php?token=wdbtEsuPxr
                    </p>
                    <p>
                      Formulaire Entreprise : http://localhost/gestadi/View/FormEntreprise.php?token=wdbtEsuPxr
                    </p>
                  </div>
                </div>
            </div>
        </div>
        </div>
        </div>	<!-- SweetAlert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
    	// $(document).ready(function(){
     //         swal("Oops!", "Vous devez remplir le formulaire avant l\'envoie !", "error");
     //    });
    </script>
    <script type="text/javascript">
    	$(".getcode").click(function(){
        var id = $(this).attr("id");
    		$.ajax({
                url:"../Controller/generateCode.php",
                data:{},
                method:"get",
                success: function(result)
                {
                	
                    Swal.fire({
					  title: '<strong>Formulaire Etudiant</strong>',
					  icon: 'info',
					  html:
					    'Un nouveau formulaire a été généré : <br><br><br>' +
					    'Formulaire etudiant : http://localhost/gestadi/View/FormEtudiant.php?token='+result+
					    '<br><br><br>Formulaire entreprise : http://localhost/gestadi/View/FormEntreprise.php?token='+result ,
					  showCloseButton: true,
					  showCancelButton: true,
					  focusConfirm: false,
					  confirmButtonText:
					    'Enregistrer',
					  confirmButtonAriaLabel: 'Thumbs up, great!',
					  cancelButtonText:
					    'Annuler',
					  cancelButtonAriaLabel: 'Thumbs down'
					}).then((resultat) => {
						  /* Read more about isConfirmed, isDenied below */
						  if (resultat.isConfirmed) {
                navigator.clipboard.writeText('Formulaire etudiant : http://localhost/gestadi/View/FormEtudiant.php?token='+result+
					    '<br><br><br>Formulaire entreprise : http://localhost/gestadi/View/FormEntreprise.php?token='+result);
						    saveToken(result,id);
                Swal.fire({
                        title: 'Succes',
                        text: "Le lien a été copié sur votre clipboard",
                        icon: 'success'
                    })
						  } 
						});

                },
                error : function()
                {
                    Swal.fire({
                        title: 'Erreur',
                        text: "Erreur lors de la generation du code !",
                        icon: 'error'
                    });
                },
            });
    	});
    </script>
    <script>
    	function saveToken(token,id)
    	{
    		$.ajax({
                url:"../Controller/saveToken.php",
                data:{"token":token,"id":id},
                method:"post",
                success: function(result)
                {
                	//alert("done");
                },
                error : function()
                {
                    Swal.fire({
                        title: 'Erreur',
                        text: "Formulaire n'est pas enregistré",
                        icon: 'error'
                    })
                },
            });
    	}
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        
        $(document).on('click','.detail',function(){
            var user_id=$this
        });
    });
</script>

<input type="hidden" id="sort_form_etudiant" value="asc">
<input type="hidden" id="sort_form_entreprise" value="asc">
<input type="hidden" id="sort_etudiant" value="asc">
<input type="hidden" id="sort_tuteur" value="asc">
<input type="hidden" id="sort_stage" value="asc">
<script>
function sort_form_etudiant()
{
 var table=$('#array');
 var tbody =$('#myTable');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#sort_form_etudiant').val()=='asc') 
  {
   return $('td:nth-child(4)', a).text().localeCompare($('td:nth-child(4)', b).text());
  }
  else 
  {
   return $('td:nth-child(4)', b).text().localeCompare($('td:nth-child(4)', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#sort_form_etudiant').val();
 if(sort_order=="asc")
 {
  document.getElementById("sort_form_etudiant").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("sort_form_etudiant").value="asc";
 }
}

function sort_form_entreprise()
{
 var table=$('#array');
 var tbody =$('#myTable');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#sort_form_entreprise').val()=='asc') 
  {
   return $('td:nth-child(5)', a).text().localeCompare($('td:nth-child(5)', b).text());
  }
  else 
  {
   return $('td:nth-child(5)', b).text().localeCompare($('td:nth-child(5)', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#sort_form_entreprise').val();
 if(sort_order=="asc")
 {
  document.getElementById("sort_form_entreprise").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("sort_form_entreprise").value="asc";
 }
}


function sort_etudiant()
{
 var table=$('#array');
 var tbody =$('#myTable');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#sort_etudiant').val()=='asc') 
  {
   return $('td:first', a).text().localeCompare($('td:first', b).text());
  }
  else 
  {
   return $('td:first', b).text().localeCompare($('td:first', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#sort_etudiant').val();
 if(sort_order=="asc")
 {
  document.getElementById("sort_etudiant").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("sort_etudiant").value="asc";
 }
}


function sort_tuteur()
{
 var table=$('#array');
 var tbody =$('#myTable');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#sort_tuteur').val()=='asc') 
  {
   return $('td:nth-child(2)', a).text().localeCompare($('td:nth-child(2)', b).text());
  }
  else 
  {
   return $('td:nth-child(2)', b).text().localeCompare($('td:nth-child(2)', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#sort_tuteur').val();
 if(sort_order=="asc")
 {
  document.getElementById("sort_tuteur").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("sort_tuteur").value="asc";
 }
}

function sort_stage()
{
 var table=$('#array');
 var tbody =$('#myTable');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#sort_stage').val()=='asc') 
  {
   return $('td:nth-child(3)', a).text().localeCompare($('td:nth-child(3)', b).text());
  }
  else 
  {
   return $('td:nth-child(3)', b).text().localeCompare($('td:nth-child(3)', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#sort_stage').val();
 if(sort_order=="asc")
 {
  document.getElementById("sort_stage").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("sort_stage").value="asc";
 }
}



</script>


    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'non trouvé' : 'Trouvé';
      if(confirm("Êtes-vous sûr de changer l'état du stage en stage --> "+ msg)){
        var current_element = $(this);
        url = "../Controller/stageTrouve.php";
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
</script>

<script type="text/javascript">
    $(document).on('click','.status_accord_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'non trouvé' : 'Trouvé';
      if(confirm("Êtes-vous sûr de changer l'état du stage en stage --> "+ msg)){
        var current_element = $(this);
        url = "../Controller/accordEtud.php";
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
</script>
