<?php 
include 'db_config.php';
session_start();

$qn_id = $_POST['qn_id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tbl_answers WHERE qn_id='$qn_id' AND `time` >= NOW() - INTERVAL 5 SECOND AND `user_id`!='$user_id'";
$result = $db->query($sql);

// echo $result->num_rows;
$num =$result->num_rows;
if($num>0){
echo 'yes';
}


?>