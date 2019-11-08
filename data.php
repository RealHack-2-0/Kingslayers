<?php 
include 'db_config.php';
session_start();

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tbl_answers INNER JOIN tbl_questions using (qn_id) WHERE tbl_answers.status='0' AND tbl_questions.user_id='$user_id' ORDER BY tbl_answers.ans_id DESC";
$result = $db->query($sql);

// echo $result->num_rows;

$output = '';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output .= '
        <li style="padding:0 10px;">
        <a href="#">
        <small><em>New Answer for "'.$row["heading"].'"</em></small>
        </a>
        </li>
        ';

        // echo "id: " . $row["ans_id"]. " - Notification: " . $row["description"];
    }
} else {
    // echo "0 results";
    $output .= '<li style="padding:0 10px;"><a class="text-bold text-italic">No Notifications Found</a></li>';
}

// echo $output;
$count = $result->num_rows;
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);

echo json_encode($data);
?>