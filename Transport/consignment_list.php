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

  <title>CONSIGNMENT LIST</title>
</head>

<body class="">
  <?php include_once "header.php"; ?>

  <div class="container my-4">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="downloadmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Download
      </button>
      <div class="dropdown-menu" aria-labelledby="downloadmenu">
        <a class="dropdown-item" href="#">xsl</a>
        <a class="dropdown-item" href="#">pdf</a>
        <a class="dropdown-item" href="#">cvs</a>
        <a class="dropdown-item" href="#">doc</a>
      </div>
    </div>
    <h5 class="text-center text-uppercase mb-4">consignment list</h5>
    <table class="table table-sm">
      <thead>
        <tr class="text-uppercase">
          <th scope="col">cn no</th>
          <th scope="col">date</th>
          <th scope="col">consigner</th>
          <th scope="col">consignee</th>
          <th scope="col">risk</th>
          <th scope="col">pay basis</th>
          <th scope="col">mode</th>
          <th scope="col">service type</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Ssssssssss</td>
          <td>@mdo</td>
          <td>edit</td>
          <td>delete</td>
          <td>delete</td>
          <td>delete</td>
        </tr>
      </tbody>
    </table>
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
