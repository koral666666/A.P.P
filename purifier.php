<?php
    include "top_header.php";
    
    if(session_id() == '')
        session_start();

    $purifier_var     = NULL;
    $prev_id          = NULL;
    $submit_val       = NULL;
    $gas_var          = NULL;
    $ratio_var        = NULL;
    $status_component = NULL;
    $filter_var       = NULL;
    $gas_row          = NULL;
    $purifier_id      = NULL;


    if(isset($_POST["submit"])){
        $submit_val = $_POST["submit"];
    }

    if(isset($_POST["purifier_source"])){
        $purifier_id = $_POST["purifier_source"];
    }
    

    if(isset($_POST["submit"])){
        $purifier_gas_update_query = "UPDATE gas_measurments SET co=".$_POST['co_gas_ratio'].", lead=".$_POST['lead_gas_ratio'].", nitrogen=".$_POST['nitrogen_gas_ratio'].", co2=".$_POST['co2_gas_ratio'];
        mysqli_query($connection,$purifier_gas_update_query);
    }


    //_____________________________________________________________________ delete
    
    if($submit_val=="delete"){
        $delete_purifier_query  = "DELETE FROM tbl_users_208_p WHERE purifier_id = $purifier_id";
        $delete_gas_query       = "DELETE FROM gas_measurments WHERE purifier_id = $purifier_id";
        $delete_component_query = "DELETE FROM Components_tbl  WHERE purifier_id = $purifier_id";
        
        //___________________________________________________________ delete result
        
        $result_gas_delete       = mysqli_query($connection,$delete_gas_query);
        $result_purify_delete    = mysqli_query($connection,$delete_purifier_query);
        $result_component_delete = mysqli_query($connection,$delete_component_query);
    }
    
    
    //_____________________________________________________________________ select
    
    $purifiers_query    = "SELECT * FROM tbl_users_208_p";
    $get_gasQuery       = "SELECT * FROM gas_measurments WHERE purifier_id = $prev_id";
    $get_componentQuery = "SELECT * FROM Component_id    WHERE purifier_id = $prev_id";

    //_____________________________________________________________________ update queries
    
    $query_gas       = "UPDATE gas_measurments SET purifier_id = $purifier_var, gas_name = $gas_var, gas_ratio = $ratio_var WHERE purifier_id = $prev_id";
    $query_purify    = "UPDATE tbl_users_208_p SET purifier_id = $purifier_var WHERE  purifier_id=$prev_id";
    $query_component = "UPDATE Component_id    SET purifier_id = $purifier_var WHERE  purifier_id=$prev_id";
    
    //_____________________________________________________________________ result for updates
    
    $result_gas       = mysqli_query($connection,$query_gas);
    $result_purify    = mysqli_query($connection,$query_purify);
    $result_component = mysqli_query($connection,$query_purify);
    $purifiers_result = mysqli_query($connection, $purifiers_query);
        
    //_____________________________________________________________________ close connection

    // !!! DO NOT forget to releas/delete the resolt queries  my_sqli_free_result($resilt) !!!
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
    <title>Purifier</title>
</head>

