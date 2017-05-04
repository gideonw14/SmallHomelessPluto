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
	<a href="MainPage.php" class="btn btn-primary">Back</a>
	<div>
		Select what you would like to create:
	</div>
	<form class="form-group" onsubmit="return false;">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control">
		<label for="mass">Mass</label>
		<input type="number" name="mass" step="any" class="form-control">
		<label for="diameter">Diameter</label>
		<input type="number" name="diameter" class="form-control">
		<label for="date_discovered">Date Discovered</label>
		<input type="date" name="date_discovered" class="form-control">
		<input type="submit" class="btn btn-default" value="Create">
	</form>
</body>
</html>