<html>
<head>
    
    <title>Add User</title>
    
</head>



<body>
<!-- sends data into the addusers.php page -->
<form action="output.php" method= "POST">
  Movie Name: <input type="text" name="MovieSearch"><br>
  <input type="submit" value="search">
</form>
<?php
session_start(); 
print_r($_POST);

include_once ("connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("SELECT * FROM Movies WHERE MovieTitle =:MovieSearch ;" );
$stmt->bindParam(':MovieSearch', $_POST['MovieSearch']);
$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
echo($row["MovieTitle"].'</br>'.$row["MovieAbout"]."<br>");
header('Location: output.php');
}

$conn=null;
?>

</body>
</html>
