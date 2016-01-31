<?php
	include_once('./php/functions.php');

	Class ZZTest extends PHPUnit_Framework_TestCase
	{
		// Makes sure the tests work
		public function testTest(){
			$this->assertTrue(true);
		}

		public function unauthorizedLogin(){
			userAuth("toto","tata");
			$this->assertFalse($_SESSION['AUTH']==1);
		}

		public function authorizedLogin(){
			userAuth("david","david");
			$this->assertTrue($_SESSION['AUTH']==1);
		}

		public function addNdelUser(){
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
