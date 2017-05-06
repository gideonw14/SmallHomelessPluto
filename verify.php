<?php
session_abort();
session_start();


DEFINE ('DB_USER', $_GET['username']);
DEFINE ('DB_PASSWORD', $_GET['password']);
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'solarsystem');

$_SESSION["user"] = DB_USER;
$_SESSION["pass"] = DB_PASSWORD;
//establish database connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR session_abort() . die('Could not connect to MySQL, redirecting you back to login page.'. header( "refresh:4;url=index.php" ));

//activate a query to get the access level of the user.
$query = "SELECT DISTINCT accesslevel FROM users u " .
			"WHERE u.username = \"" . DB_USER . "\" AND u.password = \"" . DB_PASSWORD . "\"";
			
$response = @mysqli_query($dbc, $query);

if ($response) { //if query was succesful
	$AL = mysqli_fetch_array($response);
	$_SESSION["accesslevel"] = $AL['accesslevel'];
}

// Setting all the session variables to be empty so that no
// selections are preloaded.
$_SESSION["star_select"] = "";
$_SESSION["planet_select"] = "";
$_SESSION["moon_select"] = "";
$_SESSION["asteroid_select"] = "";
$_SESSION["meteor_select"] = "";

$_SESSION["type_select"] = "";
$_SESSION["utype_select"] = "";

$_SESSION["dtype_select"] = "";
$_SESSION["dstar_select"] = "";
$_SESSION["dplanet_select"] = "";
$_SESSION["dmoon_select"] = "";
$_SESSION["dasteroid_select"] = "";
$_SESSION["dmeteor_select"] = "";

header("refresh:0;MainPage.php");
?>