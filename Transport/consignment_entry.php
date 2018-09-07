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

  <title>CONSIGNMENT ENTRY</title>
</head>

<body class="">
  <?php include_once "header.php"; ?>

  <form class="my-4">
  <div class="container">
      <h5 class="text-center text-uppercase mb-4">consignment note entry</h5>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="cnno">CN Number *</label>
            <input type="number" class="form-control" id="cnno" placeholder="Enter consignment number" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="consigner">Consigner *</label>
            <select class="custom-select" id="consigner">
              <option selected>Open this select menu</option>
              <option value="1" class="text-uppercase">One</option>
              <option value="2" class="text-uppercase">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="consignee">Consignee *</label>
            <select class="custom-select" id="consignee">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="risk">Risk *</label>
            <select class="custom-select" id="risk">
              <option value="1">OWNER</option>
              <option value="2">CONSIGNER</option>
              <option value="3">CONSIGNEE</option>
              <option value="3">TRANSPORTER</option>
            </select>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="date">Date *</label>
            <input type="date" class="form-control" id="date" required>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="pay">Pay Basis *</label>
            <select class="custom-select" id="pay">
              <option value="1">PAID</option>
              <option value="2">TODAY</option>
              <option value="3">TO BE BILLED</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <div class="form-group">
            <label for="mod">MOD *</label>
            <select class="custom-select" id="mod">
              <option value="1">AIR</option>
              <option value="2">RAIL</option>
              <option value="3">ROAD</option>
            </select>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="servicetype">Service Type *</label>
            <select class="custom-select" id="servicetype">
              <option value="1" class="text-uppercase">AIR</option>
              <option value="2" class="text-uppercase">PART LOAD</option>
              <option value="3" class="text-uppercase">PACKAGE</option>
            </select>
          </div>
        </div>
        <div class="col-sm">
          <div class="form-group">
            <label for="city">GST paid by *</label>
            <select class="custom-select" id="risk">
              <option value="1" class="text-uppercase">CONSIGNER</option>
              <option value="2" class="text-uppercase">CONSIGNEE</option>
              <option value="3" class="text-uppercase">TRANSPORTER</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="mx-2">
      <h5 class="text-uppercase">insurance detail</h5>
      <table class="mb-4">
        <tr>
          <td><input class="" type="checkbox" value=""></td>
          <td><input type="text" class="form-control" placeholder="COMPANY NAME"></td>
          <td><input type="text" class="form-control" placeholder="POLICY NUMBER"></td>
          <td><input type="text" class="form-control" placeholder="SUM INSURRED"></td>
          <td><input type="date" class="form-control"></td>
          <td><input type="date" class="form-control"></td>
          <td><input type="text" class="form-control" placeholder="REMARK"></td>
        </tr>
      </table>
      <h5 class="text-uppercase">product detail</h5>
      <table class="mb-4">
        <tr>
          <td><input class="" type="checkbox" value=""></td>
          <td><input type="text" class="form-control" placeholder="DESCRIPTION"></td>
          <td><input type="text" class="form-control" placeholder="NO. OF PACKAGE"></td>
          <td><input type="text" class="form-control" placeholder="ACTUAL WEIGHT"></td>
          <td><input type="text" class="form-control" placeholder="CHARGED WEIGHT"></td>
          <td><input type="text" class="form-control" placeholder="LENGTH"></td>
          <td><input type="text" class="form-control" placeholder="WIDTH"></td>
          <td><input type="text" class="form-control" placeholder="HEIGHT"></td>
          <td><input type="text" class="form-control" placeholder="MODE OF PACKAGE"></td>
          <td><input type="text" class="form-control" placeholder="RATE PER PACKAGE"></td>
          <td><input type="text" class="form-control" placeholder="RATE CHARGED"></td>
        </tr>
      </table>
    </div>
  </form>


  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.js"></script>
  <script src="bootstrap-4.1.3-dist/js/popper.js"></script>
  <script src="bootstrap-4.1.3-dist/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script>
    $(function() {

    });
  </script>
</body>

</html>
