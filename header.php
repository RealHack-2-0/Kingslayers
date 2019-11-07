<?php
include_once("db_config.php");
date_default_timezone_set("Asia/Colombo");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kingslayers</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

  <!-- Custom styles of Team_Kingslayers -->
  <link href="css/style.css" rel="stylesheet">

  
  
</head>

<body class="bg-light">
  
<!-- Navigation -->
  <!-- <nav class="navbar navbar-light static-top" style="background:#f2f6fa;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Kingslayers</a>
      </div>
      <div style="float:right;">
        <?php if(!isset($_SESSION['username'])){?>
        <a class="btn btn-primary" href="login.php">Log In</a>
        <a class="btn btn-primary" href="register.php">Sign Up</a>
        <?php } else {?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
              <ul class="dropdown-menu"></ul>
            </li>
          </ul>
          <span style="padding:5px;"><?php echo $_SESSION['username']; ?></span>
          <a class="btn btn-primary" href="logout.php">LogOut</a>
        <?php } ?>
      </div>
    </div>
  </nav> -->

  <nav class="navbar navbar-expand-lg  navbar-light static-top" style="background:#f2f6fa;">
    <a class="navbar-brand" href="index.php">Kingslayers</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <?php if(!isset($_SESSION['username'])){?>
        <a class="btn btn-primary" href="login.php" style="margin-right:10px;">Log In</a>
        <a class="btn btn-primary" href="register.php">Sign Up</a>
        <?php } else {?>
          <ul class="navbar-nav"  style="padding-right:10px;">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge badge-pill badge-danger count" style="border-radius:10px;"></span> <i class="fa fa-bell" style="font-size:18px"></i></a>
              <ul class="dropdown-menu" id="dropdown_menu"></ul>
            </li>
          </ul>
          <span style="padding-right:10px;"><?php echo $_SESSION['username']; ?></span>
          <a class="btn btn-primary" href="logout.php">LogOut</a>
        <?php } ?>
      </form>
    </div>
  </nav>

  <?php
    function redirect($url){
        if (headers_sent()){
            die('<script type="text/javascript">window.location.href=' . $url . '</script>');
        }else{
            header('Location: ' . $url);
            die();
        }
    }
  ?>

  