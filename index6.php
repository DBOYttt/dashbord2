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

$sql = "SELECT * FROM `order_details`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<a href = "index2.html"><button class = "button3">back</button></a>';
echo '<div class = "orders">';
echo '<table class = "table">';
echo  "<th>" . "OrderDetailID " . "</th>";
echo  "<th>" . "OrderID" . "</th>";
echo  "<th>" . "ProductID " . "</th>";
echo  "<th>" . "OrderDate" . "</th>" . "<tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<td>" . $row["OrderDetailID"] . "</tb>";
    echo  "<td>" . $row["OrderID"] . "</tb>";
    echo  "<td>" . $row["ProductID"] . "</tb>";
    echo  "<td>" . $row["Quantity"] . "</tb>" . "<tr>";
    echo '</div>';
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>