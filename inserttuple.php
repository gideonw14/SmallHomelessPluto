<?php
session_start();
require_once('sqlconnect.php');

// This block is getting all of the user input from form fields.
$type = $_SESSION['type_select'];
$name = $_GET['name'];
$gravity = $_GET['gravity'];
$mass = $_GET['mass'];
$diameter = $_GET['diameter'];
$dateDiscovered = $_GET['dateDiscovered'];
$bad = "0";

// We will get different data based on what 
// entity we are creating.
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
	$morbits = $_GET['morbits'];
	
	if ($orbit_dist == "" || $orbit_time == "" || $morbits == "") {
		$bad = "1";
	}
} 

if ($type == "Asteroid") {
	$member_AB = $_GET['belt'];
	$aster_num = $_GET['asteroid_number'];
	$aorbits = $_GET['orbits'];
	
	if ($member_AB == "" || $aster_num == "" || $aorbits == "") {
		$bad = "1";
	}
}

if ($type == "Meteor") {
	$date = $_GET['meteor_date'];
	$planet = $_GET['planet'];
	$struck = $_GET['struck'];
	$aster_num = $_GET['asteroid_number'];
	$aorbits = $_GET['orbits'];
	if ($date == "" || $planet == "" || $struck == "") {
		$bad = "1";
	}
}

// Error message if "not null" values are empty
if ($type == "" || $name == "" || $mass == "" || $diameter == "" || $dateDiscovered == "" || $bad == "1") {
	echo '<font size="+2" color="red">Required field not filled in.<br />
			Please be sure to fill in all fields before pressing insert.</font>
			<br /><br />
			<a href="create.php">Return</a>';
} else { // Writing the queries to insert
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
	
	if ($type == "Star") {
		$query = 'INSERT INTO `star` VALUES ("' . $name . '", "' . $starTemp . '")';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Moon") {
		$query = "SELECT Max(`Moon Number`) AS mymax FROM moon";
		$res = @mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($res);
		$moonNum = $row['mymax'] + 1;
		
		$query = 'INSERT INTO `moon` VALUES ("' . $name . '", "' . $morbits . '", "' . $moonNum . '", "' . $orbit_dist . '", "' . $orbit_time . '")';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Asteroid") {
		$query = 'INSERT INTO `asteroid` VALUES ("' . $name . '", "' . $aorbits . '", "' . $member_AB . '", "' . $aster_num . '")';
		$response = @mysqli_query($dbc, $query);
	}
	
	if ($type == "Meteor") {
		$query = 'INSERT INTO `asteroid` VALUES ("' . $name . '", "' . $aorbits . '", "' . 0 . '", "' . $aster_num . '")';
		$response = @mysqli_query($dbc, $query);
		
		$query = 'INSERT INTO `meteor` VALUES ("' . $name . '", "' . $planet . '", "' . $date . '", "' . $struck . '")';
		$response = @mysqli_query($dbc, $query);
	}
	header("refresh:0;MainPage.php");
}
?>