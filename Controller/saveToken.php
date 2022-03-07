<?php 
	include "../DB/Config.php";
	include "TokenCore.php";


	$tokenCore = new TokenCore();
	$tokenCore->addToken($_POST['token'],$_POST['id']);

?>