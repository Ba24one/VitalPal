<!-- Doctor session -->
<?php

    session_start();
    include_once '../classes/doctor.php';
    $doctor = new Doctor;

    $id = $_SESSION['id'];
    if (!$doctor->d_session()){
        header("location:../logreg.php");
    }
    if (isset($_REQUEST['q'])){
        $doctor->d_logout();
        header("location:../logreg.php");
    }

?>

<html>

    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="form">
            <h1>Welcome <?php $doctor->d_name($id);?></h1>
            <p align="right"><a href="?q=logout">LOGOUT</a></p>
        </div>
    </body>

</html>