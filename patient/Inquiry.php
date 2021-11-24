<?php

session_start();
include_once '../classes/patient.php';
$patient = new Patient;

$id = $_SESSION['id'];
if (!$patient->p_session()){
    header("location:../logreg.php");
}
if (isset($_REQUEST['q'])){
    $patient->p_logout();
    header("location:../logreg.php");
}

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Patient-Inquiry</title>
        <link rel = "icon" type = "image/png" href = "../images/vitalpal_logo_square.png">
        <link rel="stylesheet" href="../css/style_4.css?v=<?php echo time(); ?>">
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
                <img src="../images/vitalpal_logo_square.png?v=<?php echo time(); ?>" alt="">
                <div class="user-info">
                    <h3><?php $patient->p_name($id);?></h3>
                    <span>PATIENT</span>
                </div>
            </div>

            <div class="sidebar-menu">
            <ul>
                    <li>
                        <a href="Home.php">
                            <div class="side-icon">
                                <span class="fa fa-home"></span>
                            </div>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="Health_Status.php">
                            <div class="side-icon">
                                <span class="fa fa-heartbeat"></span>
                            </div>
                            Health Status
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
                        <a href="News.php">
                            <div class="side-icon">
                                <span class="fa fa-newspaper-o"></span>
                            </div>
                            News
                        </a>
                    </li>
                    <li>
                        <a href="Vaccinations.php">
                            <div class="side-icon">
                                <span class="fa fa-medkit"></span>
                            </div>
                            Vaccinations
                        </a>
                    </li>
                    <li>
                        <a href="Meals.php">
                            <div class="side-icon">
                                <span class="fa fa-cutlery"></span>
                            </div>
                            Mealplan
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
                <a href="Home.php"><h2>VitalPal</h2></a>
            </div>

            <div class="header-icons">
                <a href="Inquiry.php"><span class="fa fa-info"> </span></a>
                <a href="Settings.php"><span class="fa fa-cog"> </span></a>
            </div>
        </header>

        <main>
            
            <div class="inquiry-container" id="inquiry-container">
                <div class="head">
                    <div class="title">INQUIRY FORM</div>
                </div>
                <form action="Inquiry_send.php" method="POST">
                    <div class="inquiry-details">
                        <div class="input-value">
                            <input type="text" name="name" value="<?php $patient->p_name($id);?>" readonly>
                        </div>
                        <div class="input-value">
                            <input type="email" name="email" placeholder="Preferred email" required>
                        </div>
                        <div class="input-value">
                            <input type="text" name="subject" placeholder="Enter subject" required>
                        </div>
                        <div class="input-value">
                            <textarea type="text" name="message" placeholder="Type your issue here" required></textarea>
                        </div>
                    </div>
                    <div class="insert-elements">
                        <input type="reset" name="reset"  class="reset-btn" value="Reset">
                        <input type="submit" name="sendInsert" class="send-btn" value="Send" id="sendtbtn">
                    </div>
                </form>
            </div>

        </main>
    </div>

    <label for="sidebar-toggle" class="body-label"></label>

    <script>

        //Live time and date
        function display_date() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 12;
            hours = hours ? hours : 12;
            var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
            ];
            
            // var date = x.getMonth() + 1+ " . " + x.getDate() + " . " + x.getFullYear();

            var date = monthNames[x.getMonth()] + " " + x.getDate() + ", " + x.getFullYear(); 
            var time = hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
            // date = date + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
            document.getElementById('date').innerHTML = date;
            document.getElementById('time').innerHTML = time;
            display_datetime();
        }
        function display_datetime(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_date()',refresh)
        }
        display_datetime()

    </script>
</body>
</html>