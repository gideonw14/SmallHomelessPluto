<html>

<?php 
	session_start();
	require_once('sqlconnect.php');
?>

<table width="900" border="1">
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

<td colspan="4">
&nbsp;
Star:
<?php
	$query = "SELECT SName FROM star";
	$response = @mysqli_query($dbc, $query);
	echo "<select name=\"StarSelect\">";
	while ($row = mysqli_fetch_array($response)) {
		echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
	}
	
?>

</td>
</tr>
</tbody>
</table>
</html>