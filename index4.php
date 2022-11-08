<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3schools";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `employees`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<button class = "button3"><a href = "index2.html">back<a></button>';
echo '<div class = "group4">';
echo "<table border=\"1\">";
echo  "<td>" . "EmployeeID " . "</tb>";
echo  "<td>" . "LastName" . "</tb>";
echo  "<td>" . "FirstName" . "</tb>";
echo  "<td>" . "BirthDate" . "</tb>";
echo  "<td>" . "Photo" . "</tb>";
echo  "<td>" . "Notes" . "</tb>" . "<tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<td>" . $row["EmployeeID"] . "</tb>";
    echo  "<td>" . $row["LastName"] . "</tb>";
    echo  "<td>" . $row["FirstName"] . "</tb>";
    echo  "<td>" . $row["BirthDate"] . "</tb>";
    echo  "<td>" . $row["Photo"] . "</tb>";
    echo  "<td>" . $row["Notes"] . "</tb>" . "<tr>";
    echo '</div>';
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>