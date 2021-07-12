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

    <!-- _____________________________________________________________________________ bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- _____________________________________________________________________________ jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        
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
    
    <title>Home Page</title>
</head>

<body id="home_page" class="home_page_class">
    
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php  
                    if(empty($_SESSION['user_type'])){
                        echo"<div class='col-auto'><a href='#' id='purifier_a'><svg></svg><span>Purifier</span></a></div>
                            <div class='col-auto'><a href='#'  id='map_emp_a'><svg></svg><span>Map</span></a></div>
                            <div class='col-auto'><a href='#'  id='alerts_a'><svg></svg><span>Alerts</span></a></div>
                            <div class='col-auto'><a href='#'  id='reports_a'><svg></svg><span>Reports</span></a></div>";
                    }
                    else{
                        switch ($_SESSION['user_type']) {
                            case '4': echo
                                "<div class='col-auto'><a href='purifier.php' id='purifier_a'><svg></svg><span>Purifier</span></a></div>
                                <div class='col-auto'><a href='#'             id='map_emp_a'><svg></svg><span>Map</span></a></div>
                                <div class='col-auto'><a href='alerts.php'    id='alerts_a'><svg></svg><span>Alerts</span></a></div>
                                <div class='col-auto'><a href='reports.php'   id='reports_a'><svg></svg><span>Reports</span></a></div>";
                                break;
                            case '3': echo
                                "<div class='col-auto'><a href='purifier.php' id='purifier_a'><svg></svg><span>Purifier</span></a></div>
                                <div class='col-auto'><a href='employees.php' id='map_emp_a'><svg></svg><span>employees</span></a></div>
                                <div class='col-auto'><a href='alerts.php'    id='alerts_a'><svg></svg><span>Alerts</span></a></div>
                                <div class='col-auto'><a href='reports.php'   id='reports_a'><svg></svg><span>Reports</span></a></div>";
                                break;
                            case '2': echo
                                "<div class='col-auto'><a href='purifier.php' id='purifier_a'><svg></svg><span>Purifier</span></a></div>
                                <div class='col-auto'><a href='#'             id='map_emp_a'><svg></svg><span>Map</span></a></div>
                                <div class='col-auto'><a href='alerts.php'    id='alerts_a'><svg></svg><span>Alerts</span></a></div>
                                <div class='col-auto'><a href='#'             id='reports_a'><svg></svg><span>Reports</span></a></div>";
                                break;
                            case '1': echo
                                "<div class='col-auto'><a href='purifier.php' id='purifier_a'><svg></svg><span>Purifier</span></a></div>
                                <div class='col-auto'><a href='#'             id='map_emp_a'><svg></svg><span>Map</span></a></div>
                                <div class='col-auto'><a href='alerts.php'    id='alerts_a'><svg></svg><span>Alerts</span></a></div>
                                <div class='col-auto'><a href='reports.php'   id='reports_a'><svg></svg><span>Reports</span></a></div>";
                                break;
                            
                            default: echo
                                "<div class='col-auto'><a href='#' id='purifier_a'><svg></svg><span>Purifier</span></a></div>
                                <div class='col-auto'><a href='#'  id='map_emp_a'><svg></svg><span>Map</span></a></div>
                                <div class='col-auto'><a href='#'  id='alerts_a'><svg></svg><span>Alerts</span></a></div>
                                <div class='col-auto'><a href='#'  id='reports_a'><svg></svg><span>Reports</span></a></div>";
                                break;
                        }
                    }
                ?>
                <!-- <div class="col-auto"><a href="purifier.php" id="purifier_a"><svg></svg><span>Purifier</span></a></div>
                <div class="col-auto"><a href="#" id="map_emp_a"><svg></svg><span>Map</span></a></div>
                <div class="col-auto"><a href="alerts.php" id="alerts_a"><svg></svg><span>Alerts</span></a></div>
                <div class="col-auto"><a href="reports.php" id="reports_a"><svg></svg><span>Reports</span></a></div> -->
            </div>
        </div>
    </main>

</body>

</html>