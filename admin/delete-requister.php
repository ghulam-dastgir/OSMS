<?php
include("../includes/config.php");
$sql = "DELETE FROM requisters WHERE requister_id = {$_GET['id']}";
if(mysqli_query($conn,$sql)) {
    header("Location: requisters.php");

} else {
    die("Delte Requister Query Failed");
}
?>