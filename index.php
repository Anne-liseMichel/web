<?php
	
	if(!isset($_SESSION)) { 
		session_start();
	}

	if(!isset($_SESSION['LANG'])) { 
		$_SESSION['LANG']='french.json';
	}

	$_SESSION['APPVAR'] = json_decode(file_get_contents('./data/' . $_SESSION['LANG'] ));

	if(!isset($_SESSION['AUTH'])) { 
		$_SESSION['AUTH']=0;
	}

	if(isset($_POST['inputUser']) && isset($_POST['inputPassword'])) {
		if($_POST['inputUser']=="a" && $_POST['inputPassword']=="b") {
			$_SESSION['AUTH']=1;
		}
	}

	if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']==1) {

		$_SESSION['PAGENAME']='AM-VS TaskManager';
		$_SESSION['PAGE']='main.php';

	} else {

		$_SESSION['PAGENAME']='AM-VS Login';
		$_SESSION['PAGE']='signin.php';

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
