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
<?php 
$list = $tokenCore->getTokenByToken($_GET['token']);
$nom = $list[0]->Nom_etudiant;
$prenom = $list[0]->Prenom_etudiant;
$num = $list[0]->Num_etudiant;
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="navbar.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>


  <body>
    <div>
      <div class="nav">
        <input type="checkbox" id="nav-check" />
        <div class="nav-header">
          <div style="margin-left: 30px" class="nav-title">
            <img
              src="https://pbs.twimg.com/profile_images/1323541845192966144/7rxqOjuP_400x400.jpg"
              width="40px"
              height="40px"
            />
          </div>
          <strong style="color: white; font-size: 35px"> Iut Laval </strong>
        </div>
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>

        <div class="nav-links">
          <a href="#"> Formulaire Stage</a>
          <a href="#About">Aide</a>
        </div>
      </div>
    </div>

    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="container1" id="contact">
      <div class="row3">
        <div class="column2">
          <div class="card2">
            <div class="flex">
              <img
                class="image"
                src="https://pbs.twimg.com/profile_images/1323541845192966144/7rxqOjuP_400x400.jpg"
              />
            </div>
          </div>
        </div>
        <br />

        <div class="column2">
          <!-- <form> -->
            <label for="nom">Nom de l'entreprise</label>
                <input class="input" type="text" name="nom_entreprise" id="nom_entreprise" required="required">
            <label for="nom">Numero SIRET</label>
                <input class="input" type="text" name="numero_siret" id="numero_siret" required="required">
            <label for="nom">Code NAF ou APE</label>
                <input class="input" type="text" name="code_naf_ape" id="code_naf_ape" required="required">
            <label for="civilite_dirigeant">Civilité du dirigeant</label><br>
                <select name="civilite_dirigeant" id="civilite_dirigeant" class="input" style="width :100%; height:40px;">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select><br>
            <label for="nom">Nom du dirigeant</label>
                <input class="input" type="text" name="nom_dirigeant" id="nom_dirigeant">
            <label for="nom">Prénom du dirigeant</label>
                <input class="input" type="text" name="prenom_dirigeant" id="prenom_dirigeant">
            <label for="fonction_dirigeant">Fonction du dirigeant</label>
                <input class="input" type="text" name="fonction_dirigeant" id="fonction_dirigeant">
            <label for="civilite_signataire">Civilité du signataire</label><br>
                <select name="civilite_signataire" id="civilite_signataire" class="input" style="width :100%; height:40px;">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select><br>
            <label for="nom">Nom du signataire</label>
                <input class="input" type="text" name="nom_signataire" id="nom_signataire">
            <label for="nom">Prénom du signataire</label>
                <input class="input" type="text" name="prenom_signataire" id="prenom_signataire">
            <label for="nom">Adresse de l'entreprise : Numero et nom de la rue</label>
                <input class="input" type="text" name="rue" id="rue" required="required">
            <label for="nom">Adresse de l'entreprise : Code postal</label>
                <input class="input" type="text" name="cp" id="cp" required="required">
            <label for="nom">Adresse de l'entreprise : Ville</label>
                <input class="input" type="text" name="ville" id="ville" required="required">
            <label for="nom">Adresse email</label>
                <input class="input" type="email" name="email_entreprise" id="email_entreprise" required="required">
            <label for="telephone_entreprise">Telephone entreprise</label>
                <input class="input" type="text" name="telephone_entreprise" id="telephone_entreprise" required="required">
            <label for="nom">Nom et prénom de l'étudiant stagiaire</label>
                <input class="input" type="text" name="etudiant" id="etudiant" required="required" value="<?=$nom." ".$prenom?>" readonly>
            <label for="nom">Titre du stage</label>
                <input class="input" type="text" name="titre_stage" id="titre_stage" required="required">
            <label for="nom">Description du stage</label>
                <textarea style="resize: none; width:100%" class="input" name="description_stage" id="description_stage"></textarea>
            <label for="nom">Date de debut du stage</label>
                <input class="input" type="date" name="debut_stage" id="debut_stage" required="required">
            <label for="nom">Date de fin du stage</label>
                <input class="input" type="date" name="fin_stage" id="fin_stage" required="required">
            <label for="nom">Adresse du stage</label>
                <input class="input" type="text" name="adresse_stage" id="adresse_stage" required="required">
            <label for="nom">Nombre d'heures travaillées par semaine</label>
                <input class="input" type="text" name="nb_heures" id="nb_heures" required="required">
            <label for="nom">Mesures relatives à la crise sanitaire du COVID-19: merci d'accepter l'ensemble des conditions ci-dessous en cochant la case ou à défaut, de contacter ludovic.hamon@univ-lemans.fr pour discuter d'autres alternatives. Attention: aucune convention ne sera rédigée, signée et/ou envoyée sans un accord sur ce sujet entre l'IUT et l'Entreprise.</label><br>
                <center><input class="input" type="checkbox" name="accept_covid" id="accept_covid" required="required"></center>
                <p style="color : black;">Je m'engage à ce que tout ou partie du stage ait lieu en télétravail si les mesures sanitaires le recommandent. Je m'engage de plus à ce que l'ensemble des mesures dites "barrières" soient respectées si elles sont en vigueur durant le stage</p>
            <label for="nom">Adresse postale du lieu de travail de l'étudiant stagiaire</label><br>
                <center><input class="input" type="radio" name="lieu" value="identique" id="lieu" required="required"></center> <p style="color : black;">Identique à l'adresse de l'entreprise</p>
                <center><input class="input" type="radio" name="lieu" value="teletravail" id="lieu" required="required"></center><p style="color : black;"> Télétravail avec au moins 2 jours par semaine sur l'un des sites de l'entreprise</p>
                <center><input class="input" type="radio" name="lieu" value="autre" id="lieu" required="required"></center> <p style="color : black;">Autre</p>
             
            <label for="nom">Matériel mis à disposition du stagiaire</label>
                <input class="input" type="text" name="materiel" id="materiel" required="required">
            <label for="nom">Environnement(s) de développement et langage(s) de programmation utilisés</label>
                <input class="input" type="text" name="environnement" id="environnement" required="required">
            <label for="nom">Gratification : Montant net mensuel</label>
                <input class="input" type="text" name="montant" id="montant" required="required">
            <label for="nom">Avantages offerts</label>
                <input class="input" type="text" name="avantages" id="avantages" required="required">
            <label for="civilite_maitre1">Civilité du maître de stage</label><br>
                <select name="civilite_maitre1" id="civilite_maitre1" class="input" style="width :100%; height:40px;">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select><br>
            <label for="nom">Nom du maître de stage</label>
                <input class="input" type="text" name="nom_maitre" id="nom_maitre">
            <label for="nom">Prénom du maître de stage</label>
                <input class="input" type="text" name="prenom_maitre" id="prenom_maitre">
            <label for="nom">Statut du maître de stage</label>
                <input class="input" type="text" name="statut_maitre" id="statut_maitre" required="required">
            <label for="nom">Nom du poste occupé par le maître de stage au sein de l'entreprise</label>
                <input class="input" type="text" name="poste_maitre" id="poste_maitre" required="required">
            <label for="nom">Numéro de téléphone du maître de stage</label>
                <input class="input" type="text" name="telephone_maitre" id="telephone_maitre" required="required">
            <label for="nom">Adresse email du maître de stage</label>
                <input class="input" type="text" name="email_maitre" id="email_maitre" required="required">
            <label for="civilite_maitre2">Civilité du deuxieme maître de stage (Si existe)</label><br>
                <select name="civilite_maitre2" id="civilite_maitre2" class="input" style="width :100%; height:40px;">
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select><br>
            <label for="nom">Nom du deuxieme maître de stage (Si existe)</label>
                <input class="input" type="text" name="nom_maitre2" id="nom_maitre2">
            <label for="nom">Prénom du deuxieme maître de stage (Si existe)</label>
                <input class="input" type="text" name="prenom_maitre2" id="prenom_maitre2">
            <label for="nom">Statut du deuxieme maître de stage (Si existe)</label>
                <input class="input" type="text" name="statut_maitre2" id="statut_maitre2" required="required">
            <label for="nom">Nom du poste occupé par le deuxieme maître de stage au sein de l'entreprise (Si existe)</label>
                <input class="input" type="text" name="poste_maitre2" id="poste_maitre2" required="required">
            <label for="nom">Numéro de téléphone du deuxieme maître de stage (Si existe)</label>
                <input class="input" type="text" name="telephone_maitre2" id="telephone_maitre2" required="required">
            <label for="nom">Adresse email du deuxieme maître de stage (Si existe)</label>
                <input class="input" type="text" name="email_maitre2" id="email_maitre2" required="required">
            <center><button class="button" id="submit" name="submit" type="submit">Confirmer</button></center>
            <br><br><br>
          <!-- </form> -->
        </div>
      </div>
    </div>
  </body>



    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

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
            //Entreprise
    		var nom_entreprise = $("#nom_entreprise").val() ;
    		var numero_siret = $("#numero_siret").val() ;
    		var code_naf_ape = $("#code_naf_ape").val();
    		var nom_dirigeant = $("#nom_dirigeant").val();
    		var prenom_dirigeant = $("#prenom_dirigeant").val();
            var email_entreprise = $("#email_entreprise").val();
            var rue = $("#rue").val();
            var cp = $("#cp").val();
            var ville = $("#ville").val();

            var telephone = $("#telephone_entreprise").val();
            var civilite_dirigeant = $("#civilite_dirigeant").val();
            var fonction_dirigeant = $("#fonction_dirigeant").val();

            console.log("Telephone : "+telephone);
            console.log("Civilite Dirigeant : "+civilite_dirigeant)
            console.log("Fonction Dirigeant : "+fonction_dirigeant)

            //Maitre 1 
            var civilite_maitre1 = $("#civilite_maitre1").val();
            console.log("Civilite Maitre :"+civilite_maitre1);

            var nom_maitre = $("#nom_maitre").val();
            var prenom_maitre = $("#prenom_maitre").val();
            var statut_maitre = $("#statut_maitre").val();
            var poste_maitre = $("#poste_maitre").val();
            var telephone_maitre = $("#telephone_maitre").val();
            var email_maitre = $("#email_maitre").val();

            //Maitre 2
            var civilite_maitre2 = $("#civilite_maitre2").val();

            var nom_maitre2 = $("#nom_maitre2").val();
            var prenom_maitre2 = $("#prenom_maitre2").val();
            var statut_maitre2 = $("#statut_maitre2").val();
            var poste_maitre2 = $("#poste_maitre2").val();
            var telephone_maitre2 = $("#telephone_maitre2").val();
            var email_maitre2 = $("#email_maitre2").val();
            
            //Covid
            var accept_covid = $("#accept_covid").val();

            //Stage
            var titre_stage = $("#titre_stage").val();
            var description_stage = $("#description_stage").val();
            var date_debut = $("#debut_stage").val();
            var date_fin = $("#fin_stage").val();
            var adresse_stage = $("#adresse_stage").val();
            var nb_heures = $("#nb_heures").val();
            var ide = $("#environnement").val();
            var gratification = $("#montant").val();
            var avantages = $("#avantages").val();

            //Convention
            var civilite_signataire = $("#civilite_signataire").val();
            
            var nom_signataire = $("#nom_signataire").val();
            var prenom_signataire = $("#prenom_signataire").val();




            if($("#accept_covid").prop("checked")==false)
            {
                Swal.fire({
                        title: 'Reglement COVID-19',
                        text: "Veuillez accepter les reglements COVID en cochant la case adequate !",
                        icon: 'error'
                    });
            }
            else
            {
                ajouterForm(civilite_signataire,civilite_maitre1,civilite_maitre2,telephone,civilite_dirigeant,fonction_dirigeant,
                    nom_entreprise,numero_siret,code_naf_ape,nom_dirigeant,prenom_dirigeant,email_entreprise,rue,cp,ville,
                        nom_maitre,prenom_maitre,statut_maitre,poste_maitre,telephone_maitre,email_maitre,
                            nom_maitre2,prenom_maitre2,statut_maitre2,poste_maitre2,telephone_maitre2,email_maitre2,
                                titre_stage,description_stage,date_debut,date_fin,adresse_stage,nb_heures,ide,gratification,avantages,
                                    nom_signataire,prenom_signataire);
            }

            
    		


    		

    	});
    </script>
    <script>
    	function ajouterForm(civilite_signataire,civilite_maitre1,civilite_maitre2,telephone,civilite_dirigeant,fonction_dirigeant,
            nom_entreprise,numero_siret,code_naf_ape,nom_dirigeant,prenom_dirigeant,email_entreprise,rue,cp,ville,
                nom_maitre,prenom_maitre,statut_maitre,poste_maitre,telephone_maitre,email_maitre,
                    nom_maitre2,prenom_maitre2,statut_maitre2,poste_maitre2,telephone_maitre2,email_maitre2,
                            titre_stage,description_stage,date_debut,date_fin,adresse_stage,nb_heures,ide,gratification,avantages,
                                nom_signataire,prenom_signataire)
    	{
    		$.ajax({
                url:"../Controller/addFormEntreprise.php",
                data:{"token":'<?=$_GET['token']?>',"nom_entreprise":nom_entreprise,"numero_siret":numero_siret,"code_naf_ape":code_naf_ape,"nom_dirigeant":nom_dirigeant,
                        "prenom_dirigeant":prenom_dirigeant,"email_entreprise":email_entreprise,"rue":rue,"cp":cp,"ville":ville,
                            "nom_maitre":nom_maitre,"prenom_maitre":prenom_maitre,"statut_maitre":statut_maitre,"poste_maitre":poste_maitre,"telephone_maitre":telephone_maitre,"email_maitre":email_maitre,
                                "nom_maitre2":nom_maitre2,"prenom_maitre2":prenom_maitre2,"statut_maitre2":statut_maitre2,"poste_maitre2":poste_maitre2,"telephone_maitre2":telephone_maitre2,"email_maitre2":email_maitre2,
                                    "titre_stage":titre_stage,"description_stage":description_stage,"date_debut":date_debut,"date_fin":date_fin,"adresse_stage":adresse_stage,"nb_heures":nb_heures,"ide":ide,"gratification":gratification,"avantages":avantages,
                                        "nom_signataire":nom_signataire,"prenom_signataire":prenom_signataire,
                                            "civilite_signataire":civilite_signataire,"civilite_maitre1":civilite_maitre1,"civilite_maitre2":civilite_maitre2,"telephone":telephone,"civilite_dirigeant":civilite_dirigeant,"fonction_dirigeant":fonction_dirigeant},
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
