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
            $sql = "SELECT * FROM tbl_questions ORDER BY `qn_id` DESC";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="row" style="padding:10px 0;">
                <div class="card" style='width:100%;'>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="vote">
                                    <button class="increment up">Up</button>
                                    <button class="increment down">Down</button>
                                    <?php $votes = $row['upvote'] - $row['downvote'];?>
                                    <div class="count"><?php echo $votes; ?></div>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <a href="<?php echo 'view_question.php?qn_id='.$row['qn_id']?>"><h5 class="card-title"><?php echo $row['heading']?></h5></a>
                                <p class="card-text"><?php echo $row['content']?></p>
                            </div>
                            <div class="col-sm-1">
                                <div class="vote roundrect">
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
  
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

  </script>

</body>

</html>