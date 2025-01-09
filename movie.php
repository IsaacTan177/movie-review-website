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
<?php
  session_start();
  include_once("connection.php");
  if (isset ($_SESSION["loggedin"])){
    $loggedin = $_SESSION["loggedin"];
    if ($loggedin != true) {
        header("location: frontpage1.php");
    }
  }
  else {
    header("location: frontpage1.php");
  }
  $username = $_SESSION["Username"];
  //selects the Modvar value from the user
  $sql = "SELECT Modvar FROM users WHERE Username =:username";  
  $result = $conn->prepare($sql);
  $result->bindParam(':username', $username);
  $result->execute();
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $mod = $row['Modvar'];
  
  //only allows the user to add movies if they are an admin
  if ($mod != 1){
    header("location: frontpage1.php");
  }
?>

<form action="addmovie.php" method="POST">
  Movie Title: <input type="text" name="MovieTitle"><br>
  Movie About: <input type="text" name="MovieAbout"><br>
  Movie Genre: <input type="text" name="MovieGenre"><br>
  Age Rating: <input type="text" name="AgeRating"><br>
  Movie Price: <input type="text" name="MoviePrice"><br>
  Embed: <input type="text" name="Embed"><br>

  <br>
  <input type="submit" value="Add Movie">
</form>
</body>
</html>