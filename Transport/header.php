<?php
  session_start();

  if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    exit();
  }

  function logout(){
    session_destroy();
    header("location: login.php");
    exit();
  }
  if(isset($_POST['logout'])){
    logout();
  }
?>
<header class="" style="background: #0074D9">
  <div class="text-center text-light py-3 container">
    <h4 class="text-uppercase">transport operating system</h4>
    <p>User: <?php echo $_SESSION['login_user']; ?> | Login Time: <?php
    echo $_SESSION['current_login_time'];
    ?></p>
  </div>
</header>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand text-uppercase d-md-none d-sm-inline-block text-light">menu</a>
  <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
      <a class="nav-item nav-link active" href="index.php">Home</a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="consignmentnote" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consignment Note
        </a>
        <div class="dropdown-menu" aria-labelledby="consignmentnote">
          <a class="dropdown-item text-uppercase" href="consignment_entry.php">cn entry</a>
          <a class="dropdown-item text-uppercase" href="#">alter</a>
          <a class="dropdown-item text-uppercase" href="#">delete</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-uppercase" href="consignment_list.php">consignment list</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="customer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Customer
        </a>
        <div class="dropdown-menu" aria-labelledby="customer">
          <a class="dropdown-item text-uppercase" href="customer_entry.php">new customer</a>
          <a class="dropdown-item text-uppercase" href="#">alter</a>
          <a class="dropdown-item text-uppercase" href="customer_delete.php">delete</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-uppercase" href="customer_list.php">customer list</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="consigner" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consigner
        </a>
        <div class="dropdown-menu" aria-labelledby="consigner">
          <a class="dropdown-item text-uppercase" href="consigner_entry.php">new consigner</a>
          <a class="dropdown-item text-uppercase" href="#">alter</a>
          <a class="dropdown-item text-uppercase" href="#">delete</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-uppercase" href="consigner_list.php">consigner list</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="consignee" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consignee
        </a>
        <div class="dropdown-menu" aria-labelledby="consignee">
          <a class="dropdown-item text-uppercase" href="consignee_entry.php">new consignee</a>
          <a class="dropdown-item text-uppercase" href="#">alter</a>
          <a class="dropdown-item text-uppercase" href="#">delete</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-uppercase" href="consignee_list.php">consignee list</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="user">
          <a class="dropdown-item text-uppercase" href="user_entry.php">create user</a>
          <a class="dropdown-item text-uppercase" href="#">edit user</a>
          <a class="dropdown-item text-uppercase" href="#">delete user</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-uppercase" href="user_list.php">user list</a>
        </div>
      </li>
    </div>
    <form class="form-inline my-2 my-lg-0" method="post" action="header.php">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="logout">Logout</button>
    </form>
  </div>
</nav>
