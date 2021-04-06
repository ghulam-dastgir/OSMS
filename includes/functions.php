<!-- Check The requister already exists or not -->
<?php
function db_user($conn,$requisterEmail){
    $sql = "SELECT requister_email FROM requisters WHERE requister_email = '{$requisterEmail}'";
    $result = mysqli_query($conn,$sql) or die("Requister validation Query Failed: Select");
    if(mysqli_num_rows($result) > 0) {
        $Db_r_email = mysqli_fetch_assoc($result);
        return $Db_r_email['requister_email'];
    }
}
// Insert Record into Requister Table
function insert_requister_record($conn,$reqName,$reqEmail,$reqPass){
    $insert_req_record = "INSERT INTO requisters(requister_name,requister_email,requister_password) VALUES('{$reqName}','{$reqEmail}','{$reqPass}')";
    if(mysqli_query($conn,$insert_req_record)){
         header("Location: login.php");
    } else {
        die("Requister Insertion Record Query Failed");
    }
}
// Requister Login
function requister_log($conn,$reqEmail,$reqPass) {
    $req_login_sql = "SELECT requister_id, requister_name, requister_email FROM requisters WHERE requister_email = '{$reqEmail}' AND requister_password = '{$reqPass}'";
    $result = mysqli_query($conn,$req_login_sql) or die("Requiter Login Query Failed");
    if(mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['req-id'] = $row['requister_id'];
            $_SESSION['req-name'] = $row['requister_name'];
            $_SESSION['req-email'] = $row['requister_email'];
            header("Location: user/index.php");
        }
    } else {
        $_SESSION['login_error'] = "<p style='color: red;'>Email or password does not matched</p>";
        return $_SESSION['login_error'];
    }
}
////////////////////////////////////////// Requiter Dahsboard //////////////////////////////////////

// Update Requister Name/profile
function update_req_profile($conn,$reqName) {
       $update_req_pro_sql = "UPDATE requisters SET requister_name='{$reqName}' WHERE requister_email='{$_SESSION['req-email']}'";
       if(mysqli_query($conn,$update_req_pro_sql)) {
        header("Location: profile.php");
       } else {
           die("Update Requister Name Query Failed");
       }
}
// Update Requister Password
function update_req_pass($conn,$reqPass){
    $update_req_pass_sql = "UPDATE requisters SET requister_password='{$reqPass}' WHERE requister_email='{$_SESSION['req-email']}'";
    if(mysqli_query($conn,$update_req_pass_sql)) {
     header("Location: password.php");
    } else {
        die("Update Requister Password Query Failed");
    }
}
// Submit Requist 
function submit_requist($conn,$reqInfo,$reqDesc,$reqName,$reqAdd1,$reqAdd2,$reqCity,$state,$zip,$reqEmail,$mobile,$date){
    $reqInfo = htmlentities(mysqli_real_escape_string($conn,$reqInfo));
    $reqDesc = htmlentities(mysqli_real_escape_string($conn,$reqDesc));
    $reqName = htmlentities(mysqli_real_escape_string($conn,$reqName));
    $reqAdd1 = htmlentities(mysqli_real_escape_string($conn,$reqAdd1));
    $reqAdd2 = htmlentities(mysqli_real_escape_string($conn,$reqAdd2));
    $reqCity = htmlentities(mysqli_real_escape_string($conn,$reqCity));
    $state = htmlentities(mysqli_real_escape_string($conn,$state));
    $zip = htmlentities(mysqli_real_escape_string($conn,$zip));
    $reqEmail = htmlentities(mysqli_real_escape_string($conn,$reqEmail));
    $mobile = htmlentities(mysqli_real_escape_string($conn,$mobile));
    $date = htmlentities(mysqli_real_escape_string($conn,$date));
    $submit_req_sql = "INSERT INTO requist(r_info,r_desc,r_name,r_address1,r_address2,r_city,r_state,r_zip,r_email,r_mobile,r_date) VALUES('{$reqInfo}','{$reqDesc}','{$reqName}','{$reqAdd1}','{$reqAdd2}','{$reqCity}','{$state}',{$zip},'{$reqEmail}',{$mobile},'{$date}')";
    if(mysqli_query($conn,$submit_req_sql)) {
        $_SESSION['requist-id'] = mysqli_insert_id($conn);
        header("Location: submited-requist.php");
    } else{
        die("Submit Requist Query Failed");
    }
}
//////////////////////////////////////////// Admin Areal ////////////////////////////////////////////////

