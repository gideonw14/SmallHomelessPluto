<?php
session_start();
require_once('sqlconnect.php');

$type = $_SESSION['type_select'];
$name = $_GET['name'];
$gravity = $_GET['gravity'];
$mass = $_GET['mass'];
$diameter = $_GET['diameter'];
$dateDiscovered = $_GET['dateDiscovered'];
$bad = "0";

if ($type == "Star") {
	$starTemp = $_GET['star_temp'];
	
	if ($starTemp == "") {
		$bad = "1";
	}
}

if ($type == "Planet") {
	$isdwarf = $_GET['dwarf'];
	$population = $_GET['population'];
	$orbit_dist = $_GET['orbit_dist'];
	$year_len = $_GET['year_length'];
	$surf_temp = $_GET['surf_temp'];
	$orbits = $_GET['orbits'];
	
	if ($isdwarf == "" || $population == "" || $orbit_dist == "" || $year_len == "" || $surf_temp == "" || $orbits == "") {
		$bad = "1";
	}
} 

if ($type == "Moon") {
	$orbit_dist = $_GET['orbit_dist'];
	$orbit_time = $_GET['year_length'];
	$orbits = $_GET['orbits'];
	
	if ($orbit_dist == "" || $orbit_time == "" || $orbits == "") {
		$bad = "1";
	}
} 

if ($type == "Asteroid") {
	$member_AB = $_GET['belt'];
	$aster_num = $_GET['asteroid_number'];
	$orbits = $_GET['orbits'];
	
	if ($member_AB == "" || $aster_num == "" || $orbits == "") {
		$bad = "1";
	}
}

if ($type == "Meteor") {
	$date = $_GET['meteor_date'];
	$planet = $_GET['planet'];
	$struck = $_GET['struck'];
	
	if ($date == "" || $planet == "" || $struck = "") {
		$bad = "1";
	}
}

if ($type == "" || $name == "" || $mass == "" || $diameter == "" || $dateDiscovered == "" || $bad == "1") {
	echo '<font size="+2" color="red">Required feild not filled in.<br />
			Please be sure to fill in all feilds before pressing insert.</font>
			<br /><br />
			<a href="create.php">Return</a>';
} else {
	$table = strtolower($type);
	$query = 'INSERT INTO `celestial body` VALUES("' . $name . '", "' . $gravity . '", "' . $mass . '", "' . $diameter . '", "' . $dateDiscovered . '")';
	$response = @mysqli_query($dbc, $query);
	
	if ($type == "Planet") {
		$query = "SELECT Max(`Planet Number`) AS mymax FROM planet";
		$res = @mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($res);
		$planetNum = $row['mymax'] + 1;
		
		$query = 'INSERT INTO `planet` VALUES ("' . $name . '","' . $isdwarf . '","' . $planetNum . '","' . $population . '","' . $orbit_dist . '","' . $year_len . '","' . $surf_temp . '", "' . $orbits . '")';
		$response = @mysqli_query($dbc, $query);
	}
	
	//header("refresh:0;create.php");
}
?>