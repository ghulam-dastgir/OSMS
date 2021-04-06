        <?php
        session_start();
        include("../includes/header.php");
        include("../includes/config.php");
        include("../includes/functions.php");
        ?>
        <title>Assigned Work</title>
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
        <li class="nav-item"><a href="requisters.php" class="nav-link"><i class="fa fa-users mr-2"></i>requisters</a>
        </li>
        <li class="nav-item"><a href="technition.php" class="nav-link"><i class="fa fa-star mr-2"></i>Technitions</a></li>
        <li class="nav-item"><a href="assigned-work.php" class="nav-link active"><i class="fa fa-trophy mr-2"></i>Assigned Work</a></li>
        <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a>
        </li>
        <li class="nav-item"><a href="logout.php" class="nav-link"><i
            class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
        </nav>
        </div>
        <div class="col-md-6 offset-md-1">
        <div class="jumbotron p-3 my-4">
        <h4 class="mb-3">Assigned Work</h4>
        <?php
        ///////////// Assign Work ///////////////

        $sql = "SELECT * FROM assigned_work LEFT JOIN technition ON assigned_work.assign_tech = technition.tech_id WHERE as_work_id = {$_GET['id']}";
        $result = mysqli_query($conn,$sql) or die("Select Requist Query Faield");
        if(mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="" method="POST">
        <div class="form-group">
        <label for="id">Assigned Work Id</label>
            <input type="text" name="id" id="id" value="<?php echo $row['as_work_id']; ?>" class="form-control" readonly>   
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="id">Requist Id</label>
            <input type="text" name="id" id="id" value="<?php echo $row['requist_id']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-md-4">
            <label for="info">Requist Information</label>
            <input type="text" name="info" id="pass" value="<?php echo $row['requist_info']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-md-4">
            <label for="desc">Requist Description</label>
            <input type="text" name="desc" id="desc" value="<?php echo $row['requist_desc']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row['requister_name']; ?>"class="form-control" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="address1">Address 1</label>
                <input type="text" name="address1" id="address1" value="<?php echo $row['requister_add1']; ?>"class="form-control" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" name="city" id="city" value="<?php echo $row['requister_city']; ?>"class="form-control" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <input type="text" name="state" id="state" value="<?php echo $row['requister_state']; ?>"class="form-control" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="zip">Zip</label>
                <input type="text" name="zip" id="zip" value="<?php echo $row['requister_zip']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['requister_email']; ?>"class="form-control" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" id="mobile" value="<?php echo $row['requister_mobile']; ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="date">Assign Date</label>
                <input type="text" name="adate" id="date"  value="<?php echo $row['assign_date']; ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="date">Terchnetion</label>
            <input type="text" name="adate" id="date"  value="<?php echo $row['tech_name']; ?>" class="form-control" readonly>
        </div>
        <input type="submit" value="Print" name="update" onClick="window.print()" class="up-case btn btn-primary">
        </form>
        <?php } } ?>
        </div>
        </div>
        </div>
        </div>
        <?php include("../includes/footer.php") ?>