// Admin Login
function admin_login($conn,$adminEmail,$adminPass) {
    $admin_login_sql = "SELECT a_id, a_name, a_email FROM admin WHERE a_email = '{$adminEmail}' AND a_password = '{$adminPass}'";
    $result = mysqli_query($conn,$admin_login_sql) or die("Admin Login Query Failed");
    if(mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['a-id'] = $row['a_id'];
            $_SESSION['a-name'] = $row['a_name'];
            $_SESSION['a-email'] = $row['a_email'];
            header("Location: ../admin/index.php");
        }
    } else {
        $_SESSION['login_error'] = "<p style='color: red;'>Email or password does not matched</p>";
        return $_SESSION['login_error'];
    }
}
// Count Total Users
function total_users($conn) {
    $sql = "SELECT COUNT(*) AS total_users FROM requisters";
    $result = mysqli_query($conn,$sql) or die("Count User Query Failed");
    if(mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {
            $total_users = $row['total_users'];
        }
        return $total_users;
    }
}
// Count Total Users
function total_requists($conn) {
    $sql = "SELECT COUNT(*) AS total_requists FROM requist";
    $result = mysqli_query($conn,$sql) or die("Count User Query Failed");
    if(mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {
            $total_requists = $row['total_requists'];
        }
        return $total_requists;
    }
}
// Count Total Assign Work
function total_assign_work($conn) {
    $sql = "SELECT COUNT(*) AS total_assign_work FROM assigned_work";
    $result = mysqli_query($conn,$sql) or die("Count User Query Failed");
    if(mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {
            $total_assign_work = $row['total_assign_work'];
        }
        return $total_assign_work;
    }
}
// Update Admin Name/profile
function update_admin_profile($conn,$adminName) {
    $update_admin_pro_sql = "UPDATE admin SET a_name='{$adminName}' WHERE a_email='{$_SESSION['a-email']}'";
    if(mysqli_query($conn,$update_admin_pro_sql)) {
     header("Location: ../admin/profile.php");
    } else {
        die("Update Requister Name Query Failed");
    }
}
// Update Admin Password
function update_admin_pass($conn,$adminPass){
    $update_admin_pass_sql = "UPDATE admin SET a_password='{$adminPass}' WHERE a_email='{$_SESSION['a-email']}'";
    if(mysqli_query($conn,$update_admin_pass_sql)) {
     header("Location: ../admin/password.php");
    } else {
        die("Update Requister Password Query Failed");
    }
}
// Add Technition
function add_technition($conn,$techName,$techEmail,$techPhone){
        $techName = htmlentities(mysqli_real_escape_string($conn,$techName));
        $techEmail = htmlentities(mysqli_real_escape_string($conn,$techEmail));
        $techPhone = htmlentities(mysqli_real_escape_string($conn,$techPhone));
        $sql = "INSERT INTO technition(tech_name,tech_email,tech_phone) VALUES('{$techName}','{$techEmail}','{$techPhone}')";
        if(mysqli_query($conn,$sql)) {
            header("Location: ../admin/technition.php");
        } else {
            die("Add Technition Query Failed");
        }
}
// Update Technition
function update_tech($conn,$techName,$techPhone,$techId){
    $techName = htmlentities(mysqli_real_escape_string($conn,$techName));
    $techPhone = htmlentities(mysqli_real_escape_string($conn,$techPhone));
    $sql = "UPDATE technition SET tech_name ='{$techName}', tech_phone='{$techPhone}' WHERE tech_id = {$techId}";
    if(mysqli_query($conn,$sql)) {
        header("Location: ../admin/technition.php");
    } else {
        die("Add Technition Query Failed");
    }
}
// Assign Work
function assign_work($conn,$rId,$rInfo,$rDesc,$rName,$rAdd1,$rCity,$rState,$rZip,$rEmail,$rMobile,$assiDate,$techName){
    $rInfo = htmlentities(mysqli_real_escape_string($conn,$rInfo));
    $rDesc = htmlentities(mysqli_real_escape_string($conn,$rDesc));
    $sql = "INSERT INTO assigned_work(requist_id,requist_info,requist_desc,requister_name,requister_add1,requister_city,requister_state,requister_zip,requister_email,requister_mobile,assign_date,assign_tech) VALUES({$rId},'{$rInfo}','{$rDesc}','{$rName}','{$rAdd1}','{$rCity}','{$rState}',{$rZip},'{$rEmail}',{$rMobile},'{$assiDate}','{$techName}');";
$sql .= "DELETE FROM requist WHERE r_id ={$rId}";
if(mysqli_multi_query($conn,$sql)) {
    header("Location: ../admin/assigned-work.php");
} else {
    die("Assign Work in function query Failed");
}

}
?>