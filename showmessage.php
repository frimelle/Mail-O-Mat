<?php 
	if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] == 0) {
		echo "No Access";
		exit();
	}
	$userid = $_SESSION['userid'];
	$qstring = "SELECT recid, text, sendid, sendtime, name FROM  message, users WHERE recid='$userid' AND users.id = message.sendid OR sendid='$userid' AND users.id = message.sendid"; 
	$qresult = mysqli_query($db, $qstring);
	echo '<table border=2>';
	echo '<tr>';
		echo "<th> name </th>";
		echo "<th> message </th>";
		echo "<th> date </th>";
	while ($row = mysqli_fetch_object($qresult)) {
		echo '<tr>';
			echo "<th> $row->name </th>";
			echo "<th> $row->text </th>";
			echo "<th> $row->sendtime </th>"; 
		echo'</tr>';
	}
	echo '</table>';

?>
