<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="lists.css"> 
</head>
<body>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
  $(function() {
    $("#navigation").load("navbar.php");
    });

</script>
    
<div id="navigation"></div>
<div class="navbarsearch">
        <form action = "listquery.php" method="GET">
            <input type="submit" name ="lists" value="new list?">
        </form>
        <form action = "listadd.php" method="GET">
            <input type="submit" name ="lists" value="add movie?">
        </form>
    </div>
<!-- outputs all list names -->
<?php
    include_once("connection.php");  
    $sql = "SELECT  ListName FROM userlists";
    $result = $conn->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $movietitle = $row["ListName"];
        echo $movietitle;
        echo("&nbsp"."&nbsp"."&nbsp");
        
            }

      
  ?>
</body>
</html>
