<?php
session_start();


$_SESSION['star_select'] = $_GET['star_select'];
$_SESSION['planet_select'] = $_GET['planet_select'];
$_SESSION['moon_select'] = $_GET['moon_select'];
$_SESSION['asteroid_select'] = $_GET['asteroid_select'];
$_SESSION['meteor_select'] = $_GET['meteor_select'];

if ($_SESSION['star_select'] == "") {
	$_SESSION['planet_select'] = "";
	$_SESSION['moon_select'] = "";
	$_SESSION['asteroid_select'] = "";
	$_SESSION['meteor_select'] = "";
}

header("refresh:0;MainPage.php");
?>