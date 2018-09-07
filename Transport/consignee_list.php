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

  <title>CONSIGNEE LIST</title>
</head>

<body class="">
  <?php include_once "header.php" ?>

  <div class="container-fluid my-4">
    <h5 class="text-center text-uppercase mb-4">consignee list</h5>
    <div class="table-responsive">
      <table class="table table-sm table-striped table-bordered">
        <thead class="thead-light">
          <tr class="text-uppercase">
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">address1</th>
            <th scope="col">address2</th>
            <th scope="col">address3</th>
            <th scope="col">landmark</th>
            <th scope="col">city</th>
            <th scope="col">state</th>
            <th scope="col">country</th>
            <th scope="col">pin code</th>
            <th scope="col">phone</th>
            <th scope="col">mobile</th>
            <th scope="col">email</th>
            <th scope="col">website</th>
            <th scope="col">gstin</th>
            <th scope="col">pan</th>
            <!-- <th scope="col">edit</th>
            <th scope="col">delete</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM consignee ORDER BY consignee_id";

            if($result = mysqli_query($conn,$query)){
              while($row = mysqli_fetch_row($result)){
              ?>
          <tr>
            <th scope="row"><?php echo $row[0]; ?></th>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>
            <td><?php echo $row[8]; ?></td>
            <td><?php echo $row[9]; ?></td>
            <td><?php echo $row[10]; ?></td>
            <td><?php echo $row[11]; ?></td>
            <td><?php echo $row[12]; ?></td>
            <td><?php echo $row[13]; ?></td>
            <td><?php echo $row[14]; ?></td>
            <td><?php echo $row[15]; ?></td>
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
