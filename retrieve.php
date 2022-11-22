<?php
// Step 1 - Write down the SQL statements
$sql_retrieve = "SELECT * FROM user WHERE email = '$email'";

// Step 2 - execute the sql statement using the mysqli_query()
$result = mysqli_query($dbconnect, $sql_retrieve);
// Step 3 - Fetch the results using mysqli_fetch

$user = mysqli_fetch_assoc($result);
// print_r($user);
    
//encrypt
$password = crypt("$password", "vote");

//save the password from database to a variable
$pw_from_db = $user['userpassword'];
// echo "<p style = 'color:white;'> $email.\t.$password.\t.$pw_from_db.\t.</p>";



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
  header( "refresh:1;url=index.php" );

  // header('Location: index.php');

}
else{
$login_error =  "<p style = 'color:red;'>Login unsuccessful</p>";
}
// free memory space for the result set
mysqli_free_result($result);
  
?>