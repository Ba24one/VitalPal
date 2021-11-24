<?php
// include function file
include_once("../classes/patient.php");

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

if(isset($_POST['submitUpdate'])){
    $updatestatus=new Patient();

    $update = $updatestatus->p_statusupdate($_REQUEST['id'], $_REQUEST['status']);
    if($update){
        
        echo "<script>alert('Account updated successfully!');</script>";
        // Code for redirection
        echo "<script>window.location.href='Patients.php'</script>";
    }
    else
    {
        // Code for redirection
        echo "<script>alert('Couldn't update status! Please Try Again!');</script>";
    }
}

else if(isset($_POST['submitInsert'])){
    $patient=new Patient();

    $register = $patient->p_register($_REQUEST['name'],$_REQUEST['gender'], $_REQUEST['dob'],  $_REQUEST['nic'], $_REQUEST['address'],$_REQUEST['email'],  $_REQUEST['username'], $_REQUEST['password']);
    if($register){
        echo "<script>alert('Inserted Successful!');</script>";
    }
    else
    {
        echo "<script>alert('Entered email address or username already exists!');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Admin-Patients</title>
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
                            <div class="marker">
                                <span class="fa fa-thumb-tack"></span>
                            </div>
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

            <div class="grid">

                <form action="" method="POST" id="form">
                    <div class="form-card">
                        <div class="form-head">
                            <h3>UPDATE DETAILS</h3>
                        </div>

                        <div class="form-input">
                            <small>ID </small> <br>
                            <input  type="text" name="id" id="p_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Name </small> <br>
                            <input  type="text" name="name" id="p_name" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Status </small> <br>
                            <select name="status" class="currentstatus" id="p_status" required>
                                <option value="" selected hidden>Select status</option>
                                <option value="a">Active</option>
                                <option value="i">Inactive</option>
                            </select>
                        </div>

                        <div class="form-note">
                            <p>Note: You can only update patient status details <br> Please select a patient from the table </p>
                        </div>
                        <div class="form-btn">
                            <input type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitUpdate" class="update-btn" value="Update" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="filtering">
                        <h2>Patients</h2>
                        <input type="text" name="search" id="search" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                            <!-- <option value="" selected hidden>Select by</option> -->
                            <option value="2">Name</option>
                            <option value="3">NIC</option>
                            <option value="6">Username</option>
                            <option value="7">Status</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table id="table" width="100%">
                            <tbody>
                                <tr class="table-heading">
                                    <td>
                                        <div class="indicator-heading"> 
                                            <span class="fa fa-arrow-down"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>ID</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Patient name</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>NIC</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Date of Birth</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Address.</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Username</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Status</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p></p>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                    include_once '../classes/patient.php';
                                    $fetchdata=new Patient();
                                    $sql=$fetchdata->p_fetchdata();
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                
                                echo '
                                <tr>
                                    <td>
                                        <div>
                                            <span class="indicator"></span>
                                        </div>
                                    </td>
                                    <td id=id'.$cnt.'>
                                        <div>
                                            '.$row['patient_id'].'
                                        </div>
                                    </td>
                                    <td id=name'.$cnt.'>
                                        <div>
                                            '.$row['p_name'].'
                                        </div>
                                    </td>
                                    <td id=nic'.$cnt.'>
                                        <div>
                                            '.$row['nic'].'
                                        </div>
                                    </td>
                                    <td id=dob'.$cnt.'>
                                        <div>
                                            '.$row['p_dob'].'
                                        </div>
                                    </td>
                                    <td id=address'.$cnt.'>
                                        <div>
                                            '.$row['address'].'
                                        </div>
                                    </td>
                                    <td id=username'.$cnt.'>
                                        <div>
                                            '.$row['p_username'].'
                                        </div>
                                    </td>
                                    <td id=status'.$cnt.'>
                                        <div>
                                            '.$row['p_status'].'
                                        </div>
                                    </td>
                                    <td>
                                        <div class="update">
                                            
                                                <button  id="updaterow" onclick="loadData('.$cnt.')"><span class="fa fa-pencil"></span></button>
                                            
                                        </div>
                                    </td>
                                </tr>       
                                ';
                                   $cnt++;
                                    }
                                ?>                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <label for="sidebar-toggle" class="body-label"></label>

    <script  type="text/javascript">

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
            document.getElementById("p_id").value = document.getElementById('id'+ rowNo).innerText;
            document.getElementById("p_name").value = document.getElementById('name'+ rowNo).innerText;
            document.getElementById("p_status").value = document.getElementById('status'+ rowNo).innerText;
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

    </script>

    
</body>
</html>