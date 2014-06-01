<!-- the page where the user can login --> 

<?php
	if(isset($_GET['submit'])): {
		if($_GET['name'] == "") {
			echo 'Please Enter Name';
			echo '<br><a href="index.php?a=login">Back</a>';
			return;
		}
		if($_GET['password'] == "") {
			echo 'Please Enter Password';
			echo '<br><a href="index.php?a=login">Back</a>';
			return;
		}

		$name = $_GET['name'];
		$password = $_GET['password'];

		$qstring = "SELECT name, password, id FROM users WHERE name='$name'"; 
		$qresult = mysqli_query($db, $qstring);
		$row = mysqli_fetch_object($qresult);
		if($row->password != $password){
			echo "Wrong Password.";
			echo 'Click <a href="index.php?a=login">here</a> to log in again.';
			return;
		} 
		$_SESSION["username"] = $name;
		$_SESSION["logged_in"] = 1;
		$_SESSION["userid"] = $row->id;
		include("overview.php");
	}
	else: ?> 
		<form action="index.php" method="get"> <!-- later: post instead of get because now you can see the password and stuff-->
		<input name=a type=hidden value=login>
		<p>Name:<br><input name="name"></p>
		<p>Password:<br><input name="password" type=password></p>
		<input name="submit" type=submit value="SUBMIT">
		</form>

<?php endif; ?>