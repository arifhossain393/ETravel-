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
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="assets/css/login.css" type="text/css" media="all">

  
</head>

<body>

  
<div class="container">
<?php 
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $fm->validation($_POST['name']);
      $username = $fm->validation($_POST['username']);
      $email = $fm->validation($_POST['email']);
      $phone = $fm->validation($_POST['phone']);
      $password = $fm->validation(md5($_POST['password']));

      $name = mysqli_real_escape_string($db->link, $name);
      $username = mysqli_real_escape_string($db->link, $username);
      $email = mysqli_real_escape_string($db->link, $email);
      $phone = mysqli_real_escape_string($db->link, $phone);
      $password = mysqli_real_escape_string($db->link, $password);

      // form validation

      if (empty($name) || empty($username) || empty($email) || empty($phone) || empty($password)) {
          echo"<span style='color:red;'>Field must not be Empty!</span>";
      }
      else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        echo"<div class='alert alert-danger'><strong>Error!</strong> Name must only contain ulphanumirical, dashes and underscore.</div>";
      }
      else if(strlen($username) < 3){
        echo"<div class='alert alert-danger'>User Name Too much Short!!</div>";
      }
      else if(!preg_match("/^[a-zA-Z ]*$/",$username)){
        echo"<div class='alert alert-danger'><strong>Error!</strong> UserName must only contain ulphanumirical, dashes and underscore.</div>";
      }
       else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
        echo"<div class='alert alert-danger'><strong>Error !</strong>Invalide Email</div>";
      }
      else if(strlen($phone) < 10){
        echo"<div class='alert alert-danger'>Your Phone Number are not valid!!</div>";
      }else{
          $query = "INSERT INTO  tbl_user(name, username, email, phone, password ) VALUES('$name', '$username', '$email', '$phone', '$password')";
          $userinsert = $db->insert($query);

          if ($userinsert) {
             echo "<script>window.location = 'login.php';</script>";
          }else {
               echo "<script>window.location = 'login.php';</script>";
          }
      }
    }

  ?>

  <form action="" method="post" class="register">
    <div class="row">
      <h4>User Signup</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="name" placeholder="Full Name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="username" placeholder="User Name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" name="email" placeholder="Email Adress"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" name="phone" placeholder="Phone"/>
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" name="password" placeholder="Password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    <p class="form-row">
      <input type="submit" class="button" name="submit" value="Register">
    </p>
    </div>
    
    
   
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>

</html>
