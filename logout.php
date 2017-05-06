<?php // Ends the session and redirects to index
session_abort();
header("refresh:0;index.php");
?>