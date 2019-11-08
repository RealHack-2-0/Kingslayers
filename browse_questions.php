<?php 

include_once("header.php");

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
}

?>

    <section class="questions">
        <div class="container">
            <div class="row">
                    <!-- <div style="margin-bottom:20px;">
                        <span class="text-center" style="font-size:22px;">Log In to your account in Kingslayers!</span>
                    </div> -->
                    <a style="margin-top:50px;" href="add_question.php" class="btn btn-primary">Add Question</a>
                
            </div>
        </div>
    </section>

    
    <section class="questions" style="margin-top:50px;">
        <div class="container">
            <?php 
            $sql = "SELECT * FROM tbl_questions NATURAL JOIN tbl_users ORDER BY `qn_id` DESC";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="row" style="padding:10px 0;">
                <div class="card" style='width:100%;'>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="vote text-center">
                                    <?php
                                    $votes = $row['upvote'] - $row['downvote'];
                                    $qn_id = $row['qn_id'];
                                    $user_id = $_SESSION['user_id'];
                                    $sql_vote = "SELECT * FROM tbl_marked_questions WHERE `qn_id`='$qn_id' AND `user_id`='$user_id'";
                                    $result_vote = mysqli_query($db, $sql_vote);
                                    if($row['user_id']!=$user_id){
                                        
                                    ?>

                                    <a href="add_vote.php?vote=up&qn_id=<?php echo $row['qn_id'];?>" class="increment up btn btn-success 
                                        <?php if(mysqli_num_rows($result_vote)>0){
                                            $row_vote = mysqli_fetch_assoc($result_vote);
                                            if($row_vote['vote']=='up'){ echo 'disabled'; }
                                            }
                                            ?>" style="padding:5px;"><i class="fas fa-arrow-up"></i></a>
                                    <a href="add_vote.php?vote=down&qn_id=<?php echo $row['qn_id'];?>" class="increment down btn btn-danger
                                        <?php if(mysqli_num_rows($result_vote)>0){
                                            $row_vote = mysqli_fetch_assoc($result_vote);
                                            if($row_vote['vote']=='down'){ echo 'disabled'; }
                                            }
                                            ?>" style="padding:5px;"><i class="fas fa-arrow-down"></i></a>
                                    
                                    <?php } ?>

                                    <div class="count text-center" style="font-weight:bold; font-size:18px; background:#e6e4e1; margin-top:5px; border-radius:5px;"><?php echo $votes; ?></div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <a href="<?php echo 'view_question.php?qn_id='.$row['qn_id'];?>"><h5 class="card-title"><?php echo $row['heading']?></h5></a>
                                <p class="card-text"><?php echo $row['content']?></p>
                                <p class="card-text" style="font-size:10px;"><?php echo 'Posted by '.$row['username']?></p>
                                <p class="card-text" style="font-size:10px;"><?php echo '@ '.$row['time']?></p>
                            </div>
                            <div class="col-sm-1">
                                <div>
                                    <?php 
                                    if($row['marked']==0){
                                        if($row['user_id']==$_SESSION['user_id']){?>
                                            <a href="mark_answered.php?qn_id=<?php echo $row['qn_id'];?>" class="btn btn-danger mark_answered">Mark</a>
                                    <?php 
                                        }}
                                    else { ?>
                                        <span style='font-weight:bold;font-size:25px;color:green;'>&#10003;</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>


  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- <script>
  
  $(function(){
  $(".increment").click(function(){
    var count = parseInt($("~ .count", this).text());

    
    if($(this).hasClass("up")) {
      var count = count + 1;
      
       $("~ .count", this).text(count);
       $.ajax({
            url:'vote.php',
            data:'vote=up&qn_id='+qn_id,
            success:function(){
            }
        });
    } else {
      var count = count - 1;
       $("~ .count", this).text(count);
       $.ajax({
            url:'vote.php',
            data:'vote=down',
            success:function(){
            }
        });    
    }
    
    $(this).parent().addClass("bump");
    
    setTimeout(function(){
      $(this).parent().removeClass("bump");    
    }, 400);
  });
});

  </script> -->


<?php include 'footer.php'; ?>



</body>

</html>