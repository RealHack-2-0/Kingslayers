<?php
include('db_config.php');
if(isset($_POST['view'])){
   $qn_id=$_POST['qn_id'];
if($_POST["view"] != '')
{
   $update_query = "UPDATE tbl_answers SET status = 1 WHERE status=0";
   mysqli_query($con, $update_query);
}
$query = "SELECT * FROM tbl_answers ORDER BY ans_id DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["heading"].'</strong><br />
  <small><em>'.$row["answer"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM tbl_answers WHERE `status`=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>