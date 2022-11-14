<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    
$servername = "localhost";
$username = "root";
$password = "";

function button() {
    
        global $servername, $username, $password;

        $link = new mysqli($servername, $username, $password);
        $db_list = mysqli_query($link, "SHOW DATABASES");

    if ($db_list->num_rows > 0) {
    echo "<div class = 'group1'>";
        while($row = $db_list->fetch_assoc()) {
        echo  '<a href="'.$hbsd.'">' . '<button class="button">' . $row["Database"] . '</button></a>' . "<br>" . "<br>";

        }
    echo "</div>";
    }
}

button();
?>
</body>

</html>