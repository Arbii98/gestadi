<?php 

    include "../DB/Config.php";
    include "../Controller/TokenCore.php";
    
    if(!isset($_GET['token']))
    {
        echo "<script>
        alert('Vous n\'avez pas acces a cette rubrique');
        window.location.href='https://google.com'
        </script>";
    }
    else
    {
        $tokenCore = new TokenCore();
        $list = $tokenCore->getAllTokens();
        if(!checkToken($_GET['token'],$list))
        {
            echo "<script>
            alert('Token invalide');
            window.location.href='https://google.com'
            </script>";
        }
    }
    

    function checkToken($final,$list)
    {
        foreach ($list as $row) {
            if($row->token==$final && $row->validerEtudiant==0)
            {
                return true;
            }
        }
        return false;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>GESTADI</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper p-t-45 p-b-50" style="background-color: grey">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Formulaire de stage</h2>
                </div>
                <div class="card-body">
                    <!-- <form method="POST" action="../Controller/addFormEtudiant.php">     -->
                    <!-- <form>                     -->
                        <div class="form-row m-b-55">
                            <div class="name">Prénom et nom de l'étudiant</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom" id="nom">
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="prenom" id="prenom">
                                            <label class="label--desc">Prénom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Identifiant de l'etudiant</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="num_etudiant" id="num_etudiant" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date de naissance de l'étudiant</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="date_naissance" id="date_naissance" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse postale de l'etudiant</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="adresse" id="adresse" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Numéro de téléphone de l'étudiant</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="numero" id="numero" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse email de l'étudiant</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id="email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Attestation</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="attestation" id="attestation" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nom de l'entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nom_entreprise" id="nom_entreprise" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse email de l'entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="email_entreprise" id="email_entreprise" required="required">
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <center><button class="btn btn--radius-2 btn--green" id="submit" name="submit" type="submit">Submit</button></center>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <script type="text/javascript">
        /*$(document).ready(function(){
             swal("Oops!", "Vous devez remplir le formulaire avant l\'envoie !", "error");
        })*/
    </script>

    <script type="text/javascript">
    	$("#submit").click(function(){
    		var nom = $("#nom").val() ;
    		var prenom = $("#prenom").val() ;
    		var num_etudiant = $("#num_etudiant").val();
    		var date_naissance = $("#date_naissance").val();
    		var adresse = $("#adresse").val();
            var numero = $("#numero").val();
            var email = $("#email").val();
            var nom_entreprise = $("#nom_entreprise").val();
            var email_entreprise = $("#email_entreprise").val();
            
            


    		console.log("nom :"+nom);
    		console.log("prenom :"+prenom);
    		console.log("num_etudiant :"+num_etudiant);
    		console.log("date_naissance :"+date_naissance);
    		console.log("adresse :"+adresse);
            console.log("numero :"+numero);
            console.log("email :"+email);
            console.log("nom_entreprise :"+nom_entreprise);
            console.log("email_entreprise :"+email_entreprise);

            ajouterForm(nom,prenom,num_etudiant,date_naissance,adresse,numero,email,nom_entreprise,email_entreprise);
    		

    	});
    </script>
    <script>
    	function ajouterForm(nom,prenom,num_etudiant,date_naissance,adresse,numero,email,nom_entreprise,email_entreprise)
    	{
    		$.ajax({
                url:"../Controller/addFormEtudiant.php",
                data:{"nom":nom,"prenom":prenom,"num_etudiant":num_etudiant,"date_naissance":date_naissance,
                    "adresse":adresse,"numero":numero,"email":email,"nom_entreprise":nom_entreprise,
                        "email_entreprise":email_entreprise,"token":'<?=$_GET['token']?>'},
                method:"get",
                success: function(result)
                {
                	//alert(result);
                    Swal.fire({
                        title: 'Information',
                        text: result,
                        icon: 'info'
                    }).then((value)=>{window.location.href="http://google.com";});;
                },
                error : function()
                {
                    Swal.fire({
                        title: 'Erreur',
                        text: "Erreur lors de l'ajout !",
                        icon: 'error'
                    })
                },
            });
    	}
    </script>

</body>

</html>
