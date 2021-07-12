<?php
  include "db.php";
  $purifier_id=$_GET["purifier_id"];
  $gas_result=mysqli_query($connection,"SELECT * FROM gas_measurments WHERE purifier_id='$purifier_id'");
  
  $gas_data=mysqli_fetch_assoc($gas_result);
  echo json_encode($gas_data);
?>