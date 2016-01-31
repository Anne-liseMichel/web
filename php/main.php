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
		<div class="table-responsive">
		<table class="table table-striped">
		<tr>
		<th> <?php echo $LOCALE['TODO'] ?> </th>
		</tr>

		<?php
			foreach($TODO as $k=>$v){
				echo '<tr><td>'.$k.'</td><td>'.$v['data'].'</td> <td>';
				if($_SESSION['USER']==$v['author'] || isset($_SESSION['RIGHTS']) && $_SESSION['RIGHTS']=='admin'){
					echo
					'<form method="post">
					<button class="btn btn-default" name="deltodo['.$k.']" type="submit">'.$LOCALE['DELETE'].'</button>
					</form>';
				};
				echo '</td> </tr>';
			}

		?>

		</table>
	  </div>
	  </div>
	  <div class="col-md-4">
		<div class="table-responsive">
		<table class="table table-striped">
		<tr>
		<th> <?php echo $LOCALE['WIP'] ?> </th>
		</tr>
		<?php
			foreach($WIP as $k=>$v){
				echo '<tr><td>'.$k.'</td><td>'.$v['data'].'</td> <td>';
				if($_SESSION['USER']==$v['author'] || isset($_SESSION['RIGHTS']) && $_SESSION['RIGHTS']=='admin'){
					echo
					'<form method="post">
					<button class="btn btn-default" name="delwip['.$k.']" type="submit">'.$LOCALE['DELETE'].'</button>
					</form>';
				};
				echo '</td> </tr>';
			}

		?>

		</table>
	  </div>
	  </div>
	  <div class="col-md-4">
		<div class="table-responsive">
		<table class="table table-striped">
		<tr>
		<th> <?php echo $LOCALE['DONE'] ?> </th>
		</tr>
		<?php
			foreach($ENDED as $k=>$v){
				echo '<tr><td>'.$k.'</td><td>'.$v['data'].'</td> <td>';
				if($_SESSION['USER']==$v['author'] || isset($_SESSION['RIGHTS']) && $_SESSION['RIGHTS']=='admin'){
					echo
					'<form method="post">
				a	<button class="btn btn-default" name="delended['.$k.']" type="submit">'.$LOCALE['DELETE'].'</button>
					</form>';
				};
				echo '</td> </tr>';
			}

		?>

		</table>
	  </div>
	  </div>
    </div>

    </div><!-- /.container -->
