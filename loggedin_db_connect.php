<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    # session_start();
//connecting to the database
    // $dbconnect = mysqli_connect(server, username, password, database);
    $dbconnect = mysqli_connect('localhost', 'Brenda', 'vote@2022', 'voting');
    
    //check whether database connection is successful.
    if (!$dbconnect){
        echo "<p style = 'color:red;'>Database failed to connect</p>".mysqli_connect_error();
    }
    else{
        //   create a variable to pick up session variable
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];

        // echo "<p style = 'color:white;'> Database connected successfully</p>";
    }
    //check whether the user is logged in.
    if(!isset($_SESSION['firstname']) && !isset($_SESSION['lastname']) && !isset($_SESSION['password'])){
        echo ("<script>window.top.location='login.php'</script>");
    }
?>