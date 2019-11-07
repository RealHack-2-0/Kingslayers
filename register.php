<?php 

include_once("header.php");

$username="";
$password="";
$retype_password="";
$email="";

if (isset($_POST['signup'])) {
    $user_id = "USER".time();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $retype_password = $_POST['retype_password'];
    $email = $_POST['email'];
    $register_date = date('Y-m-d H:i:s');
    
    $query1 = "SELECT * FROM tbl_users WHERE username = '$username'";
    $results1 = mysqli_query($db,$query1);

    $query2 = "SELECT * FROM tbl_users WHERE email = '$email'";
    $results2 = mysqli_query($db,$query2);

    if (mysqli_num_rows($results1)==0) {
        if (mysqli_num_rows($results2)==0) {
            if ($password == $retype_password) {
                $password =md5($password);
                $query = "INSERT INTO tbl_users VALUES('$user_id','$username','$email','$password','$register_date')";
                mysqli_query($db, $query);
            
                redirect("register.php?success=saved");
            }
            else {
                redirect('register.php?error='.md5("password_error"));
            }
        }
        else {
            redirect('register.php?error='.md5("email_error"));
        }
    }
    else {
        if (mysqli_num_rows($results2)==0) {
            redirect('register.php?error='.md5("username_error"));
        }
        else {
            redirect('register.php?error='.md5("account_error"));
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
                        <span class="text-center" style="font-size:22px;">Create Your Free Account in Kingslayers!</span>
                    </div>
                    <form class="sign_up_form" action="" method="post">

                        <?php if($error_msg!="") { ?>
                            <div class="form-group">
                                <?php
                                if($error_msg==md5("username_error"))
                                { ?>
                                    <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Username already exists!</label>
                                <?php
                                }
                                else if($error_msg==md5("email_error"))
                                { ?>
                                    <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Email address already exists!</label>
                                <?php
                                }
                                else if($error_msg==md5("account_error"))
                                { ?>
                                    <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Account already exists!</label>
                                <?php
                                }
                                else if($error_msg==md5("password_error"))
                                { ?>
                                    <label class="control-label" for="inputError" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Passwords do not match!</label>
                                <?php
                                }
                                else
                                { ?>
                                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative;  float: none; color: red;">Could not register!</label>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        } 
                        
                        else if($success_msg!="") { ?>
                            <div class="form-group">
                                <?php
                                if($success_msg=="saved")
                                { ?>
                                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Signed-Up!</label>
                                <?php
                                } ?>
                            </div>
                        <?php } ?>
                            
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
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
                                <input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="Re-type Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" name="signup" class="btn btn-primary" style="width:100%" value="Sign Up">
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