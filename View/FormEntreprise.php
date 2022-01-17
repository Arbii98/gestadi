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
            if($row->token==$final && $row->validerEntreprise==0)
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
                        <div class="form-row">
                            <div class="name">Nom de l'entreprise/raison sociale</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nom_entreprise" id="nom_entreprise" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Numéro SIRET</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="numero_siret" id="numero_siret" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Code NAF ou APE</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="code_naf_ape" id="code_naf_ape" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Prénom et nom du dirigeant</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom_dirigeant" id="nom_dirigeant">
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="prenom_dirigeant" id="prenom_dirigeant">
                                            <label class="label--desc">Prénom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Prénom et nom du signataire de la convention de stage</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom_signataire" id="nom_signataire">
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="prenom_signataire" id="prenom_signataire">
                                            <label class="label--desc">Prénom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse de l'entreprise : Numero et nom de la rue</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="rue" id="rue" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse de l'entreprise : Code postal</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="cp" id="cp" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse de l'entreprise : Ville</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="ville" id="ville" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email_entreprise" id="email_entreprise" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Prénom et nom de l'étudiant stagiaire</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="etudiant" id="etudiant" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Titre du stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="titre_stage" id="titre_stage" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description du stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea style="resize: none; width:100%" class="input--style-5" name="description_stage" id="description_stage"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date de debut du stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="debut_stage" id="debut_stage" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Date de fin du stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" name="fin_stage" id="fin_stage" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nombre d'heures travaillées par semaine </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nb_heures" id="nb_heures" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Mesures relatives à la crise sanitaire du COVID-19: merci d'accepter l'ensemble des conditions ci-dessous en cochant la case ou à défaut, de contacter ludovic.hamon@univ-lemans.fr pour discuter d'autres alternatives. Attention: aucune convention ne sera rédigée, signée et/ou envoyée sans un accord sur ce sujet entre l'IUT et l'Entreprise.</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="checkbox" name="accept_covid" id="accept_covid" required="required">
                                    Je m'engage à ce que tout ou partie du stage ait lieu en télétravail si les mesures sanitaires le recommandent. Je m'engage de plus à ce que l'ensemble des mesures dites "barrières" soient respectées si elles sont en vigueur durant le stage
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse postale du lieu de travail de l'étudiant-stagiaire </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="radio" name="lieu" value="identique" id="lieu" required="required"> Identique à l'adresse de l'entreprise<br>
                                    <input class="input--style-5" type="radio" name="lieu" value="teletravail" id="lieu" required="required"> Télétravail avec au moins 2 jours par semaine sur l'un des sites de l'entreprise<br>
                                    <input class="input--style-5" type="radio" name="lieu" value="autre" id="lieu" required="required"> Autre
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Matériel mis à disposition du stagiaire </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="materiel" id="materiel" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Environnement(s) de développement et langage(s) de programmation utilisés</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="environnement" id="environnement" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gratification : Montant net mensuel</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="montant" id="montant" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Avantages offerts</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="avantages" id="avantages" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Prénom et nom du maître de stage</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom_maitre" id="nom_maitre">
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="prenom_maitre" id="prenom_maitre">
                                            <label class="label--desc">Prénom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Statut du maître de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="statut_maitre" id="statut_maitre" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nom du poste occupé par le maître de stage au sein de l'entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="poste_maitre" id="poste_maitre" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Numéro de téléphone du maître de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="telephone_maitre" id="telephone_maitre" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse email du maître de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="email_maitre" id="email_maitre" required="required">
                                </div>
                            </div>
                        </div>
                        
                        <!-- 2eme maitre de stage : -->
                        <div class="form-row m-b-55">
                            <div class="name">Prénom et nom du deuxieme maître de stage</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom_maitre2" id="nom_maitre2">
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="prenom_maitre2" id="prenom_maitre2">
                                            <label class="label--desc">Prénom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Statut du deuxieme maître de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="statut_maitre2" id="statut_maitre2" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nom du poste occupé par le deuxieme maître de stage au sein de l'entreprise</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="poste_maitre2" id="poste_maitre2" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Numéro de téléphone du deuxieme maître de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="telephone_maitre2" id="telephone_maitre2" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse email du deuxieme maître de stage</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="email_maitre2" id="email_maitre2" required="required">
                                </div>
                            </div>
                        </div>


                        
                        <div>
                            <center><button class="btn btn--radius-2 btn--green" id="submit" name="submit" type="submit">Confirmer</button></center>
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
    		var nom_entreprise = $("#nom_entreprise").val() ;
    		var numero_siret = $("#numero_siret").val() ;
    		var code_naf_ape = $("#code_naf_ape").val();
    		var nom_dirigeant = $("#nom_dirigeant").val();
    		var prenom_dirigeant = $("#prenom_dirigeant").val();
            var email_entreprise = $("#email_entreprise").val();
            var rue = $("#rue").val();
            var cp = $("#cp").val();
            var ville = $("#ville").val();

            var nom_maitre = $("#nom_maitre").val();
            var prenom_maitre = $("#prenom_maitre").val();
            var statut_maitre = $("#statut_maitre").val();
            var poste_maitre = $("#poste_maitre").val();
            var telephone_maitre = $("#telephone_maitre").val();
            var email_maitre = $("#email_maitre").val();



            ajouterForm(nom_entreprise,numero_siret,code_naf_ape,nom_dirigeant,prenom_dirigeant,email_entreprise,rue,cp,ville,
                nom_maitre,prenom_maitre,statut_maitre,poste_maitre,telephone_maitre,email_maitre);
    		useTokenByEntreprise();


    		

    	});
    </script>
    <script>
    	function ajouterForm(nom_entreprise,numero_siret,code_naf_ape,nom_dirigeant,prenom_dirigeant,email_entreprise,rue,cp,ville,
            nom_maitre,prenom_maitre,statut_maitre,poste_maitre,telephone_maitre,email_maitre)
    	{
    		$.ajax({
                url:"../Controller/addFormEntreprise.php",
                data:{"token":'<?=$_GET['token']?>',"nom_entreprise":nom_entreprise,"numero_siret":numero_siret,"code_naf_ape":code_naf_ape,"nom_dirigeant":nom_dirigeant,
                        "prenom_dirigeant":prenom_dirigeant,"email_entreprise":email_entreprise,"rue":rue,"cp":cp,"ville":ville,
                            "nom_maitre":nom_maitre,"prenom_maitre":prenom_maitre,"statut_maitre":statut_maitre,"poste_maitre":poste_maitre,"telephone_maitre":telephone_maitre,"email_maitre":email_maitre},
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
                    });
                },
            });
    	}
    </script>
    

</body>

</html>
