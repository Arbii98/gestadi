<!DOCTYPE html>
<html>
<head>
	<title>Generateur de codes</title>
	
</head>
<body>

	<center><button class="btn btn-success" id="getcode">Générer un formulaire</button></center>


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
    	$("#getcode").click(function(){
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
					    'Un nouveau formulaire a été généré sur ce ' +
					    '<a target="_blank" href="http://localhost/gestadi/View/Formulaire.php?token='+result+'">lien</a> ' ,
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
						    saveToken(result);
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
    	function saveToken(token)
    	{
    		$.ajax({
                url:"../Controller/saveToken.php",
                data:{"token":token},
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
</body>
</html>