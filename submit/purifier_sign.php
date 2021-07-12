<?php
    include "db.php";
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

<body id="purifier" class="side_nav side_main_pages">
    <header>
        <div class="container-fluid">
            <div class="row justify-content-center">
                    <div class="col-auto">
                        <a href="index.html" id="logo"></a>
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
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col-auto">
                        <svg></svg>
                    </div>
                    <div class="col-auto"><span id="user_name">Hello, Yoav</span></div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-fluid d-flex flex-column align-items-center">
            <div class="row"><a href="purifier.html" class="selected_nav"><svg></svg><span>Purifier</span></a></div>
            <div class="row"><a href="#"><svg></svg><span>Map</span></a></div>
            <div class="row"><a href="alerts.html"><svg></svg><span>Alerts</span></a></div>
            <div class="row"><a href="reports.html"><svg></svg><span>Reports</span></a></div>
        </div>
        
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
                        <form action="purifier.php" method="GET" id="add_new" class="needs-validation purifier_form" novalidate>
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
                                        <select class="form-select my_select">
                                            <option value="6223">18</option>
                                            <option value="6351">19</option>
                                            <option value="6427">20</option>
                                            <option value="6589" selected>21</option>
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
                        <form action="purifier.php" method="GET" id="purifier_form">
                            <div class="row">
                                <select class="form-select my_select">
                                    <option value="6223">Purifier 6223</option>
                                    <option value="6351">Purifier 6351</option>
                                    <option value="6427" selected>Purifier 6427</option>
                                    <option value="6589">Purifier 6589</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <section class="top"><h4 class="text-success">Location</h4></section>
                                    <section class="bott">Bergen st.12 NY</section>
                                </div>
                                <div class="col-auto">
                                    <section class="top"><h4 class="text-success">Group</h4></section>
                                    <section class="bott">45</section>
                                </div>
                                <div class="col">
                                    <section class="top d-flex">
                                        <h4 class="text-success">Gas Measurements</h4>
                                        <button type="button" id="Gas_Measurements_data_edit" class="btn"></button>
                                    </section>
                                    <div id="Gas_Measurements_data">
                                        <div class="card card-body bott">
                                            <section>
                                                <span>Gas: CO</span>
                                                <span>Gas ratio: 39%</span>
                                            </section>
                                        </div>
                                    </div>
                                    <div id="Gas_Measurements_edit">
                                        <div class="card card-body bott">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <select class="form-select my_select">
                                                        <option value="CO" selected>CO</option>
                                                        <option value="LEAD">LEAD</option>
                                                        <option value="NITROGEN">NITROGEN</option>
                                                        <option value="SULFUR">NITROGEN</option>
                                                    </select>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    <div>
                                                        <input type="checkbox" class="form-check-input" checked>
                                                        <label class="form-check-label">Purify</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-flex flex-column align-items-center">
                                                <label>Gas ratio</label>
                                                <input type="range" min="1" max="100" value="39">
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
                                        <div class="card card-body bott">
                                            <div class="row">
                                                <span>Filter name: 364</span>
                                            </div>
                                            <div class="row">
                                                <span>Status: <span class="text-success">&ThickSpace;working</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Components_edit">
                                        <div class="card card-body bott">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <select class="form-select my_select">
                                                        <option value="Filter 352">Filter 352</option>
                                                        <option value="Filter 364" selected>Filter 364</option>
                                                        <option value="Filter 465">Filter 465</option>
                                                        <option value="Filter 298">Filter 298</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div>
                                                   <span>Status: <span class="text-success">&ThickSpace;working</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-auto"><button type="submit" class="btn btn-danger">delete</button></div>
                                <div class="col-auto"><button type="submit" class="btn btn-success">save</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </section>

</body>

</html>