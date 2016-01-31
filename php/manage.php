<?php
?>


    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">ZZTasks</a>
        </div>
        <div id="navbar" class="nav navbar-nav">
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
				<input type="password" name="modPassword" class="form-control">
			</div>

			<div class="checkbox">
				<label>
				<input type="checkbox" name="modAdmin">
				Admin ?
				</label>
			</div>

			<button class="btn btn-lg btn-primary" type="submit"> <?php echo $LOCALE['SEND'] ?> </button>

		      </form>

	  </div>
	  <div class="col-sm-4">
		<table class="table table-striped">
			<tr> <th>U</th> <th>R</th> </tr>
			<?php
				$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
				foreach($SHADOW as $k=>$v){
					echo '<tr> <td>'.$v['name'].'</td><td>'.$v['rights'].'</td></tr>';
				}
			?>
		</table>
	  </div>
	</div>
    </div> <!-- /container -->
