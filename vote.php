<?php require 'header.php'?>

<?php
    //   create a variable to pick up session variable
//   $firstname = $_SESSION['firstname'];
//   $lastname = $_SESSION['lastname'];
  $user_id = $_SESSION['id'];
//   require ('my_functions.php');
  
  //pick user details from the phone
  if(isset($_POST['vote'])){    
        $vie_success = $vie_error = $error = $success = $row = '';
        $election_id = 1;
        $position_id= 0;

    // if(isset($president) || isset($vice_pres)){
        $president = $_POST['president'];
        $vice_pres= $_POST['vicepresident'];
        $SG= $_POST['SG'];
        $academics= $_POST['academics'];
        $sports= $_POST['sports'];
        $delegates= $_POST['delegates'];
        $social= $_POST['social'];
        $rep1= $_POST['rep1'];
        $rep2= $_POST['rep2'];
        $rep3= $_POST['rep3'];
        $rep4= $_POST['rep4'];
        $rep5= $_POST['rep5'];
        $rep6= $_POST['rep6'];
        // $vie_success = "<p style = 'color:green;'>Registration as a candidate successful!</p>";
        // $vie_error =  "<p style = 'color:red;'>Registration as a candidate unsuccessful</p>";
    
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
                        // check if they are integers
                        
                            
                        // SAVE DATA OF USER TO CANDIDATE TABLE
                            $sql = "INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $president, 1, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $vice_pres, 2, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $SG, 3, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $academics, 4, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $sports, 5, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $delegates, 6, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $social, 7, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $rep1, 8, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $rep2, 9, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $rep3, 10, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $rep4, 11, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $rep5, 12, $election_id); INSERT INTO vote(user_id, candidate_id, position_id, election_id) VALUES($user_id, $rep6, 13, $election_id);";
                            // $sql .= "INSERT INTO vote(user_id, candidate_id, election_id) VALUES($user_id, $vice_pres, $election_id)";
                            if (mysqli_multi_query($dbconnect, $sql)===TRUE){
                                $vote_success = "<p style = 'color:green;'>You, have voted successfully!</p>";
                                // header("Location: index.php");
                                // mysqli_multi_query($con, $sql)
    
                                // echo "<p style = 'color:white;'> $firstname     $lastname    $election_id   $position_id    $user_id</p>";
    
                            }
                            else{
                                $vote_error = "<p style = 'color: red;'>Error: ".$dbconnect->error."</p>";
                            }
                        }
                    }

    // }
    else {
        // $vote_error =  "<p style='color: red; font-size: 50px;'>null!</p>";
    }
    
    // $dbconnect-> close();

?>
<?php require 'position_functions.php'; ?>

