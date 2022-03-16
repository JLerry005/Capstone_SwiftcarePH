<?php

  include 'user.php';
  include '../includes/connection.php';
  session_start();
  $user = new User($conn);
  $fullname = $user->user_fullname($_SESSION["user_id"]);

?>

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="../css/profile.css">
</head>
<nav id="scanfcode" class="navbar" style="cursor: pointer;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" id="toogle-button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
       <span class="glyphicon glyphicon-menu-hamburger"></span>                     
      </button>
      <a id="logo" class="navbar-brand" href="user_home.php">Lazashoppee</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
 
      <ul id="link" class="nav navbar-nav navbar-right">
        <li><a>Welcome back, <?= $fullname ?> </a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="mystore.php">My Store</a></li>
        <li><a id="logout_user">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


<script>
    $("#logout_user").click(function(){
        $.ajax({
            url: "validate.php",
            type: "POST",
            data:{function:"logout"},
            success:function(response){
                location.href = "../login.php";
            }
        });
    });
</script>
  