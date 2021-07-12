
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

<body id="purifier" class="side_nav side_main_pages purifier_php">
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
                </div>
                <div class="row">
                    <svg></svg>
                </div>
                <div id="edit_purifier">
                    <div class="container-fluid">
                        <form action="purifier.php" method="GET" id="purifier_form">
                            <div class="row">
                               <div class="col"> 
                                   <h4>Source</h4>
                                    <select name="purifier_source" class="form-select my_select">
                                        <option value="6223">Purifier 6223</option>
                                        <option value="6351">Purifier 6351</option>
                                        <option value="6427" >Purifier 6427</option>
                                        <option value="6589">Purifier 6589</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-auto"><button type="submit" class="btn btn-success">Go</button></div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

    </body>
</html>

