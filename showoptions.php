<!DOCTYPE html>
<html>
<head>
    <title>User Options</title>
</head>
<body>
<?php
include_once('.php');
$stmt = $conn->prepare("SELECT tblsubjects.Subjectname as sn FROM Tblpupilstudies 
INNER JOIN tblsubjects 
ON tblsubjects.SubjectID=tblpupilstudies.SubjectID 
WHERE UserID=:selecteduser");

$stmt->bindParam(':selecteduser', $_POST["Name"]);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
        echo($row["sn"]."<br>");
}
?>

</form>
</body>
</html>
