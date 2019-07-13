<?php
 include 'config/config.php'; 
 include 'lib/Database.php';
 include 'lib/Session.php';
 Session::init();
 include 'helpers/Formate.php';
 
 $db = new Database();
 $fm = new Formate();
 
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Change Password Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="assets/css/login.css" type="text/css" media="all">

  
</head>

<body>

  
<div class="container">
  
  <form action="" method="post" class="register">
    <div class="row">
      <h4>Change Password</h4>
       <div class="input-group input-group-icon">
        <input type="email" name="email" placeholder="Enter Your Email"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
    <p class="form-row">
      <input type="submit" class="button" name="submit" value="Submit">
    </p>
    </div>
  </form>
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>

</html>
