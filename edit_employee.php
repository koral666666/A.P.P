<?php
    include "top_header.php";


    if(session_id() == '')
        session_start();

    $user_id          = NULL;
    $submit_val       = NULL;


    if(isset($_GET["save_emp"])){
        $submit_val = $_GET["save_emp"];
    }

    if(isset($_GET["emp_select"])){
        $user_id = $_GET["emp_select"];
    }


    $users_query    = "SELECT * FROM purifier_users";
    $users_result   = mysqli_query($connection, $users_query);

    if($submit_val=="delete_emp"){
        $delete_user_query  = "DELETE FROM purifier_users WHERE user_id=$user_id ";
        $result_delete  = mysqli_query($connection, $delete_user_query);
    }

// update---------------------

    $user_id_         = NULL;
    $user_type_       = NULL;
    $user_email_      = NULL;
    $first_name_      = NULL;
    $last_name_       = NULL;
    $password_        = NULL;

    $update_query     = NULL;
    $result           = NULL;

    //_____________________________________________________________________ get parameters

    if(isset($_GET["employee_id"])){
        $user_id = $_GET["employee_id"];
    }

    if(isset($_GET["employee_email"])){
        $user_email = $_GET["employee_email"];
    }

    if(isset($_GET["employee_first_name"])){
        $first_name = $_GET["employee_first_name"];
    }

    if(isset($_GET["employee_last_name"])){
        $last_name = $_GET["employee_last_name"];
    }

    if(isset($_GET["employee_password"])){
        $password = $_GET["employee_password"];
    }
 
    if($submit_val=="save_emp"){
        if(isset($_GET["employee_id"])){
            $user_id = $_GET["employee_id"];
        }
    
        if(isset($_GET["employee_email"])){
            $user_email = $_GET["employee_email"];
        }
    
        if(isset($_GET["employee_first_name"])){
            $first_name = $_GET["employee_first_name"];
        }
    
        if(isset($_GET["employee_last_name"])){
            $last_name = $_GET["employee_last_name"];
        }
    
        if(isset($_GET["employee_password"])){
            $password = $_GET["employee_password"];
        }

         $update_query = "UPDATE purifier_users SET  user_email='$user_email', first_name='$first_name', last_name='$last_name', password='$password' WHERE user_id=$user_id";
      
         
         if(mysqli_query($connection, $update_query)){
             $users_query    = "SELECT * FROM purifier_users";
            $users_result   = mysqli_query($connection, $users_query);
         }
        
    }            


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- _____________________________________________________________________________ bootstrap & jd & jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- _____________________________________________________________________________ fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap"    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    
    <!-- _____________________________________________________________________________ my css & javaScript -->
    <link rel="stylesheet" href="includes/style.css">
    <script src="includes/scripts.js"></script>
    
    <!-- _____________________________________________________________________________ icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="icon" type="image/svg" href="images/title_icon.svg">
    <title>Employees</title>
</head>

<body id="edit_employee" class="side_nav side_main_pages edit_employee_class">

    <section>
    <?php  
        if(empty($_SESSION['user_type'])){
            echo
            "<div class='container-fluid d-flex flex-column align-items-center'>
                <div class='row'><a href='#'><svg></svg><span>Purifier</span></a></div>
                <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Map</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Alerts</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
            </div>";
        }
        else{
            switch ($_SESSION['user_type']) {
                case '4': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '3': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='employees.php' class='selected_nav'><svg></svg><span>Employees</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '2': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '1': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                
                default: echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='#'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
            }
        }
    ?>

        
        <main>
            <div class="container-fluid d-flex flex-column">
                <div class="row justify-content-start">
                    <h1>Employees view and edit</h1>
                </div>
                <div class="row">
                    <svg></svg>
                </div>
                
                
                    <form action="#" method="GET" id="edit_emp" class="needs-validation purifier_form" novalidate>
                        <div class="row">
                            <select name="emp_select" id="emp_select" class="form-select my_select">
                            <?php 
                                while ($user_row=mysqli_fetch_assoc($users_result)) {
                                    echo '<option value="'.$user_row["user_id"].'">'.$user_row["first_name"].' '.$user_row["last_name"].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="row">
                            <section class="top">
                                <h4 class="text-success">Personal details</h4>
                            </section>
                        </div>
                        <div class="row">
                            <section class="bott">
                                <div class="row">
                                    <div class="col-auto d-flex flex-column justify-content-center">
                                        <label class="form-check-label">First name: </label>
                                        <input type="text" class="form-control my_input" id="employee_first_name" name="employee_first_name" value="" required>
                                        <div class="invalid-feedback employee_validation">You must enter a first name</div>
                                    </div>
                                    <div class="col d-flex flex-column justify-content-center">
                                        <label class="form-check-label">Last name: </label>
                                        <input type="text" class="form-control my_input" id="employee_last_name" name="employee_last_name" required>
                                        <div class="invalid-feedback employee_validation">You must enter a last name</div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col d-flex flex-column justify-content-center">
                                        <label class="form-check-label">Id: </label>
                                        <input type="text" class="form-control my_input" id="employee_id" name="employee_id" pattern="[0-9]+" required readonly>
                                        <div class="invalid-feedback employee_validation">Enter digits only</div>
                                    </div>
                                </div>
                            </section>
                        </div>
    
                        <div class="row">
                            <section class="top">
                                <h4 class="text-success">Work details</h4>
                            </section>
                        </div>
                        <div class="row">
                            <section class="bott">
                                <div class="row">
                                    <div class="col-auto d-flex flex-column justify-content-center">
                                        <label class="form-check-label">Email: </label>
                                        <input type="text" class="form-control my_input" id="employee_email" name="employee_email" required>
                                        <div class="invalid-feedback employee_validation">You must enter an email</div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-auto d-flex flex-column justify-content-center department_class">
                                        <label class="form-check-label">Department: </label>
                                        <input type="text" class="form-control my_input department_class" id="employee_department" name="employee_department" required>
                                        <div class="invalid-feedback employee_validation">You must enter a department</div>
                                    </div>
                                
                                    <div class="col-auto d-flex flex-column justify-content-center ps">
                                        <label class="form-check-label">Password: </label>
                                        <input type="text" class="form-control my_input" id="employee_password" name="employee_password" required>
                                        <div class="invalid-feedback employee_validation">You must enter a password</div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <button type="submit" name="save_emp" value="save_emp" class="btn btn-success" id="save_emp" data-toggle="modal" data-target="succes_modal_edit_employee">save changes</button>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="save_emp" value="delete_emp" class="btn btn-danger" id="delete_emp" data-toggle="modal" data-target="delete_modal_edit_employee">delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>

    <div class="modal fade modal_ms" tabindex="-1" role="dialog" aria-hidden="true" id="succes_modal_edit_employee">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="exit_modal" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                        <div class="col-auto"><svg></svg></div>
                            <div class="col-auto">
                                <h6>successfully</h6><h4>The details has been sent<br><b class="text-success">successfully</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal_ms" tabindex="-1" role="dialog" aria-hidden="true" id="delete_modal_edit_employee">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="exit_modal" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                        <div class="col-auto"><svg></svg></div>
                            <div class="col-auto">
                                <h6>successfully</h6><h4>The details has been <p class="text-danger">deleted</p></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>