<!-- Presidents area Start-->
    <div class="breadcome-area">
        <?php
            $position_array = position(1);
            $position_id = $position_array[0];
            $position = $position_array[1];
            $election_id = 1;

        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="icon nalika-new-file"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2><?php echo $position; ?></h2>
                                        <p>Vote for your prefered <?php echo $position; ?>ial candidate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-new-list-area">
        <div class="container-fluid">
            <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="voteForm">
            <?php
                require ('loggedin_db_connect.php');
                $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
                // SELECT * FROM `election` WHERE active = 1;
                // Step 2 - execute the sql statement using the mysqli_query()
                $result = mysqli_query($dbconnect, $sql_retrieve);
                // Step 3 - Fetch the results using mysqli_fetch
            //loop for the number of presidents vying
                $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


                foreach($presidents as $president){ 
                    $user_id = $president['user_id'];
                    $candidate_id = $president['id'];
                    $user_sql = "SELECT * FROM user WHERE id = $user_id";
                    $user_result = mysqli_query($dbconnect, $user_sql);
                    $user_details = mysqli_fetch_assoc($user_result);
                    
                    $first_name = $user_details['firstname'];
                    $last_name = $user_details['othernames'];
                    $image = $user_details['images'];
                ?>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                    <div class="single-new-trend mg-t-30">
                        <a href="#"><img src="Brenda.jpg" alt=""></a>
                        <div class="overlay-content">
                            <!-- <a href=""> -->
                            <span><h1><?php echo $position;?></h1></span>
                            <br>
                            <br>
                            <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                            <!-- </a> -->
                            <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                            
                            <!-- <a class="pro-tlt" href="#"> -->
                            <!-- </a> -->
                            <div class="pro-rating">
                                <input type ="radio" name = 'president' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                               
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            // $dbconnect-> close();
            ?>
            <!-- </form>     -->
            </div>
        </div>
    </div>
<!-- President Area End -->

<!-- Vice President Area Start-->
<div class="breadcome-area">
        <?php
            $position_array = position(2);
            $position_id = $position_array[0];
            $position = $position_array[1];
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="icon nalika-new-file"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2><?php echo $position; ?></h2>
                                        <p>Vote for your prefered <?php echo $position; ?>ial candidate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-new-list-area">
        <div class="container-fluid">
            <div class="row">
            <?php
                require ('loggedin_db_connect.php');
                $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
                // SELECT * FROM `election` WHERE active = 1;
                // Step 2 - execute the sql statement using the mysqli_query()
                $result = mysqli_query($dbconnect, $sql_retrieve);
                // Step 3 - Fetch the results using mysqli_fetch
            //loop for the number of presidents vying
                $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


                foreach($presidents as $president){ 
                    $user_id = $president['user_id'];
                    $candidate_id = $president['id'];
                    $user_sql = "SELECT * FROM user WHERE id = $user_id";
                    $user_result = mysqli_query($dbconnect, $user_sql);
                    $user_details = mysqli_fetch_assoc($user_result);
                    
                    $first_name = $user_details['firstname'];
                    $last_name = $user_details['othernames'];
                    $image = $user_details['images'];
                ?>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                    <div class="single-new-trend mg-t-30">
                        <a href="#"><img src="Brenda.jpg" alt=""></a>
                        <div class="overlay-content">
                            <!-- <a href=""> -->
                            <span><h1><?php echo $position;?></h1></span>
                            <br>
                            <br>
                            <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                            <!-- </a> -->
                            <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                            
                            <!-- <a class="pro-tlt" href="#"> -->
                            <!-- </a> -->
                            <div class="pro-rating">
                                <input type ="radio" name = 'vicepresident' value = '<?php echo $candidate_id?>' required style="width :30px; height:30px; cursor: pointer;"/>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            // $dbconnect-> close();
            ?>
            <!-- </form>     -->
            </div>
        </div>
    </div>

<!-- Vice President Area End -->
<!-- SG Area Start -->

<div class="breadcome-area">
    <?php
        $position_array = position(3);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'SG' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>

<!-- SG Area End -->

<!-- Academics Area Start -->

<div class="breadcome-area">
    <?php
        $position_array = position(4);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'academics' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>

<!-- Academics Area End -->
<!-- Sports Area Start -->
<div class="breadcome-area">
    <?php
        $position_array = position(5);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'sports' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>

<!-- Sports Area End -->
<!-- Delegates Area Start -->

<div class="breadcome-area">
    <?php
        $position_array = position(6);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'delegates' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>

<!-- Delegates Area End -->

<!-- social welfare start -->

<div class="breadcome-area">
    <?php
        $position_array = position(7);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <!-- <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="votePresidentForm"> -->
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'social' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>

<!-- social welfare end -->

<!-- Faculty Reps Area Start -->
<div class="breadcome-area">
    <?php
        $position_array = position(8);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'rep1' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>


<div class="breadcome-area">
    <?php
        $position_array = position(9);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'rep2' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>


<div class="breadcome-area">
    <?php
        $position_array = position(10);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'rep3' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>


<div class="breadcome-area">
    <?php
        $position_array = position(11);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'rep4' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>


<div class="breadcome-area">
    <?php
        $position_array = position(12);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'rep5' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>
        <!-- </form>     -->
        </div>
    </div>
</div>


<div class="breadcome-area">
    <?php
        $position_array = position(13);
        $position_id = $position_array[0];
        $position = $position_array[1];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-new-file"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?php echo $position; ?></h2>
                                    <p>Vote for your prefered <?php echo $position; ?> candidate</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-new-list-area">
    <div class="container-fluid">
        <div class="row">
        <?php
            require ('loggedin_db_connect.php');
            $sql_retrieve = "SELECT * FROM candidate WHERE position_id = $position_id AND election_id = 1";
            // SELECT * FROM `election` WHERE active = 1;
            // Step 2 - execute the sql statement using the mysqli_query()
            $result = mysqli_query($dbconnect, $sql_retrieve);
            // Step 3 - Fetch the results using mysqli_fetch
        //loop for the number of presidents vying
            $presidents = mysqli_fetch_all($result, MYSQLI_ASSOC);


            foreach($presidents as $president){ 
                $user_id = $president['user_id'];
                $candidate_id = $president['id'];
                $user_sql = "SELECT * FROM user WHERE id = $user_id";
                $user_result = mysqli_query($dbconnect, $user_sql);
                $user_details = mysqli_fetch_assoc($user_result);
                
                $first_name = $user_details['firstname'];
                $last_name = $user_details['othernames'];
                $image = $user_details['images'];
            ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style >
                <div class="single-new-trend mg-t-30">
                    <a href="#"><img src="Brenda.jpg" alt=""></a>
                    <div class="overlay-content">
                        <!-- <a href=""> -->
                        <span><h1><?php echo $position;?></h1></span>
                        <br>
                        <br>
                        <span><h4 style = "left: 5%;"><?php echo $first_name.' '. $last_name;?></h4></span>
                        <!-- </a> -->
                        <!-- <a href="#" class="btn-small">Mary Njeri</a> -->
                        
                        <!-- <a class="pro-tlt" href="#"> -->
                        <!-- </a> -->
                        <div class="pro-rating">
                            <input type ="radio" name = 'rep6' value = '<?php echo $candidate_id?>' style="width :30px; height:30px; cursor: pointer;" required/>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        // $dbconnect-> close();
        ?>

        </div>
    </div>
</div>
<!-- Faculty Reps Area End -->

<!-- submit button start -->
<div class="section-admin container-fluid">
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px; visibility: hidden;">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                        <h4 class="text-left text-uppercase"><b>Tax Deduction</b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="text-left col-xs-3 mar-bot-15">
                                <label class="label bg-red">15% <i class="fa fa-level-down" aria-hidden=""></i></label>
                            </div>
                            <div class="col-xs-9 cus-gh-hd-pro">
                                <h2 class="text-right no-margin">5,000</h2>
                            </div>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px; visibility: hidden;">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                        <h4 class="text-left text-uppercase"><b>Tax Deduction</b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="text-left col-xs-3 mar-bot-15">
                                <label class="label bg-red">15% <i class="fa fa-level-down" aria-hidden=""></i></label>
                            </div>
                            <div class="col-xs-9 cus-gh-hd-pro">
                                <h2 class="text-right no-margin">5,000</h2>
                            </div>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px; visibility: hidden;">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                        <h4 class="text-left text-uppercase"><b>Tax Deduction</b></h4>
                        <div class="row vertical-center-box vertical-center-box-tablet">
                            <div class="text-left col-xs-3 mar-bot-15">
                                <label class="label bg-red">15% <i class="fa fa-level-down" aria-hidden=""></i></label>
                            </div>
                            <div class="col-xs-9 cus-gh-hd-pro">
                                <h2 class="text-right no-margin">5,000</h2>
                            </div>
                        </div>
                        <div class="progress progress-mini">
                            <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                        <!-- <h4 class="text-left text-uppercase label"><b> Click Vote to Finish</b></h4> -->
                            <input type="submit" class="btn btn-block btn-success" value= "SUBMIT YOUR VOTE" name = "vote" id = "vote">
                            <?php 
                                if(isset($vote_success)):
                                    echo "$vote_success";
                                endif;
                                if(isset($vote_error)):
                                echo $vote_error;
                                endif;
                            ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- submit button end -->
</form> 
<!-- form end -->
<?php require 'footer.php';?>