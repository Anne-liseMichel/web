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
		<button class="btn btn-default" name="otherLang" type="submit"> <?php echo $LOCALE['LANG'] ?> </button>
	</form>
        </div>
      </div>
    </nav>

    <div class="container">

      <form class="form-signin" method="post">

        <h2 class="form-signin-heading"> <?php echo $LOCALE['SIGNIN'] ?> </h2>

        <label for="inputUser"> <?php echo $LOCALE['LOGIN'] ?> </label>
        <input type="user" name="inputUser" class="form-control" required autofocus>

        <label for="inputPassword"> <?php echo $LOCALE['PASSWORD'] ?> </label>
        <input type="password" name="inputPassword" class="form-control" required>
		
        <button class="btn btn-lg btn-primary" type="submit"> <?php echo $LOCALE['SEND'] ?> </button>
      </form>

    </div> <!-- /container -->
