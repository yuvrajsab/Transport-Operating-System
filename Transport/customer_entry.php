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

  <title>SM EXPRESS</title>
</head>

<body>
  <?php include_once "header.php"; ?>

  <div class="container">
    <?php
      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $country = "";
        $mobile = $_POST['mobile'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $landmark = $_POST['landmark'];
        $state = "";
        $city = "";
        $pin = $_POST['pin'];
        $phone = $_POST['phone'];
        $pin = $_POST['pin'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $gstin = $_POST['gstin'];
        $pan = $_POST['pan'];

        $getcountry = "SELECT name FROM countries WHERE id=".$_POST['country'];
        if($result=mysqli_query($conn,$getcountry)){
          while ($row=mysqli_fetch_row($result)){
            $country .= $row[0];
          }
          mysqli_free_result($result);
        }

        $getstate = "SELECT name FROM states WHERE id=".$_POST['state'];
        if($result=mysqli_query($conn,$getstate)){
          while ($row=mysqli_fetch_row($result)){
            $state .= $row[0];
          }
          mysqli_free_result($result);
        }

        $getcity = "SELECT name FROM cities WHERE id=".$_POST['city'];
        if($result=mysqli_query($conn,$getcity)){
          while ($row=mysqli_fetch_row($result)){
            $city .= $row[0];
          }
          mysqli_free_result($result);
        }


        $query = "INSERT INTO customer (customer_name,customer_address1,customer_address2,customer_address3,customer_landmark,customer_city,customer_state,customer_country,customer_pin,customer_phone,customer_mobile,customer_email,customer_website,customer_gstin,customer_pan) VALUES('$name','$address1','$address2','$address3','$landmark','$city','$state','$country','$pin','$phone','$mobile','$email','$website','$gstin','$pan')";
        if(mysqli_query($conn,$query)){
          echo "<div class='alert alert-success alert-dismissible fade show mt-2' role='alert'>
            customer successfully created.
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
    <form class="my-4" method="post" action="customer_entry.php">
      <h5 class="text-center text-uppercase mb-4">create customer</h5>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter customer name" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="country">Country *</label>
            <select class="custom-select" id="country" name="country" >
              <option value="">Select country</option>
              <?php
                $query = "SELECT id,name FROM countries";
                if($result=mysqli_query($conn,$query)){
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
        <div class="col-sm">
          <div class="form-group">
            <label for="mobile">Mobile number</label>
            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="address1">Address 1 *</label>
            <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter address" >
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="address2">Address 2 *</label>
            <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter address" >
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="address3">Address 3 *</label>
            <input type="text" class="form-control" id="address3" name="address3" placeholder="Enter address" >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="landmark">Landmark</label>
            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter landmark">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="state">State *</label>
            <select class="custom-select" id="state" name="state" >
              <option value="">Select country first</option>
            </select>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="city">City</label>
            <select class="custom-select" id="city" name="city" >
              <option value="">Select state first</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="pin">Pin</label>
            <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter pin">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="website">Website *</label>
            <input type="text" class="form-control" id="website" name="website" placeholder="Enter website" >
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="gstin">GSTIN</label>
            <input type="number" class="form-control" id="gstin" name="gstin" placeholder="Enter GSTIN">
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="pan">PAN</label>
            <input type="number" class="form-control" id="pan" name="pan" placeholder="Enter PAN">
          </div>
        </div>
      </div>
      <div class="row my-2">
        <div class="col-sm text-center">
          <button type="submit" class="btn btn-outline-primary w-25" name="submit">Create</button>
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
      $('#country').on('change',function(){
        var countryID = $(this).val();

        if(countryID){
          $.ajax({
            url: 'states.php',
            type: 'POST',
            data: 'country_id='+countryID,
            success: function(res){
              $("#state").html(res);
            }
          });
        }else{
          $("#state").html('<option value="">Select country first</option>');
        }
      });

      $('#state').on('change',function(){
        var stateID = $(this).val();

        if(stateID){
          $.ajax({
            url: 'city.php',
            type: 'POST',
            data: 'state_id='+stateID,
            success: function(res){
              $("#city").html(res);
            }
          });
        }else{
          $("#city").html('<option value="">Select state first</option>');
        }
      });
    });
  </script>
</body>

</html>
