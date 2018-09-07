<?php
  require "db_conn.php";
  if(mysqli_connect_errno()){
    echo mysqli_connect_error();
  }
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

  <title>USER ENTRY</title>
</head>

<body class="">
  <?php include_once "header.php" ?>

  <div class="container">
    <?php
    if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $state = "";
      $city = $_POST['city'];
      $pin = $_POST['pin'];

      $getstate = "SELECT name FROM states WHERE id=".$_POST['state'];
      if($result=mysqli_query($conn,$getstate)){
        while ($row=mysqli_fetch_row($result)){
          $state .= $row[0];
        }
        mysqli_free_result($result);
      }

      $query = "INSERT INTO employees (employees_username,employees_password,employees_address,employees_city,employees_state,employees_zip_code,employees_email) VALUES('$username','$password','$address','$city','$state','$pin','$email')";
      if(mysqli_query($conn,$query)){
        echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
          <strong>$username</strong> successfully created.
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
      }else{
        $error = mysqli_error($conn);
        echo "<div class='alert alert-danger alert-dismissible fade show mt-2' role='alert'>
          <strong>Error: </strong> $error
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
      }
    }
    // mysqli_close($conn);
    ?>
    <form class="my-4" method="post" action="user_entry.php">
      <h5 class="text-center text-uppercase mb-4">create user</h5>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="username">Username *</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="password">Password *</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="confirm_password">Confirm Password *</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Retype password" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="address">Address *</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="state">State *</label>
            <select class="custom-select" id="state" name="state" required>
              <option value="">Select state</option>
              <?php
                $query = "SELECT id,name FROM states WHERE country_id='101'";
                if($result = mysqli_query($conn,$query)){
                  while($row=mysqli_fetch_row($result)){
                    ?>
                  <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
              <?php
                  }
                    mysqli_free_result($result);
                }
                mysqli_close($conn);
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="city">City *</label>
            <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="pin">Pin *</label>
            <input type="number" class="form-control" id="pin" placeholder="Enter pin" name="pin" required>
          </div>
        </div>
      </div>
      <div class="row my-2">
        <div class="col-sm text-center">
          <button name="submit" type="submit" class="btn btn-outline-primary w-25">Create</button>
        </div>
      </div>
    </form>
  </div>

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
