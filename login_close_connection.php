<?php include "db.php"; ?>
<html>
<body>
    <?php
        session_start();

        $_SESSION['first_name'] = NULL;
        $_SESSION['user_type']  = 0;

        session_destroy();
        
        header("Location: index.php");
        mysqli_close($connection);
    ?>
</body>
</html>