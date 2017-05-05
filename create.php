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
		


		<form id="selection_form" action="createselection.php" method="get">
			<select name="type_select" class="form-control">
                <option value=""></option>
                <?php
                    if($_SESSION['type_select'] == "Star") {
                        echo '<option selected>Star</option>';
                    } else {
                        echo '<option value="Star">Star</option>';
                    }
                    if($_SESSION['type_select'] == "Planet") {
                        echo '<option selected>Planet</option>';
                    } else {
                        echo '<option value="Planet">Planet</option>';
                    }
                    if($_SESSION['type_select'] == "Moon") {
                        echo '<option selected>Moon</option>';
                    } else {
                        echo '<option value="Moon">Moon</option>';
                    }
                    if($_SESSION['type_select'] == "Asteroid") {
                        echo '<option selected>Asteroid</option>';
                    } else {
                        echo '<option value="Asteroid">Asteroid</option>';
                    }
		    if($_SESSION['type_select'] == "Meteor") {
                        echo '<option selected>Meteor</option>';
                    } else {
                        echo '<option value="Meteor">Meteor</option>';
                    }
                ?>

			</select>
            <input type="submit" class="btn btn-default" value="Choose">
		</form>

		<form action="inserttuple.php" method="get">
		
		
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control">
		<label for="mass">Mass</label>
		<input type="number" name="mass" step="any" class="form-control">
		<label for="diameter">Diameter</label>
		<input type="number" name="diameter" class="form-control">
		<label for="date_discovered">Date Discovered</label>
		<input type="date" name="date_discovered" class="form-control">
		
        <?php
            if($_SESSION['type_select'] == "Star") {
                echo '<p>Star Surface Temperature: <input id="star_temp" name="star_temp" type="number" /></p>';
           }
        ?>
		
	<?php
            if($_SESSION['type_select'] == "Planet") {
                echo 'Dwarf Planet: <form><input type="radio" name="dwarf" value="Yes" /> Yes<br />
						<input type="radio" name="dwarf" value="No" /> No</form>
				
				Population: <input type="number" name="population" /><br /><br />
				
				Orbit Distance: <input type="number" name="orbit_dist" /><br /><br />
				
				Year Length: <input type="number" name="year_length" /><br /><br />
				
				Average Surface Temperature: <input type="number" name="surf_temp" /><br /><br />
				
				In orbit around:';
						$query = "SELECT SName FROM star";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"star_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
						}
                                echo'</select>';
            }
        ?>
	<?php
            if($_SESSION['type_select'] == "Moon") {
                echo 'Orbit Distance: <input type="number" name="orbit_dist" /><br /><br />
				
			Orbit Time: <input type="number" name="year_length" /><br /><br />
				
			In orbit around:';
						$query = "SELECT PName FROM planet";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"star_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
						}
                        echo'</select>';
            }
        ?>
	
	<?php
            if($_SESSION['type_select'] == "Asteroid") {
                echo 'Member of an Asteroid Belt: <form><input type="radio" name="belt" value="Yes" /> Yes<br />
						<input type="radio" name="belt" value="No" /> No</form>
				
			Asteroid Number: <input type="number" name="asteroid_number" /><br /><br />';
            }
        ?>
		
	<?php
            if($_SESSION['type_select'] == "Meteor") {
                echo 'Asteroid Number: <input type="number" name="asteroid_number" /><br /><br />
		    
			In the atmosphere of:';
						$query = "SELECT PName FROM planet";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"star_select\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
						}
                        echo'</select>
			
			Date (Became Meteor): <input type="date" name="meteor_date" /><br /><br ?>
			
			Struck Surface: <form><input type="radio" name="struck" value="Yes" /> Yes<br />
						<input type="radio" name="struck" value="No" /> No</form>';
            }
        ?>	
		
        <br />
	</div>
</body>
</html>
