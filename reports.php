<?php
    include "top_header.php";

    if(session_id() == '')
        session_start();
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
    <title>Reports</title>
</head>

<body id="reports" class="side_nav side_main_pages reports_class">

    <section>
    <?php  
        if(empty($_SESSION['user_type'])){
            echo
            "<div class='container-fluid d-flex flex-column align-items-center'>
                <div class='row'><a href='#'><svg></svg><span>Purifier</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Alerts</span></a></div>
                <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Reports</span></a></div>
            </div>";
        }
        else{
            switch ($_SESSION['user_type']) {
                case '4': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php' class='selected_nav'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '3': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='employees.php'><svg></svg><span>Employees</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php' class='selected_nav'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '2': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '1': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php' class='selected_nav'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                
                default: echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='#'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
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
                    <h1>Reports</h1>
                </div>
                <div class="row">
                    <svg></svg>
                </div>
                <section class="top d-flex align-items-center">
                    <h4 class="text-success">Region's observation</h4>
                </section>
                <form action="" method="GET">
                    <section class="bott">
                        <div class="row">
                            <div class="col-auto d-flex flex-column justify-content-center">
                                <div>
                                    <input class="form-check-input" type="radio" name="time_period" value="Past">
                                    <label class="form-check-label">Past</label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" name="time_period" value="Future" checked>
                                    <label class="form-check-label">Future</label>
                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-center">
                                <input type="date" class="form-control my_calendar" id="pickupdate">
                            </div>
                        </div>
                        <div class="row">
                            <div id="curve_chart" class="curve"></div>
                        </div>
                        <div class="row" id="p_div">
                            <p>
                                This report is about emissions of air pollutants classified by technical processes.<br>
                                These are recorded in so-called emission inventories for air pollutants and form the official data<br>
                                for international policies on transboundary air pollution.<br>
                                <br>
                                In addition, Eurostat disseminates emissions of air pollutants classified by emitting economic activities.<br> 
                                Those are recorded in air emissions accounts (AEA). Furthermore,<br> 
                                Eurostat estimates and disseminates 'footprints' which are emissions of air pollutants classified by products<br> 
                                that are finally demanded by households or government, or that are invested in or exported.<br>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-auto"><button class="btn btn-light" id="send"></button></div>
                            <div class="col-auto"><button class="btn btn-light" id="print"></button></div>
                            <div class="col-auto"><button class="btn btn-light" id="download_flie"></button></div>
                        </div>
                    </section>
                </form>
            </div>
        </main>
    </section>

</body>

</html>