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

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<button><a href = "index2.html">back<a></button>';
echo "<table border=\"1\">";
echo  "<td>" . "CategoryID" . "</tb>";
echo  "<td>" . "CategoryName" . "</tb>";
echo  "<td>" . "Description" . "</tb>" . "<tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<td>" . $row["CategoryID"] . "</tb>";
    echo  "<td>" . $row["CategoryName"] . "</tb>";
    echo  "<td>" . $row["Description"] . "</tb>" . "<tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>