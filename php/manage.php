<?php

?>


    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ZZTasks</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
	<form class="navbar-form navbar-left" method="post">
		<button class="btn btn-default" name="return" type="submit"> <?php echo $LOCALE['BACK'] ?> </button>
	</form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
	<div class="row">
	  <div class="col-sm-4">
		      <form class="form-signin" method="post">

			<h2 class="form-signin-heading"> <?php echo $LOCALE['USERMOD'] ?> </h2>
			<div class="form-group">
				<label for="modUser"> <?php echo $LOCALE['LOGIN'] ?> </label>
				<input type="user" name="modUser" class="form-control" required autofocus>
			</div>
			<div class="form-group">
				<label for="modPassword"> <?php echo $LOCALE['PASSWORD'] ?> </label>
				<input type="password" name="modPassword" class="form-control" required>
			</div>

			<button class="btn btn-lg btn-primary" type="submit"> <?php echo $LOCALE['SEND'] ?> </button>

		      </form>
	  </div>
	</div>
    </div> <!-- /container -->
