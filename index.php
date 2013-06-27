<?php include_once "includes/connection.php";  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Index title</title>
</head>
<body>

	<?php
	    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])):

	?>
		<!-- USER IS LOGGED IN -->

		<p>Welcome <?php echo $_SESSION['Username'] ?></p>

		<a href="actions/logout.php">Log out</a>

	<?php
		else:
	?>

	<!-- WHEN THE USER IS NOT CURRENTLY LOGGED IN -->

	<a href="pages/signin.php">Sign in</a>
	<a href="pages/signup.php">Sign up</a>


	<?php
		endif;
	?>

	
</body>
</html>