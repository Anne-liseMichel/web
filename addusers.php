<?php

	$users = array (
		hash("sha256","davidSalt&Pepperdavid") => "french-admin"
	);
	file_put_contents("./data/users.json",json_encode($users));

?>
