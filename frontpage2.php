<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <meta charset="UTF-8" />
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="frontpage2.css"> 

</head>
<style>

</style>
<body>
    <?php
        include_once('connection.php');
  
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {("<h2>".$row["Forename"].' '.$row["Surname"]."</h2>");}
        
        $forename = $row["Forename"];
        
    ?>
        <nav>
        <div class="navbarcontainer">
            <ul class="navbarlogo"> 
                <li><a href="#logo">LOGO</a></li>
            </ul>
            <ul class="navbarlogin">
                <li><a><?php echo $forename ?></a></li>
            </ul>
        </div>

    </nav>
            
    <h1>Tell us what you've been watching recently...</h1>
    <div class="navbarsearch">
        <input type="search" id="searchinput" placeholder="what are you searching for...">
        
        <button class="button" >search</button>
    </div>
</body>
</html> 