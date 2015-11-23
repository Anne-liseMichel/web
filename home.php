<?php
	session_start();
	include "home.html";
	
	if(!$_SESSION['auth'])
	{
		header('Location: index.php');
	}
	else
	{
		echo "Bienvenue {$_SESSION['login']} !";
	}

	session_destroy();
?>
