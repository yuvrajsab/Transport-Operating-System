<?php
  require "db_conn.php";

  if(isset($_POST['state_id'])){
    $query = "SELECT id,name FROM cities WHERE state_id=".$_POST['state_id'];
    if($result=mysqli_query($conn,$query)){
      echo '<option value="">Select city</option>';
      while($row=mysqli_fetch_row($result)){
        ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
      }
      mysqli_free_result($result);
    }
    mysqli_close($conn);
  }
?>
