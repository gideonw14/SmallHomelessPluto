<?php // This will store the user's update type selection for update.php
session_start();

$_SESSION['utype_select'] = $_GET['utype_select'];

header("refresh:0;update.php");
?>