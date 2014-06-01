<!-- first page, that will be opened, where the user can decide between login and register --> 
<?php
	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1): {
		echo "Hallo " . $_SESSION["username"];
		echo '<br>';
		include("overview.php");
	} else: ?>
		<head> "THIS IS THE EPIC MAIL-O-MAT!" </head>
		<br>
		<br>
		<a href="index.php?a=login">LOGIN!</a>
		<br>
		<br>
		<a href="index.php?a=register">REGISTER!</a>
	<?php endif; ?>