<body id="purifier" class="side_nav side_main_pages purifier_class">

    <section>
    <?php  
        if(empty($_SESSION['user_type'])){
            echo
            "<div class='container-fluid d-flex flex-column align-items-center'>
                <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Purifier</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Alerts</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
            </div>";
        }
        else{
            switch ($_SESSION['user_type']) {
                case '4': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php' class='selected_nav'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '3': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php' class='selected_nav'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='employees.php'><svg></svg><span>Employees</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '2': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php' class='selected_nav'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '1': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php' class='selected_nav'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                
                default: echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
            }
        }
    ?>


        <main>
            <div class="container-fluid d-flex flex-column align-items-center">
                <div class="row">
                    <div class="col">
                        <h1>Purifier</h1>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="edit_add_btn" class="btn">
                            <span>&plus;</span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <svg></svg>
                </div>
                <div id="add_purifier">
                    <div class="container-fluid">
                        <form action="get_params.php" method="GET" id="add_new" class="needs-validation purifier_form" novalidate>
                            <div class="row d-flex flex-column">
                                <section class="top sm d-flex"><h4 class="text-success">Purifier</h4></section>
                                <section class="bott sm d-flex align-items-center">
                                    <div class="col-auto">
                                        <svg></svg>
                                        <span>Number</span>
                                    </div>
                                    <div class="col-auto">
                                        <input type="text" class="form-control my_input" id="purifier_number" name="purifier_number" pattern="[0-9]+" required>
                                        <div class="invalid-feedback">Enter digits only</div>
                                    </div>  
                                </section>
                            </div>
                            <div class="row d-flex flex-column">
                                <section class="top sm d-flex"><h4 class="text-success">Group</h4></section>
                                <section class="bott sm d-flex align-items-center">
                                    <div class="col-auto">
                                        <svg></svg>
                                        <span>Number</span>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select my_select" id="purifier_group" name="purifier_group">
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21" selected>21</option>
                                        </select>
                                    </div>  
                                </section>
                            </div>
                            <div class="row d-flex flex-column">
                                <section class="top d-flex"><h4 class="text-success">Location</h4></section>
                                <section class="bott lg d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-auto">
                                            <svg></svg>
                                            <span>Region</span>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control my_input" id="purifier_region" name="purifier_region" required>
                                            <div class="invalid-feedback">You must enter Region</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <svg></svg>
                                            <span>Street</span>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control my_input" id="purifier_street" name="purifier_street" required>
                                            <div class="invalid-feedback">You must enter a street</div>
                                        </div>
                                        <div class="col-auto">
                                            <svg></svg>
                                            <span>St. Number</span>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control my_input" id="purifier_st_number" name="purifier_st_number" required>
                                            <div class="invalid-feedback">You must enter st Number</div>
                                        </div>    
                                    </div>
                                </section>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <button type="submit" class="btn btn-success" id="add">add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="edit_purifier">
                    <div class="container-fluid">
                        <form action="purifier.php" method="POST" id="purifier_form">
                            <div class="row">
                               <div class="col"> 
                                    <select name="purifier_source" id="purifier_source" class="form-select my_select" data-selected="<?php echo $prev_id?>">
                                        <?php 
                                        while ($purifier_row=mysqli_fetch_assoc($purifiers_result)) {
                                            echo '<option value="'.$purifier_row["purifier_id"].'">Purifier '.$purifier_row["purifier_id"].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col">
                                    <section class="top"><h4 class="text-success">Location</h4></section>
                                    <section class="bott"><span id="location"></span></section>
                                </div>
                                <div class="col-auto">
                                    <section class="top"><h4 class="text-success">Group</h4></section>
                                    <section class="bott"><span id="group_number"></span></section>
                                </div>
                                <div class="col">
                                    <section class="top d-flex">
                                        <h4 class="text-success">Gas Measurements</h4>
                                        <button type="button" id="Gas_Measurements_data_edit" class="btn"></button>
                                    </section>
                                    <div id="Gas_Measurements_data">
                                        <div class="card card-body bott">
                                            <section id="co_section" class="visible_element">
                                                <span>Gas: CO</span>
                                                <span >Gas ratio: <span id="co_gas_ratio_data"></span>%</span>
                                            </section>
                                            <section id="lead_section" class="invisible_element">
                                                <span>Gas: LEAD</span>
                                                <span >Gas ratio: <span id="lead_gas_ratio_data"></span>%</span>
                                            </section>
                                            <section id="nitrogen_section" class="invisible_element">
                                                <span>Gas: NITROGEN</span>
                                                <span >Gas ratio: <span id="nitrogen_gas_ratio_data"></span>%</span>
                                            </section>
                                            <section id="co2_section" class="invisible_element">
                                                <span>Gas: CO2</span>
                                                <span >Gas ratio: <span id="co2_gas_ratio_data"></span>%</span>
                                            </section>
                                        </div>
                                    </div>
                                    <div id="Gas_Measurements_edit">
                                        <div class="card card-body bott">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <select id="gases_select" class="form-select my_select" onchange="change_gas(this)">
                                                        <option value="CO" selected>CO</option>
                                                        <option value="LEAD">LEAD</option>
                                                        <option value="NITROGEN">NITROGEN</option>
                                                        <option value="CO2">CO2</option>
                                                    </select>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <div>
                                                        <input type="checkbox" class="form-check-input" checked>
                                                        <label class="form-check-label">Purify</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="visible_element row d-flex flex-column align-items-center" id="co_gas_ratio_div">
                                                <label>CO ratio</label>
                                                <input type="range" id="co_gas_ratio" name="co_gas_ratio" min="1" max="100" value="39">
                                            </div>
                                            <div class="invisible_element row d-flex flex-column align-items-center" id="lead_gas_ratio_div">
                                                <label>LEAD ratio</label>
                                                <input type="range" id="lead_gas_ratio" name="lead_gas_ratio" min="1" max="100" value="39">
                                            </div>
                                            <div class="invisible_element row d-flex flex-column align-items-center" id="nitrogen_gas_ratio_div">
                                                <label>NITROGEN ratio</label>
                                                <input type="range" id="nitrogen_gas_ratio" name="nitrogen_gas_ratio" min="1" max="100" value="39">
                                            </div>
                                            <div class="invisible_element row d-flex flex-column align-items-center" id="co2_gas_ratio_div">
                                                <label>CO2 ratio</label>
                                                <input type="range" id="co2_gas_ratio" name="co2_gas_ratio" min="1" max="100" value="39">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <section class="top d-flex">
                                        <h4 class="text-success">Cooling Units</h4>
                                        <button type="button" id="Cooling_Units_data_edit" class="btn"></button>
                                    </section>
                                    <div id="Cooling_Units_data">
                                        <div class="card card-body bott">
                                            <section>
                                                <span>Temperature: -77.5&deg;</span>
                                                <span>Current Temp: -70.11&deg;</span>
                                            </section>
                                            <section>
                                                <span>Gas: CO</span>
                                                <span>Status: <span class="text-success">working</span></span>
                                                <span>State of matter: 91% Gas</span>
                                            </section>
                                        </div>
                                    </div>
                                    <div id="Cooling_Units_edit">
                                        <div class="card card-body bott">
                                            <div class="row">
                                                <div class="col-auto d-flex align-items-center">
                                                    <select class="form-select my_select">
                                                        <option value="CO" selected>CO</option>
                                                        <option value="LEAD">LEAD</option>
                                                        <option value="NITROGEN">NITROGEN</option>
                                                        <option value="SULFUR">NITROGEN</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto d-flex flex-column justify-content-center">
                                                    <div>
                                                        <input class="form-check-input" type="radio" name="deg_type" value="F">
                                                        <label class="form-check-label">F</label>
                                                    </div>
                                                    <div>
                                                        <input class="form-check-input" type="radio" name="deg_type" value="C" checked>
                                                        <label class="form-check-label">C</label>
                                                    </div>
                                                </div>
                                                <div class="col-auto d-flex flex-column justify-content-center">
                                                   <span>Current Temp:</span>
                                                   <span>-70.11&deg; <svg></svg></span>
                                                   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto d-flex flex-column align-items-center">
                                                    <label>Change Temperature:</label>
                                                    <section id="cooling_range"><input type="range" min="1" max="100" value="75.5"></section>
                                                </div>
                                                <div class="col-auto d-flex flex-column align-items-center">
                                                    <div>
                                                        <span>State of matter:</span>
                                                    </div>
                                                    <div id="piechart"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <span>Status: <span class="text-success">&ThickSpace;working</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <section class="top d-flex">
                                        <h4 class="text-success">Components</h4>
                                        <button type="button" id="Components_data_edit" class="btn"></button>
                                    </section>
                                    <div id="Components_data">
                                        <div class="card card-body bott" id="no_components_data_wrapper">
                                            This purifier has no components!
                                        </div>
                                        <div class="card card-body bott invisible_element" id="components_data_wrapper">
                                            <div id="352_wrapper">
                                                <div class="row">
                                                    Filter name: 352
                                                </div>
                                                <div class="row">
                                                    Status:&nbsp;<span class="status" id="352_working_span">&ThickSpace;</span></span>
                                                </div>
                                            </div>
                                            <div id="364_wrapper" class="invisible_element">
                                                <div class="row">
                                                    Filter name: 364
                                                </div>
                                                <div class="row">
                                                    Status:&nbsp;<span class="status" id="364_working_span">&ThickSpace;</span></span>
                                                </div>
                                            </div>
                                            <div id="465_wrapper" class="invisible_element">
                                                <div class="row">
                                                    Filter name: 465
                                                </div>
                                                <div class="row">
                                                    Status:&nbsp;<span class="status" id="465_working_span">&ThickSpace;</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Components_edit">
                                        <div class="card card-body bott">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <select id="filter_edit_select" class="form-select my_select">
                                                        <option value="352" selected>Filter 352</option>
                                                        <option value="364">Filter 364</option>
                                                        <option value="465">Filter 465</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-auto"><button type="submit" name="submit" value="delete" class="btn btn-danger"  data-toggle="modal" data-target="#delete_modal">delete</button></div>
                                <div class="col-auto"><button type="submit" name="submit" value="submit" class="btn btn-success" data-toggle="modal" data-target="#succes_modal">save</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>

<?php
    if(empty($_SESSION['succes'])){
        echo "<script>
                $(document).ready(function(){
                    $('#succes_modal').modal('hide');
                });
            </script>";
    }
    else{
        echo "<script>
                $(document).ready(function(){
                    $('#succes_modal').modal('show');
                    $('#exit_modal').click(function(){
                        $('#succes_modal').modal('hide'); 
                    });
                });
            </script>";

        echo "<p>".$_SESSION['succes']."</p>";
        $_SESSION['succes'] = NULL;
        if(empty($_SESSION['succes'])){
            echo "<br><p>empty</p>";
        }
    }
?>

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="succes_modal">
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

    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="delete_modal">
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

