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

if(isset($_POST['submitInsert'])){

    // code the create function for treatments

}

if(isset($_GET['remove'])){
    include_once '../classes/patient.php';

    $updatestatus=new Patient();

    $patientid=$_GET['remove'];

    $update = $updatestatus->p_statusupdate($patientid, 'i');
    if($update){
        
        echo "<script>alert('Patient removed from active status!');</script>";
        // Code for redirection
        echo "<script>window.location.href='Patients.php'</script>";
    }
    else
    {
        // Code for redirection
        echo "<script>alert('Couldn't remove patient! Please Try Again!');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Doctor-Treatments</title>
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
                    <li id="dash">
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

        <div class="grid">
            <div class="data">
                <div class="filtering">
                    <h2>Hospitals</h2>
                    <input type="text" name="search" id="search" placeholder="Search here...." >
                    <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                        <option value="2">Name</option>
                        <option value="3">NIC</option>
                        <option value="4">DoB</option>
                        <option value="5">Address</option>
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
                                        <p>Name</p>
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
                                        <p>Address</p>
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
                                    $sql=$fetchdata->p_fetchdata_active();
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
                                            <td>
                                                <div class="delete"> '; ?>
                                                    
                                                        <a href="Patients.php?remove=<?php echo htmlentities($row['patient_id']);?>"><button onClick="return confirm('Do you really want to remove this patient?');"><span class="fa fa-trash"></span></button></a>
                                            <?php    
                                            echo '
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

    <script>

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
        
    </script>
</body>
</html>