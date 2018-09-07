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

  <title>USER LIST</title>
</head>

<body class="">
  <?php include_once "header.php" ?>

  <div class="container-fluid my-4">
    <h5 class="text-center text-uppercase mb-4">employee list</h5>
    <div id="list" class="table-responsive">
      <table class="table table-sm table-striped table-bordered">
        <thead class="thead-light">
          <tr class="text-uppercase">
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">address</th>
            <th scope="col">city</th>
            <th scope="col">state</th>
            <th scope="col">zip code</th>
            <th scope="col">email</th>
            <!-- <th scope="col">edit</th>
            <th scope="col">delete</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM employees ORDER BY employees_id DESC";

            if($result = mysqli_query($conn,$query)){
              while($row = mysqli_fetch_row($result)){
              ?>
          <tr>
            <th scope="row"><?php echo $row[0]; ?></th>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <!-- <td><i class="material-icons">edit</i></td>
            <td><i class="material-icons">delete</i></td> -->
          </tr>
          <?php
              }
              mysqli_free_result($result);
            }
            mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>
    <form class="" method="post" action="">
      <div class="btn-group dropright">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Export
        </button>
        <div class="dropdown-menu" aria-labelledby="export">
          <button class="dropdown-item" type="submit" name="exportxls">xls</button>
          <button class="dropdown-item" type="submit" name="exportcsv">cvs</button>
          <button class="dropdown-item" type="submit" name="exportpdf">pdf</button>
          <button class="dropdown-item" type="submit" name="exportdoc">doc</button>
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
    $(function() {

    });
  </script>
</body>

</html>
