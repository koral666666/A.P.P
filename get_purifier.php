

<?php
    include "db.php";
    $purifier_id=$_GET["purifier_id"];
    $purifier_result=mysqli_query($connection,"SELECT * FROM tbl_users_208_p WHERE purifier_id='$purifier_id'");
    
    $purifier_data=mysqli_fetch_assoc($purifier_result);
    echo json_encode($purifier_data);

?>