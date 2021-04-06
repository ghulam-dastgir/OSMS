<?php
session_start();
include("../includes/header.php");
include("../includes/config.php");
include("../includes/functions.php");
?>
<title>Technitions</title>
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
    <li class="nav-item"><a href="requists.php" class="nav-link"><i
                class="fab fa-accessible-icon mr-2"></i>Requists</a></li>
    <li class="nav-item"><a href="requisters.php" class="nav-link"><i
                class="fa fa-users mr-2"></i>Requisters</a>
    </li>
    <li class="nav-item"><a href="technition.php" class="nav-link active"><i class="fa fa-star mr-2"></i>Technitions</a></li>
    <li class="nav-item"><a href="assigned-work.php" class="nav-link"><i class="fa fa-trophy mr-2"></i>Assigned Work</a></li>
    <li class="nav-item"><a href="password.php" class="nav-link"><i class="fa fa-key mr-2"></i>Change
            Passowrd</a>
    </li>
    <li class="nav-item"><a href="logout.php" class="nav-link"><i
                class="fa fa-sign-out-alt mr-2"></i>Logout</a></li>
</nav>
</div>
<div class="col-md-9">
<div class="card shadow-lg mt-5">
    <div class="bg-primary text-white p-2">
        <h4 class="float-left">Total Technitions</h4>
        <a href="add-technition.php" class="btn btn-dark float-right up-case">Add Technition</a>
    </div>
    <div class="table-responsive mt-4 p-3">
        <?php 
        if(isset($_GET['page'])) {
                $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM technition ORDER BY tech_id DESC LIMIT $offset, $limit";
        $result = mysqli_query($conn,$sql) or die("Query Faield : Select");
        if(mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-striped table-sm table-bordered text-center">
            <thead>
                <tr class="up-case">
                    <th class="font-weight-bold">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="font-weight-bold"><?php echo $row['tech_id']; ?></td>
                    <td><?php echo $row['tech_name']; ?></td>
                    <td><?php echo $row['tech_email']; ?></td>
                    <td><?php echo $row['tech_phone']; ?></td>
                    <td><a href="edit-technition.php?id=<?php echo $row['tech_id'];  ?>" class="btn btn-sm text-primary">Edit</a>
                    <a href="delete-technition.php?id=<?php echo $row['tech_id']; ?>" class="btn btn-sm text-danger">Delte</a>
                    </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        <?php } else { echo die("<p class='text-warning'>No Record</p>"); } ?>
        <!-- Paggination -->
        <nav>
            <?php
            $pag_sql = "SELECT tech_id FROM technition";
            $pag_result = mysqli_query($conn,$pag_sql) or die("Pagination Query Failed.");
            if(mysqli_num_rows($pag_result) > 0) {
                $total_records = mysqli_num_rows($pag_result);
                $total_page = ceil($total_records / $limit);
            }
            ?>
            <ul class="pagination justify-content-center">
                <?php if($page > 1) { ?>
                <li class="page-item"><a href="technition.php?page=<?php echo ($page - 1); ?>" class="page-link">Prev</a></li>
                <?php } for($i=1; $i<=$total_page; $i++) {
                    if($page == $i) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                ?>
                <li class="page-item <?php echo $active; ?>"><a href="technition.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php  } 
                if($total_page > $page) {
                ?>
                <li class="page-item"><a href="technition.php?page=<?php echo ($page + 1); ?>" class="page-link">Next</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
</div>
</div>
</div>
<?php include("../includes/footer.php") ?>