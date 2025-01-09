<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REVIEW MOVIES</title>
    <link rel="stylesheet" href="review.css"> 
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
</head>

<body>
    <div id="navigation"></div>
    <?php
        session_start();
        $title = $_SESSION['title'];
        $embed = $_SESSION['embed'];
    ?>
        
    <h1>
    <!-- outputs the variables  -->
        <?php
            echo $title;
         ?>
    </h1>

    <iframe width="560" height="315" src= <?php echo $embed; ?> title="YouTube video player" frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<div class="container">
    <form method="GET" >
        <!-- 5 stars rating system -->
        <div class="starrating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5" title="5 stars">&#9733;</label>

            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4" title="4 stars">&#9733;</label>

            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3" title="3 stars">&#9733;</label>

            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2" title="2 stars">&#9733;</label>

            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1" title="1 star">&#9733;</label>
        </div>

        <textarea id="reviews" name="reviews" rows=15 cols="140" class="large-textbox"
        placeholder="Leave your thoughts for others to see..."></textarea>
        <input type="submit" name="submit" value="Share" class="submitbutton">

    </form>
</div>


<?php
include_once("connection.php");
// if the submit button is pressed, the data will be entered into the table
if (isset($_GET['submit'])) {
    $username = $_SESSION["Username"];
    // selects userid from the table where the username matches the username of the user
    $sql = "SELECT UserID FROM users WHERE Username LIKE '$username'";  
    $result = $conn->prepare($sql);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    // assigns the userid to a variable called $userid
    $userid = $row['UserID'];



    // selects movieid from the table where the movie title matches the movie title searched by the user
    $sql = "SELECT MovieID FROM movies WHERE MovieTitle LIKE '$title'";  
    $result = $conn->prepare($sql);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
    // assigns the movieid to a variable called $movieid
    $movieid = $row['MovieID'];

    //inserts the all the variables into the reviewsratings table
    $stmt = $conn->prepare("INSERT INTO reviewsratings (UserID,Username,ReviewData,RatingValue,MovieID)
    VALUES (:userID,:username,:reviewData,:ratingValue,:movieID)");
    $stmt->bindParam(':userID', $userid);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':reviewData', $_GET["reviews"]);
    $stmt->bindParam(':ratingValue', $_GET["rating"]);
    $stmt->bindParam(':movieID', $movieid);
    $stmt->execute();

    // removes all reviews without any ratings
    $stmt = $conn->prepare("DELETE FROM reviewsratings WHERE RatingValue is NULL");
    $stmt->execute();
    
    header("location: output.php");
}


$conn=null;
?>

</style>
</body>
</html>
