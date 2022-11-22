<?php
    //   create a variable to pick up session variable
//   $firstname = $_SESSION['firstname'];
//   $lastname = $_SESSION['lastname'];
  $user_id = $_SESSION['id'];
//   require ('my_functions.php');
  
  //pick user details from the form
  if(isset($_POST['vote'])){    
        $vote_success = $vote_error = $error = $success = $row = '';
        $election_id = $position_id= 0;

    if (isset($president) || isset($vice_pres)) {
        $president = $_POST['president'];
        $vice_pres= $_POST['vicepresident'];
      
    
        require 'my_functions.php';
    
        // prevent crosssite scripting
          $president = (int)sanitize($president);
          $vice_pres = (int)sanitize($vice_pres);
    
        // check whether the student has already registered for this election
            // Step 1 - Write down the SQL statements
            $sql_retrieve = "SELECT * FROM vote WHERE user_id = $user_id AND election_id = $election_id";
            
            // Step 2 - execute the sql statement using the mysqli_query()
                $result = mysqli_query($dbconnect, $sql_retrieve);
                $row = mysqli_num_rows($result);
                    if ($row>0){
                        $vote_error = "<p style = 'color:red;'>You have already voted</p>";
                                // header("Location: index.php");
                    }
                    else{
                        // // SAVE DATA OF USER TO CANDIDATE TABLE
                            $sql = "INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $president, 1, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $vice_pres, 2, $election_id)";
                            // $sql .= "INSERT INTO vote(user_id, candidate_id, election_id) VALUES($user_id, $vice_pres, $election_id)";
                            if (mysqli_multi_query($dbconnect, $sql)===TRUE){
                                $vote_success = "<p style = 'color:green;'>You, have voted successfully!</p>";
                                // header("Location: index.php");
                                // mysqli_multi_query($con, $sql)
    
                                echo "<p style = 'color:red;'>  $election_id  $user_id</p>";
    
                            }
                            else{
                                $vote_error = "<p style = 'color: red;'>Error: ".$dbconnect->error."</p>";
                            }
                        }
                    }

    }
    else {
        return "<p style='color: red;'>null!</p>";
    }
    
    // $dbconnect-> close();

?>