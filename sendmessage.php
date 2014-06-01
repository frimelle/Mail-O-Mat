<?php

if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == 0) {
	echo "No Access";
	exit();
}
if(isset($_GET['send_submit']) && $_GET['send_submit']): {
	if($_GET['recname'] == "") {
		echo 'Please Enter Receiver Name';
		echo '<br><a href="index.php?a=overview">Back</a>';
		return;
	}
	if($_GET['message'] == "") {
		echo 'Please Enter Your Message';
		echo '<br><a href="index.php?a=overview">Back</a>';
		return;
	}
	$recname = $_GET['recname'];
	$message = $_GET['message'];
	$userid = $_SESSION['userid'];

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
	<form action="index.php" method="get" id="usrform"> <!-- later: post instead of get because now you can see the password and stuff-->
		<input name=a type=hidden value=sendmessage>
		<p>To:<br><input name="recname"></p>
		<br>
		<p>Message:<br><input name="message"></p>
		<input name="send_submit" type=submit value="SUBMIT">
	</form>
	<!-- <textarea name="message" form="usrform">Enter text here...</textarea> -->

<?php endif; ?>