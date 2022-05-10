<?php require "header_dashboard.php"; ?>
<?php 

  include "../Controller/EtudiantCore.php";  
  include "../DB/Config.php";


  $etudiantC = new EtudiantCore();
  $listEtudiants = $etudiantC->getAllEtudiantsForDashboard();
  $nbEtudiants = $etudiantC->getNbrEtudiants()[0]->nbr;
  $nbStages = $etudiantC->getNbrStages()[0]->nbr;
  $nbTokens = $etudiantC->getNbrTokens()[0]->nbr;
  $nbrFormEtudRemp=$etudiantC->getNbrFormEtudRemp()[0]->nbr;
  $nbrFormentrepRemplis=$etudiantC->getNbrFormEntrepRemplis()[0]->nbr;
  
  

?>

<script src="https://cdn.tailwindcss.com"></script>


<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

<!-- Popper JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>




<main class="h-full overflow-y-auto">
  <div  class="container px-6 mx-auto grid">
              <!-- Cards -->
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Total Etudiants
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?=$nbEtudiants?>
                </p>
              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Stages Trouvés
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?=$nbStages?>
                </p>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Formulaire en attentes
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?=$nbTokens-$nbStages?>
                </p>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  formulaires étudiants remplis
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?=$nbrFormEtudRemp?>
                </p>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  formulaires Entreprise remplis
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?=$nbrFormentrepRemplis?>
                </p>
              </div>
            </div>
          </div>
           <!-- Card -->
           
          </div>
       
          <br/>
        <input class="form-control" style="width : 25%" placeholder="Chercher.." id="myInput"><br>
       <h3> Checher Par :</h3>
<br />
<div class="p-8 bg-white shadow-2xl" >
<h3 class="text-center">Filtres Avancées :</h3>
<br />

<div  style="display:flex;justify-content:space-evenly;flex-wrap:wrap;flex-direction:row">

<div >
   <label >
                            <input type="checkbox" class="form_check_input item_check" value="stageTrouve" id="stageTrouve" /> Stage Trouvé</label>
                            <br />
                            <label > 
                            <input type="checkbox" class="form_check_input item_check" value="stageNonTrouve" id="stageNonTrouve" /> Stage Non Trouvé</label>
                            <br />
                            <label >
                            <input type="checkbox" class="form_check_input item_check" value="accordEtudiantApprouve" id="AccordEtudiantApprouve" /> Accord Etudiant Approuvé</label>
                            <br />
                            <label >
                            <input type="checkbox" class="form_check_input item_check" id=" accordEtudiantNonApprouve" value=" AccordEtudiantNonApprouve" /> Accord Etudiant Non Approuvé</label>
                            <br />
                            <label >
                            <input type="checkbox" class="form_check_input item_check" id="listeDeTuteurs" value="listeDesTuteurs" /> Liste des tuteurs</label>
                            <br />
                            
                         
  </div>
  <div >
  <label >
                            <input type="checkbox" /> Formulaire Entreprise Rempli</label>
                            <br />
                            <label >
                            <input type="checkbox" /> Formulaire Entreprise Non Rempli</label>
                            <br />
                            <label >
                            <input type="checkbox" /> Formulaire Etudiant Rempli</label>
                            <br />
                            <label >
                            <input type="checkbox" /> Formulaire Etudiant Non Rempli</label>
                            <br />
                         
                           
  </div>

</div>



</div>
<br />

        <div class="container w-full overflow-hidden rounded-lg shadow-xs" id="result">
          <div style="text-align:center;">
<img src="https://th.bing.com/th/id/R.2351827d896995f1f6e12e89176f3d9b?rik=t258KJio4%2bo0PA&pid=ImgRaw&r=0" width="200" style="display:none;" id="loader" />
  </div>
  <h5 class="text-center text-pink-600 font-bold"  id="textChange"  >All Informations </h5>
  <br />
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
                    <th class="px-4 py-3">Date Debut</th>
                    <th class="px-4 py-3">Date Fin</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="myTable">
                  <?php foreach((array)$listEtudiants as $row) { ?>
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
                                <label   style="font-weight: bold;font-size:20px;margin-bottom:2%">Choisir un Tuteur pour <?php echo $row->Nom_etudiant." ".$row->Prenom_etudiant ?>:</label> <br>
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
function sort_accord()
{
 var table=$('#array');
 var tbody =$('#myTable');

 tbody.find('tr').sort(function(a, b) 
 {
  if($('#sort_accord').val()=='asc') 
  {
   return $('td:nth-child(6)', a).text().localeCompare($('td:nth-child(6)', b).text());
  }
  else 
  {
   return $('td:nth-child(6)', b).text().localeCompare($('td:nth-child(6)', a).text());
  }
		
 }).appendTo(tbody);
	
 var sort_order=$('#sort_accord').val();
 if(sort_order=="asc")
 {
  document.getElementById("sort_accord").value="desc";
 }
 if(sort_order=="desc")
 {
  document.getElementById("sort_accord").value="asc";
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

<script>
	if ($('input[id=stageTrouve]').is(':checked')) {
		alert("jQuery c'est super");
	} else {
		alert("jQuery c'est autre chose");
	}

$(document).ready(function() {
		alert('hello');
		$(".item_check").click(function() {
			$("#loader").show();
			var action = 'data';
			var stageTrouve = get_filter_text('stageTrouve');
			var stageNonTrouve = get_filter_text('stageNonTrouve');
			var accordEtudiantApprouve = get_filter_text('accordEtudiantApprouve');
			var accordEtudiantNonApprouve = get_filter_text('accordEtudiantNonApprouve');
	$.ajax({
			url:'action.php',
			method:'POST',
			data:{action:action , stageTrouve:stageTrouve,stageNonTrouve:stageNonTrouve,accordEtudiantApprouve:accordEtudiantApprouve,accordEtudiantNonApprouve:accordEtudiantNonApprouve},
			success:function(response){
			 $("#result").html(response);
			 $("#loader").hide();
			$("#textChange").text("Filtred Informations ");

			}
			})

      function get_filter_text(text_id){
   var filterData=[];
   $('#'+text_id+':checked').each(function(){

    filterData.push($(this).val());
   });
   return filterData;

 }
		});

	}) 	</script>



<?php require "footer_dashboard.php"; ?>
