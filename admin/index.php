<?php
session_start();
include("../includes/config.php");
include("../includes/functions.php");
include("../includes/header.php");
?>
    <title>Admins Dashboard</title>
</head>
<body>
    <!-- Headedr => Starts -->
    <?php include("../includes/sub-header.php"); ?>
    <!-- Headedr => Ends -->
    <!-- Dahboard-Wrapper => Starts -->
    <div id="dashboar-wrapper">
        <div class="row">
            <div class="col-md-2">
            <nav class="nav flex-column bg-light shadow-lg py-2">
                <li class="nav-item"><a href="index.php" class="nav-link active"><i class="fa fa-tv mr-2"></i>Dashboard</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><i class="fa fa-user mr-2"></i>Proflie</a></li>
                <li class="nav-item"><a href="requists.php" class="nav-link"><i class="fab fa-accessible-icon mr-2"></i>Requists</a></li>
                <li class="nav-item"><a href="requisters.php" class="nav-link"><i class="fa fa-users mr-2"></i>Requisters</a></li>
                <li class="nav-item"><a href="technition.php" class="nav-link"><i class="fa fa-star mr-2"></i>Technitions</a></li>
                <li class="nav-item"><a href="assigned-work.php" class="nav-link"><i class="fa fa-trophy mr-2"></i>Assigned Work</a></li>
                <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
            </nav>
            </div>
            <div class="col-md-10">
                <div class="my-5 mr-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-light text-center">
                                <div class="card-header bg-light">
                                    <h5>Total Users/Requisters</h5>
                                </div>
                                <div class="card-body bg-light p-4">
                                         <div class="card-body-content rounded-circle">
                                              <a href="requisters.php"><p><?php echo total_users($conn); ?></p></a> 
                                         </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <a href="requisters.php" class="btn btn-light">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-dark text-center text-white">
                                <div class="card-header">
                                    <h5>Total Requists</h5>
                                </div>
                                <div class="card-body p-4">
                                         <div class="card-body-content rounded-circle">
                                              <a href="requists.php"><p class="text-white"><?php echo total_requists($conn); ?></p></a> 
                                         </div>
                                </div>
                                <div class="card-footer">
                                    <a href="requists.php" class="btn btn-dark text-white">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-primary text-center text-white">
                                <div class="card-header">
                                    <h5>Total Assigned Work</h5>
                                </div>
                                <div class="card-body p-4">
                                         <div class="card-body-content rounded-circle">
                                              <a href=""><p class="text-white"><?php echo total_assign_work($conn);  ?></p></a> 
                                         </div>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-primary text-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
<?php include("../includes/footer.php") ?>