<?php
	include_once('./php/functions.php');

	class ZZTest extends PHPUnit_Framework_TestCase
	{
		// Makes sure the tests work
		public function testUnauthorizedLogin(){
			userAuth("toto","tata");
			$this->assertFalse($_SESSION['AUTH']==1);
		}

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
