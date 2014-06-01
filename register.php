<?php	
	if(isset($_POST['submit'])): {
		if($_POST['name'] == "") {
			echo 'Please Enter Name';
			echo '<br><a href="index.php?a=register">Back</a>';
			return;
		}
		if($_POST['email'] == "") {
			echo 'Please Enter E-Mail';
			echo '<br><a href="index.php?a=register">Back</a>';
			return;
		}
		if($_POST['password'] == "") {
			echo 'Please Enter Password';
			echo '<br><a href="index.php?a=register">Back</a>';
			return;
		}

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = hash("sha512", $_POST['password']);

		//sanitize input
		$name = sanitize_input($name);
		$email = sanitize_input($email);
		
		$qstring = "INSERT INTO users (name, email, password ) VALUES ('$name', '$email', '$password')";
 		mysqli_query($db, $qstring);
		
		echo 'Your request has been sent<br>';
		echo 'Click <a href="index.php?a=login">here</a> to log in.';
	}
	else: ?> 
		<form action="index.php?a=register" method="post"> 
		<p>Name:<br><input name="name"></p>
		<p>E-Mail:<br><input name="email"></p>
		<p>Password:<br><input name="password" type=password></p>
		<input name="submit" type=submit value="SUBMIT">
		</form>

<?php endif; ?>