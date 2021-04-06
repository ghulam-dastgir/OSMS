<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Assign Work</title>
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
                                <li class="nav-item"><a href="requists.php" class="nav-link active"><i class="fab fa-accessible-icon mr-2"></i>Requists</a></li>
                    <li class="nav-item"><a href="requisters.php" class="nav-link"><i class="fa fa-users mr-2"></i>requisters</a>
                    </li>
                    <li class="nav-item"><a href="technition.php" class="nav-link"><i class="fa fa-star mr-2"></i>Technitions</a></li>
                    <li class="nav-item"><a href="assigned-work.php" class="nav-link"><i class="fa fa-trophy mr-2"></i>Assigned Work</a></li>
                    <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
                </nav>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="jumbotron p-3 my-4">
                        <h4 class="mb-3">Assign Work</h4>
                        <?php
                        ///////////// Assign Work ///////////////
                        if(isset($_POST['update'])) {
                            if($_POST['adate'] == "" || $_POST['techName'] == "") {
                                $error_msg = "<p class='text-danger font-weight-bold'>All fields requisred </p>";
                            } else {
                                assign_work($conn,$_POST['id'],$_POST['info'],$_POST['desc'],$_POST['name'],$_POST['address1'],$_POST['city'],$_POST['state'],$_POST['zip'],$_POST['email'],$_POST['mobile'],$_POST['adate'],$_POST['techName']);
                            }
                        }
                        $sql = "SELECT * FROM requist WHERE r_id = {$_GET['id']}";
                        $result = mysqli_query($conn,$sql) or die("Select Requist Query Faield");
                        if(mysqli_num_rows($result)) {
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form action="" method="POST">
                        <?php if(isset($error_msg)) { echo $error_msg; } ?>
                        <div class="form-row">
                              <div class="form-group col-md-4">
                              <label for="id">Requist Id</label>
                                <input type="text" name="id" id="id" value="<?php echo $row['r_id']; ?>" class="form-control" readonly>
                              </div>
                              <div class="form-group col-md-4">
                              <label for="info">Requist Information</label>
                                <input type="text" name="info" id="pass" value="<?php echo $row['r_info']; ?>" class="form-control" readonly>
                              </div>
                              <div class="form-group col-md-4">
                              <label for="desc">Requist Description</label>
                                <input type="text" name="desc" id="desc" value="<?php echo $row['r_desc']; ?>" class="form-control" readonly>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="<?php echo $row['r_name']; ?>"class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address1">Address 1</label>
                                    <input type="text" name="address1" id="address1" value="<?php echo $row['r_address1']; ?>"class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" value="<?php echo $row['r_city']; ?>"class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" value="<?php echo $row['r_state']; ?>"class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="zip">Zip</label>
                                    <input type="text" name="zip" id="zip" value="<?php echo $row['r_zip']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="<?php echo $row['r_email']; ?>"class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" value="<?php echo $row['r_mobile']; ?>"class="form-control" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Assign Date</label>
                                    <input type="date" name="adate" id="date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date">Terchnetion</label>
                                <?php 
                                $sql1 = "SELECT tech_id, tech_name FROM technition";
                                $result1 = mysqli_query($conn,$sql1) or die("Technition Query Failed");
                                if(mysqli_num_rows($result1) > 0) {
                                ?>
                               <select name="techName" id="" class="form-control">
                               <?php while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                   <option value="<?php echo $row1['tech_id']; ?>"><?php echo $row1['tech_name']; ?></option>
                               <?php  } ?>
                               </select>
                                <?php } ?>
                            </div>
                            <input type="submit" value="Assign" name="update" class="up-case btn btn-primary">
                        </form>
                        <?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>