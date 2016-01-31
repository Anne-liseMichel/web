<?php
	//Auths the client
	function userAuth($uname, $upass){
		$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
		$uhash = hash("sha256", $uname."Salt&Pepper".$upass);
		if(isset($SHADOW[$uhash])) {
			$_SESSION['AUTH']=1;
			$_SESSION['USER']=$uname;
			$_SESSION['LANG']=$SHADOW[$uhash]['lang'];
			$_SESSION['RIGHTS']=$SHADOW[$uhash]['rights'];
			$_SESSION['USERHASH']=$uhash;
		}
	}
	//Add/modify with name and pass, remove with name only
	function userAddRemove($uname, $upass, $urights){
		$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
		foreach($SHADOW as $k=>$v){
			if(isset($v['name']) && $v['name']==$uname){
			$modIndex=$k;
			break;
			}
		}

		if(isset($modIndex)){
			unset($SHADOW[$modIndex]);
		}

		if(isset($upass) && ctype_alnum($upass)){
			$newhash=hash("sha256", $uname."Salt&Pepper".$upass);
			$SHADOW[$newhash]['name']=$uname;
			$SHADOW[$newhash]['lang']='french';
			if($urights){
				$SHADOW[$newhash]['rights']='admin';
			} else {
				$SHADOW[$newhash]['rights']='user';
			}
		}

		file_put_contents('./data/users.json',json_encode($SHADOW));
	}
	//Swaps french for english and vice-versa
	function langSwitch(){
		if($_SESSION['LANG']=='french'){
			$_SESSION['LANG']='english';
		} else {
			$_SESSION['LANG']='french';
		}
		if($_SESSION['AUTH']==1){
			$SHADOW = json_decode(file_get_contents('./data/users.json'),true);

			if($_SESSION['LANG']=='french'){
				$ulang='english';
			} else {
				$ulang='french';	
			}
			$SHADOW[$_SESSION['USERHASH']]['lang']=$ulang;

			file_put_contents('./data/users.json',json_encode($SHADOW));
		}
	}
	//Adds tasks
	function addTask($user,$data,$date,$type,$COUNT){
		if($type=="todo"){
			$TODO = json_decode(file_get_contents('./data/todo.json'),true);	
			$TODO[$COUNT]['data']=$data;
			$TODO[$COUNT]['author']=$user;
			$TODO[$COUNT]['date']=$date;
			file_put_contents('./data/todo.json',json_encode($TODO));
		} else if($type=="wip"){
			$WIP = json_decode(file_get_contents('./data/wip.json'),true);
			$WIP[$COUNT]['data']=$data;
			$WIP[$COUNT]['author']=$user;
			$WIP[$COUNT]['date']=$date;
			file_put_contents('./data/wip.json',json_encode($WIP));
		} else if($type=="done"){
			$ENDED = json_decode(file_get_contents('./data/done.json'),true);
			$ENDED[$COUNT]['data']=$data;
			$ENDED[$COUNT]['author']=$user;
			$ENDED[$COUNT]['date']=$date;
			file_put_contents('./data/done.json',json_encode($ENDED));
		}
	}
	//Remove tasks
	function delTask($task,$type){
		$TASKS=json_decode(file_get_contents('./data/'.$type.'.json'),true);
		if(isset($TASKS[$task])){
			unset($TASKS[$task]);
		}
		file_put_contents('./data/'.$type.'.json',json_encode($TASKS));
	}
?>
