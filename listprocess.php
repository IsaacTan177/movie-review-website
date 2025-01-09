<?php 
    session_start();
    include_once("connection.php");
    //assigns username using SESSION
    $username = $_SESSION["Username"];
    //finds user id
    $sql = "SELECT UserID FROM users WHERE Username LIKE '$username'";  
    $result = $conn->prepare($sql);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $userid = $row['UserID'];

  //gets list name from listsprocess.php
    $listname = $_POST["name"];
//inserts data into userlists table
      $stmt = $conn->prepare("INSERT INTO userlists (UserID,ListName)
      VALUES (:userID,:listname)");
      $stmt->bindParam(':userID', $userid);
      $stmt->bindParam(':listname', $listname);
      $stmt->execute();
      header('Location: lists.php');
?>    