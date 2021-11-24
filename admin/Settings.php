<?php
// include function file
include_once("../classes/admin.php");

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

if(isset($_POST['changePass'])){

    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmNewPass'];

    if ($newPass == $confirmPass){

        $updatePassword=new Admin();

        $change = $updatePassword->a_changePass($_REQUEST['id'], $_REQUEST['oldPass'], $_REQUEST['newPass']);
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
        <title>Admin-Settings</title>
        <link rel = "icon" type = "image/png" href = "../images/vitalpal_logo_square.png">
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
                <img src="../images/vitalpal_logo_square.png?v=<?php echo time(); ?>" alt="">
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
                            <input type="text" name="name" value="<?php $admin->a_name($id);?>" readonly>
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

    <script  type="text/javascript">

        //Hide and show insert form 
        document.getElementById('hide-insert').onclick = function(){
            document.getElementById('insert-container').style.display = 'none';
        }

        document.getElementById('show-insert').onclick = function(){
            document.getElementById('insert-container').style.display = 'grid';
        }

        // empty the search input when category changed
        document.getElementById("searchfilter").onchange = function(){
            var x = document.getElementById('search').value = "";

        }

        // search inside the table using specific category
        document.getElementById("search").onkeyup = function() {

            var x = document.getElementById('searchfilter').value;

            var searchfilter = parseInt(x, 10);

            var filter = document.getElementById('search').value.toUpperCase();

            var table = document.getElementById('table');

            var tr = table.getElementsByTagName('tr');

            for(var i=0; i<tr.length; i++){
                var textValue = tr[i].getElementsByTagName('td')[searchfilter].innerText;

                if(textValue){
                    if(textValue.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }
                    else{
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // load the row selected from the table into the update form
        function loadData(rowNo){
            //alert(rowNo);
            document.getElementById("a_id").value = document.getElementById('id'+ rowNo).innerText;
            document.getElementById("a_name").value = document.getElementById('name'+ rowNo).innerText;
            document.getElementById("a_role").value = document.getElementById('role'+ rowNo).innerText;
            document.getElementById("a_dob").value = document.getElementById('dob'+ rowNo).innerText;
            document.getElementById("a_nic").value = document.getElementById('nic'+ rowNo).innerText;
            document.getElementById("a_username").value = document.getElementById('username'+ rowNo).innerText;
            document.getElementById("a_status").value = document.getElementById('status'+ rowNo).innerText;
        }    

        //keep the max date as of today
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth()+1; //January is 0!
        var year = today.getFullYear();
        if(day<10){
                day='0'+day
            } 
            if(month<10){
                month='0'+month
            } 

        today = year+'-'+month+'-'+day;
        document.getElementById("dob").setAttribute("max", today); 
        document.getElementById("a_dob").setAttribute("max", today); 

    </script>

    
</body>
</html>