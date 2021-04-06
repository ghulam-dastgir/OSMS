<?php
include("../includes/config.php");
$sql = "DELETE FROM assigned_work WHERE as_work_id = {$_GET['id']}";
if(mysqli_query($conn,$sql)) {
    header("Location: assigned-work.php");
} else {
    die("Delte Requister Query Failed");
}
?>