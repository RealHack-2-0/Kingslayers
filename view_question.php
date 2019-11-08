<?php 

include 'header.php';
  
$qn_id = $_GET['qn_id'];

?>

    
    <section class="questions" style="margin-top:50px;">
        <div class="container">
            <?php 
            $sql = "SELECT * FROM tbl_questions WHERE qn_id='$qn_id'";
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
                                <h5 class="card-title"><?php echo $row['heading']?></h5>
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

    <section class="questions" style="margin-top:50px;">
        <div class="container">
            <?php 
            $sql = "SELECT * FROM tbl_answers NATURAL JOIN tbl_users WHERE qn_id='$qn_id'";
            $result = mysqli_query($db, $sql);

            if(mysqli_num_rows($result)>0) {?>
            <span>Answers</span>
            <?php }
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="row" style="padding:10px 0;">
                <div class="card" style='width:100%;'>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="card-text"><?php echo $row['answer']?></p>
                                <p class="card-text" style="font-size:10px;"><?php echo 'Posted by '.$row['username']?></p>
                                <p class="card-text" style="font-size:10px;"><?php echo '@ '.$row['time']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    
    <section class="questions" style="margin-top:50px;">
        <div class="container">
            <div class="row">
                <form>
                    <div class="form-group">
                        <textarea class="form-control answer_content" name="answer_content" id="answer_content" rows="3" cols="100" required></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="button" name="add_ans" id="add_ans" class="btn btn-primary">Add Answer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <div class="toast" data-delay="5000" style="background:#ffebcc;">
  
  <div class="toast-body" style="color:red;">
    Someone submitted an answer just now!
  </div>
</div>

  <?php include 'footer.php'; ?>

<script>

var old_count = 0;
var qn_id = <?php echo $qn_id; ?>

$("#answer_content").keyup(function(){
// setInterval(function(){
    $.ajax({
        type : "POST",
        data:{qn_id:qn_id},
        url : "just_now_answer.php",
        success : function(data){
            // if (data >= old_count) {
                if(data=='yes'){
                    $('.toast').toast('show');
            //   alert('Someone submitted an answer just now!');
            //   old_count = data;
            }
        }
    });
// },1000);
});
</script>



</body>

</html>