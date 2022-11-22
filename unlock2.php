<?php

    if(!isset($_SESSION['lastname']) && !isset($_SESSION['password'])){
        if(isset($_POST['login'])){    //if the button save is clicked do the following
            //Here we pass the name of the input button to the global variable _POST[] and picking data from form.
              
            #Creating variables to hold the form data
            $password= $login_success = $login_error = '';
                $password = $_POST['password'];
            require 'my_functions.php';
            // prevent crosssite scripting
            $password = sanitize($password);
    
            // Retrieve data from database
            $sql_retrieve = "SELECT * FROM user WHERE firstname = '$firstname'";

            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
            
            $user = mysqli_fetch_assoc($result);
            // print_r($user);
                
            //encrypt
            $password = crypt($password, "vote");
            
            //save the password from database to a variable
            $pw_from_db = $user['userpassword'];
            // echo "<p style = 'color:white;'> $firstname.\t.$password.\t.$pw_from_db.\t.</p>";
            
            
            
            if ($password == $pw_from_db){
            $login_success = "<p style = 'color:green;'>Login successful!</p>";
            // sleep(2);
            // save some user info
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['othernames'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['phone_number'] = $user['phone_number'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['userpassword'];
            
            // Redirect
            // header('Location: index.php');
            header( "refresh:1;url=index.php" );
            
            }
            else{
            $login_error =  "<p style = 'color:red;'>Login unsuccessful</p>";
            }
            // free memory space for the result set
            mysqli_free_result($result);  
           }
          // close db connection
          $dbconnect-> close();
        
    }
?>