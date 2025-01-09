<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="output.css"> 
</head>
<body>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

    <script>
  $(function() {
    $("#navigation").load("navbar.php");
    });

</script>
    
<div id="navigation"></div>
    <?php
// allows me to connect to the database
include_once("connection.php");
    session_start();
    // if session variable NOT defined (from frontpage1.php to review.php)
    if (!isset ($_SESSION["search"])){
        $search = $_POST["search"];
        $_SESSION["search"]=$search;
    // (from other pages back to review.php)
    }else{
        $search = $_SESSION["search"];
    }
    $stmt = $conn->prepare("SELECT movies.MovieTitle as mtit, movies.Embed as memb, movies.MovieAbout as abt, actors.ActorID as aid,
     actors.ActorForename as afn, actors.ActorSurname as asn,moviestarring.Characters as mchar FROM moviestarring
    INNER JOIN movies ON movies.MovieID=moviestarring.MovieID
    INNER JOIN actors on moviestarring.ActorID = actors.ActorID
    WHERE movies.MovieTitle LIKE CONCAT(:mid, '%')");
    $stmt->bindParam(':mid', $_SESSION["search"]);

    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $title=$row["mtit"];
        $embed=$row["memb"];
        $about=$row["abt"];
        }
    $_SESSION['title'] = $title;
    $_SESSION['embed'] = $embed;
    $_SESSION['about'] = $about
    ?>
    <!-- outputs the variables  -->
     <h1>   
        <?php
        if ($search == $title){
            echo $_SESSION["search"];
            }
        else{
            echo("MOVIE NOT FOUND");
        }
         ?>
    </h1>
    
    

    <iframe width="560" height="315" src= <?php echo $embed; ?> title="YouTube video player" frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <h3>Starring
    <?php
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo(", ".$row["afn"]. " ". $row["asn"]." - ".$row["mchar"]);
        }
    ?>
    </h3>

    <p>
        <?php
        if ($search == $title){
            echo $about;
            }
        ?>
    </p>
  
    <br><hr>
    <?php 
    $totalrating = 0;
    $count = 0;
    $sql = "SELECT RatingValue FROM reviewsratings";
    $result = $conn->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $ratingval = $row["RatingValue"];
        $totalrating = $totalrating + $ratingval;
        $count = $count + 1;
            }

     $avrating = $totalrating/$count;  
    ?>
    <h2>this movie is rated <?php echo round($avrating,1)?></h2>
<div class = "reviews">
    <?php
    // assigns the star symbol to the variable $label
    $label = "<label>&#9733;</label>";
    // selects everything from reviewsratings table
    $stmt = $conn->prepare("SELECT * FROM reviewsratings");
    $stmt->execute();
    // iterates through every row
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
    // outputs username and reviewdata
    echo("<br>".$row["Username"]." says "."<br>".$row["ReviewData"]);

    echo("&nbsp"."&nbsp"."&nbsp");
    
    // outputs the same number of stars as the rating value from the review
    for ($x = 0; $x <= $row["RatingValue"]-1; $x++) {
        echo $label;
      }
      echo("&nbsp"."&nbsp"."&nbsp");
      echo("<br>");
    }

    ?>
</div>

<br><hr>
    <!-- brings users to review.php -->
    <div class="container">
        <a href="review.php" class="reviewlink">Share your thoughts</a>
    </div>

    <h3 >other movies like this...</h3>
    <?php
    //selects the moviegenre of the movie searched
    $sql = "SELECT MovieGenre FROM Movies WHERE MovieTitle LIKE '$title'";
    $result = $conn->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $moviegenre = $row["MovieGenre"];
            }
    //selects all the other movie titles that have the same movie genre as the one searched
    $sql = "SELECT MovieTitle FROM Movies WHERE (MovieGenre LIKE '$moviegenre') AND (MovieTitle NOT LIKE '$title')";
    $result = $conn->query($sql);
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "</br>";
        $movietitle = $row["MovieTitle"];
        echo $movietitle;
                }

?>

    <style>
        .reviews{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
        .container {
            text-align: right; 
        }
        .reviewlink {
            background-color: white;
            color: black;
            text-decoration: none; 
            border: 1px solid black;
        }
        .button {
            padding: 0;
border: none;
background: none;
        }
    </style>




</body>
</html>
