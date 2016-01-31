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
	//Verifies the user/pass combo of the user and grants the access (or not)
	if(
	isset($_POST['inputUser']) && isset($_POST['inputPassword']) &&
	ctype_alnum($_POST['inputUser']) && ctype_alnum($_POST['inputPassword'])
	) {
		$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
		$uhash = hash("sha256", $_POST['inputUser']."Salt&Pepper".$_POST['inputPassword']);
		if(isset($SHADOW[$uhash])) {
			$_SESSION['AUTH']=1;
			$_SESSION['USER']=$_POST['inputUser'];
			$expl = explode('-',$SHADOW[$uhash]);
			$_SESSION['LANG']=$expl[0];
			$_SESSION['RIGHTS']=$expl[1];
			$_SESSION['USERHASH']=$uhash;
			$_SESSION['USERSET']=$SHADOW[$uhash];
			$LOCALE = json_decode(file_get_contents('./data/'.$_SESSION['LANG'].'.json'),true);
		}
	}
	//Redirects to main page on first arrival
	if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']==1) {
		if($_SESSION['PAGE']=='signin.php'){
			$_SESSION['PAGENAME']='AM-VS TaskManager';
			$_SESSION['PAGE']='main.php';
		} else
		//Navigate to other pages
		if(isset($_POST['manage'])){
			unset($_POST['manage']);
			$_SESSION['PAGENAME']='AM-VS Manager';
			$_SESSION['PAGE']='manage.php';
		} else if(isset($_POST['addTask'])){
			unset($_POST['addTask']);
			$_SESSION['PAGENAME']='AM-VS TaskAdd';
			$_SESSION['PAGE']='add.php';
		} else if(isset($_POST['return'])){
			unset($_POST['return']);
			$_SESSION['PAGENAME']='AM-VS TaskManager';
			$_SESSION['PAGE']='main.php';
		}	
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
		if($_SESSION['AUTH']==1){
			$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
			$expl = explode('-',$_SESSION['USERSET']);

			if($_SESSION['LANG']=='french'){
				$uset='english'.'-'.$expl[1];
			} else {
				$uset='french'.'-'.$expl[1];
			}
			$SHADOW[$_SESSION['USERHASH']]=$uset;

			file_put_contents('./data/users.json',json_encode($SHADOW));
			
		}
		unset($_POST['otherLang']);
		$LOCALE = json_decode(file_get_contents('./data/'.$_SESSION['LANG'].'.json'),true);
	}

	//Cookie remember
	if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']==1 && isset($_POST['remember'])){
		setcookie('NAME',$_POST['inputUser'],time()+10);
	}

	//Disconnection handler
	if(isset($_POST['disconnect'])){
		session_destroy();
		header("Refresh:0");
		exit;
	}

	//Task loader
	$TODO = json_decode(file_get_contents('./data/todo.json'),true);
	$WIP = json_decode(file_get_contents('./data/wip.json'),true);	
	$ENDED = json_decode(file_get_contents('./data/done.json'),true);
	
	//Deletes tasks TODO...
	if(isset($_POST['deltodo'])){
		foreach($_POST['deltodo'] as $delete => $void){
			unset($TODO[$delete]);
			unset($_POST['deltodo'][$delete]);
		}
		file_put_contents('./data/todo.json',json_encode($TODO));
	}

	//... WIP ...
	if(isset($_POST['delwip'])){
		foreach($_POST['delwip'] as $delete => $void){
			unset($WIP[$delete]);
			unset($_POST['delwip'][$delete]);
		}
		file_put_contents('./data/wip.json',json_encode($WIP));
	}

	//... and ENDED
	if(isset($_POST['delended'])){
		foreach($_POST['delended'] as $delete => $void){
			unset($ENDED[$delete]);
			unset($_POST['delended'][$delete]);
		}
		file_put_contents('./data/done.json',json_encode($ENDED));
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

	<?php include_once './php/'.$_SESSION['PAGE'] ?>

  </body>
</html>
