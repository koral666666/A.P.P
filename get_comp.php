<?php
  include "db.php";
  $purifier_id=$_GET["purifier_id"];
  $comp_result=mysqli_query($connection,"SELECT * FROM Components_tbl WHERE purifier_id='$purifier_id'");
  if(mysqli_num_rows($comp_result)) {
    $comp_data=mysqli_fetch_assoc($comp_result);
    echo json_encode($comp_data);
  }
?>