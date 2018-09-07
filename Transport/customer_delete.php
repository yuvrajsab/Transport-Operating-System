<?php
  require "db_conn.php";
  if(mysqli_connect_errno()){
    echo mysqli_connect_error();
  }

  if(isset($_POST['deleteid'])){
    $id = $_POST['deleteid'];
    $query = "DELETE FROM custome WHERE customer_id=".$id;
    if(mysqli_query($conn,$query)){
      echo "customer deleted";
    }else{
      echo mysqli_error();
    }
  }

  // if(isset($_POST['deletebtn'])){
  //   $query = "DELETE FROM customer WHERE customer_id=".$_POST['deletebtn'];
  //   if(mysqli_query($conn,$query)){
  //     echo "deleted";
  //   }
  // }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets\css\main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>CUSTOMER DELETE</title>
</head>

<body class="">
  <?php include_once "header.php" ?>

  <div class="container-fluid my-4">
    <h5 class="text-center text-uppercase mb-4">delete customer</h5>
    <form class="form-inline" method="post" action="customer_delete.php">
      <select class="custom-select form-control mb-2 mr-sm-2" name="search_type" id="search_type" required>
        <option value="">Select Search type</option>
        <option value="1">ID</option>
        <option value="2">NAME</option>
        <option value="3">ADDRESS</option>
        <option value="4">LANDMARK</option>
        <option value="5">CITY</option>
        <option value="6">STATE</option>
        <option value="7">COUNTRY</option>
        <option value="8">ZIP CODE</option>
        <option value="9">PHONE</option>
        <option value="10">MOBILE</option>
        <option value="11">EMAIL</option>
        <option value="12">WEBSITE</option>
        <option value="13">GSTIN</option>
        <option value="14">PAN</option>
      </select>

      <input type="text" class="form-control mb-2 mr-sm-2" id="search_text" name="search_text" placeholder="Enter value" required>

      <button type="submit" class="btn btn-primary mb-2" name="search_btn">Search</button>
    </form>

    <div id="list" class="table-responsive my-3">
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
            <th scope="col">zip code</th>
            <th scope="col">phone</th>
            <th scope="col">mobile</th>
            <th scope="col">email</th>
            <th scope="col">website</th>
            <th scope="col">gstin</th>
            <th scope="col">pan</th>
            <!-- <th scope="col">edit</th> -->
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM customer ORDER BY customer_id";

            if($result = mysqli_query($conn,$query)){
              $rowcount=mysqli_num_rows($result);
              if($rowcount>0){
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
            <!-- <td><i class="material-icons">edit</i></td> -->
            <!-- <td><i class="material-icons">delete</i></td> -->
            <td><button type="button" onclick="deleteCustomer(<?php echo $row[0]; ?>);" class="btn btn-danger">Delete</button></td>
          </tr>
          <?php
              }
            }else{
              echo '<tr><td colspan="17">No record found</td></tr>';
            }
              mysqli_free_result($result);
            }else{
              echo mysqli_error();
            }
            mysqli_close($conn);
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.js"></script>
  <script src="bootstrap-4.1.3-dist/js/popper.js"></script>
  <script src="bootstrap-4.1.3-dist/js/bootstrap.js"></script>
  <script>
    $(function() {
      $('#search_type').change(function(){
        if($(this).val() == 1 || $(this).val() == 8 || $(this).val() == 9 || $(this).val() == 10 || $(this).val() == 13 || $(this).val() == 14){
          $('#search_text').prop('type','number');
        }else{
          $('#search_text').prop('type','text');
        }
      });

    });

      function deleteCustomer(deleteid){
        var confirm_status = confirm("Are you sure");
        if(confirm_status == true){
          $.ajax({
            url: "customer_delete.php",
            method: "post",
            data: {
              deleteid: deleteid
            },
            success: function(data,status){
              window.location.reload();
            }
          });
        }
      }

  </script>
</body>
</html>
