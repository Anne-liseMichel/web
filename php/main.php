<?php

?>

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">ZZTasks</a>
        </div>
        <div id="navbar" class="nav navbar-nav">
	<form class="navbar-form navbar-left" method="post">
		<button class="btn btn-default" name="disconnect" type="submit"> <?php echo ($LOCALE['DISCONNECT']) ?> </button>
		<button class="btn btn-default" name="otherLang" type="submit"> <?php echo $LOCALE['LANG'] ?> </button>
		<button class="btn btn-default" name="refresh" type="submit"> <?php echo $LOCALE['REFRESH'] ?> </button>
		<?php if(isset($_SESSION['RIGHTS']) && $_SESSION['RIGHTS']=='admin'){ echo '<button class="btn btn-default" name="manage" type="submit">'.$LOCALE['MANAGE'].'</button>';}; ?>
	</form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">

      <div class="starter-template">
      </div>
    <div class="row">
	  <div class="col-md-3">
		<div class="table-responsive">
		<table class="table table-striped">
		<tr>
		<th> <?php echo $LOCALE['TODO'] ?> </th>
		</tr>

		<?php
			foreach($TODO as $k=>$v){
				echo '<tr><td>'.$k.'</td><td>'.$v['data'].'</td><td>'.$v['author'].'</td><td>'.$v['date'].'</td> <td>';
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
	  <div class="col-md-3">
		<div class="table-responsive">
		<table class="table table-striped">
		<tr>
		<th> <?php echo $LOCALE['WIP'] ?> </th>
		</tr>
		<?php
			foreach($WIP as $k=>$v){
				echo '<tr><td>'.$k.'</td><td>'.$v['data'].'</td><td>'.$v['author'].'</td><td>'.$v['date'].'</td> <td>';
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
	  <div class="col-md-3">
		<div class="table-responsive">
		<table class="table table-striped">
		<tr>
		<th> <?php echo $LOCALE['DONE'] ?> </th>
		</tr>
		<?php
			foreach($ENDED as $k=>$v){
				echo '<tr><td>'.$k.'</td><td>'.$v['data'].'</td><td>'.$v['author'].'</td><td>'.$v['date'].'</td> <td>';
				if($_SESSION['USER']==$v['author'] || isset($_SESSION['RIGHTS']) && $_SESSION['RIGHTS']=='admin'){
					echo
					'<form method="post">
					<button class="btn btn-default" name="delended['.$k.']" type="submit">'.$LOCALE['DELETE'].'</button>
					</form>';
				};
				echo '</td> </tr>';
			}

		?>

		</table>
	  </div>
	  </div>
	  <div class="col-md-3">
		<h3> <?php echo $LOCALE['ADD'] ?> </h3>
		<form method="post">
			<div class="form-group">
				<textarea name="taskdata" class="form-control" rows="3" required></textarea>
			</div>
			<div class="form-group">
				<input name="taskdate" type="date" required></input>
			</div>
			<div class="form-group">
				<label class="radio-inline">
				<input type="radio" name="taskType" value="todo" checked> <?php echo $LOCALE['TODO'] ?>
				</label>
				<label class="radio-inline">
				<input type="radio" name="taskType" value="wip"> <?php echo $LOCALE['WIP'] ?>
				</label>
				<label class="radio-inline">
				<input type="radio" name="taskType" value="done"> <?php echo $LOCALE['DONE'] ?>
				</label>
			</div>
			<div class="form-group">
				<button class="btn btn-default" name="newTask" type="submit"> <?php echo $LOCALE['SEND'] ?> </button>
			</div>
		</form>
	  </div>
    </div>

    </div><!-- /.container -->
