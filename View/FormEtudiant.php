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
            <label for="nom">Nom de l'étudiant</label>
            <input class="input" type="text" name="nom" id="nom" value="<?=$nom?>" readonly>
            <label for="prenom">Prénom de l'étudiant</label>
            <input class="input" type="text" name="prenom" id="prenom" value="<?=$prenom?>" readonly>
            <label for="num_etudiant">Identifiant de l'étudiant</label>
            <input class="input" type="text" name="num_etudiant" id="num_etudiant" required="required" value="<?=$num?>" readonly>
            <label for="date_naissance">Date de naissance de l'étudiant</label>
            <br><input class="input" type="date" name="date_naissance" id="date_naissance" required="required"><br>
            <label for="adresse">Adresse postale de l'étudiant</label>
            <input class="input" type="text" name="adresse" id="adresse" required="required">
            <label for="numero">Numéro de téléphone de l'étudiant</label>
            <input class="input" type="text" name="numero" id="numero" required="required">
            <label for="email">Adresse e-mail de l'étudiant</label>
            <input class="input" type="email" name="email" id="email" required="required">
            <label for="attestation">Attestation de l'étudiant</label>
            <input class="input" type="file" name="attestation" id="attestation" required="required">
            <label for="nom_entreprise">Nom de l'entreprise</label>
            <input class="input" type="text" name="nom_entreprise" id="nom_entreprise" required="required">
            <label for="email_entreprise">Adresse email de l'entreprise</label>
            <input class="input" type="text" name="email_entreprise" id="email_entreprise" required="required">
            

            
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
