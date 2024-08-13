<?php
session_start(); 
if (!isset($_SESSION['name']))
{   
    $_SESSION['backURL'] = $_SERVER['REQUEST_URI'];
    header("Location:login.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursework";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<?php
include_once("connection.php");
$stmt = $conn->prepare("DROP TABLE IF EXISTS users;
CREATE TABLE users
(UserID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Forename VARCHAR(20) NOT NULL,
Surname VARCHAR(20) NOT NULL,
Username VARCHAR(15) NOT NULL,
Password VARCHAR(50) NOT NULL,
Email VARCHAR(50) NOT NULL,
Gender varchar(1) NOT NULL)");
$stmt->execute();
$stmt->closeCursor();
?>
 
