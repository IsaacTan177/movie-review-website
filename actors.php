<html>
<title>Search</title>
    
</head>
<body>
   <form action="addsubjects.php" method="post">
  Search <input type="text" name="subjectname"><br>

  <input type="submit" value="Add Subject">
</form>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblSubjects");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Subjectname"].' '.$row["Teacher"]."<br>");
		}
?>   
</body>
</html>
