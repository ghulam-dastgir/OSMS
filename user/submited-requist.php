<?php
session_start();
echo $_SESSION['requist-id'];
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
        <div class="row text-center">
           <div class="col-md-5 shadow-lg my-5 offset-lg-3 p-5">
               <h4 class="mb-3 text-primary">Requist Reciept</h4>
               <table class='table table-bordered table-sm text-center'>
                   <?php 
                   $sql = "SELECT * from requist WHERE r_id = {$_SESSION['requist-id']}";
                   $result = mysqli_query($conn,$sql) or die("Requist Select Query Failed");
                   ?>
                  <tbody>
                      <?php while($row=mysqli_fetch_assoc($result)) { ?>
                      <tr><th>Requist Id</th><td><?php echo $row['r_id']; ?></td></tr>
                      <tr><th>Requister Name</th><td><?php echo $row['r_name']; ?></td></tr>
                      <tr><th>Requister Address-1</th><td><?php echo $row['r_address1']; ?></td></tr>
                      <tr><th>Requister Address-2</th><td><?php echo $row['r_address2']; ?></td></tr>
                      <tr><th>Requister State</th><td><?php echo $row['r_state']; ?></td></tr>
                      <tr><th>Requister Zip</th><td><?php echo $row['r_zip']; ?></td></tr>
                      <tr><th>Requister Email</th><td><?php echo $row['r_email']; ?></td></tr>
                      <tr><th>Requister Mobile</th><td><?php echo $row['r_mobile']; ?></td></tr>
                      <tr><th>Requister Date</th><td><?php echo $row['r_date']; ?></td></tr>
                      <tr><th>Technecion Signture</th></tr>
                      <?php } ?>
                  </tbody>
               </table>
               <form action="" class='d-print-none'>
                   <input type="submit" value="Print" onClick="window.print()" class="btn btn-warning">
                   <a href="index.php" class="btn btn-dark">Home</a>
               </form>
           </div>
        </div>
    </div>
    <!-- Footer -->
<?php include("../includes/footer.php") ?>
