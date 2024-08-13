
<?php
session_start(); 

include_once("connection.php");
// brings user to login page to log into account created
header('Location: login.php');

// inserts values into the table
$stmt = $conn->prepare("INSERT INTO users (UserID,Forename,Surname,Username,Password,Email,Gender)VALUES (null,:forename,:surname,:username,:password,:email,:gender)");

// assigns the values to the data input by the user
$stmt->bindParam(':forename', $_POST["Forename"]);
$stmt->bindParam(':surname', $_POST["Surname"]);
$stmt->bindParam(':username', $_POST["Username"]);
$stmt->bindParam(':password', $_POST["Password"]);
$stmt->bindParam(':email', $_POST["Email"]);
$stmt->bindParam(':gender', $_POST["Gender"]);
$stmt->execute();
$conn=null;

?>

// if (!isset($_SESSION['name']))
// {   
//     $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
//     header("Location:login.php");
// }
// array_map("htmlspecialchars", $_POST);
//print_r($_POST);

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
// {
// echo($row["Forename"].' '.$row["Surname"]."<br>");
// }