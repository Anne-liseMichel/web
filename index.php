<?php
	//Starts the session
	if(!isset($_SESSION)) { 
		session_start();
	}
	//Default language load
	if(!isset($_SESSION['LANG'])) { 
		$_SESSION['LANG']='french';
	}
	//Loads the desired language file
	$LOCALE = json_decode(file_get_contents('./data/'.$_SESSION['LANG'].'.json'),true);
	//Inits the authentification
	if(!isset($_SESSION['AUTH'])) { 
		$_SESSION['AUTH']=0;
	}
	//Verifies the user/pass combo of the user
	if(isset($_POST['inputUser']) && isset($_POST['inputPassword'])) {
		$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
		$uhash = hash("sha256", $_POST['inputUser']."Salt&Pepper".$_POST['inputPassword']);
		if(isset($SHADOW[$uhash])) {
			$_SESSION['AUTH']=1;
			$expl = explode('-',$SHADOW[$uhash]);
			$_SESSION['LANG']=$expl[0];
			$_SESSION['RIGHTS']=$expl[1];
			$LOCALE = json_decode(file_get_contents('./data/'.$_SESSION['LANG'].'.json'),true);
		}
	}
	//Redirects to main page
	if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']==1) {

		$_SESSION['PAGENAME']='AM-VS TaskManager';
		$_SESSION['PAGE']='main.php';
	//Locks on the login page
	} else {

		$_SESSION['PAGENAME']='AM-VS Login';
		$_SESSION['PAGE']='signin.php';

	}

	//Language switch
	if(isset($_POST['otherLang'])){
		if($_SESSION['LANG']=='french'){
			$_SESSION['LANG']='english';
		} else {
			$_SESSION['LANG']='french';
		}
		unset($_POST['otherLang']);
		$LOCALE = json_decode(file_get_contents('./data/'.$_SESSION['LANG'].'.json'),true);
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $_SESSION['PAGENAME'] ?> </title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	
  </head>

  <body>

	<?php include_once $_SESSION['PAGE'] ?>

  </body>
</html>
