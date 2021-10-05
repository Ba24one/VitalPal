<?php
   session_start();
   include_once '../classes/patient.php';
   $patient = new Patient;

   $id = $_SESSION['id'];
   if (!$patient->p_session()){
      header("location:logreg.php");
   }
   if (isset($_REQUEST['q'])){
      $patient->p_logout();
      header("location:logreg.php");
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
            <h1>Welcome <?php $patient->p_name($id);?></h1>
            <p align="right"><a href="?q=logout">LOGOUT</a></p>
            <p align="left"><a href="crud.php">CRUD</a></p>
        </div>
    </body>

    </html>
