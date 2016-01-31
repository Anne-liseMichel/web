<?php
	include_once('./php/functions.php');

	class ZZTest extends PHPUnit_Framework_TestCase
	{
		//Emulates a session
		public function setup(){
			global $_SESSION;
			$_SESSION['LANG']='french';
			$_SESSION['AUTH']=0;
		}
		// Tests unauth login
		public function testUnauthorizedLogin(){
			userAuth("toto","tata");
			$this->assertFalse($_SESSION['AUTH']==1);
		}
		//Tests auth login
		public function testAuthorizedLogin(){
			userAuth("david","david");
			$this->assertTrue($_SESSION['AUTH']==1);
		}

		public function testAddDelUser(){
			userAddRemove("toto","tata",true);
			$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
			$newhash=hash("sha256","totoSalt&Peppertata");
			$this->assertTrue(isset($SHADOW[$newhash]));
			userAddRemove("toto",null,null);
			$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
			$this->assertFalse(isset($SHADOW[$newhash]));
		}

		public function testLangSwitch(){
			if($_SESSION['LANG']=='french'){
				langSwitch();
				$this->assertEquals('english',$_SESSION['LANG']);
			} else {
				langSwitch();
				$this->assertEquals('french',$_SESSION['LANG']);
			}
			
		}

		public function testAddDelTask(){
			$COUNT = intval(file_get_contents('./data/count'));
			$COUNT++;
			addTask("polo","marco","2016-01-01","wip",$COUNT);
			$WIP = json_decode(file_get_contents('./data/wip.json'),true);
			$this->assertEquals('marco',$WIP[$COUNT]['data']);
			delTask($COUNT,"wip");
			$WIP = json_decode(file_get_contents('./data/wip.json'),true);
			$this->assertFalse(isset($WIP[$COUNT]));
		}
	}
?>
