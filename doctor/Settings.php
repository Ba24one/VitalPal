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

if(isset($_POST['changePass'])){

    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmNewPass'];

    if ($newPass == $confirmPass){

        $updatePassword=new Doctor();

        $change = $updatePassword->d_changePass($_REQUEST['id'], $_REQUEST['oldPass'], $_REQUEST['newPass']);
        if($change){
            
            echo "<script>alert('Password changed successfully!');</script>";
            // Code for redirection
            echo "<script>window.location.href='Settings.php'</script>";
        }
        else 
        {
            echo "<script>alert('Make sure password is correct!');</script>";
        }

    }
    else{
        echo "<script>alert('Password is not matching');</script>";
    }

}

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Doctore-Dashboard</title>
        <link rel = "icon" type = "image/png" href = "../images/vitalpal_logo_square.png">
        <link rel="stylesheet" href="../css/style_5.css?v=<?php echo time(); ?>">
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
                    <h3><?php $doctor->d_name($id);?></h3>
                    <span>DOCTOR</span>
                </div>
            </div>

            <div class="sidebar-menu">
            <ul>
                    <li>
                        <a href="Dashboard.php">
                            <div class="side-icon">
                                <span class="fa fa-home"></span>
                            </div>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="Hospitals.php">
                            <div class="side-icon">
                                <span class="fa fa-hospital-o"></span>
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
                        <a href="Patients.php">
                            <div class="side-icon">
                                <span class="fa fa-users"></span>
                            </div>
                            Patients
                        </a>
                    </li>
                    <li>
                        <a href="Diary.php">
                            <div class="side-icon">
                                <span class="fa fa-book"></span>
                            </div>
                            Diary
                        </a>
                    </li>
                    <li>
                        <a href="Treatments.php">
                            <div class="side-icon">
                                <span class="fa fa-stethoscope"></span>
                            </div>
                            Treatments
                        </a>
                    </li>
                    <li>
                        <a href="Reports.php">
                            <div class="side-icon">
                                <span class="fa fa-file-text"></span>
                            </div>
                            Reports
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
                <a href="Inquiry.php"><span class="fa fa-info"> </span></a>
                <a href="Settings.php"><span class="fa fa-cog"> </span></a>
            </div>
        </header>

        <main>
            
            <div class="inquiry-container" id="inquiry-container">
                <div class="head">
                    <div class="title">CHANGE PASSWORD</div>
                </div>
                <form action="" method="POST">
                    <div class="inquiry-details">
                    <div class="input-value">
                            <input type="text" name="id" value="<?php echo $id;?>" readonly hidden>
                        </div>
                        <div class="input-value">
                            <input type="text" name="name" value="<?php $doctor->d_name($id);?>" readonly>
                        </div>
                        <div class="input-value">
                            <input type="password" name="oldPass" placeholder="Old password" required>
                        </div>
                        <div class="input-value">
                            <input type="password" name="newPass" placeholder="New password" required>
                        </div>
                        <div class="input-value">
                            <input type="password" name="confirmNewPass" placeholder="Confirm new password" required>
                        </div>
                    </div>
                    <div class="insert-elements">
                        <input type="reset" name="reset"  class="reset-btn" value="Reset">
                        <input type="submit" name="changePass" class="send-btn" value="Change" id="sendtbtn">
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