<?php
//connecting to the database
    // $dbconnect = mysqli_connect(server, username, password, database);
    $dbconnect = mysqli_connect('localhost', 'Tabitha', 'vote@2022', 'voting');
    
    //check whether database connection is successful.
    if (!$dbconnect){
        echo "<p style = 'color:red;'>Database failed to connect</p>".mysqli_connect_error();
    }
    else{
        // echo "<p style = 'color:white;'> Database connected successfully</p>";
    }
?>