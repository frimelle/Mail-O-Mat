<?php

if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == 0) {
	echo "No Access";
	exit();
}
if(isset($_POST['send_submit']) && $_POST['send_submit']): {
	if($_POST['recname'] == "") {
		echo 'Please Enter Receiver Name';
		echo '<br><a href="index.php?a=overview">Back</a>';
		return;
	}
	if($_POST['message'] == "") {
		echo 'Please Enter Your Message';
		echo '<br><a href="index.php?a=overview">Back</a>';
		return;
	}
	$userid = $_SESSION['userid'];

	$recname = $_POST['recname'];
	$message = $_POST['message'];

	$recname = sanitize_input($recname);
	$message = sanitize_input($message);

	$qstring2 = "SELECT id FROM users WHERE name='$recname'";
	$result = mysqli_query($db, $qstring2);
	$row = mysqli_fetch_object($result);
	$recvid = $row->id;
	$qstring = "INSERT INTO message (recid, sendid, text) VALUES ('$recvid', '$userid', '$message')";
 		mysqli_query($db, $qstring);
		
		echo 'Your message has been sent.<br>';
		echo 'Click <a href="index.php?a=overview">here</a> to go to Overview.';
} 
else: ?>
	<form action="index.php" method="post">
		<input name=a type=hidden value=sendmessage>
		<p>To:<br><input name="recname"></p>
		<br>
		<p>Message:<br><textarea name="message" rows="20" cols="50" onfocus="if(this.value=='Enter message here...') this.value='';">Enter message here...</textarea></p>
		<input name="send_submit" type=submit value="SUBMIT">
	</form>

<?php endif; ?>
