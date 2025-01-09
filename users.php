<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<script>
  $(function() {
    $("#navigation").load("navbar.php");
    });

</script>
<body>
  <div id="navigation"></div>
<!-- sends data into the addusers.php page -->
<form action="addusers.php" method="POST">
  First name: <input type="text" name="Forename"><br>
  Last name: <input type="text" name="Surname"><br>
  Username: <input type="text" name="Username"><br>
  Password: <input type="password" name="Password"><br>
  Email: <input type="text" name="Email"><br>
<!-- creates drop down list for gender -->
  Gender: <select name="Gender">
		<option value="M">Male</option>
		<option value="F">Female</option>
	</select>
  <br>
  <input type="submit" value="Add User">
</form>
</body>
</html>