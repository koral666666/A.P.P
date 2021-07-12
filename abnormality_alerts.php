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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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
    <title>Abnormality Alerts</title>
</head>
<?php
$json_file = file_get_contents("alerts_lst.json");
$array = json_decode($json_file,True);

?>
<body id="abnormality_alerts" class="side_nav side_main_pages abnormality_alerts_class">

    <section>
    <?php  
        if(empty($_SESSION['user_type'])){
            echo
            "<div class='container-fluid d-flex flex-column align-items-center'>
                <div class='row'><a href='#'><svg></svg><span>Purifier</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Alerts</span></a></div>
                <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
            </div>";
        }
        else{
            switch ($_SESSION['user_type']) {
                case '4': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php' class='selected_nav'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '3': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='employees.php'><svg></svg><span>Employees</span></a></div>
                        <div class='row'><a href='alerts.php' class='selected_nav'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '2': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>map</span></a></div>
                        <div class='row'><a href='alerts.php' class='selected_nav'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                case '1': echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='purifier.php'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='alerts.php' class='selected_nav'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='reports.php'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
                
                default: echo
                    "<div class='container-fluid d-flex flex-column align-items-center'>
                        <div class='row'><a href='#'><svg></svg><span>Purifier</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Map</span></a></div>
                        <div class='row'><a href='#' class='selected_nav'><svg></svg><span>Alerts</span></a></div>
                        <div class='row'><a href='#'><svg></svg><span>Reports</span></a></div>
                    </div>";
                    break;
            }
        }
    ?>

        
        <main>
            <div class="container-fluid d-flex flex-column align-items-center">
                <div class="row">
                    <div class="col ">
                        <h1>Abnormality Alerts</h1>
                    </div>
                    <div class="col">
                        <img src="images/list.svg" title="list view" alt="list view">
                    </div>
                    <div class="col">
                        <img src="images/carousel.svg" title="carousel view" alt="carousel view">
                    </div>
                </div>
                <div class="row">
                    <svg></svg>
                </div>
                <div id="abnormality_list" class="container-fluid">
			
				<?php foreach ($array as $item): ?>
                    <div class="row alerts_info_array">
                        <div class="col-auto">
                            <svg class="severityColor" data-name="<?php echo $item['severity'] ?>"></svg>
                        </div>
                        <div class="col">
                            <h3>Purifier <?php echo $item['purifier_id']?></h3>
						    <span>
                                <?php echo $item['summary']?>
                            </span>
						</div>
                        <div class="col-auto d-flex align-items-center"><button type="button" class="btn btn-light info" data-toggle="modal" data-target="#alerts_more_info_<?php echo $item['purifier_id']?>">info</button></div>
                    </div>
                    <div class="row">
                        <svg></svg>
                    </div>
                 <?php endforeach; ?>
                </div>
            </div>
        </main>
    </section>

    <?php foreach ($array as $item): ?>
    <div class="modal fade alerts_more_info" tabindex="-1" role="dialog" aria-hidden="true" id="alerts_more_info_<?php echo $item['purifier_id']?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <svg class="severityColor" data-name="<?php echo $item['severity'] ?>"></svg>
                            </div>

                            <div class="col-auto">
                                <h3>Purifier <?php echo $item['purifier_id']?></h3>
                                <span>
                                    <?php echo $item['info']?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>


</body>

</html>