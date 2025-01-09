<?php
//check is session is started and if not start it
      if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
      }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="navbar.css">

</head>
<body></body><nav>
<div class="navbarcontainer">
            <ul class="navbarlogo"> 
                <li><a href="frontpage1.php">LOGO</a></li>
            </ul>
            <ul class="navbarlogo">
                <li><a href ="lists.php">Lists</a></li> 
            </ul>
            <ul class="navbarlogo">
                <li><a href ="movie.php">Add movie</a></li> 
            </ul>
            <ul class="navbarlogin">
                <li><a href="login.php"><?php
// if the user is logged in, output the user's name instead of Sign up/ Log in
                if (isset ($_SESSION["loggedin"])){
                  $loggedin = $_SESSION["loggedin"];
                  if ($loggedin == true) {
                    $display = $_SESSION["name"];
                    echo $display;}
                  }
                else{
                  $display = "Sign up/ Log in";
                  echo $display;
                }
                ?></a></li>
            </ul>
        </div>
</nav>
   
</body>

  </html>