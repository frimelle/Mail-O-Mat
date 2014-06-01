<table width=100%>
	<tr>
		<tr>
			<?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == 1) {
				echo '<a href="index.php?a=logout"> log out </a>';
			}
			?>
		</tr>
		<td>
		<?php 
			include("showmessage.php");
		?>
		</td>
		<td valign="top">
			<?php 
				include("sendmessage.php");
			?>
		</td>
	</tr>
</table>