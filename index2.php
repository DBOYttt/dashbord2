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

$sql = "SELECT * FROM `persons`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo '<a href = "index2.html"><button class = "button3">back</button></a>';
  echo '<div class = "group2">';
  echo "<head>" . '<meta charset="UTF-8">' . "</head>";
  echo '<table class = "table">';
  echo  "<tr>" . "<th>" . "CustomerID" . "</th>";
  echo  "<th>" . "CustomerName" . "</th>";
  echo  "<th>" . "ContactName" . "</th>";
  echo  "<th>" . "Address" . "</th>";
  echo  "<th>" . "PostalCode" . "</th>";
  echo  "<th>" . "City" . "</th>";
  echo  "<th>" . "Country" . "</th>" . "</tr>";
  while($row = $result->fetch_assoc()) {
    echo  "<tr>" . "<td>" . $row["CustomerID"] . "</tb>";
    echo  "<td>" . $row["CustomerName"] . "</tb>";
    echo  "<td>" . $row["ContactName"] . "</tb>";
    echo  "<td>" . $row["Address"] . "</tb>";
    echo  "<td>" . $row["PostalCode"] . "</tb>";
    echo  "<td>" . $row["City"] . "</tb>";
    echo  "<td>" . $row["Country"] . "</tb>" . "</tr>";
    echo '</div>';
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