<?php
session_start();
require_once('sqlconnect.php');

$type = $_SESSION['dtype_select'];
$name = $_GET['deletion_select'];

if ($name == "") {
	echo 'Deletion failed: Please select an element to delete';
	header("refresh:4;delete.php");
}

$query = 'DELETE FROM `celestial body` WHERE `NAME` = "' . $name . '"';
$response = @mysqli_query($dbc, $query);

if ($response) {
	echo 'Successfully deleted ' . $name . '.';
}

header("refresh:2;delete.php");
?>