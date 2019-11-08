<?php 

include_once("db_config.php");
date_default_timezone_set("Asia/Colombo");
session_start();
include_once("bad_words.php");

$qn_id = $_GET['qn_id'];
$ans_content = $_GET['ans_content'];
$user_id = $_SESSION['user_id'];
$time = date('Y-m-d H:i:s');

if (check_badwords($ans_content)=='abused_failed_123'){
    echo "abused_failed";
} else {
    $sql_ans = "INSERT INTO tbl_answers (`qn_id`,`answer`,`user_id`, `time`,`status`) VALUES('$qn_id', '$ans_content', '$user_id', '$time','0')";
    if(mysqli_query($db,$sql_ans)){
        echo "success";
    }
    else{
        echo "failed";
    }
}


?>