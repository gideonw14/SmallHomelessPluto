<html>

<?php 
	session_start();
	require_once('sqlconnect.php');
?>

<table width="1000" border="1">
<tbody>
<tr>
<td><b><span style="font-size:large;"> Solar System Database</span></b></td>
<td align="right">


<?php
	echo "You are logged in as " . $_SESSION['user'] . " and you have " . $_SESSION['accesslevel']
			. " level access.";
			
?>
<td align="center"><form action="logout.php"><input type="submit" value="Log Out" /></form></td>

</td>
</tr>
<tr>
<td width="20%">
<p>&nbsp;Planets &amp; Moons</p>
<p>Asteroids &amp; Meteors</p>
<p>Stars</p>
</td>
<td colspan="4">&nbsp;</td>
</tr>
</tbody>
</table>
</html>