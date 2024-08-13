
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <meta charset="UTF-8" />
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="login.css"> 

</head>
<!-- HTML from the frontpage1.html -->
<body>
    <nav>
        <div class="navbarcontainer">
            <ul class="navbarlogo"> 
                <li><a href="frontpage1.php">LOGO</a></li>
            </ul>
            <ul class="navbarlogin">
                <li><a href="login.php">Sign Up/ Log In</a></li>
            </ul>
        </div>

    </nav>
        
    <h1>Sign Up/ Log In</h1>
    <div class = "login">
<!-- connects the log in page to the loginprocess page -->
      <form action="loginprocess.php" method= "POST">
         User name:<input type="text" name="newUsername"><br>
         Password:<input type="password" name="Pword"><br>
      <input type="submit" value="Login">
   </div>
   </form>

</body>
</html> 