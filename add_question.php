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

$heading="";
$content="";
$user_id="";

if(isset($_POST['add_qn'])){
    $heading=$_POST['heading'];
    $content=$_POST['content'];
    $user_id=$_SESSION['user_id'];

    $time = date('Y-m-d H:i:s');
    $query = "INSERT INTO tbl_questions (`user_id`,`heading`,`content`,`upvote`,`downvote`,`marked`,`time`) VALUES('$user_id','$heading','$content','0','0','0','$time')";
    $results = mysqli_query($db,$query);
      
}

?>

    <section class="questions">
        <div class="container">
            <div class="row">
                <form  action="" method="post">
                    <div class="form-group">
                        <label for="heading">Heading</label>
                        <input type="text" class="form-control" name="heading" id="heading" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Question</label>
                        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" name="add_qn" class="btn btn-primary" style="" value="Add Question">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>