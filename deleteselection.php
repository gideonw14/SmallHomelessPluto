<?php // Stores user input for deleting
session_start();

$_SESSION['dtype_select'] = $_GET['dtype_select'];

header("refresh:0;delete.php");
?>