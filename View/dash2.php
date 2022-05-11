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
  $tuteurs= $etudiantC->getAllTuteurs2();
  
  include("Product.php");
  $product = new Product();
  $categories = $product->getTuteurs();
  $reps=array(
       'non', 'oui',
      
      
  );
  $reps2=array('non obtenu', 'obtenu',);
  
  
  //$totalRecords = $product->getTotalProducts();
  
?>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script src="jquery.js"></script>
<script>
    $(document).ready(function()
                     {
        $("#filterForm").on('change',function()
                         {
            var keyword = $(this).val();
            $.ajax(
            {
                url:'fetch.php',
                type:'POST',
                data:'request='+keyword,
                
                beforeSend:function()
                {
                    $("#table-container").html('Working...');
                    
                },
                success:function(data)
                {
                    $("#table-container").html(data);
                },
            });
        });
    });
    
</script>


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
          <h3>Filtres Avancées  :</h3>
          <br/>
        <input class="form-control" style="width : 25%" placeholder="Chercher.." id="myInput"><br>


        <!-- table students ******************************************************************************* -->



				<div class="content"> 
	<div class="container-fluid">
					
            <form method="post" id="search_form">               
                <div class="row">                    
                    <aside class="col-lg-3 col-md-4">						
						<div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Tuteurs</h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                                <ul class="list-group">
                                <?php 
								foreach ($categories as $key => $category) {
                                    if(isset($_POST['category'])) {
                                        if(in_array($product->cleanString($category['Identifiant_tuteur']),$_POST['category'])) {
                                            $categoryCheck ='checked="checked"';
                                        } else {
											$categoryCheck="";
                                        }
									}
                                ?>
								<li class="list-group-item">
									<div class="checkbox"><label><input type="checkbox" value="<?php echo $product->cleanString($category['Identifiant_tuteur']); ?>" <?php echo @$categoryCheck; ?> name="category[]" class="sort_rang category"><?php echo ucfirst($category['Nom_tuteur']); ?></label></div>
								</li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                        
						<div class="panel list">
                            <div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">stage trouvé ?  </h3></div>
                            <div class="panel-body collapse in" id="panelOne">
                            <ul class="list-group">
                                <?php 
								foreach ($reps as $key => $stg_trv) {
                                    if(isset($_POST['sorting'])) {
                                        if(in_array($key,$_POST['sorting'])){
                                            $sortingCheck ='checked="checked"';
                                        } else {
											 $sortingCheck ="";
                                        }
									}
                                ?>
								<li class="list-group-item">
									<div class="checkbox"><label><input type="checkbox" value="<?php echo $key; ?>" <?php echo @$sortingCheck; ?> name="sorting[]" class="sort_rang sorting"><?php echo $stg_trv ?></label></div>
								</li>
                                <?php } ?>
                                </ul>
																                              
                            </div>
                        </div>


             <div class="panel list">
				<div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true"> Accord :</h3></div>
				<div class="panel-body collapse in" id="panelTwo">
					<ul class="list-group">
					<?php 
					foreach ($reps2 as $key => $material) {
						if(isset($_POST['material'])) {
							if(in_array($key,$_POST['material'])) {
								$materialCheck='checked="checked"';
							} else { 
								$materialCheck="";
							}
						}
					?>
						<li class="list-group-item">
							<div class="checkbox"><label><input type="checkbox" value="<?php echo $key; ?>"<?php echo @$materialCheck;?>  name="material[]" class="sort_rang material"><?php echo $material  ?></label></div>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>

            <div class="panel list">
				<div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">formulaire étudiant rempli ? </h3></div>
				<div class="panel-body collapse in" id="panelOne">
					<ul class="list-group">
					<?php 
					foreach ($reps as $key => $brand) {
						if(isset($_POST['brand'])) {
							if(in_array($key,$_POST['brand'])) {
								$brandChecked ='checked="checked"';
							} else {
								$brandChecked="";
							}
						}
					?>
					<li class="list-group-item">
						<div class="checkbox"><label><input type="checkbox" value="<?php echo $key; ?>" <?php echo @$brandChecked; ?> name="brand[]" class="sort_rang brand"><?php echo $brand ?></label></div>
					</li>
					<?php } ?>
					</ul>
				</div>
			</div>
                       
            <div class="panel list">
				<div class="panel-heading"><h3 class="panel-title" data-toggle="collapse" data-target="#panelFour" aria-expanded="true">formulaire entreprise rempli ?</h3></div>
				<div class="panel-body collapse in" id="panelFour">
					<ul class="list-group">
						<?php foreach ($reps as $key => $productSize) {
							if(isset($_POST['size'])){
								if(in_array($key,$_POST['size'])) {
									$sizeCheck='checked="checked"';
								} else {
									$sizeCheck="";
								}
							}
						?>
						<li class="list-group-item">
							<div class="checkbox"><label><input type="checkbox" value="<?php echo $key ?>" <?php echo @$sizeCheck; ?>  name="size[]" class="sort_rang size"><?php echo $productSize; ?></label></div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>   
                    </aside>
                    <section class="col-lg-9 col-md-8">
                        <div class="row">
                            <div id="results"></div>
                        </div>
                    </section>
                </div>
           
            </form>
        </div>        
    </div>        
<script src="js/script.js"></script>		
              
           



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
       
	<!-- SweetAlert -->
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
<script type="text/javascript">
$(document).ready(function(){
$("#filtreForm").on('change',function(){
var value=$(this).val();
alert(value);
$.ajax({
url:"fetchFilter.php",
type:"POST",
data:request='+value;
beforeSend:function(){
$(".container").html("<span>Working...</span>");
},
success:function(data){
$(".container").html*(data)
}
});
});
</script>


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


<script src="script.js"></script>


<?php require "footer_dashboard.php"; ?>
