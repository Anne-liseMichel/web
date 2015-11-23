<?php
	
	$mail = $_POST['mail'];
	$log = $_POST['login'];
	$psw1 = $_POST['psw'];
	$psw2 = $_POST['psw2'];
	$f='logins.txt';
	$testo='test';
	
	if($psw1==$psw2)
	{
		$te=file_get_contents($f);
		echo $te;
		file_put_contents($f,"ieiei",FILE_APPEND);

		
		/*$f=fopen("logins.txt","a+");
		if(isset($f))
		{
			echo "fichier ouvert !";
			echo $te;
			echo "ppp";
			fclose($f);
		}
		else
		{
			echo "Le fichier n'a pas pu être ouvert";
		}*/
	}
	else
	{
		echo '<script type="text/javascript">alert("Veuillez entrer deux mots de passes identiques");</script>';
		header('Location: signUp.html');
	}

?>
