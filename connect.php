<?php

        $server = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'travel_database';
        $connection = mysqli_connect($server, $username, $password, $database,'3306');
       if($connection)
       {
        // echo "success";
       }
       else{
        die("error");
       }


?>