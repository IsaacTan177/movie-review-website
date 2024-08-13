<?php
session_start(); 
print_r($_POST);

// if the login details are correct bring the user to login.php
if (!isset($_SESSION['name']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
} 
include_once ("connection.php");
array_map("htmlspecialchars", $_POST);

$stmt = $conn->prepare("SELECT * FROM users WHERE Username =:newUsername ;" );
$stmt->bindParam(':newUsername', $_POST['newUsername']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
    print_r($row);
    echo("<br>");
    print_r($_SESSION);

// compares the username and password entered to the username and password in the users table
    if ($_POST["Pword"]==$row["Password"]){
        $_SESSION['Username']=$row["Username"];
        if (!isset($_SESSION['backURL'])){
// if the username and/or password is correct set the new destination of the user to frontpage2.php
            $backURL= "frontpage2.php"; 
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        echo("DSFsd");
        header('Location: ' . $backURL);
    }else{
        echo("DSF");
        header('Location: login.php');
    }

}
$conn=null;
?>


#$hashed= $row['Password'];
    #$attempt= $_POST['tpasswd'];
    #if(password_verify($attempt,$hashed)){