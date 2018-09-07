<?php
  require "db_conn.php";

  if(mysqli_connect_errno()){
    echo mysqli_connect_error();
  }

  session_start();
  session_regenerate_id(true);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>SM EXPRESS - LOGIN</title>
</head>

<body class="bg-secondary">

  <div class="w-25 mx-auto my-5">
  <form class="bg-light p-3" method="post" action="login.php">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="uname" placeholder="Enter username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="pass" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
    <a class="text-muted" href="#">Forgot your password ?</a>
  </form>
  <?php
    if(isset($_POST['submit'])){
      $username = $_POST['uname'];
      $password = $_POST['pass'];

      $query = "SELECT employees_username FROM employees WHERE employees_username = '$username' AND employees_password = '$password' LIMIT 1";

      $result = mysqli_query($conn,$query);
      $rows = mysqli_num_rows($result);

      $error_msg = "<div class='alert alert-danger rounded-0' role='alert'>worng username or password</div>";

      if($rows == 1){
        $_SESSION['login_user'] = $username;
        date_default_timezone_set('Asia/Kolkata');
        $_SESSION['current_login_time'] = date('d-m-Y H:i:s');
        header("location: index.php");
        exit();
      }else{
        echo $error_msg;
      }
      mysqli_close($conn);
    }
  ?>
</div>

  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.js"></script>
  <script src="bootstrap-4.1.3-dist/js/popper.js"></script>
  <script src="bootstrap-4.1.3-dist/js/bootstrap.js"></script>

</body>
</html>
