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

    // start
    
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // global $dbname;


        // $link = new mysqli($servername, $username, $password, $dbname);

        // $db_list = mysqli_query($link, "SHOW DATABASES");

        // if ($db_list->num_rows > 0) {
        //     echo "<div class = 'group1'>";
        //         while($row = $db_list->fetch_assoc()) {
                
        //         $os = $row["Database"];
        //         array_push($my_arr, $os);
        
        //         $common = count($my_arr);
                
        //     }  
        // }

        // if ($link->connect_error) {
        //     die("Connection failed: " . $link->connect_error);
        //   }

        //   $db_list = mysqli_query($link, "SELECT table_name FROM information_schema.tables WHERE table_schema = '$dbname'");

        //   if ($db_list->num_rows > 0) {
        //     while($row = $db_list->fetch_assoc()) {
        //          echo $row['table_name'] . '<br>';
        //     }
        // } 
    // end


        for($x = 0; $x <= ($common - 1) ; $x++) {
            
            $dbname = $my_arr[$x];

            $filename_prefix = $dbname;
            $filename_extn   = 'php';
            

            $filename = $filename_prefix.'.'.$filename_extn;


            $current = file_get_contents($filename);



            file_put_contents($filename, $current);

            $current = file_get_contents($filename);

            $current .= "<?php" . "\n";
            $current .= '$servername = "localhost";' . "\n";
            $current .= '$username = "root";'. "\n";
            $current .= '$password = "";'. "\n";
            $current .= 'global $dbname;'. "\n";
            $current .= '$link = new mysqli($servername, $username, $password, $dbname);'. "\n";
            $current .= '$db_list = mysqli_query($link, "SHOW DATABASES");'. "\n";
            $current .= 'if ($db_list->num_rows > 0) {' . "\n";
            $current .= "echo" . " " . '"' . "<div class =" .  "'group1'>" . '"'.  ";" . "\n";
            $current .= 'while($row = $db_list->fetch_assoc()) {'. "\n";
            $current .= '$os = $row["Database"];'. "\n";
            $current .= 'array_push($my_arr, $os);'. "\n";
            $current .= '$common = count($my_arr);'. "\n";
            $current .= '}'. "\n";
            $current .= '}'. "\n";
            $current .= 'if ($link->connect_error) {'. "\n";
            $current .= 'die("Connection failed: " . $link->connect_error);'. "\n";
            $current .= '}'. "\n";
            $current .= '$db_list = mysqli_query($link, "SELECT table_name FROM information_schema.tables' . 'WHERE table_schema = "$dbname");'. "\n";
            $current .= 'if ($db_list->num_rows > 0) {'. "\n";
            $current .= 'echo $row["table_name"] . "<br>";'. "\n";
            $current .= '}'. "\n";
            $current .= '}'. "\n";
            $current .= '?>' . "\n";

            file_put_contents($filename, $current);

            echo  '<a href="'.$dbname.'.php">' . '<button class="button">' . $dbname . '</button></a>' . "<br>" . "<br>";
            
            unset($my_arr[$x]);
        }
        

        }
    echo "</div>";
?>
</body>

</html>