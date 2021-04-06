<?php
session_start();
include("../includes/header.php");
?>
    <title>Dashboard</title>
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
                <li class="nav-item"><a href="index.php" class="nav-link active"><i class="fa fa-tv mr-2"></i>Dashboard</a></li>
                <li class="nav-item"><a href="profile.php" class="nav-link"><i class="fa fa-user mr-2"></i>Proflie</a></li>
                <li class="nav-item"><a href="submit-requist.php" class="nav-link"><i class="fab fa-accessible-icon mr-2"></i>Submit Requit</a></li>
                <li class="nav-item"><a href="service-status.php" class="nav-link"><i class="fa fa-align-center mr-2"></i>Status</a></li>
                <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change Passowrd</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
            </nav>
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>
    <!-- Footer -->
<?php include("../includes/footer.php") ?>