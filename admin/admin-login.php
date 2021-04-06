<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Admin Login</title>
</head>

<body>
    <div class="container py-3" id="adminLogin">
        <div class="login-content text-center mb-3">
            <h3 class="text-primary font-weight-bold"><i class="fa fa-stethoscope mr-2"></i>Admin Lgin</h3>
            <h5 class="text-primary">(Admin Area)</h5>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-lg p-4 font-weight-bold">
                    <?php
                    if(isset($_POST['login'])) {
                        if(trim($_POST['aEmail']) == "" || trim($_POST['aPass']) == "") {
                            $err_msg = "<p class='text-danger font-weight-light'>All fields required</p>";
                        } else{
                            $admin_email = htmlentities(mysqli_real_escape_string($conn,$_POST['aEmail']));
                            $admin_pass = htmlentities(mysqli_real_escape_string($conn,sha1($_POST['aPass'])));
                            admin_login($conn,$admin_email,$admin_pass);
                        }
                    }

                    ?>
                    <form action="" method="POST">
                      <?php  if(isset($err_msg)) { echo $err_msg; }
                      if(isset($_SESSION['login_error'])) { echo $_SESSION['login_error']; }
                      ?>
                        <div class="form-group">
                            <label for="aEmail"><i class="fa fa-envelope mr-2"></i> Admin Email</label>
                            <input type="text" name="aEmail" id="aEmail" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="aPass"><i class="fa fa-key mr-2"></i> Admin Password</label>
                            <input type="password" name="aPass" id="aPass" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" value="Login" name="login" class="btn btn-lg btn-outline-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>