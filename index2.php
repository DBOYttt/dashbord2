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

$sql = "SELECT * FROM `persons`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo '<button><a href = "index2.html">back<a></button>';
  echo "<head>" . '<meta charset="UTF-8">' . "</head>";
  echo "<table border=\"1\">";
  echo  "<td>" . "CustomerID" . "</tb>";
  echo  "<td>" . "CustomerName" . "</tb>";
  echo  "<td>" . "ContactName" . "</tb>";
  echo  "<td>" . "Address" . "</tb>";
  echo  "<td>" . "PostalCode" . "</tb>";
  echo  "<td>" . "City" . "</tb>";
  echo  "<td>" . "Country" . "</tb>" . "<tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<td>" . $row["CustomerID"] . "</tb>";
    echo  "<td>" . $row["CustomerName"] . "</tb>";
    echo  "<td>" . $row["ContactName"] . "</tb>";
    echo  "<td>" . $row["Address"] . "</tb>";
    echo  "<td>" . $row["PostalCode"] . "</tb>";
    echo  "<td>" . $row["City"] . "</tb>";
    echo  "<td>" . $row["Country"] . "</tb>" . "</tr>";
  //   echo "<table border=\"1\">";
  //   echo '<td>' . "CustomerID"  . $row["CustomerID"] . '</td>' . '<td>' . "CustomerName: " . '</td>' . '<td>' . $row["CustomerName"] . '</td>'. '<td>' . "contactName: " . '</td>' . '<td>' . $row["ContactName"] . '</td>'. '<td>' . "Address: " . '</td>' . '<td>' . $row["Address"] . '</td>'. '<td>' . "City: " . '</td>' . '<td>' . $row["City"]. "PostalCode: " . '</td>' . '<td>' . $row["PostalCode"]. "Country: " . '</td>' . '<td>' . $row["Country"];
  //   echo "</table>";
   }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>