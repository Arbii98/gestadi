<?php
require '../DB/config.php';
require '../DB/db.class.php';
$DB = new DB();
$user=$_POST['email'];
$mdp=$_POST['pass'];
$mdp=hash('sha512',$mdp);
$sql="select * from user where (email='$user' and password='$mdp')";
$list= $DB->query($sql);
if(count($list)==0)
{
/*	echo "<script>document.location.href = 'index.html';
alert('Verifiez vos données');
</script>";*/
}
else
{
	if($list[0]->enabled==0)
	{
			echo "<script>document.location.href = 'index.html';
		alert('Votre compte est désactivé');
		</script>";
	}
	session_start();
	$_SESSION['id']=$list[0]->id;
	$_SESSION['numero']=$list[0]->numero;
	$_SESSION['email']=$list[0]->email;
	$_SESSION['password']=$list[0]->password;
	$_SESSION['nom']=$list[0]->nom;
	$_SESSION['prenom']=$list[0]->prenom;
	$_SESSION['role']=$list[0]->role;
	$_SESSION['telephone']=$list[0]->telephone;
	$_SESSION['datenaissance']=$list[0]->date_naissance;
	$_SESSION['adresse']=$list[0]->adresse;
	echo "<script>document.location.href = '../View/FormEtudiant.php';
alert('Bienvenu');
</script>";

}




?>
