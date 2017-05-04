<!DOCTYPE html>
<html>
<head>
	<title>Small Homeless Pluto</title>
	<!-- jQuery library - required for Bootstrap to work -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<!-- Tether Library - required for Bootstrap to work -->
	<script type="text/javascript" src="./js/tether.min.js"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-reboot.min.css">
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>

	<!-- Our JS -->
	<script type="text/javascript" src="./js/main.js"></script>
</head>
<body>
	<?php 
		session_start();
		require_once('sqlconnect.php');
	?>
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand">Small Homeless Pluto</a>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link" onclick="logout()">Logout</a>
	      <a class="nav-item nav-link" href="">Page</a>
	      <a class="nav-item nav-link" href="">Other Page</a>
	      <a class="nav-item nav-link" href="">Moar Page</a>
	    </div>
	  </div>
	</nav>

	<?php
		echo "<div>You are logged in as " . $_SESSION['user'] . "
			 and you have " . $_SESSION['accesslevel'] . " level access. </div>";
				
	?>
	
	<div class="container">
		<div class="row">
			<div class="col">
				<p>Select a star</p>
				<form id="star_form" class="form-group">
					<select name="star_select" class="form-control">
					</select>
					<input type="submit" class="btn btn-warning" value="Star">
				</form>
			</div>
			<div class="col">Select a star to see data</div>
		</div>
		<div class="row">
			<div class="col">
				Select a planet
				<form id="planet_form" class="form-group">
					<select name="planet_select" class="form-control">
					</select>
					<input type="submit" class="btn btn-success" value="Planet">
				</form>
			</div> 
			<div class="col">
				Select a planet to see data
			</div>
		</div>
	</div>
</body>
</html>