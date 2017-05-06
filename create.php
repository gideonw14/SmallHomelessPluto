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
		<br />Select what you would like to create:
		
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
            <input type="submit" class="btn btn-default" value="Choose"><br /><br />
		</form>

		<form action="inserttuple.php" method="get">
		
		<?php // These values are common to all celestial bodies
			  // therefore we do not check the selection
		if ($_SESSION['type_select'] == "") {
			echo '<p hidden>';
		}
			echo '
			<label for="name">Name</label>
			<input type="text" name="name" class="form-control"><br />
			<label for="mass">Mass (in 10^24 kg)</label>
			<input type="number" name="mass" step="any" class="form-control"><br />
			<label for="gravity">Gravity (in m/s^2)</label>
			<input type="number" name="gravity" class="form-control"><br />
			<label for="diameter">Diameter (in km)</label>
			<input type="number" name="diameter" class="form-control"><br />
			<label for="date_discovered">Date Discovered</label>
			<input type="date" name="dateDiscovered" class="form-control"><br />';
			
		if ($_SESSION['type_select'] == "") echo '</p>';
		?>
		
        <?php
			if($_SESSION['type_select'] != "Star") echo '<p hidden>';
			echo 'Star Surface Temperature (in K) <input class="form-control" id="star_temp" name="star_temp" type="number" />';
            if($_SESSION['type_select'] != "Star") echo '</p>';

        ?>
		
	<?php // Data specific to planet gets shown if Planet is selected
         if($_SESSION['type_select'] != "Planet") echo '<p hidden>';
                echo 
				'<br />Dwarf Planet<br /><input type="radio" name="dwarf" value="1" checked="checked" /> Yes
									<br /><input type="radio" name="dwarf" value="0" /> No<br /><br />
				
				Population (in Millions of Inhabitants) <input class="form-control" type="number" name="population" /><br />
				
				Orbit Distance (in km) <input class="form-control" type="number" name="orbit_dist" /><br />
				
				Year Length (in Earth Days) <input class="form-control" type="number" name="year_length" /><br />
				
				Average Surface Temperature (in K) <input class="form-control" type="number" name="surf_temp" /><br />
				
				In orbit around';
						$query = "SELECT SName FROM star";
						$response = @mysqli_query($dbc, $query);
						echo '<select name="orbits" class="form-control">';
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
						}
                                echo'</select>';
			if($_SESSION['type_select'] != "Planet") echo '</p>';
        ?>
	<?php // Collect Moon data
            if($_SESSION['type_select'] == "Moon") {
                echo 'Orbit Distance (in km) <input class="form-control" type="number" name="orbit_dist" /><br />
				
			Orbit Time (in Earth Days) <input type="number" name="year_length" class="form-control" /><br />
				
			In orbit around';
						$query = "SELECT PName FROM planet";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"morbits\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
						}
                        echo'</select>';
            }
        ?>
	
	<?php // Asteroid data
            if($_SESSION['type_select'] != "Asteroid") echo '<p hidden>';
                echo 'Member of an Asteroid Belt <br /> <input type="radio" name="belt" value="1" checked="true" /> Yes<br />
						<input type="radio" name="belt" value="0" /> No<br /><br />';
						
			if($_SESSION['type_select'] != "Asteroid") echo '</p>';
			
			if($_SESSION['type_select'] != "Asteroid" && $_SESSION['type_select'] != "Meteor") echo '<p hidden>';
			echo 'Asteroid Number <input type="number" name="asteroid_number" class="form-control" /><br />';
			if($_SESSION['type_select'] != "Asteroid" && $_SESSION['type_select'] != "Meteor") echo '</p>';
			

			
			if($_SESSION['type_select'] != "Asteroid" && $_SESSION['type_select'] != "Meteor") echo '<p hidden>';
			echo 'Orbits around';
			$query = "SELECT SName FROM star";
			$response = @mysqli_query($dbc, $query);
			echo "<select name=\"aorbits\" class=\"form-control\">";
			while ($row = mysqli_fetch_array($response)) {
				echo '<option value="' . $row['SName'] . '">' . $row['SName'] . '</option>';
			}
			echo'</select><br />';
			if($_SESSION['type_select'] != "Asteroid" && $_SESSION['type_select'] != "Meteor") echo '</p>';
        ?>
		
	<?php // Meteor data
            if($_SESSION['type_select'] != "Meteor") echo '<p hidden>'; 
                echo 'In the atmosphere of';
						$query = "SELECT PName FROM planet";
						$response = @mysqli_query($dbc, $query);
						echo "<select name=\"planet\" class=\"form-control\">";
						while ($row = mysqli_fetch_array($response)) {
							echo '<option value="' . $row['PName'] . '">' . $row['PName'] . '</option>';
						}
                        echo'</select><br />
			
			Date (Became Meteor) <input class="form-control" type="date" name="meteor_date" /><br />
			
			Struck Surface <br /><input type="radio" name="struck" value="1" checked="true" /> Yes<br />
								  <input type="radio" name="struck" value="0" /> No';
     
            if($_SESSION['type_select'] != "Meteor") echo '</p>'; 
        ?>	
		
		<?php // Submit button
		if ($_SESSION['type_select'] != "") {
			echo '<br /><input class="btn btn-default" type="submit" name="insertdatuple" value="Insert">';
		}
		?>
		</form>
        <br />
	</div>
</body>
</html>
