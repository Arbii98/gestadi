<?php
session_start();
if(!isset($_SESSION['id']))
{


echo "<script>document.location.href = '../Login/index.html';
alert('Connectez-vous');
</script>";

}


?>