<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<head>
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="frontpage1.css"> 

</head>
<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

    <script>
  $(function() {
    $("#navigation").load("navbar.php");
    });

</script>
</head>
<body>
<div id="navigation"></div>

    <h1>Which list do you want to add it to</h1>
    <div class="navbarsearch">
        <form action="listprocess2.php" method="POST">
            <input type="text" name="addlist" placeholder="enter list name..." required>
            <input type="submit" value="Search">
        </form>
    </div>


<?php 
session_start();
$addmovie = $_POST['add'];
echo $addmovie;

include_once("connection.php");  
$username = $_SESSION["Username"];
$sql = "SELECT UserID FROM users WHERE Username LIKE '$username'";  
$result = $conn->prepare($sql);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$userid = $row['UserID'];

$sql = "SELECT  ListName FROM userlists WHERE UserID = '$userid'";
$result = $conn->query($sql);
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $movietitle = $row["ListName"];
    echo $movietitle;
    echo("&nbsp"."&nbsp"."&nbsp");
}
?>
</body>


