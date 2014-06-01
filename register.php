<?php	
	if(isset($_GET['submit'])): {
		if($_GET['name'] == "") {
			echo 'Please Enter Name';
			echo '<br><a href="index.php?a=register">Back</a>';
			return;
		}
		if($_GET['email'] == "") {
			echo 'Please Enter E-Mail';
			echo '<br><a href="index.php?a=register">Back</a>';
			return;
		}
		if($_GET['password'] == "") {
			echo 'Please Enter Password';
			echo '<br><a href="index.php?a=register">Back</a>';
			return;
		}

		$name = $_GET['name'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$db = mysqli_connect("localhost","root","","mailomat");

		if (!$db) {
			echo mysqli_connect_error();
			return;
		}

		$qstring = "INSERT INTO users (name, email, password ) VALUES ('$name', '$email', '$password')";
 		mysqli_query($db, $qstring);
		
		echo 'Your request has been sent<br>';
		echo 'Click <a href="index.php?a=login">here</a> to log in.';
	}
	else: ?> 
		<form action="index.php" method="get"> <!-- later: post instead of get because now you can see the password and stuff-->
		<input name=a type=hidden value=register>
		<p>Name:<br><input name="name"></p>
		<p>E-Mail:<br><input name="email"></p>
		<p>Password:<br><input name="password" type=password></p>
		<input name="submit" type=submit value="SUBMIT">
		</form>

<?php endif; ?>