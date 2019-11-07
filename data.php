<?php 
include 'db_config.php';

$qn_id = $_GET['qn_id'];

$sql = "SELECT * FROM tbl_answers WHERE `status`='0' AND `qn_id`='$qn_id' ORDER BY ans_id DESC";
$result = $db->query($sql);

// echo $result->num_rows;

$output = '';

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output .= '
        <li style="padding:0 10px;">
        <a href="#">
        <small><em>'.$row["answer"].'</em></small>
        </a>
        </li>
        ';

        // echo "id: " . $row["ans_id"]. " - Notification: " . $row["description"];
    }
} else {
    // echo "0 results";
    $output .= '<li style="padding:0 10px;"><a class="text-bold text-italic">No Notifications Found</a></li>';
}

echo $output;
// $count = $result->num_rows;
// $data = array(
//    'notification' => $output,
//    'unseen_notification'  => $count
// );

// echo json_encode($data);
?>