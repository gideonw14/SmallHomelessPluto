<?php // This session is used to store the type of celestial body
	  // the user wants to create
session_start();


$_SESSION['type_select'] = $_GET['type_select'];

header("refresh:0;create.php");
?>