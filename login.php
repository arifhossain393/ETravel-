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
  <title>Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="assets/css/login.css" type="text/css" media="all">

  
</head>

<body>

  
<div class="container">
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $fm->validation($_POST['username']);
            $password = $fm->validation(md5($_POST['password']));

            $username = mysqli_real_escape_string($db->link, $username);
            $password = mysqli_real_escape_string($db->link, $password);

            $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";

            $result = $db->select($query);

            if($result != false){
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);

               
                    Session::set("cuslogin", true);
                    Session::set("userId", $value['id']);
                    Session::set("name", $value['name']);
                    Session::set("username", $value['username']);
                    Session::set("email", $value['email']);
                    Session::set("phone", $value['phone']);
                    echo "<script>window.location = 'index.php';</script>";
                }else{
                echo "<span style='color:red;'>Username and password not match</span>";
            }
    }
?>
  <form action="" method="post" class="register">
    <div class="row">
      <h4>User Login</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="username" placeholder="User Name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" name="password" placeholder="Password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
    <p class="form-row">
      <input type="submit" class="button" name="submit" value="Login">
    </p>
    </div>
  </form>
  <a href="lost-pass.php" title="Lost your password?" class="lost-pass">Lost your password?</a>
  <a href="sign-up.php" title="Lost your password?" class="lost-pass">Create New Account</a>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>

</html>
