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
	      <a class="nav-item nav-link" href="create.php">Create</a>
	      <a class="nav-item nav-link" href="update.php">Update</a>
	      <a class="nav-item nav-link" href="delete.php">Delete</a>
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
			<form id="selection_form" action="mainselection.php" method="get">
				Select a star
					<?php 
						$query = "SELECT SName FROM star";
						$response = @mysqli_query($dbc, $query);
						echo '<select name="star_select" class="form-control">';
						echo '<option value=""></option>';
						while ($row = mysqli_fetch_array($response)) {
							if ($_SESSION['star_select'] == $row['SName']) {
								echo '<option value="' . $row['SName'] . '" selected>' . $row['SName'] . '</option>';
							} else {
								echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
							}
						}
						
						
					?>
					
					</select>
					
			</div>
			<div class="col">
			
			<?php
				if ($_SESSION['star_select'] == "") {
					echo 'Select a star to see information about that star.';
				} else {
					$query = "SELECT * FROM `celestial body` WHERE `Name` = '" . $_SESSION['star_select'] . "'";
					$response = @mysqli_query($dbc, $query);
					
					if ($response) {
						while($row = mysqli_fetch_array($response)) {
							echo '<b>Star Name: </b>' . $row['Name'] .
							'<br /><b>Gravity: </b>' . $row['Gravity'] .
							'<br /><b>Mass: </b>' . $row['Mass'] .
							'<br /><b>Diameter: </b>' . $row['Diameter'] .
							'<br /><b>Date Discovered: </b>' . $row['Date Discovered'];
						}
						echo '</table>';
					}
					
					$query = "SELECT * FROM `star` WHERE `SName` = '" . $_SESSION['star_select'] . "'";
					$response = @mysqli_query($dbc, $query);
					if ($response) {
						while($row = mysqli_fetch_array($response))
							echo '<br /><b>Average Surface Temperature: </b>' . $row['Surface Temp'];
					}
				}
				
			?>
			
			</div>
		</div>
		<div class="row">
			<div class="col">
					<?php if ($_SESSION['star_select'] == "") echo '<p hidden>'; ?>
					<?php 
						echo 'Select a planet';
						echo '<select name="planet_select" class="form-control">';
						echo '<option value=""></option>';
						$query = "SELECT PName FROM planet WHERE SName = '" . $_SESSION['star_select'] . "'";
						$response = @mysqli_query($dbc, $query);
						if ($_SESSION['star_select'] != "") {
							while ($row = mysqli_fetch_array($response)) {
								if ($_SESSION['planet_select'] == $row['PName']) {
									echo '<option value="' . $row['PName'] . '" selected>' . $row['PName'] . '</option>';
								} else {
									echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
								}
							}
							//echo '<input type="submit" class="btn btn-success" value="Select Planet">';
						}
						echo '</select>';
					?>
					<?php if ($_SESSION['star_select'] == "") echo '</p>'; ?>
			</div> 
			<div class="col">
				<?php if ($_SESSION['star_select'] == "") echo '<p hidden>'; ?>
				Select a planet to see data
				<?php if ($_SESSION['star_select'] == "") echo '</p>'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col">
					<?php if ($_SESSION['planet_select'] == "") echo '<p hidden>'; ?>
					Select a Moon
					<select name="moon_select" class="form-control">
					<option value=""></option>
					<?php 
						$query = "SELECT MName FROM moon WHERE PName = '" . $_SESSION['planet_select'] . "'";
						$response = @mysqli_query($dbc, $query);
						if ($_SESSION['planet_select'] != "") {
							while ($row = mysqli_fetch_array($response)) {
								if ($_SESSION['moon_select'] == $row['MName']) {
									echo '<option value="' . $row['MName'] . '" selected>' . $row['MName'] . '</option>';
								} else {
									echo '<option value="' . $row['MName'] . '">' . $row['MName'] . '</option>';
								}
							}
							//echo '<input type="submit" class="btn btn-success" value="Select Moon">';
						}
						echo '</select>';
					?>
					
					<?php if ($_SESSION['planet_select'] == "") echo '</p>'; ?>
			</div>
			<div class="col">
			<?php if ($_SESSION['planet_select'] == "") echo '<p hidden>'; ?>
			Select a moon to see data
			<?php if ($_SESSION['planet_select'] == "") echo '</p>'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col">
					<?php if ($_SESSION['star_select'] == "") echo '<p hidden>'; ?>
					Select an Asteroid
					<select name="asteroid_select" class="form-control">
					<option value=""></option>
			
					<?php 
						$query = "SELECT AName FROM asteroid WHERE SName = '" . $_SESSION['star_select'] . "'";
						$response = @mysqli_query($dbc, $query);
						if ($_SESSION['star_select'] != "") {
							while ($row = mysqli_fetch_array($response)) {
								if ($_SESSION['asteroid_select'] == $row['AName']) {
									echo '<option value="' . $row['AName'] . '" selected>' . $row['AName'] . '</option>';
								} else {
									echo '<option value="' . $row['AName'] . '">' . $row['AName'] . '</option>';
								}
							}
							//echo '<input type="submit" class="btn btn-success" value="Select Asteroid">';
						}
						echo '</select>';
					?>
					<?php if ($_SESSION['star_select'] == "") echo '</p>'; ?>
			</div>
			<div class="col">
			<?php if ($_SESSION['star_select'] == "") echo '<p hidden>'; ?>
			Select an Asteroid to see data
			<?php if ($_SESSION['star_select'] == "") echo '</p>'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col">
					<?php if ($_SESSION['planet_select'] == "") echo '<p hidden>';?>
					Select a Meteor
					<select name="meteor_select" class="form-control">
					<option value=""></option>
					
					<?php
						$query = "SELECT MeteorName FROM meteor WHERE PName = '" . $_SESSION['planet_select'] . "'";
						$response = @mysqli_query($dbc, $query);
						if ($_SESSION['planet_select'] != "") {
							while ($row = mysqli_fetch_array($response)) {
								if ($_SESSION['meteor_select'] == $row['MeteorName']) {
									echo '<option value="' . $row['MeteorName'] . '" selected>' . $row['MeteorName'] . '</option>';
								} else {
									echo '<option value="' . $row['MeteorName'] . '">' . $row['MeteorName'] . '</option>';
								}
							}
							
							//echo '<input type="submit" class="btn btn-success" value="Select Meteor">';
						}
						echo '</select>';
					?>
					<?php if ($_SESSION['planet_select'] == "") echo '</p>'; ?>
				<input type="submit" class="btn btn-warning" value="Select">
				</form>
			</div>
			<div class="col">
			<?php if ($_SESSION['planet_select'] == "") echo '<p hidden>';?>
			Select a Meteor to see data
			<?php if ($_SESSION['planet_select'] == "") echo '</p>';?></div>
		</div>
	</div>
</body>
</html>