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

        $my_arr = array();

    if ($db_list->num_rows > 0) {
    echo "<div class = 'group1'>";
        while($row = $db_list->fetch_assoc()) {
        
        $os = $row["Database"];
        array_push($my_arr, $os);

        $common = count($my_arr);
        
    }  

        for($x = 0; $x <= ($common - 1) ; $x++) {
            
            $dbname = $my_arr[$x];


            echo  '<a href="'.$dbname.'">' . '<button class="button" id="'.$dbname.'">' . $dbname . '</button></a>' . "<br>" . "<br>";
            
            unset($my_arr[$x]);
        }
        

        }
    echo "</div>";
    }


button();
?>
</body>

</html>