<?php require "header_dashboard.php"; ?>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
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
                  6389
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
                  376
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
                  35
                </p>
              </div>
            </div>
          </div>
          
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Etudiant</th>
                    <th class="px-4 py-3">Tuteur Iut</th>
                    <th class="px-4 py-3">Stage Trouvé</th>
                    <th class="px-4 py-3">Accord Etudiant</th>
                    <th class="px-4 py-3">Formulaire Etudiant</th>
                    <th class="px-4 py-3">Formulaire Entreprise</th>
                    <th class="px-4 py-3">Date Debut</th>
                    <th class="px-4 py-3">Date Fin</th>
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
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
                          <p class="font-semibold">Hans Burger</p>
                          <p class="text-xs text-gray-600 dark:text-gray-400">
                            Titre Stage : 10x Developer
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Mehdi B
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Oui
                      </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Approved
                      </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Rempli
                      </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span
                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        Rempli
                      </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/10/2020
                    </td>
                    <td class="px-4 py-3 text-sm">
                      6/04/2021
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <button class="btn btn-success" style="width : 100%" data-title="edit" data-toggle="modal" data-target="#myModal">Voir details</button>
                      <button class="btn btn-dark getcode" style="width : 100%" id="1" >Générer formulaire</button>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div
              class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
              <span class="flex items-center col-span-3">
                Showing 21-30 of 100
              </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                    <li>
                      <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous">
                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                          <path
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                      </button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        1
                      </button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        2
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                        3
                      </button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        4
                      </button>
                    </li>
                    <li>
                      <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        8
                      </button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        9
                      </button>
                    </li>
                    <li>
                      <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                          <path
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                      </button>
                    </li>
                  </ul>
                </nav>
              </span>
            </div>
          </div>


</div>
</main>



<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                  		SAIDI Mohamed
                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="text-danger fa fa-times"></i></button>
                   		<h4 class="modal-title" id="myModalLabel"></h4>
                  </div>

                  <div class="modal-body">
                    <center><h1>SAIDI Mohamed</h1></center>
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
<?php require "footer_dashboard.php"; ?>