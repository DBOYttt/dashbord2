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
echo '<button><a href = "index2.html">back<a></button>';
echo "<table border=\"1\">";
echo  "<td>" . "OrderDetailID " . "</tb>";
echo  "<td>" . "OrderID" . "</tb>";
echo  "<td>" . "ProductID " . "</tb>";
echo  "<td>" . "OrderDate" . "</tb>" . "<tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<td>" . $row["OrderDetailID"] . "</tb>";
    echo  "<td>" . $row["OrderID"] . "</tb>";
    echo  "<td>" . $row["ProductID"] . "</tb>";
    echo  "<td>" . $row["Quantity"] . "</tb>" . "<tr>";

  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>