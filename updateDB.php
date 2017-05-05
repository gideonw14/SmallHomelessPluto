<html>
<?php
	session_start();
	require_once('sqlconnect.php');
	
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
	
	$query = 'UPDATE `celestial body` SET ';
	if ($gravity != "") $query .= '`Gravity` = "' . $gravity . '" ';
	if ($mass != "") $query .= ', `Mass` = "' . $mass . '" ';
	if ($diameter != "") $query .= ', `Diameter` = "' . $gravity . '" ';
	if ($discovered != "") $query .= ', `Date Discovered` = "' . $discovered . '" ';
	$query .= 'WHERE `Name` = "' . $name . '"';
	$response = @mysqli_query($dbc, $query);
	
	if ($type == "Star") {
		$query = 'UPDATE `star` SET ';
		if ($surface_temp != "") $query .= '`Surface Temp` = "' . $surface_temp . '" ';
		$query .= 'WHERE `SName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Planet") {
		$query = 'UPDATE `planet` SET ';
		if ($isdwarf != "") $query .= '`Dwarf Planet` = "' . $isdwarf . '" ';
		if ($population != "") $query .= ', `Population` = "' . $population . '" ';
		if ($distance != "") $query .= ', `Orbit Distance` = "' . $distance . '" ';
		if ($year != "") $query .= ', `Year Length` = "' . $year . '"';
		if ($p_surf_temp != "") $query .= ', `Average Surface Temperature` = "' . $p_surf_temp . '" ';
		$query .= 'WHERE `PName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Moon") {
		$query = 'UPDATE `moon` SET ';
		if ($mdistance != "") $query .= '`Orbit Distance` = "' . $mdistance . '" ';
		if ($mOrbitTime != "") $query .= ', `Orbit Timee` = "' . $mOrbitTime . '" ';
		$query .= 'WHERE `MName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Asteroid") {
		$query = 'UPDATE `asteroid` SET ';
		if ($ABmemeber != "") $query .= '`Member of AB` = "' . $ABmemeber . '" ';
		if ($asteroid_num != "") $query .= ', `Asteroid Number` = "' . $asteroid_num . '" ';
		$query .= 'WHERE `AName` = "' . $name . '"';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Meteor") {
		$query = 'UPDATE `meteor` SET ';
		if ($mDate != "") $query .= '`Date` = "' . $mDate . '" ';
		if ($struck != "") $query .= ', `Struck Surface` = "' . $struck . '" ';
		$query .= 'WHERE `MeteorName` = "' . $name . '" ';
		$response = @mysqli_query($dbc, $query);
	}
	
	$_SESSION['utype_select'] = "";
	header("refresh:0;MainPage.php");
?>
</html>