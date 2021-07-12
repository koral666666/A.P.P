<?php include "db.php"; session_start();?>

<html>

    <body>
        <header>
            <div class="container-fluid">
                <div class="row justify-content-center">
                        <div class="col-auto">
                            <a href="index.php" id="logo"></a>
                        </div>
                        <div class="col-auto">
                            <form action="" method="GET" class="form-control-md">
                                <div class="search">
                                    <button type="submit" class="no_border"><i class="fa fa-search"></i></button>                 
                                    <input type="text" placeholder="Search" name="search" class="search_input no_border">
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                            <a href="#" id="language"></a>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a href="abnormality_alerts.php"><svg></svg><span>Abnormality</span></a>
                            <a href="add_new_employee.php"><svg></svg><span>Add new employee</span></a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="#"><svg></svg><span>Colling Units</span></a>
                            <a href="edit_employee.php"><svg></svg><span>Edit employee</span></a>
                        </div>
                        <div class="col d-flex justify-content-start"><a href="#"><svg></svg><span>System</span></a></div>
                        <div class="col-auto">
                            <svg id="userPic" data-name="<?php echo (empty($_SESSION['first_name']))? "question_mark" : $_SESSION['first_name']?>"></svg>
                        </div>
                        <div class="col-auto"><span id="user_name"><?php echo (empty($_SESSION['first_name']))? "<a href='logIn.php' class='log'>Log in</a>" : "<a href='login_close_connection.php' class='log'>Log out</a>" ?></span></div>
                </div>
            </div>
        </header>
    </body>
</html>
