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
	}
?>
