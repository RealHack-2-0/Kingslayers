<?php

include 'db_config.php';
session_start();

$user_id = $_SESSION['user_id'];

$update_query = "UPDATE tbl_answers SET `status` = '1' WHERE `status`='0' AND `qn_id` IN (SELECT qn_id FROM tbl_questions WHERE `user_id` = '$user_id')";
mysqli_query($db, $update_query);

?>