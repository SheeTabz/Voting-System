<?php require 'header.php'?>
<?php require 'position_functions.php'; ?>
<!-- presidents area start -->
<div class="breadcome-area">
        <?php
            $position_array = position(1);
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
                                        <p>Results for <?php echo $position; ?>ial candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="1.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- pres end -->
<!-- vicepresidents area start -->
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
                                        <p>Results for <?php echo $position; ?>ial candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="2.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- vicepres end -->
<!-- SG area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="3.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- SG end -->
<!-- academics area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- academics end -->
<!-- sports area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- sports end -->
<!-- delegate area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- delegate end -->
<!-- social area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id  AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- social end -->

<!-- rep1 area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- rep1 end -->
<!-- rep2 area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- rep2 end -->
<!-- rep3 area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- rep3 end -->
<!-- rep4 area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- rep4 end -->
<!-- rep5 area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- rep5 end -->
<!-- rep6 area start -->
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
                                        <p>Results for <?php echo $position; ?> candidates</p>
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
<div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                
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

                            $candidate_votes_sql = "SELECT * FROM vote WHERE candidate_id = $candidate_id AND election_id = 1";
                            $vote_query = mysqli_query($dbconnect, $candidate_votes_sql);

                            $position_votes_sql = "SELECT * FROM vote WHERE position_id = $position_id AND election_id = 1";
                            $total_position_votes_query = mysqli_query($dbconnect, $position_votes_sql);

                            $vote = mysqli_fetch_all($vote_query, MYSQLI_ASSOC);

                            $first_name = $user_details['firstname'];
                            $last_name = $user_details['othernames'];
                            $image = $user_details['images'];
                            $total_votes_per_candidate = (int)mysqli_num_rows($vote_query);
                            $total_votes_per_position = (int)mysqli_num_rows($total_position_votes_query);

                    ?>
                    <?php
                           $percentage = number_format((float)($total_votes_per_candidate/$total_votes_per_position)* 100, 2, '.', '');
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="Brenda.jpg" alt=""></a>
                        </div>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h1 class="text-uppercase" style="color: white;"><b><?php echo $first_name;?></b></h1>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                        <h1 class="" style="color: gold;"><?php echo $total_votes_per_candidate." "."votes";?></h1>
                                    <h4 class="" style="color: gold;"><?php echo $percentage." %";?></h4>

                                </div>
                                <div class="progress progress-mini">
                                    <div style="width:<?php echo $percentage;?>%;" class="progress-bar bg-blue">
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
        </div>
<!-- rep6 end -->
<?php require 'footer.php'?>