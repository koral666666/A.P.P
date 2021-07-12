<?php
  include "db.php";
  $user_id=$_GET["user_id"];
  $user_result=mysqli_query($connection,"SELECT * FROM purifier_users WHERE user_id='$user_id'");
  if(mysqli_num_rows($user_result)) {
  $users_data=mysqli_fetch_assoc($user_result);
   echo json_encode($users_data);
   exit;
}
?>

