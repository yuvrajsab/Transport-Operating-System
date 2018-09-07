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
  <link rel="stylesheet" type="text/css" href="assets\css\main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <title>CUSTOMER LIST</title>
</head>

<body class="">
  <?php include_once "header.php" ?>

  <div class="container-fluid my-4">
    <h5 class="text-center text-uppercase mb-4">customer list</h5>
    <p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Search
    </button>
    </p>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Search Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="" action="customer_list.php" method="post">
              <div class="form-group">
                <label for="search_type">Search type *</label>
                <select class="custom-select" id="search_type" name="search_type" required>
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
              </div>
              <div class="form-group">
                <label for="search_text">Search text *</label>
                <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Enter value" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="search_btn" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="list" class="table-responsive">
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
          </tr>
        </thead>
        <tbody>
          <?php
            $query = NULL;

            if(isset($_POST['search_btn'])){
              $type = $_POST['search_type'];
              $text = $_POST['search_text'];
              if($type == 1){
                $query = "SELECT * FROM customer WHERE customer_id =".$text;
              }elseif($type == 2){
                $query = "SELECT * FROM customer WHERE customer_name LIKE '%".$text."%'";
              }elseif($type == 3){
                $query = "SELECT * FROM customer WHERE customer_address1 LIKE '%".$text."%' OR customer_address2 LIKE '%".$text."%' OR customer_address3 LIKE '%".$text."%'";
              }elseif($type == 4){
                $query = "SELECT * FROM customer WHERE customer_landmark LIKE '%".$text."%'";
              }elseif($type == 5){
                $query = "SELECT * FROM customer WHERE customer_city LIKE '%".$text."%'";
              }elseif($type == 6){
                $query = "SELECT * FROM customer WHERE customer_state LIKE '%".$text."%'";
              }elseif($type == 7){
                $query = "SELECT * FROM customer WHERE customer_country LIKE '%".$text."%'";
              }elseif($type == 8){
                $query = "SELECT * FROM customer WHERE customer_pin=".$text;
              }elseif($type == 9){
                $query = "SELECT * FROM customer WHERE customer_phone=".$text;
              }elseif($type == 10){
                $query = "SELECT * FROM customer WHERE customer_mobile=".$text;
              }elseif($type == 11){
                $query = "SELECT * FROM customer WHERE customer_email LIKE '%".$text."%'";
              }elseif($type == 12){
                $query = "SELECT * FROM customer WHERE customer_website LIKE '%".$text."%'";
              }elseif($type == 13){
                $query = "SELECT * FROM customer WHERE customer_gstin=".$text;
              }elseif($type == 14){
                $query = "SELECT * FROM customer WHERE customer_pan=".$text;
              }else{
                $query = "SELECT * FROM customer ORDER BY customer_id";
              }
            }else{
              $query = "SELECT * FROM customer ORDER BY customer_id";
            }

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
          </tr>
          <?php
              }
            }else{
              echo '<tr><td colspan="16">No record found</td></tr>';
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
    <form class="mb-3" method="post" action="export_customer.php">
      <div class="dropright">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      $('#search_type').change(function(){
        if($(this).val() == 1 || $(this).val() == 8 || $(this).val() == 9 || $(this).val() == 10 || $(this).val() == 13 || $(this).val() == 14){
          $('#search_text').prop('type','number');
        }else{
          $('#search_text').prop('type','text');
        }
      });
    });
  </script>
</body>

</html>
