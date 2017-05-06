<?php
session_start();

$_SESSION['moretype_select'] = $_GET['moretype_select'];

header("refresh:0;update.php");
?>