<?php // This will connect to the SQL server

DEFINE ('DB_USER', $_SESSION["user"]);
DEFINE ('DB_PASSWORD', $_SESSION["pass"]);
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'solarsystem');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL, an error occured.') . mysqli_connect_error();

?>