<html>
<?php
	session_start();
	require_once('sqlconnect.php');
	
	// This block here is collecting all of the user input from
	// the form fields.
	$type = $_SESSION['utype_select'];
	$name = $_GET['more_select'];
	$mass = $_GET['mass'];
	$gravity = $_GET['gravity'];
	$diameter = $_GET['diameter'];
	$discovered = $_GET['date_discovered'];
	$surface_temp = $_GET['surface_temp'];
	$isdwarf = $_GET['dwarf'];
	$distance = $_GET['distance'];
	$year = $_GET['year'];
	$population = $_GET['population'];
	$p_surf_temp = $_GET['avg_surf_temp'];
	$mdistance = $_GET['moon_distance'];
	$mOrbitTime = $_GET['moon_orbit_time'];
	$ABmemeber = $_GET['asteroid_belt'];
	$asteroid_num = $_GET['asteroid_num'];
	$struck = $_GET['struck_surface'];
	$mDate = $_GET['meteor_date'];
	
	// These are the attributes common to all entities
	$query = 'UPDATE `celestial body` SET   ';
	if ($gravity != "") $query .= '`Gravity` = "' . $gravity . '", ';
	if ($mass != "") $query .= '`Mass` = "' . $mass . '", ';
	if ($diameter != "") $query .= '`Diameter` = "' . $diameter . '", ';
	if ($discovered != "") $query .= '`Date Discovered` = "' . $discovered . '", ';
	$query = substr($query, 0, strlen($query) - 2);
	$query .= 'WHERE `Name` = "' . $name . '"';
	$response = @mysqli_query($dbc, $query);
	
	// Thes are the type specific attributes set here
	if ($type == "Star") {
		$query = 'UPDATE `star` SET ';
		if ($surface_temp != "") $query .= '`Surface Temp` = "' . $surface_temp . '" ';
		$query .= 'WHERE `SName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Planet") {
		$query = 'UPDATE `planet` SET ';
		if ($isdwarf != "") $query .= '`Dwarf Planet` = "' . $isdwarf . '", ';
		if ($population != "") $query .= '`Population` = "' . $population . '", ';
		if ($distance != "") $query .= '`Orbit Distance` = "' . $distance . '", ';
		if ($year != "") $query .= '`Year Length` = "' . $year . '", ';
		if ($p_surf_temp != "") $query .= '`Average Surface Temp` = "' . $p_surf_temp . '", ';
		$query = substr($query, 0, strlen($query) - 2);
		$query .= ' WHERE `PName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Moon") {
		$query = 'UPDATE `moon` SET ';
		if ($mdistance != "") $query .= '`Orbit Distance` = "' . $mdistance . '", ';
		if ($mOrbitTime != "") $query .= '`Orbit Time` = "' . $mOrbitTime . '", ';
		$query = substr($query, 0, strlen($query) - 2);
		$query .= ' WHERE `MName` = "' . $name . '"';
		echo $query;
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Asteroid") {
		$query = 'UPDATE `asteroid` SET ';
		if ($ABmemeber != "") $query .= '`Member of AB` = "' . $ABmemeber . '", ';
		if ($asteroid_num != "") $query .= '`Asteroid Number` = "' . $asteroid_num . '", ';
		$query = substr($query, 0, strlen($query) - 2);
		$query .= ' WHERE `AName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Meteor") {
		$query = 'UPDATE `meteor` SET ';
		if ($mDate != "") $query .= '`Date` = "' . $mDate . '", ';
		if ($struck != "") $query .= '`Struck Surface` = "' . $struck . '", ';
		$query = substr($query, 0, strlen($query) - 2);
		$query .= ' WHERE `MeteorName` = "' . $name . '" ';
		$response = @mysqli_query($dbc, $query);
	}
	
	$_SESSION['utype_select'] = "";
	header("refresh:0;MainPage.php");
?>
</html>