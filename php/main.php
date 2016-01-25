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
		<button class="btn btn-default" name="addTask" type="submit"> <?php echo($LOCALE['ADD']) ?> </button>
		<button class="btn btn-default" name="disconnect" type="submit"> <?php echo ($LOCALE['DISCONNECT']) ?> </button>
		<button class="btn btn-default" name="otherLang" type="submit"> <?php echo $LOCALE['LANG'] ?> </button>
		<?php if(isset($_SESSION['RIGHTS']) && $_SESSION['RIGHTS']=='admin'){ echo '<button class="btn btn-default" name="manage" type="submit">'.$LOCALE['MANAGE'].'</button>';}; ?>
	</form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">

      <div class="starter-template">
        <h1>ZZTasks : The legacy version</h1>
        <h2>This is the test version, please be nice</h2>
      </div>
    <div class="row">
	  <div class="col-md-4">
		<table class="table table-striped">
		<th> <?php echo $LOCALE['TODO'] ?> </th>

		<?php

		?>

		</table>
	  </div>
	  <div class="col-md-4">
		<table class="table table-striped">
		<th> <?php echo $LOCALE['WIP'] ?> </th>

		<?php

		?>

		</table>
	  </div>
	  <div class="col-md-4">
		<table class="table table-striped">
		<th> <?php echo $LOCALE['DONE'] ?> </th>

		<?php

		?>

		</table>
	  </div>
    </div>

    </div><!-- /.container -->
