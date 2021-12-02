<!DOCTYPE html>
<?php
require '../DB/config.php';
require '../DB/db.class.php';
include "../Entity/User.php";
include "../Core/UserCore.php";


?>
<html lang="en">
<head>
	<title>SOHIMA- LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-34">
						Changer de mot de passe
					</span>
					
					<div class="wrap-input100 rs1-wrap-input1000 validate-input m-b-20" data-validate="Type user name" >
						<input id="first-name" class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
						<!-- <span class="focus-input100"></span> -->
					</div>
				<!-- 	<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div> -->
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="valider">
							Envoyer mail
						</button>
					</div>

					

				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php
if(isset($_POST['valider']))
{



	$DB = new DB();
	$username=$_POST['username'];
	$sql="SElECT * FROM user where username='$username'";
	$list= $DB->query($sql);
	//var_dump(count($list));
	if(count($list)==1)
	{

		$nom=$list[0]->nom;
		$prenom=$list[0]->prenom;
		$email=$list[0]->email;
		$id=$list[0]->id;
		$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789';
		$token = str_shuffle($token);
        $token = substr($token, 0, 10);
        $password=hash('sha512', $token);


$header="MIME-Version: 1.0\r\n";
$header.='From:"SOHIMA"<sohimadesign@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
Bonjour '.$nom.' '.$prenom.',
<br>
	Nous avons reçu une demande de reinitialisation de votre mot de passe SOHIMA, voici votre nouveau mot de passe:
	<br>
     '.$token.'
     <br>
     Pour assurer la sécurité de votre application veuillez changer votre mot de passe à partir de la rubrique "Profile".

<br>
Cordialement.
<hr>
L\'equipe de SOHIMA Design.
';

mail($email, "Mot de passe oublié", $message, $header);
 $userC= new UserCore();
 $userC->ChangerMDP($id,$password);
	}




     	echo "<script>document.location.href = 'index.html';</script>"; 

}


?>