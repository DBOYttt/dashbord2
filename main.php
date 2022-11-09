<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";



// Create connection
$link = new mysqli($servername, $username, $password);
$db_list = mysqli_query($link, "SHOW DATABASES");

$my_arr = array();

if ($db_list->num_rows > 0) {
echo "<div class = 'group1'>";
    while($row = $db_list->fetch_assoc()) {
       echo  '<a href="index2.html">' . '<button class="button">' . $row["Database"] . '</button></a>' . "<br>" . "<br>";
       $os = $row["Database"];
       array_push($my_arr, $os);
    }
echo "</div>";

    $common = count($my_arr);

    echo $common;

    // for($i = $common; $i > 0 ; $i--){
        
        for($x = 0; $x <= ($common - 1) ; $x++) {

        // echo $x . "<br>";
        // echo $common . "<br>";

        $dbname = $my_arr[$x];
        $dbname_for_mysql = $dbname;

        $link = new mysqli($servername, $username, $password, $dbname);
        if ($link->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }


        $db_list = mysqli_query($link, "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname_for_mysql'");

        if ($db_list->num_rows > 0) {
            while($row = $db_list->fetch_assoc()) {
                 echo $row['table_name'] . '<br>';
            }
        }
        unset($my_arr[$x]);
    }
// }

    // if (in_array("w3schools", $my_arr)) {
    //     echo '<a href="index2.html"><button class="button3" href = "index.html">w3shools</button></a>';
    // }
} else {
    echo "0 results";
  }

$link->close();
?>
</body>
</html>