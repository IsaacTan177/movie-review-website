<?php
session_start(); 
print_r($_POST);


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
    $_SESSION['variable'] = false;
// compares the username and password entered to the username and password in the users table
    if ($_POST["Pword"]==$row["Password"]){
        $_SESSION['Username']=$row["Username"];
// from the users table retrieves the user's forename and surname
        {("<h2>".$row["Forename"]." ".$row["Surname"]. "</h2>");}
// assigns the users forename and surname into a variable called name
        $_SESSION["name"]=$row["Forename"]." ".$row["Surname"];
// assigns loggedin variable to true to track that a user is now logged in
        $_SESSION['loggedin'] = true;
        if (!isset($_SESSION['backURL'])){
// if the username and/or password is correct direct user back to frontpage1.php
            $backURL= "frontpage1.php";         
        }else{
            $backURL=$_SESSION['backURL'];
        }
        unset($_SESSION['backURL']);
        echo("DSFsd");
        header('Location: ' . $backURL);
    }else{
        echo("DSF");
        #header('Location: login.php');
        $_SESSION['loggedin'] = false;
    }

}
// if user fails to log in, redirect them back to login.php
if ( $_SESSION['loggedin'] == false){
header("location: login.php");
}



$conn=null;
