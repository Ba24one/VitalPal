<!-- Admin session -->
<?php

    session_start();
    include_once '../classes/admin.php';
    $admin = new Admin;

    $id = $_SESSION['id'];
    if (!$admin->a_session()){
    header("location:../logreg.php");
    }
    if (isset($_REQUEST['q'])){
    $admin->a_logout();
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
            <h1>Welcome <?php $admin->a_name($id);?></h1>
            <p align="right"><a href="?q=logout">LOGOUT</a></p>
        </div>
    </body>

</html>