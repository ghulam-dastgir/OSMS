<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Admin Proflie</title>
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
                    <li class="nav-item"><a href="profile.php" class="nav-link active"><i
                                class="fa fa-user mr-2"></i>Proflie</a></li>
                    <li class="nav-item"><a href="requists.php" class="nav-link"><i class="fab fa-accessible-icon mr-2"></i>Requists</a></li>
                    <li class="nav-item"><a href="requisters.php" class="nav-link"><i class="fa fa-users mr-2"></i>Requisters</a>
                    </li>
                    <li class="nav-item"><a href="technition.php" class="nav-link"><i class="fa fa-star mr-2"></i>Technitions</a></li>
                    <li class="nav-item"><a href="assigned-work.php" class="nav-link"><i class="fa fa-trophy mr-2"></i>Assigned Work</a></li>
                    <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg p-3 mx-2 mt-5">
                    <h4>Admin Proflie</h4>
                    <?php
                    if(isset($_POST['update'])) {
                        if(trim($_POST['Rname']) == "") {
                            $error_msg = "<p class='text-danger font-weight-light'>This can't empty</p>";
                        } elseif(trim(strlen($_POST['Rname'])) < 8 || trim(strlen($_POST['Rname'])) > 28) {
                            $error_msg = "<p class='text-danger font-weight-light'>Name too small or large</p>";
                        } else {
                            $adminName = htmlentities(mysqli_real_escape_string($conn,$_POST['Rname']));
                            update_admin_profile($conn,$adminName);
                        }
                    }
                    ?>
                    <form action="" method="POST">
                    <?php if(isset($error_msg)) { echo $error_msg; } ?>
                        <div class="form-group">
                            <input type="text" name="Rname" id="name" value="<?php echo $_SESSION['a-name']; ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Remail" id="email" value="<?php echo $_SESSION['a-email'];  ?>"
                                class="form-control" disabled>
                        </div>
                        <input type="submit" value="Update" name="update" class="up-case btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>