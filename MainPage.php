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
	      <a class="nav-item nav-link" href="logout.php">Logout</a>
	      <a class="nav-item nav-link" href="">Page</a>
	      <a class="nav-item nav-link" href="">Other Page</a>
	      <a class="nav-item nav-link" href="">Moar Page</a>
	    </div>
	  </div>
	</nav>

	<div class="container">
		<div class="row">
			<h3>
			<?php
				echo "You are logged in as " . $_SESSION['user'] . "
					 and you have " . $_SESSION['accesslevel'] . " level access. ";
			?>
			</h3>
		</div>
		<div class="row">
			<div class="col">
				Select a star
				<form id="star_form" class="form-group">
					<?php 
						$query = "SELECT SName FROM star";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"star_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
						}
					?>
					
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
					<?php 
						$query = "SELECT PName FROM planet";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"planet_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
						}
					?>
					<input type="submit" class="btn btn-success" value="Planet">
				</form>
			</div> 
			<div class="col">
				Select a planet to see data
			</div>
		</div>
		<div class="row">
			<div class="col">
				Select a moon
				<form id="moon_form" class="form-group">
					<?php 
						$query = "SELECT MName FROM moon";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"moon_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['MName'] . '">' . $row['MName'] . '</option>';
						}
					?>
					
					</select>
					<input type="submit" class="btn btn-warning" value="Moon">
				</form>
			</div>
			<div class="col">Select a moon to see data</div>
		</div>
		<div class="row">
			<div class="col">
				Select an Asteroid
				
				<?php 
					$query = "SELECT AName FROM asteroid";
					$response = @mysqli_query($dbc, $query);
					echo "<select name=\"asteroid_select\" class=\"form-control\">";
					while ($row = mysqli_fetch_array($response)) {
						echo '<option value="' . $row['AName'] . '">' . $row['AName'] . '</option>';
					}
				?>
				
				<form class="form-group">
					<input type="submit" class="btn btn-primary" value="Asteroid">
				</form>
			</div>
			<div class="col">Select an Asteroid to see data</div>
		</div>
		<div class="row">
			<div class="col">
				Select a Meteor
				
				<?php 
					$query = "SELECT MeteorName FROM meteor";
					$response = @mysqli_query($dbc, $query);
					echo "<select name=\"meteor_select\" class=\"form-control\">";
					while ($row = mysqli_fetch_array($response)) {
						echo '<option value="' . $row['MeteorName'] . '">' . $row['MeteorName'] . '</option>';
					}
				?>
				
				<form class="form-group">
					<input type="submit" class="btn btn-primary" value="Meteor">
				</form>
			</div>
			<div class="col">Select a Meteor to see data</div>
		</div>
	</div>
</body>
</html>