<?php 

require "header.php";


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
                    	<div class="form-row">
                            <div class="name">Intitulé du stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="type" id="type" required="required">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="0">Observation</option>
                                            <option value="1">Technicien</option>
                                            <option value="2">Ingénieur</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date debut de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="datedebut" id="datedebut" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date fin de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="datefin" id="datefin" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="entreprise" id="entreprise" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">E-mail Entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id="email" required="required">
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
    		var type = $("#type").val() ;
    		var debut = $("#datedebut").val() ;
    		var fin = $("#datefin").val();
    		var entreprise = $("#entreprise").val();
    		var email = $("#email").val();
    		console.log("Type :"+type);
    		console.log("debut :"+debut);
    		console.log("fin :"+fin);
    		console.log("entreprise :"+entreprise);
    		console.log("email :"+email);
    		var verified = true;
    		if(type== null)
    		{
    			Swal.fire({
                        title: 'Oops',
                        text: "Veuillez choisir l'intitulé de stage!",
                        icon: 'error'
                    })
    			verified = false;
    		}

    		if(debut== "")
    		{
    			Swal.fire({
                        title: 'Oops',
                        text: "Veuillez choisir la date de debut de stage!",
                        icon: 'error'
                    })
    			verified = false;
    		}

    		if(fin== "")
    		{
    			Swal.fire({
                        title: 'Oops',
                        text: "Veuillez choisir la date de fin de stage!",
                        icon: 'error'
                    })
    			verified = false;
    		}


    		if(entreprise== "")
    		{
    			Swal.fire({
                        title: 'Oops',
                        text: "Veuillez indiquer le nom de l'entreprise !",
                        icon: 'error'
                    })
    			verified = false;
    		}

    		if(email== "")
    		{
    			Swal.fire({
                        title: 'Oops',
                        text: "Veuillez indiquer l'adresse email de l'entreprise !",
                        icon: 'error'
                    })
    			verified = false;
    		}

    		var datedebut = new Date(debut);
    		var datefin = new Date(fin);
    		
    		if(datefin<=datedebut)
    		{
    			Swal.fire({
                        title: 'Oops',
                        text: "La date de fin de stage ne peut pas etre inferieure a la date de debut",
                        icon: 'error'
                    });
    			verified = false;
    		}

    		if(verified)
    		{
    			//ajouterForm(type,debut,fin,entreprise,email);
    		}


    		

    	});
    </script>
    <script>
    	function ajouterForm(type,datedebut,datefin,entreprise,email)
    	{
    		$.ajax({
                url:"../Controller/addFormEtudiant.php",
                data:{"type":type,"datedebut":datedebut,"datefin":datefin,"entreprise":entreprise,"email":email},
                method:"post",
                success: function(result)
                {
                	//alert(result);
                    Swal.fire({
                        title: 'Succes',
                        text: "Ajout avec succes!",
                        icon: 'success'
                    }).then((value)=>{window.location.href="FormEtudiant.php";});;
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
