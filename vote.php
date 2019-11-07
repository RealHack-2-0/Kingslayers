<?php

$vote = $_GET['vote'];
$qn_id = $_GET['qn_id'];

$sql = "SELECT * FROM tbl_questions WHERE `qn_id`='$qn_id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);


if($vote=='up'){
    $val = $row['upvote'] + 1;
    $query = "INSERT INTO tbl_questions (`upvote`) VALUES('$val')";
    $results = mysqli_query($db,$query);
}
elseif($vote=='down'){
    $val = $row['downvote'] + 1;
    $query = "INSERT INTO tbl_questions (`downvote`) VALUES('$val')";
    $results = mysqli_query($db,$query);
}