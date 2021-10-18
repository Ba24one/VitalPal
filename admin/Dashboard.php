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

<!DOCTYPE html>
<html>
    <meta name="viewport" content="with=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Admin-Dashboard</title>
        <link rel="stylesheet" href="../css/style_3.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
<body>

    <input type="checkbox" name="" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-logout">
            <div class="logout-flex">

                <div class="logout-icons">
                    <a href="?q=logout"><span class="fa fa-sign-out"></span></a>
                    
                </div>
            </div>
        </div>

        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="../images/vitalpal_logo_bw.png" alt="">
                <div class="user-info">
                    <h3><?php $admin->a_name($id);?></h3>
                    <span>ADMIN</span>
                </div>
            </div>

            <div class="sidebar-menu">
            <ul>
                    <li>
                        <a href="Dashboard.php" class="dash">
                            <span class="fa fa-line-chart"></span>
                            Dashboard
                            <div class="marker">
                                <span class="fa fa-thumb-tack"></span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="menu-head">
                    <span>Manage</span>
                </div>
                <ul>
                    <li>
                        <a href="Patients.php">
                            <div class="side-icon">
                                <span class="fa fa-medkit"></span>
                            </div>
                            Patients
                        </a>
                    </li>
                    <li>
                        <a href="Doctors.php">
                            <div class="side-icon">
                                <span class="fa fa-user-md"></span>
                            </div>
                            Doctors
                        </a>
                    </li>
                    <li>
                        <a href="Admins.php">
                            <div class="side-icon">
                                <span class="fa fa-building"></span>
                            </div>
                            Admins         
                        </a>
                    </li>
                    <li>
                        <a href="News.php">
                            <div class="side-icon">
                                <span class="fa fa-newspaper-o"></span>
                            </div>
                            News
                        </a>
                    </li>
                    <li>
                        <a href="Hospitals.php">
                            <div class="side-icon">
                                <span class="fa fa-ambulance"></span>
                            </div>
                            Hospitals
                        </a>
                    </li>
                    <li>
                        <a href="Meals.php">
                            <div class="side-icon">
                                <span class="fa fa-cutlery"></span>
                            </div>
                            Meals
                        </a>
                    </li>
                    <li>
                        <a href="Vaccines.php">
                            <div class="side-icon">
                                <span class="fa fa-plus-square"></span>
                            </div>
                            Vaccines
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <span class="fa fa-bars"></span>
                </label>
            </div>

            <div class="header-heading">
                <a href="Dashboard.php"><h2>VitalPal</h2></a>
            </div>

            <div class="header-icons">
                <span class="fa fa-cog"> </span>
            </div>
        </header>

        <main>
            <div class="page-header">
                <div>
                    <h1>Analytics Dashboard</h1>
                    <small>Monitor Key Metrics. Check statistics and insights.</small>
                </div>
            </div>

            <div class="cards">
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Patients</span>
                                <small>No. of currently active patients</small>
                            </div>

                            <h2>
                                <?php
                                    include_once '../classes/patient.php';
                                    $fetchdata=new Patient();
                                    $sql=$fetchdata->p_getCount();
                                ?>
                            </h2>

                        </div>
                        <div class="card-chart">
                            <span class="fa fa-users"></span>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Doctors</span>
                                <small>No. of currently available doctors</small>
                            </div>

                            <h2>
                                <?php
                                    include_once '../classes/doctor.php';
                                    $fetchdata=new Doctor();
                                    $sql=$fetchdata->d_getCount();
                                ?>
                            </h2>

                        </div>
                        <div class="card-chart">
                            <span class="fa fa-user-md"></span>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>vaccinations</span>
                                <small>Current vaccination programs</small>
                            </div>

                            <h2>5</h2>

                        </div>
                        <div class="card-chart">
                            <span class="fa fa-plus-square"></span>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <label for="sidebar-toggle" class="body-label"></label>
</body>
</html>