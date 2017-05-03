<p><strong>Welcome to The Small Homeless Pluto Database!</strong></p>
<table style="height: 71px;" width="793">
<tbody>

<?php 
	session_start();
	
	require_once('sqlconnect.php');

	echo "Your access level is: " . $_SESSION["accesslevel"] . ".";
	
?>
 
<tr>
  <td><form action="Planets.php" method="post">
		<input type = "submit" value = "Planets & Moons" />
	  </form>
  </td>
  <td><input type = "submit" value = "Asteroids & Meteors" /> </td>
  <td><input type = "submit" value = "Stars" /></td>
</tr>
</tbody>
</table>