<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
?>
    <title>Service Status</title>
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
            <div class="col-md-2 d-print-none">
            <nav class="nav flex-column bg-light shadow-lg py-2">
                <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-tv mr-2"></i>Dashboard</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><i class="fa fa-user mr-2"></i>Proflie</a></li>
                <li class="nav-item"><a href="submit-requist.php" class="nav-link"><i class="fab fa-accessible-icon mr-2"></i>Submit Requit</a></li>
                <li class="nav-item"><a href="service-status.php" class="nav-link active"><i class="fa fa-align-center mr-2"></i>Status</a></li>
                <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
            </nav>
            </div>
            <div class="col-md-6 mt-4">
                  <div class="card shadow-lg p-4 d-print-none">
                      <h5>Check Service Requist</h5>
                      <?php
                      if(isset($_POST['submit'])) {
                          if(trim($_POST['rId']) == "") {
                              $error_msg = "<p class='text-danger'>This field can't empty</p>";
                          } elseif(is_numeric($_POST['rId']) == false) {
                            $error_msg = "<p class='text-danger'>Please enter digits</p>";
                          } else {
                              $reQid = htmlentities(mysqli_real_escape_string($conn,$_POST['rId']));
                          $sql = "SELECT * FROM assigned_work JOIN technition ON assigned_work.assign_tech = technition.tech_id WHERE requist_id ={$reQid}";
                          $result = mysqli_query($conn,$sql) or die("Query Failed");
                          if(mysqli_num_rows($result) > 0) {
                           $error_msg ="<p class='text-success'>Successfully fetched</p>";
                          } else {
                              $error_msg = "<p class='text-danger'>Your Service on pending or id does not matched</p>";
                          }
                          }
                      }
                      ?>
                      <form action="" method="POST">
                    <?php if(isset($error_msg)) { echo $error_msg; } ?>
                        <div class="form-group">
                            <input type="text" name="rId" id="rId" class="form-control" placeholder="Enter Requist Id">
                        </div>
                        <input type="submit" value="Submit" name="submit" class="up-case btn btn-sm btn-primary">
                    </form>
                  </div>
                  <div class="get-service my-5 mx-4">
                    <?php
                    if(isset($result)) {
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {     ?>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Assign Work Id</th><td><?php echo $row['as_work_id']; ?></td>
                          </tr>
                          <tr>
                            <th>Requist Id</th><td><?php echo $row['requist_id']; ?></td>
                        </tr>
                        <tr>
                            <th>Requist Info</th><td><?php echo $row['requist_info']; ?></td>
                        </tr>
                        <tr>
                            <th>Requist Desc</th><td><?php echo $row['requist_desc']; ?></td>
                        </tr>
                        <tr>
                            <th>Requister Name</th><td><?php echo $row['requister_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Requister Address</th><td><?php echo $row['requister_add1']; ?></td>
                        </tr>
                        <tr>
                            <th>Requister City</th><td><?php echo $row['requister_city']; ?></td>
                        </tr>
                        <tr>
                            <th>Requister State</th><td><?php echo $row['requister_state']; ?></td>
                        </tr>
                        <tr>
                            <th>Requister Zip</th><td><?php echo $row['requister_zip']; ?></td>
                        </tr>
                        <tr>
                            <th>Requist Email</th><td><?php echo $row['requister_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Requister Mobile</th><td><?php echo $row['requister_mobile']; ?></td>
                        </tr>
                        <tr>
                            <th>Assign Date</th><td><?php echo $row['assign_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Technition Name</th><td><?php echo $row['tech_name']; ?></td>
                        </tr>
                      </thead>
                  </table>
                  <input type="submit" value="Print" Onclick="window.print()" class="btn btn-dark d-print-none">
                      <?php } } } ?>

                  </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
<?php include("../includes/footer.php") ?>