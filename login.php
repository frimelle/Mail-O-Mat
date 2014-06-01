<!-- the page where the user can login --> 

<?php
	if(isset($_POST['submit'])): {
		if($_POST['name'] == "") {
			echo 'Please Enter Name';
			echo '<br><a href="index.php?a=login">Back</a>';
			return;
		}
		
		if($_POST['password'] == "") {
			echo 'Please Enter Password';
			echo '<br><a href="index.php?a=login">Back</a>';
			return;
		}

		$name = $_POST['name'];
		$password = $_POST['password'];

		$name = sanitize_input($name);

		$qstring = "SELECT name, password, id FROM users WHERE name='$name'"; 
		$qresult = mysqli_query($db, $qstring);
		$row = mysqli_fetch_object($qresult);
		
		if($row->password != hash("sha512", $password)){
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
		<form action="index.php?a=login" method="post">
		<p>Name:<br><input name="name"></p>
		<p>Password:<br><input name="password" type=password></p>
		<input name="submit" type=submit value="SUBMIT">
		</form>

<?php endif; ?>