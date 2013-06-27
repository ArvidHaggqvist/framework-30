<?php

	/* This sample action changes a users email adress */

	include_once "../includes/connection.php";
	include_once "../includes/trait.crud.php";
	include_once "../classes/class.users.php";

	$user = new User($db);
	$user->changeEmail($_SESSION['UserID'], 'newemailadress@example.com'); // The second parameter could be a post value from a form or something similar