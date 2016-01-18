<?php

	if(!isset($_SESSION)) { 
		session_start();
		$french=file_get_contents("./data/french.json", "r");
		$_SESSION['APPVAR'] = json_decode($french);
		$_SESSION['AUTH'] = 0;
	}

	if(isset($_SESSION['AUTH']) && $_SESSION['AUTH']=1) {
		header("Location: ./main.php");
		exit;
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

    <title>AM-VS Login</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading"> <?php echo($_SESSION['APPVAR']['SIGNIN']); ?></h2>
        <label for="inputEmail" class="sr-only"> <?php echo($_SESSION['APPVAR']['EMAIL']); ?> </label>
        <input type="email" id="inputEmail" class="form-control" required autofocus>
        <label for="inputPassword" class="sr-only"> <?php echo($_SESSION['APPVAR']['PASSWORD']); ?> </label>
        <input type="password" id="inputPassword" class="form-control" required>
		
        <button class="btn btn-lg btn-primary btn-block" type="submit"> <?php echo($_SESSION['APPVAR']['LOGIN']); ?> </button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
  </body>
</html>