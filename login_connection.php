<html>
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
    <title>login connection</title>
</head>

<body id="login_connection" class="login_connection_class">
    <?php
        include "db.php";
        session_start();

        if(!empty($_POST["email"]))
        {
            $email     = $_POST["email"];
            $query     = "SELECT * FROM purifier_users WHERE user_email = '" . $email . "'";
            $statement = mysqli_prepare($connection, $query);
    
            $result    = $connection->query($query);
    
            if($result->num_rows > 0){
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $password      = $row["password"];
                    $loginPassword = $_POST["password"];
                    
                    if($loginPassword == $password){
                        $_SESSION['first_name'] = $row["first_name"];
                        $_SESSION['user_type']  = $row['user_type'];
                        
                        header("Location: index.php");
                    }
                }
            }
        }
    ?>

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
                            <svg id="userPic" data-name="<?php echo (empty($_SESSION['first_name']))? "question_Mark" : $_SESSION['first_name']?>"></svg>
                        </div>
                        <div class="col-auto"><span id="user_name"><?php echo (empty($_SESSION['first_name']))? "<a href='logIn.php' class='log'>Log in</a>" : "<a href='login_close_connection.php' class='log'>Log out</a>" ?></span></div>
                </div>
            </div>
        </header>

    <main>
        <section>
            <h1 class="h3 mb-3 fw-normal">Log in</h1>
            <svg></svg>
        </section>

        <form action="login_connection.php" method = "POST">
            <div class="form-floating">
                <input type="email"    name="email"    class="form-control" placeholder="name@example.com">
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <button class="w-100 btn btn-lg btn-success" type="submit">log in</button>
        </form>
    </main>

    <script>
        $(document).ready(function(){
            $('#logIn_fail_modal').modal('show');
        });
    </script>

    <div class="modal fade" id="logIn_fail_modal" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto"><svg></svg></div>
                            <div class="col-auto">
                                <h3>Can't Log in</h3>
                                <span>Incorrect information,<br>Please try again.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
