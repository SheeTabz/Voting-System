<?php
    require ('loggedin_db_connect.php');
    
    function position($position_number){
        global $dbconnect;
        $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_number AND election_id = 1";
        $result = mysqli_query($dbconnect, $sql_retrieve);
        $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $my_array = array();

        foreach($presidents as $president){ 
            $position_ID = $position_number;
            $position_sql = "SELECT * FROM position WHERE ID = $position_ID";
            $position_result = mysqli_query($dbconnect, $position_sql);
            $positon_details = mysqli_fetch_assoc($position_result);
            $position = $positon_details['name'];
            array_push($my_array,$position_ID, $position);

    }

    return $my_array;
    }
?>

<?php
    function photo(){
        
    }


?>