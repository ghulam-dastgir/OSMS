<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Add Technition</title>
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
                    <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-tv mr-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><i
                                class="fa fa-user mr-2"></i>Proflie</a></li>
                    <li class="nav-item"><a href="requists.php" class="nav-link"><i class="fab fa-accessible-icon mr-2"></i>Requists</a></li>
                    <li class="nav-item"><a href="requisters.php" class="nav-link"><i class="fa fa-users mr-2"></i>Requisters</a>
                    </li>
                    <li class="nav-item"><a href="technition.php" class="nav-link active"><i class="fa fa-star mr-2"></i>Technitions</a></li>
                    <li class="nav-item"><a href="assigned-work.php" class="nav-link"><i class="fa fa-trophy mr-2"></i>Assigned Work</a></li>
                    <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
                </nav>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="card shadow-lg p-3 mx-2 mt-5">
                    <h4>Add New Technition</h4>
                    <?php
                    if(isset($_POST['add'])) {
                        if(trim($_POST['tname']) == "" || trim($_POST['tEmail']) == "" || trim($_POST['tMobile']) == "") {
                            $error_msg = "<p class='text-danger font-weight-light'>All fileds requisred</p>";
                        } elseif(trim(strlen($_POST['tname'])) < 6 || trim(strlen($_POST['tname'])) > 20) {
                            $error_msg = "<p class='text-danger font-weight-light'>Name too small or large</p>";
                        } elseif(trim(strlen($_POST['tEmail'])) < 15 || trim(strlen($_POST['tEmail'])) > 38) {
                            $error_msg = "<p class='text-danger font-weight-light'>Email too small or large</p>";
                        } elseif(trim(is_numeric($_POST['tMobile'])) == false){
                            $error_msg = "<p class='text-danger font-weight-light'>Please chose digits for phone</p>";
                        } elseif(trim(strlen($_POST['tMobile'])) < 11 || trim(strlen($_POST['tMobile'])) > 11) {
                            $error_msg = "<p class='text-danger font-weight-light'>Phone number consists of 11 digits</p>";
                        } else {
                            add_technition($conn,$_POST['tname'],$_POST['tEmail'],$_POST['tMobile']);
                        }
                    }
                    ?>
                    <form action="" method="POST">
                    <?php if(isset($error_msg)) { echo $error_msg; } ?>
                        <div class="form-group">
                            <label for="tname" class="font-weight-bold"><i class="fa fa-user mr-2"></i>Technition Name</label>
                            <input type="text" name="tname" id="tname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tEmail" class="font-weight-bold"><i class="fa fa-envelope mr-2"></i>Technition Email</label>
                            <input type="email" name="tEmail" id="tEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tMobile" class="font-weight-bold"><i class="fa fa-phone mr-2"></i>Technition Phone</label>
                            <input type="text" name="tMobile" id="tMobile" class="form-control">
                        </div>
                        <input type="submit" value="Add" name="add" class="up-case btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>