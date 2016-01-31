<?php

?>


    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">ZZTasks</a>
        </div>
        <div id="navbar" class="nav navbar-nav">
	<form class="navbar-form navbar-left" method="post">
		<button class="btn btn-default" name="otherLang" type="submit"> <?php echo $LOCALE['LANG'] ?> </button>
	</form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
	<div class="row">
	  <div class="col-sm-4">
		      <form class="form-signin" method="post">

			<h2 class="form-signin-heading"> <?php echo $LOCALE['SIGNIN'] ?> </h2>
			<div class="form-group">
				<label for="inputUser"> <?php echo $LOCALE['LOGIN'] ?> </label>
				<input type="user" name="inputUser" class="form-control" value="<?php if(isset($_COOKIE['NAME'])){ echo $_COOKIE['NAME']; }; ?>" required autofocus>
			</div>
			<div class="form-group">
				<label for="inputPassword"> <?php echo $LOCALE['PASSWORD'] ?> </label>
				<input type="password" name="inputPassword" class="form-control" required>
			</div>

			<div class="checkbox">
   				<label>
			     	<input type="checkbox" name="remember"> <?php echo $LOCALE['REMEMBER'] ?>
    				</label>
  			</div>
		
			<button class="btn btn-lg btn-primary" type="submit"> <?php echo $LOCALE['SEND'] ?> </button>

		      </form>
	  </div>
	</div>
    </div> <!-- /container -->
