<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "w3shools";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `orders`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<button><a href = "index2.html">back<a></button>';
echo "<table border=\"1\">";
echo  "<td>" . "OrderID " . "</tb>";
echo  "<td>" . "CustomerID" . "</tb>";
echo  "<td>" . "EmployeeID" . "</tb>";
echo  "<td>" . "OrderDate" . "</tb>";
echo  "<td>" . "ShipperID" . "</tb>" . "<tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<td>" . $row["OrderID"] . "</tb>";
    echo  "<td>" . $row["CustomerID"] . "</tb>";
    echo  "<td>" . $row["EmployeeID"] . "</tb>";
    echo  "<td>" . $row["OrderDate"] . "</tb>";
    echo  "<td>" . $row["ShipperID"] . "</tb>" . "<tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>