<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Submit Requist</title>
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
                    <li class="nav-item"><a href="submit-requist.php" class="nav-link active"><i
                                class="fab fa-accessible-icon mr-2"></i>Submit
                            Requit</a></li>
                    <li class="nav-item"><a href="service-status.php" class="nav-link"><i class="fa fa-align-center mr-2"></i>Status</a>
                    </li>
                    <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change
                            Passowrd</a>
                    </li>
                    <li class="nav-item"><a href="logout.php" class="nav-link"><i
                                class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
                </nav>
            </div>
            <div class="col-md-9">
                <div class="card shadow-lg p-3 mx-2 my-5">
                    <h4 class='text-center mb-3'>Submit a Requist</h4>
                    <?php
        if(isset($_POST['submit'])) {
                    switch(true) {
                        case (trim($_POST['rInfo']) == "" || trim($_POST['rDesc']) == "" || trim($_POST['rName']) == "" || trim($_POST['rAdd1']) == "" || trim($_POST['rAdd2']) == "" || trim($_POST['rCity']) == "" || trim($_POST['rState']) == "" || trim($_POST['rZip']) == "" || trim($_POST['rEmail']) == "" || trim($_POST['rMobile']) == "" || trim($_POST['rDate']) == ""):
                            $error_msg="<p class='text-danger'>All fields Required</p>";
                            break;
                        case (strlen(trim($_POST['rInfo'])) < 10):
                            $error_msg="<p class='text-danger'>Requist Info too small</p>";
                        break;
                        case (strlen(trim($_POST['rDesc'])) < 15):
                            $error_msg="<p class='text-danger'>Requist Description too small</p>";
                        break;
                        case (strlen(trim($_POST['rName'])) < 10 || strlen(trim($_POST['rName'])) > 18):
                            $error_msg="<p class='text-danger'>Name too small or large</p>";
                        break;
                        case (strlen(trim($_POST['rAdd1'])) < 4 || strlen(trim($_POST['rAdd1'])) > 12):
                            $error_msg="<p class='text-danger'>Address 1 line  too small or large</p>";
                            case (strlen(trim($_POST['rAdd2'])) < 4 || strlen(trim($_POST['rAdd2'])) > 12):
                            $error_msg="<p class='text-danger'>Address 2 line  too small or larg</p>";
                            break;
                            case (strlen(trim($_POST['rCity'])) < 4 || strlen(trim($_POST['rCity'])) > 12):
                            $error_msg="<p class='text-danger'>City too small or larg</p>";
                            break;
                            case (strlen(trim($_POST['rState'])) < 4 || strlen(trim($_POST['rState'])) > 12):
                            $error_msg="<p class='text-danger'>State too small or larg</p>";
                            break;
                            case (strlen(trim($_POST['rZip'])) < 4 || strlen(trim($_POST['rZip'])) > 12):
                            $error_msg="<p class='text-danger'>Zip too small or larg</p>";
                            break;
                            case (strlen(trim($_POST['rEmail'])) < 16 || strlen(trim($_POST['rEmail'])) > 34):
                            $error_msg="<p class='text-danger'>Email too small or larg</p>";
                            break;
                            case (strlen(trim($_POST['rMobile'])) < 11 || strlen(trim($_POST['rMobile'])) > 11):
                            $error_msg="<p class='text-danger'>Mobile number must be of 11 digits</p>";
                            break;
                            case (is_numeric($_POST['rZip']) === false):
                            $error_msg="<p class='text-danger'>Zip code consits of digits</p>";
                            break;
                            case (is_numeric($_POST['rMobile']) === false):
                            $error_msg="<p class='text-danger'>Mobile consits of digits</p>";
                            break;
                        default:

                        submit_requist($conn,$_POST['rInfo'],$_POST['rDesc'],$_POST['rName'],$_POST['rAdd1'],$_POST['rAdd2'],$_POST['rCity'],$_POST['rState'],$_POST['rZip'],$_POST['rEmail'],$_POST['rMobile'],$_POST['rDate']);
                        $error_msg="<p class='text-success'>Successfully Submited</p>";
                    }
        }

        ?>
                    <form action="" method="POST" class="font-weight-bold">
                        <?php if(isset($error_msg)) { echo $error_msg; } ?>
                        <div class="form-group">
                            <label for="rInfo">Requist Information</label>
                            <input type="text" name="rInfo" id="rInfo" placeholder="Requist Information"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rDesc">Description</label>
                            <input type="text" name="rDesc" id="rDesc" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rName">Requister Name</label>
                            <input type="text" name="rName" id="rName" placeholder="Requister Name"
                                class="form-control">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="rAdd1">Address Line 1</label>
                                <input type="text" name="rAdd1" id="rAdd1" placeholder="Requister Address Line 1"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rAdd2">Address Line 2</label>
                                <input type="text" name="rAdd2" id="rAdd2" placeholder="Requister  Address Line 2"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="rCity">City</label>
                                <input type="text" name="rCity" id="rCity" placeholder="Requister City"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rState">State</label>
                                <input type="text" name="rState" id="rState" placeholder="Requister State"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rZip">Zip</label>
                                <input type="text" name="rZip" id="rZip" placeholder="Requister Zip Code"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="rEmail">Email</label>
                                <input type="email" name="rEmail" id="rEmail" placeholder="Requister Email"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rMobile">Mobile</label>
                                <input type="text" name="rMobile" id="rMobile" placeholder="Requister Mobile"
                                    class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rDate">Date</label>
                                <input type="date" name="rDate" id="rDate" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="Submit" name="submit" class="up-case btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php") ?>