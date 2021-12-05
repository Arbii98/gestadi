<?php

	include "../DB/Config.php";
	include "TokenCore.php";


	$tokenCore = new TokenCore();
	$list = $tokenCore->getAllTokens();

	$str ="azertyuiopqsdfghjklmwxcvbn1234567890AZERTYUIOPQSDFGHJKLMWXCVBN";
	do
	{
		$str= str_shuffle($str);
		$final = substr($str, 0,10);	
	}
	while(checkToken($final,$list));
	
	

	function checkToken($final,$list)
	{
		foreach ($list as $row) {
			if($row->token==$final)
			{
				return true;
			}
		}
		return false;
	}

	echo $final;

?>