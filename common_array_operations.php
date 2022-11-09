<?php
    $common = count($my_arr);

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

        if (in_array($my_arr[$x], $my_arr)) {
             echo 'true';
         }

        echo "<br>" . "<br>";
        unset($my_arr[$x]);
    }
?>