<?php
    
    $dbconnect = mysqli_connect('localhost', 'Tabitha', 'vote@2022', 'voting');
// function to sanitize user input data
function sanitize($data){
    global $dbconnect;
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($dbconnect, $data);
    return $data;
}
function my_time(){
    date_default_timezone_set('Africa/Nairobi');
    $date = date('d-m-y h:i:s');
    return $date;
}
?>