<?php
session_start();
require_once('sqlconnect.php');

$type = $_SESSION['dtype_select'];
$name = $_GET['deletion_select'];

if ($name == "") {
	echo 'Deletion failed: Please select an element to delete';
	header("refresh:4;delete.php");
}

$type = strtolower($type);

if ($type == 'star') {
	$query = 'DELETE FROM `star` WHERE `SName` = "' . $name . '"';
} else if ($type == 'planet') {
	$query = 'DELETE FROM `' . $type . '` WHERE `PName` = "' . $name . '"';
} else if ($type == 'moon') {
	$query = 'DELETE FROM `' . $type . '` WHERE `MName` = "' . $name . '"';
} else if ($type == 'asteroid') {
	$query = 'DELETE FROM `' . $type . '` WHERE `AName` = "' . $name . '"';
} else if ($type == 'meteor') {
	$query = 'DELETE FROM `asteroid` WHERE `AName` = "' . $name . '"';
}
$response = @mysqli_query($dbc, $query);

$query = 'DELETE FROM `celestial body` WHERE `Name` = "' . $name . '"';
$response = @mysqli_query($dbc, $query);

if ($response) {
	echo 'Successfully deleted ' . $name . '.';
} else {
	echo 'There was a problem with the deletion.';
}

header("refresh:2;delete.php");
?>