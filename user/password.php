<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Change Password</title>
</head>

<body>
    <!-- Headedr => Starts -->
    <header class="p-4 bg-light shadow-lg d-print-none">
        <h3 class="text-primary float-left up-case"><a href="index.php">Shaheen Sound System</a></h3>
        <h5 class="float-right text-cap"><small><?php if(isset($_SESSION['req-name'])) echo   $_SESSION['req-name']; ?></small></h5>
    </header>
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
                    <li class="nav-item"><a href="submit-requist.php" class="nav-link"><i class="fab fa-accessible-icon mr-2"></i>Submit
                            Requit</a></li>
                    <li class="nav-item"><a href="service-status.php" class="nav-link"><i class="fa fa-align-center mr-2"></i>Status</a>
                    </li>
                    <li class="nav-item"><a href="password.php" class="nav-link active"><i class="fa fa-key mr-2"></i>Change Passowrd</a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg p-3 mx-2 mt-5">
                    <h4>Update password</h4>
                    <?php
                    if(isset($_POST['update'])){
                        if(trim($_POST['Rpass']) == "") {
                            $error_msg = "<p class='text-danger'>All fields requisred.</p>";
                        } elseif(strlen($_POST['Rpass']) < 5 || strlen($_POST['Rpass']) > 15){
                            $error_msg = "<p class='text-danger'>Password too small or large.</p>";
                        }
                        else{
                            $reqPass = htmlentities(mysqli_real_escape_string($conn,sha1($_POST['Rpass'])));
                            if(update_req_pass($conn,$reqPass) == true) {
                                $error_msg = "<p class='text-success'>Updated Successfully.</p>";
                            } else {
                                return false;
                            }
                        }
                    } 
                    ?>
                    <form action="" method="POST">
                    <?php if(isset($error_msg)) { echo $error_msg; } ?>
                        <div class="form-group">
                            <input type="password" name="Rpass" id="pass" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="Remail" id="email" value="<?php echo   $_SESSION['req-email']; ?>"
                                class="form-control" disabled>
                        </div>
                        <input type="submit" value="Update" name="update" class="up-case btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>