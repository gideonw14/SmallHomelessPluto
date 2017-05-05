<?php
session_start();


$_SESSION['type_select'] = $_GET['type_select'];

header("refresh:0;create.php");
?>