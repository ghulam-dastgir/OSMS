<?php
include("../includes/config.php");
$sql = "DELETE FROM technition WHERE tech_id = {$_GET['id']}";
if(mysqli_query($conn,$sql)) {
    header("Location: technition.php");

} else {
    die("Delte Requister Query Failed");
}
?>