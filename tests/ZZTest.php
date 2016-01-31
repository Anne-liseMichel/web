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
			userAddRemove("toto","tata");
			$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
			$newhash=hash("sha256","totoSalt&Peppertata");
			$this->assertTrue(isset($SHADOW[$newhash]));
			userAddRemove("toto");
			$SHADOW = json_decode(file_get_contents('./data/users.json'),true);
			$this->assertFalse(isset($SHADOW[$newhash]));
		}
	}
?>
