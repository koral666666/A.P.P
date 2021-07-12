<?php
    include "top_header.php";

    if(session_id() == '')
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

    if(isset($_POST["employee_id"])){
        $user_id = $_POST["employee_id"];
    }

    if(isset($_POST["employee_email"])){
        $user_email = $_POST["employee_email"];
    }

    if(isset($_POST["employee_first_name"])){
        $first_name = $_POST["employee_first_name"];
    }

    if(isset($_POST["employee_last_name"])){
        $last_name = $_POST["employee_last_name"];
    }

    if(isset($_POST["employee_password"])){
        $password = $_POST["employee_password"];
    }


    //_____________________________________________________________________ select field

    if (isset($_POST['user_type']) && is_numeric($_POST['user_type']) && $_POST['user_type']!=0 ){
        $user_type = $_POST['user_type'];
    }

    //_____________________________________________________________________ The insertion query
        
    $insert_query = "INSERT INTO purifier_users (user_id,user_type, user_email, first_name, last_name,password) VALUES
                    ('".$user_id."', '".$user_type."', '".$user_email."', '".$first_name."', '".$last_name."', '".$password."')";

    $result= mysqli_query($connection,$insert_query);
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

<body id="add_new_employee" class="side_nav side_main_pages add_new_employee_class">

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
                    <h1>Add new employee</h1>
                </div>
                <div class="row">
                    <svg></svg>
                </div>

                <form action="#" method="POST" id="add_new_emp" class="needs-validation purifier_form employee_form" novalidate>
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
                                    <input type="text" class="form-control my_input" id="employee_first_name" name="employee_first_name" required>
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
                                    <input type="text" class="form-control my_input" id="employee_id" name="employee_id" pattern="[0-9]+" required>
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
                                <div class="col-auto d-flex flex-column justify-content-center">
                                    <label class="form-check-label">Department: </label>
                                    <select class="form-select my_select" id="user_type" name="user_type">
                                        <option value="1">chemist</option>
                                        <option value="2" selected>technician</option>
                                        <option value="3">HR manager</option>
                                        <option value="4">region supervisor</option>
                                    </select>
                                </div>
                            
                                <div class="col-auto d-flex flex-column justify-content-center">
                                    <label class="form-check-label">Password: </label>
                                    <input type="text" class="form-control my_input" id="employee_password" name="employee_password" required>
                                    <div class="invalid-feedback employee_validation">You must enter a password</div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success" id="add_new_emp_b" data-toggle="modal" data-target="succes_modal_add_employee">add</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </section>


    <div class="modal fade modal_ms" tabindex="-1" role="dialog" aria-hidden="true" id="succes_modal_add_employee">
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

</body>
</html>