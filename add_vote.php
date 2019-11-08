<?php

include_once("db_config.php");
date_default_timezone_set("Asia/Colombo");
session_start();


$vote = $_GET['vote'];
$qn_id = $_GET['qn_id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tbl_questions WHERE `qn_id`='$qn_id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);


if($vote=='up'){
    $val = $row['upvote'] + 1;
    $query = "UPDATE tbl_questions SET `upvote` = '$val' WHERE `qn_id`='$qn_id'";
    $results = mysqli_query($db,$query);
    
    $sql1 = "SELECT * FROM tbl_marked_questions WHERE `qn_id` = '$qn_id' AND `user_id`='$user_id'";
    $result1 = mysqli_query($db, $sql1);

    if(mysqli_num_rows($result1)==0){
        $sql_voted = "INSERT INTO tbl_marked_questions (`qn_id`,`user_id`,`vote`) VALUES('$qn_id', '$user_id', 'up')";
        mysqli_query($db,$sql_voted);
    } else {
        $sql_voted = "UPDATE tbl_marked_questions SET `vote` = 'up' WHERE `qn_id`='$qn_id' AND `user_id`='$user_id'";
        mysqli_query($db,$sql_voted);
    }


}
else if($vote=='down'){
    $val = $row['downvote'] + 1;
    $query = "UPDATE tbl_questions SET `downvote` = '$val' WHERE `qn_id`='$qn_id'";
    $results = mysqli_query($db,$query);

    $sql1 = "SELECT * FROM tbl_marked_questions WHERE `qn_id` = '$qn_id' AND `user_id`='$user_id'";
    $result1 = mysqli_query($db, $sql);

    if(mysqli_num_rows($result1)==0){
        $sql_voted = "INSERT INTO tbl_marked_questions (`qn_id`,`user_id`,`vote`) VALUES('$qn_id', '$user_id', 'down')";
        mysqli_query($db,$sql_voted);
    } else {
        $sql_voted = "UPDATE tbl_marked_questions SET `vote` = 'down' WHERE `qn_id`='$qn_id' AND `user_id`='$user_id'";
        mysqli_query($db,$sql_voted);
    }

}


header('location: browse_questions.php');