<?php

DEFINE ('DB_USER', "root");
DEFINE ('DB_PASSWORD', "");
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'solarsystem');

//Collecting data from form fields
$cUser = $_GET['cusername']; 
$cPass = $_GET['cpassword'];

$connect = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not create account for unknown reason.  redirecting you...') . mysqli_connect_error()
. header( "refresh:2;url=index.php");

//create the user and grant no permissions
$createUser = "CREATE USER '" . $cUser . "'@'localhost' IDENTIFIED BY '" . $cPass . "' WITH MAX_USER_CONNECTIONS 3;";
$granUser = "GRANT ALL PRIVILEGES ON solarsystem.* To '" . $cUser . "'@'localhost' IDENTIFIED BY '" . $cPass . "';";
$response = @mysqli_query($connect, $createUser);
$response = @mysqli_query($connect, $granUser);

//add the user to the user table inside solar database.
$adduser = "INSERT INTO users VALUE('" . $cUser . "', '" . $cPass . "', 'Basic')";

$response = @mysqli_query($connect, $adduser);

echo "The account has been succesfully created... redirecting you to login page";
header("refresh:3;url=index.php");
?>