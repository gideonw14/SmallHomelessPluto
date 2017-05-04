<!DOCTYPE html>
<?php 
		session_start();
		require_once('sqlconnect.php');
	?>
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
	<a href="MainPage.php" class="btn btn-primary">Back</a>
	<div>
		Select what you would like to create:
		
		<form>
			<select name="type_select" class="form-control">
				<option value="Star">Star</option>
				<option value="Planet">Planet</option>
				<option value="Moon">Moon</option>
				<option value="Star">Asteroid</option>
			</select>
		</form>
		
		<p>Star Surface Temperature: <input id="star_temp" name="star_temp" type="number" /></p>
		
		
		Dwarf Planet: <form><input type="radio" name="dwarf" value="Yes" /> Yes<br />
							  <input type="radio" name="dwarf" value="No" /> No</form>
		
		Population: <input type="number" name="population" /><br />
		
		Orbit Distance: <input type="number" name="orbit_dist" /><br />
		
		Year Length: <input type="number" name="year_length" /><br />
		
		Average Surface Temperature: <input type="number" name="surf_temp" /><br />
		
		In orbit around:
		<?php 
						$query = "SELECT SName FROM star";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"star_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
						}
		?><br />
	</div>
</body>
</html>