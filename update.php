<!DOCTYPE html>
<html>
<?php
	session_start();
	require_once('sqlconnect.php');
?>
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
	<a href="MainPage.php" class="btn btn-primary">Back</a>
	<div class="container">
		<div class="row">
			Select what you would like to update:
			<form action="updateselection.php" method="get">
				<select name="utype_select" class="form-control">
				<option value=""></option>
				<?php 
					if ($_SESSION['utype_select'] == "Star") {
						echo '<option value="Star" selected>Star</option>';
					} else {
						echo '<option value="Star">Star</option>';
					}
					
					if ($_SESSION['utype_select'] == "Planet") {
						echo '<option value="Planet" selected>Planet</option>';
					} else {
						echo '<option value="Planet">Planet</option>';
					}
					
					if ($_SESSION['utype_select'] == "Moon") {
						echo '<option value="Moon" selected>Moon</option>';
					} else {
						echo '<option value="Moon">Moon</option>';
					}
					
					if ($_SESSION['utype_select'] == "Asteroid") {
						echo '<option value="Asteroid" selected>Asteroid</option>';
					} else {
						echo '<option value="Asteroid">Asteroid</option>';
					}
					
					if ($_SESSION['utype_select'] == "Meteor") {
						echo '<option value="Meteor" selected>Meteor</option>';
					} else {
						echo '<option value="Meteor">Meteor</option>';
					}
				?>
				</select>
				<input type="submit" value="Submit">
			</form>
		</div>	

		<div class="row">
			<form class="form-group" action="updateDB.php" method="get">
				<?php if ($_SESSION['utype_select'] == "") echo '<p hidden>'; ?>
				
				Which would you like to update?
				<select name="more_select" class="form-control">
				
				<?php
				if ($_SESSION['utype_select'] == 'Star') {
					$query = "SELECT SName FROM star";
					$response = @mysqli_query($dbc, $query);
					echo '<option value=""></option>';
					while ($row = mysqli_fetch_array($response)) {
						if ($_SESSION['dstar_select'] == $row['SName']) {
							echo '<option value="' . $row['SName'] . '" selected>' . $row['SName'] . '</option>';
						} else {
							echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
						}
					}
				}
				
				if ($_SESSION['utype_select'] == 'Planet') {
					$query = "SELECT PName FROM planet";
					$response = @mysqli_query($dbc, $query);
					echo '<option value=""></option>';
					while ($row = mysqli_fetch_array($response)) {
						if ($_SESSION['dstar_select'] == $row['PName']) {
							echo '<option value="' . $row['PName'] . '" selected>' . $row['PName'] . '</option>';
						} else {
							echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
						}
					}
				}
				
				if ($_SESSION['utype_select'] == 'Moon') {
					$query = "SELECT MName FROM moon";
					$response = @mysqli_query($dbc, $query);
					echo '<option value=""></option>';
					while ($row = mysqli_fetch_array($response)) {
						if ($_SESSION['dstar_select'] == $row['MName']) {
							echo '<option value="' . $row['MName'] . '" selected>' . $row['mName'] . '</option>';
						} else {
							echo '<option value="' . $row['MName'] . '">' . $row['MName'] . '</option>';
						}
					}
				}
				
				if ($_SESSION['utype_select'] == 'Asteroid') {
					$query = "SELECT AName FROM asteroid";
					$response = @mysqli_query($dbc, $query);
					echo '<option value=""></option>';
					while ($row = mysqli_fetch_array($response)) {
						if ($_SESSION['dstar_select'] == $row['AName']) {
							echo '<option value="' . $row['AName'] . '" selected>' . $row['AName'] . '</option>';
						} else {
							echo '<option value="' . $row['AName'] . '">' . $row['AName'] . '</option>';
						}
					}
				}
				
				if ($_SESSION['utype_select'] == 'Meteor') {
					$query = "SELECT MeteorName FROM meteor";
					$response = @mysqli_query($dbc, $query);
					echo '<option value=""></option>';
					while ($row = mysqli_fetch_array($response)) {
						if ($_SESSION['dstar_select'] == $row['MeteorName']) {
							echo '<option value="' . $row['MeteorName'] . '" selected>' . $row['MeteorName'] . '</option>';
						} else {
							echo '<option value="' . $row['MeteorName'] . '">' . $row['MeteorName'] . '</option>';
						}
					}
				}
				echo '</select>';
				?>
				
				<label for="mass">Mass (in 10^24 kg)</label>
				<input type="number" name="mass" step="any" class="form-control">
				<label for="gravity">Gravity (in m/s^2)</label>
				<input type="number" name="gravity" step="any" class="form-control">
				<label for="diameter">Diameter (in km)</label>
				<input type="number" name="diameter" class="form-control">
				<label for="date_discovered">Date Discovered</label>
				<input type="date" name="date_discovered" class="form-control">
				
				
				<?php
					if($_SESSION['utype_select'] != "Star") echo '<p hidden>';
						echo '<label for="surface_temp">Surface Temp (in K)</label>';
						echo '<input type="number" name="surface_temp" class="form-control">';
					if($_SESSION['utype_select'] != "Star") echo '</p>';
					
					if($_SESSION['utype_select'] != "Planet") echo '<p hidden>';
						 echo 
						'<br />Dwarf Planet:<br /><input type="radio" name="dwarf" value="1"  checked="true"/> Yes
									<br /><input type="radio" name="dwarf" value="0" /> No<br /><br />';
						echo '<label for="distance">Orbit Distance (in km)</label>';
						echo '<input type="number" name="distance" class="form-control">';
						echo '<label for="year">Year Length (in Earth Days)</label>';
						echo '<input type="number" name="year" class="form-control">';
						echo '<label for="population">Population (in Millions of Inhabitants)</label>';
						echo '<input type="number" name="population" class="form-control">';
						echo '<label for="avg_surf_temp">Average Surface Temperature (in K)</label>';
						echo '<input type="number" name="avg_surf_temp" class="form-control">';
					if($_SESSION['utype_select'] != "Planet") echo '</p>';
					
					if($_SESSION['utype_select'] != "Moon") echo '<p hidden>';
						echo '<label for="moon_distance">Moon Orbit Distance (in 10^24 km)</label>';
						echo '<input type="number" name="moon_distance" class="form-control">';
						echo '<label for="moon_orbit_time">Orbit Time (in Earth Days)</label>';
						echo '<input type="number" name="moon_orbit_time" class="form-control">';
					if($_SESSION['utype_select'] != "Moon") echo '</p>';
					
					if($_SESSION['utype_select'] != "Asteroid") echo '<p hidden>';
						echo '<br />Is it a member of the asteroid belt?<br />';
						echo '<input type="radio" name="asteroid_belt" value="1" checked="true"> Yes<br>';
						echo '<input type="radio" name="asteroid_belt" value="0"> No<br><br>';
						echo '<label for="asteroid_num">Asteroid Number</label>';
						echo '<input type="number" name="asteroid_num" class="form-control">';
					if($_SESSION['utype_select'] != "Asteroid") echo '</p>';
					
					if($_SESSION['utype_select'] != "Meteor") echo '<p hidden>';
						echo '<br />Struck Surface: <br />';
						echo '<input type="radio" name="struck_surface" value="1" checked="true"> Yes<br>';
						echo '<input type="radio" name="struck_surface" value="0"> No<br><br />';
                        echo '<label for="asteroid_num">Asteroid Number</label>';
                        echo '<input type="number" name="asteroid_num" class="form-control">';
						echo '<label for="meteor_date">Date Became Meteor</label>';
						echo '<input type="date" name="meteor_date" class="form-control">';
					if($_SESSION['utype_select'] != "Meteor") echo '</p>';

                    echo '<br />';
					
					if ($_SESSION['utype_select'] =="") echo '<p hidden>';
					echo '<input type="submit" class="btn btn-default" value="Update">';
					if ($_SESSION['utype_select'] =="") echo '</p>';
				?>
			</form>
		</div>
	</div>
</body>
</html>