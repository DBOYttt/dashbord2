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

$sql = "SELECT * FROM `employees`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<button><a href = "index2.html">back<a></button>';
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
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>