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
</head>
<body>
	<?php 
		session_start();
		require_once('sqlconnect.php');
	?>

	<table width="1000" border="1">
	<tbody>
	<tr>
	<td><b><span style="font-size:large;"> Solar System Database</span></b></td>
	<td align="right">


	<?php
		echo "You are logged in as " . $_SESSION['user'] . " and you have " . $_SESSION['accesslevel']
				. " level access.";
				
	?>
	<td align="center"><form action="logout.php"><input type="submit" class="btn btn-primary" value="Log Out" /></form></td>

	</td>
	</tr>
	<tr>
	<td width="20%">
	<p>&nbsp;Planets &amp; Moons</p>
	<p>Asteroids &amp; Meteors</p>
	<p>Stars</p>
	</td>
	<td colspan="4">&nbsp;</td>
	</tr>
	</tbody>
	</table>

	<div class="container-fluid">
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