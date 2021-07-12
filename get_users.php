<?php
   include "db.php";
   include "p_config.php";

   session_start();

   $user_id          = NULL;
   $user_type        = NULL;
   $user_email       = NULL;
   $first_name       = NULL;
   $last_name        = NULL;
   $password         = NULL;

   $insert_query     = NULL;
   $result           = NULL;

   //_____________________________________________________________________ get parameters

   $user_id          = $_POST["employee_id"];
   $user_email       = $_POST["employee_email"];
   $first_name       = $_POST["employee_first_name"];
   $last_name        = $_POST["employee_last_name"];
   $password         = $_POST["employee_password"];

   //_____________________________________________________________________ select field
   
   if (isset($_POST['user_type']) && is_numeric($_POST['user_type']) && $_POST['user_type']!=0 ){
      $user_type = $_POST['user_type'];
   }
   
   //_____________________________________________________________________ The insertion query
      
   $insert_query = "INSERT INTO purifier_users (user_id,user_type, user_email, first_name, last_name,password) VALUES
                    ('".$user_id."', '".$user_type."', '".$user_email."', '".$first_name."', '".$last_name."', '".$password."')";

   $result= mysqli_query($connection,$insert_query);

   $_SESSION["succes"] = 1;
   mysqli_close($connection);

   header("Location: add_new_employee.php");
?>