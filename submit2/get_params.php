<?php
include "db.php";
include "p_config.php";

// get parameters

$purifier_id=$_GET["purifier_number"];
// select field:
if (isset($_GET['purifier_group']) && is_numeric($_GET['purifier_group']))
   $group= $_GET['purifier_group'];
else 
   $group= 0;
// $insert_query= "INSERT into tbl_users_208_p (purifier_id) values ('$purifier_id')";
$region=$_GET["purifier_region"];
$street=$_GET["purifier_street"];
$st_number=$_GET["purifier_st_number"];



   
// The insertion query:
   
   $insert_query="INSERT INTO tbl_users_208_p (purifier_id,group_number, region, street, street_num) VALUES
   ( '".$purifier_id."', '".$group."', '".$region."', '".$street."', '".$st_number."')";


$result= mysqli_query($connection,$insert_query);

header('Location: '.URL);

?>









<?php
    mysqli_close($connection);
?>

