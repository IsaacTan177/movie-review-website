
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <meta charset="UTF-8" />
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="login.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</head>
<!-- HTML from the frontpage1.html -->
<body>

<script>
  $(function() {
    $("#navigation").load("navbar.php");
    });

</script>
    <div id="navigation"></div>
    <!-- <nav>
        <div class="navbarcontainer">
            <ul class="navbarlogo"> 
                <li><a href="frontpage1.php">LOGO</a></li>
            </ul>
            <ul class="navbarlogin">
                <li><a href="login.php">
                    <?php 
                        // if (isset($_GET["logged"])) {
                        //     $loggedin = $_GET["loggedin"]; 
                        //     echo ($loggedin);
                        // }
                        // else {
                        //     echo ("Sign Up/Log In");
                        // }
                    ?>
                    </a></li>
            </ul>
        </div>

    </nav>
         -->

    <h1>Sign Up/ Log In</h1>
    <div class = "login">
<!-- connects the log in page to the loginprocess page -->
      <form action="loginprocess.php" method= "POST">
         User name:<input type="text" name="newUsername"><br>
         Password:<input type="password" name="Pword"><br>
      <input type="submit" value="Login">
   </div>
   </form>
<?php
session_start();
print_r($_SESSION);
session_destroy();
?>
<div class = "signup">
   <a href="users.php" class = "signup">No account? Sign up for one now</a>
   </div>

<style>
.signup {
    float: right;
    font-family: Arial, Helvetica, sans-serif;

}</style>

</body>
</html> 