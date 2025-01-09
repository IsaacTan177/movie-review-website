<?php


session_start(); 

include_once("connection.php");
// brings user to login page to log into account created
header('Location: frontpage1.php');
// inserts values into the table
$stmt = $conn->prepare("INSERT INTO movies 
(MovieTitle,MovieAbout,MovieGenre,AgeRating,MoviePrice,Embed)VALUES 
(:movietitle,:movieabout,:moviegenre,:agerating,:movieprice,:embed)");

// assigns the values to the data input by the user
$stmt->bindParam(':movietitle', $_POST["MovieTitle"]);
$stmt->bindParam(':movieabout', $_POST["MovieAbout"]);
$stmt->bindParam(':moviegenre', $_POST["MovieGenre"]);
$stmt->bindParam(':agerating', $_POST["AgeRating"]);
$stmt->bindParam(':movieprice', $_POST["MoviePrice"]);
$stmt->bindParam(':embed', $_POST["Embed"]);
$stmt->execute();
$conn=null;

?>
