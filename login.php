<?php 

include_once("header.php");


if(!isset($_SESSION['username'])){
  $email="";
  $password="";

  if (isset($_POST['login'])) {

      $email = stripslashes($_POST['email']);
      $password = stripslashes($_POST['password']);

      $password = md5($password);
      
      $query = "SELECT * FROM tbl_users WHERE `email` = '$email' AND `password` = '$password'";
      $results = mysqli_query($db,$query);
      
      if (mysqli_num_rows($results)==1){

          $row = mysqli_fetch_array($results);

          // if($row['status']=="0"){
          //     $error = md5("activation_error");
          //     redirect("index.php?error=".$error);
          // }else{
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['username'] = $row['username'];
              
              // $id = time();
              // $user_id = $_SESSION['user_id'];
              // $login_time = date('Y-m-d H:i:s');
              // $ip_address = getUserIpAddress();
              
              // $sql_login = "INSERT INTO tbl_login_history VALUES ('$id','$user_id','$login_time','','$ip_address')";
              // mysqli_query($db,$sql_login);

              redirect("index.php");
          // }

      }else{
          $error = md5("username_password_error");
          redirect("login.php?error=".$error);
          
      }
  }
}

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
}

?>

    <section class="sign_up text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-5" style="display:block;margin:auto;">
                    <div style="margin-bottom:20px;">
                        <span class="text-center" style="font-size:22px;">Log In to your account in Kingslayers!</span>
                    </div>
                    <form class="sign_up_form" action="" method="post">

                        <?php if($error_msg!="") { ?>
                          <div class="form-group">
                              <?php
                              if($error_msg==md5("username_password_error"))
                              { ?>
                                  <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Incorrect Username or Password</label>
                              <?php
                              }
                              else if($error_msg==md5("activation_error"))
                              { ?>
                                  <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Your account is not activated yet!</label>
                              <?php
                              }
                              else
                              { ?>
                                  <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Could not Login to Account!</label>
                              <?php
                              }
                              ?>
                          </div>
                        <?php } ?>
                            
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The format should be user@something.XXX" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" name="login" class="btn btn-primary" style="width:100%" value="Log In">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>