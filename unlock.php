<?php
// start session
    session_start();
    // require ('retrieve.php');
    // session_unset();
    unset($_SESSION['password']);
    unset($_SESSION['lastname']);
    //redirect the user to the login page
    header('Location: lock.php');

?>

