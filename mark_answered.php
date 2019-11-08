<?php 


include 'db_config.php';
session_start();

$qn_id = $_GET['qn_id'];
$user_id = $_SESSION['user_id'];

$update_query = "UPDATE tbl_questions SET `marked` = '1' WHERE `qn_id`='$qn_id'";
mysqli_query($db, $update_query);

header('location: browse_questions.php');

?>