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
    <title>Employees</title>
</head>

<body id="employees" class="employees_class">

    <main>
        <section>
            <h1>Employees</h1>
            <svg></svg>
        </section>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-auto"><a href="add_new_employee.php"><svg></svg><span>Add</span></a></div>
                <div class="col-auto"><a href="edit_employee.php"><svg></svg><span>Edit</span></a></div>
            </div>
        </div>
    </main>

</body>

</html>