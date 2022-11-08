<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php";


// Create connection
$link = new mysqli($servername, $username, $password);
$db_list = mysqli_query($link, "SHOW DATABASES");

$my_arr = array();

if ($db_list->num_rows > 0) {
    while($row = $db_list->fetch_assoc()) {
       echo  $row["Database"] . "<br>";
       $os = $row["Database"];
       $my_arr = array_push($my_arr, $os);
    }


    

    if (in_array("w3shools", $os)) {
        echo 'true';
    }
} else {
    echo "0 results";
  }

$link->close();
?>
</body>
</html>