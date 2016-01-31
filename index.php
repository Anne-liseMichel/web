<?php
	include_once("./php/functions.php");
	//Starts the session
	if(!isset($_SESSION)) { 
		session_start();
	}
	//Default language load
	if(!isset($_SESSION['LANG'])) { 
		$_SESSION['LANG']='french';
	}
	//Inits the authentification
	if(!isset($_SESSION['AUTH'])) { 
		$_SESSION['AUTH']=0;
	}
	//Verifies the user/pass combo of the user and grants the access (or not)
	if(
	isset($_POST['inputUser']) && isset($_POST['inputPassword']) &&
	ctype_alnum($_POST['inputUser']) && ctype_alnum($_POST['inputPassword'])
	) {
		userAuth($_POST['inputUser'],$_POST['inputPassword']);
	}

	//Adds or modifies the user
	if(isset($_POST['modUser']) && ctype_alnum($_POST['modUser']) ){
		userAddRemove($_POST['modUser'],$_POST['modPassword']);
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
		langSwitch();
		unset($_POST['otherLang']);
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

	//Refresher
	if(isset($_POST['refresh'])){
		unset($_POST['refresh']);
		header("Refresh:0");
		exit;
	}


	//Add task
	if(isset($_POST['newTask']) && $_POST['taskType'] ){
		$COUNT = intval(file_get_contents('./data/count'));
		$COUNT++;
		addTask($_SESSION['USER'],$_POST['taskdata'],$_POST['taskdate'],$_POST['taskType'],$COUNT);
		file_put_contents('./data/count',$COUNT);
	}
	
	//Deletes tasks TODO...
	if(isset($_POST['deltodo'])){
		foreach($_POST['deltodo'] as $delete => $void){
			delTask($delete,"todo");
		}
	}

	//... WIP ...
	if(isset($_POST['delwip'])){
		foreach($_POST['delwip'] as $delete => $void){
			delTask($delete,"wip");
		}
	}

	//... and ENDED
	if(isset($_POST['delended'])){
		foreach($_POST['delended'] as $delete => $void){
			delTask($delete,"done");
		}
	}
	
	//Loads the desired language file
	$LOCALE = json_decode(file_get_contents('./data/'.$_SESSION['LANG'].'.json'),true);

	//Task loader
	$TODO = json_decode(file_get_contents('./data/todo.json'),true);
	$WIP = json_decode(file_get_contents('./data/wip.json'),true);	
	$ENDED = json_decode(file_get_contents('./data/done.json'),true);
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
