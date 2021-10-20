<?php

session_start();
include_once '../classes/doctor.php';
$doctor = new Doctor;

include_once '../classes/treatment.php';
$treatment = new Treatment;

$id = $_SESSION['id'];
if (!$doctor->d_session()){
    header("location:../logreg.php");
}
if (isset($_REQUEST['q'])){
    $doctor->d_logout();
    header("location:../logreg.php");
}

if(isset($_POST['submitInsert'])){

    $treatment=new Treatment();

    $register = $treatment->t_create($_REQUEST['id'],$_REQUEST['dosage'], $_REQUEST['description'],  $_REQUEST['type'], $_REQUEST['date'], $id);
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
                    <li id="dash">
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
                <span class="fa fa-info"> </span>
                <span class="fa fa-cog"> </span>
            </div>
        </header>

        <main>

            <div class="multi-grid">

                <form action="" method="POST" id="form">
                    <div class="form-card">
                        <div class="form-head">
                            <h3>ADD TREATMENTS</h3>
                        </div>
                        <div class="form-input">
                            <small>Patient ID </small> <br>
                            <input  type="text" name="id" id="p_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Dosage </small> <br>
                            <input  type="text" name="dosage" id="t_dosage" required>
                        </div>
                        <div class="form-input">
                            <small>Description </small> <br>
                            <textarea  type="text" name="description" id="t_description" required></textarea>
                        </div>
                        <div class="form-input">
                            <small>Type </small> <br>
                            <input  type="text" name="type" id="t_type" required>
                        </div>
                        <div class="form-input">
                            <small>Date </small> <br>
                            <input  type="text" name="date" id="t_date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                        </div>

                        <div class="form-note">
                            <p>Note: Please select a patient from the table before inserting treatment details </p>
                        </div>
                        <div class="form-btn">
                            <input id="reset" type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitInsert" class="update-btn" value="Insert" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="filtering">
                        <h2>Patients</h2>
                        <input type="text" name="search" id="search1" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter1" required>
                            <!-- <option value="" selected hidden>Select by</option> -->
                            <option value="2">Name</option>
                            <option value="3">NIC</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table id="table1" width="100%">
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

            <div class="grid">

                <div class="data">
                    <div class="filtering">
                        <h2>Treatments</h2>
                        <input type="text" name="search" id="search2" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter2" required>
                            <!-- <option value="" selected hidden>Select by</option> -->
                            <option value="2">Patient Name</option>
                            <option value="3">NIC</option>
                            <option value="8">Doc Name</option>
                            <option value="4">Dosage</option>
                            <option value="5">Description</option>
                            <option value="6">Type</option>
                            <option value="7">Date</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table id="table2" width="100%">
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
                                            <p>Patient Name</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>NIC</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Dosage</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Description</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Type</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Date</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Doc Name</p>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                    include_once '../classes/treatment.php';
                                    $fetchdata=new Treatment();
                                    $sql=$fetchdata->t_fetchdata();
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
                                                    '.$row['treatment_ID'].'
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
                                            <td id=dosage'.$cnt.'>
                                                <div>
                                                    '.$row['dosage'].'
                                                </div>
                                            </td>   
                                            <td id=description'.$cnt.'>
                                                <div>
                                                    '.$row['description'].'
                                                </div>
                                            </td>   
                                            <td id=type'.$cnt.'>
                                                <div>
                                                    '.$row['type'].'
                                                </div>
                                            </td>  
                                            <td id=date'.$cnt.'>
                                                <div>
                                                    '.$row['date'].'
                                                </div>
                                            </td>   
                                            <td id=d_name'.$cnt.'>
                                                <div>
                                                    '.$row['d_name'].'
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

        // This is for auto-resize in textarea
        const tx = document.getElementsByTagName("textarea");
            for (let i = 0; i < tx.length; i++) {
            tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
            tx[i].addEventListener("input", OnInput, false);
        }

        function OnInput() {
            this.style.height = "40px";
            this.style.height = (this.scrollHeight) + "px";
        }

        document.getElementById('reset').onclick = function(){
            var txtArea = document.getElementById("t_description");
            txtArea.setAttribute("style", "height: 40px");
        }

        // empty the search input when category changed for patients table
        document.getElementById("searchfilter1").onchange = function(){
            var x = document.getElementById('search1').value = "";
        }

        // search inside the table using specific category for patients table
        document.getElementById("search1").onkeyup = function() {

            var x = document.getElementById('searchfilter1').value;

            var searchfilter = parseInt(x, 10);

            var filter = document.getElementById('search1').value.toUpperCase();

            var table = document.getElementById('table1');

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

        // empty the search input when category changed for treatments table
        document.getElementById("searchfilter2").onchange = function(){
            var x = document.getElementById('search2').value = "";
        }

        // search inside the table using specific category for treatments table
        document.getElementById("search2").onkeyup = function() {

            var x = document.getElementById('searchfilter2').value;

            var searchfilter = parseInt(x, 10);

            var filter = document.getElementById('search2').value.toUpperCase();

            var table = document.getElementById('table2');

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

        // load the row selected from the table into the insert form
        function loadData(rowNo){
            //alert(rowNo);
            document.getElementById("p_id").value = document.getElementById('id'+ rowNo).innerText;
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
        document.getElementById("t_date").setAttribute("max", today); 

    </script>
</body>
</html>