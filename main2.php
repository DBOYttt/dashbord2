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

    $tx = <<<TX
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        global $dbname;


        $link = new mysqli($servername, $username, $password, $dbname);

        $db_list = mysqli_query($link, "SHOW DATABASES");

        if ($db_list->num_rows > 0) {
            echo "<div class = 'group1'>";
                while($row = $db_list->fetch_assoc()) {
                
                $os = $row["Database"];
                array_push($my_arr, $os);
        
                $common = count($my_arr);
                
            }  
        }

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
          }

          $db_list = mysqli_query($link, "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname'");

          if ($db_list->num_rows > 0) {
            while($row = $db_list->fetch_assoc()) {
                 echo $row['table_name'] . '<br>';
            }
        } 
        TX;


        for($x = 0; $x <= ($common - 1) ; $x++) {
            
            $dbname = $my_arr[$x];

            $filename_prefix = $dbname;
            $filename_extn   = 'php';

            $filename = $filename_prefix.'.'.$filename_extn;



            if( file_exists( $filename ) ){
                # Handle the Error Condition
               }else{
                 file_put_contents( $filename , $tx);
               }

            echo  '<a href="'.$dbname.'">' . '<button class="button">' . $dbname . '</button></a>' . "<br>" . "<br>";
            
            unset($my_arr[$x]);
        }
        

        }
    echo "</div>";
    }


button();
?>
</body>

</html>