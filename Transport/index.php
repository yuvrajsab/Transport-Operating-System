<?php require "db_conn.php"; ?>
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

  <title>SM EXPRESS</title>
</head>
<body class="">
  <?php include_once "header.php"; ?>

  <h3 class="text-center mt-4">WELCOME <?php echo $_SESSION['login_user']; ?></h3>
  <p>session id: <?php echo session_id(); ?></p>

  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.js"></script>
  <script src="bootstrap-4.1.3-dist/js/popper.js"></script>
  <script src="bootstrap-4.1.3-dist/js/bootstrap.js"></script>
  <script>
    $(function(){

    });
  </script>
</body>

</html>
