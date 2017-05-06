<!DOCTYPE html>
<html>
<?php
	session_start(); // Collects session variables
	require_once('sqlconnect.php'); // Database connection
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
	<div>
		<!-- This form is used to allow the user to
		 	 delete an entity from the database -->
		<form action="deleteselection.php" method="get">
		Select what you would like to delete:
		<select name="dtype_select" class="form-control">
		<option value=""></option>
		<?php 
			if ($_SESSION['dtype_select'] == "Star") {
				echo '<option value="Star" selected>Star</option>';
			} else {
				echo '<option value="Star">Star</option>';
			}
			
			if ($_SESSION['dtype_select'] == "Planet") {
				echo '<option value="Planet" selected>Planet</option>';
			} else {
				echo '<option value="Planet">Planet</option>';
			}
			
			if ($_SESSION['dtype_select'] == "Moon") {
				echo '<option value="Moon" selected>Moon</option>';
			} else {
				echo '<option value="Moon">Moon</option>';
			}
			
			if ($_SESSION['dtype_select'] == "Asteroid") {
				echo '<option value="Asteroid" selected>Asteroid</option>';
			} else {
				echo '<option value="Asteroid">Asteroid</option>';
			}
			
			if ($_SESSION['dtype_select'] == "Meteor") {
				echo '<option value="Meteor" selected>Meteor</option>';
			} else {
				echo '<option value="Meteor">Meteor</option>';
			}
		?>
		</select>
		<input type="submit" value="Select Type" />
		</form>
		
		<form action="deletefromDB.php" method="get">
		<?php 
		if ($_SESSION['dtype_select'] != '') {
			echo 'Which would you like to delete?';
			echo '<select name="deletion_select" class="form-control">';
		}  
		?>
		<!-- After user selects what type of entity to delete,
		 	 they are given options based on what is in the DB. -->
		<?php
		if ($_SESSION['dtype_select'] == 'Star') {
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
		
		if ($_SESSION['dtype_select'] == 'Planet') {
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
		
		if ($_SESSION['dtype_select'] == 'Moon') {
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
		
		if ($_SESSION['dtype_select'] == 'Asteroid') {
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
		
		if ($_SESSION['dtype_select'] == 'Meteor') {
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
		
		?>
		
		<?php
			if ($_SESSION['dtype_select'] != '') {
				echo '<input type="submit" name="deletetuple" id="deletetuple" value="DELETE" />';
				echo '</select>';
			}
		?>
		
		
		
		</form>
		
	</div>
</body>
</html>