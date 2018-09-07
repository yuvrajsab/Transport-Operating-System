<?php
  require "db_conn.php";
  
  if(isset($_POST['country_id'])){
    $query = "SELECT id,name FROM states WHERE country_id=".$_POST['country_id'];
    if($result=mysqli_query($conn,$query)){
      echo '<option value="">Select state</option>';
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
