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


    

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    jQuery(document).ready(function(){
        
        var qn_id = <?php echo $qn_id?>;

        jQuery("#add_ans").on('click',function(){
                
            var answer_content = $.trim($(".answer_content").val());
            if(answer_content!=''){
                $.ajax({
                    url:'add_answer.php',
                    data:'ans_content=' + answer_content + '&qn_id=' + qn_id,
                    success:function(msg){
                        if(msg=='success'){
                            load_unseen_notification();
                            location.reload();
                        } else {
                            alert('Unable to post answer!');
                        }
                    }
                });
            }else{
                alert('Enter an answer to post!')
            }
        });


        // updating the view with notifications using ajax
    //     function load_unseen_notification(view = '')
    //     {
    //         $.ajax({
    //         url:"fetch.php",
    //         method:"POST",
    //         data:{view:view},
    //         dataType:"json",
    //         success:function(data)
    //         {
    //         $('.dropdown-menu').html(data.notification);
    //         if(data.unseen_notification > 0)
    //             {
    //                 $('.count').html(data.unseen_notification);
    //             }
    //         }
    //     });
    //     }

    //     load_unseen_notification();

    //     // load new notifications
    //     $(document).on('click', '.dropdown-toggle', function(){
    //     $('.count').html('');
    //     load_unseen_notification('yes');
    //     });
        
    //     setInterval(function(){
    //     load_unseen_notification();;
    //     }, 5000);
        
    // });

    function loadDoc() {
  

    setInterval(function(){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("dropdown_menu").innerHTML = this.responseText;
        //  alert(this.responseText);
        }
    };
    xhttp.open("GET", "data.php?qn_id=<?php echo $qn_id; ?>", true);
    xhttp.send();

    },1000);


    }
    loadDoc();
  });

</script>


</body>

</html>