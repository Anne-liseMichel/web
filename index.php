<?php
	include "index.html";
	
	$log = $_POST['login'];
	$psw = $_POST['psw'];
	
	echo "$log";
	
	if($log && $psw)
	{
		session_start();
		$_SESSION['auth']=true;
		$_SESSION['login']=$log;
		$_SESSION['count']++;
		
		header('Location: home.php');
	}
	
?>
