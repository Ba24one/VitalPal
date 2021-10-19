<?php

session_start();
include_once '../classes/doctor.php';
$doctor = new Doctor;

include_once '../classes/hospital_diary.php';
$hospital_diary = new HospitalDiary;

$id = $_SESSION['id'];
if (!$doctor->d_session()){
    header("location:../logreg.php");
}
if (isset($_REQUEST['q'])){
    $doctor->d_logout();
    header("location:../logreg.php");
}

if(isset($_POST['submitInsert'])){

    $hospital_diary = new HospitalDiary;

    $register = $hospital_diary->hd_create($_REQUEST['ward'],  $_REQUEST['bed'], $_REQUEST['condition'], $_REQUEST['p_id'],$_REQUEST['h_id'],  $id);
    if($register){
        echo "<script>alert('Inserted Successful!');</script>";
    }
    else
    {
        echo "<script>alert('Entered email address or username already exists!');</script>";
    }
    
}

else if(isset($_POST['submitUpdate'])){

    $updatestatus=new HospitalDiary();

    $update = $updatestatus->hd_update($_REQUEST['id'], $_REQUEST['wardNo'],$_REQUEST['bedNo'], $_REQUEST['condition'], $_REQUEST['status']);
    if($update){
        
        echo "<script>alert('Account updated successfully!');</script>";
        // Code for redirection
        echo "<script>window.location.href='Diary.php'</script>";
    }
    else
    {
        // Code for redirection
        echo "<script>alert('Couldn't update status! Please Try Again!');</script>";
    }

}

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Doctor-Diary</title>
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
                    <li id="dash">
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
                <span class="fa fa-info"> </span>
                <span class="fa fa-cog"> </span>
            </div>
        </header>

        <main>

            <div class="multi-grid">

                <form action="" method="POST" id="form">
                    <div class="form-card">
                        <div class="form-head">
                            <h3>INSERT DIARY</h3>
                        </div>
                        <div class="form-input">
                            <small>Patient ID </small> <br>
                            <input  type="text" name="p_id" id="p_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Hospital ID </small> <br>
                            <input  type="text" name="h_id" id="h_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Ward No. </small> <br>
                            <input  type="text" name="ward" id="wardNo" required>
                        </div>
                        <div class="form-input">
                            <small>Bed No. </small> <br>
                            <textarea  type="text" name="bed" id="bedNo" required></textarea>
                        </div>
                        <div class="form-input">
                            <small>Condition </small> <br>
                            <select name="condition" id="condition" class="conditionscale" required>
                                <option value="" selected hidden>Select status</option>
                                <option value="much better">Better</option>
                                <option value="better">Worse</option>
                                <option value="Critical">Critical</option>
                            </select>
                        </div>

                        <div class="form-note">
                            <p>Note: Please select a patient and hospital to create a diary </p>
                        </div>
                        <div class="form-btn">
                            <input id="reset" type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitInsert" class="update-btn" value="CREATE" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="table-filtering">
                        <h2>Select Table</h2>
                        <select data="fa fa-filter" name="filter" class="selectTable" id="selectTable" onchange="showDiv(this)" required>
                            <!-- <option value="" selected hidden>Select by</option> -->
                            <option value="1">Patient</option>
                            <option value="2">Hospital</option>
                        </select>
                    </div>
                    <div id="p_table">
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
                                            <td id=pat_id'.$cnt.'>
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
                                                    <button  id="updaterow" onclick="loadData1('.$cnt.')"><span class="fa fa-pencil"></span></button>
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
                    <div id="h_table" hidden>
                        <div class="filtering">
                            <h2>Hospitals</h2>
                            <input type="text" name="search" id="search2" placeholder="Search here...." >
                            <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter2" required>
                                <!-- <option value="" selected hidden>Select by</option> -->
                                <option value="2">Name</option>
                                <option value="3">Location</option>
                                <option value="4">Type</option>
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
                                                <p>Hospital Name</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p>Location</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p>Type</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p></p>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php
                                    include_once '../classes/hospitals.php';
                                    $fetchdata=new Hospital();
                                    $sql=$fetchdata->h_fetchdata_active();
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
                                            <td id=hos_id'.$cnt.'>
                                                <div>
                                                    '.$row['hospital_ID'].'
                                                </div>
                                            </td>                               
                                            <td id=name'.$cnt.'>
                                                <div>
                                                    '.$row['name'].'
                                                </div>
                                            </td>
                                            <td id=location'.$cnt.'>
                                                <div>
                                                    '.$row['location'].'
                                                </div>
                                            </td>
                                            <td id=type'.$cnt.'>
                                                <div>
                                                    '.$row['type'].'
                                                </div>
                                            </td>
                                            <td>
                                                <div class="update">
                                                    <button  id="updaterow" onclick="loadData2('.$cnt.')"><span class="fa fa-pencil"></span></button>
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
            </div>

            <div class="multi-grid"  style="margin-top:5%;">

                <form action="" method="POST" id="form">
                    <div class="form-card">
                        <div class="form-head">
                            <h3>UPDATE DIARY</h3>
                        </div>
                        <div class="form-input">
                            <small>Diary ID </small> <br>
                            <input  type="text" name="id" id="d_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Ward No. </small> <br>
                            <input  type="text" name="wardNo" id="d_wardNo" required>
                        </div>
                        <div class="form-input">
                            <small>Bed No. </small> <br>
                            <input  type="text" name="bedNo" id="d_bedNo" required>
                        </div>
                        <div class="form-input">
                            <small>Condition </small> <br>
                            <select name="condition" id="d_condition" class="conditionscale" required>
                                <option value="" selected hidden>Select condition</option>
                                <option value="much better">Better</option>
                                <option value="better">Worse</option>
                                <option value="critical">Critical</option>
                            </select>
                        </div>
                        <div class="form-input">
                            <small>Status </small> <br>
                            <select name="status" id="d_status" class="conditionscale" required>
                                <option value="" selected hidden>Select status</option>
                                <option value="a">Active</option>
                                <option value="i">Inactive</option>
                            </select>
                        </div>

                        <div class="form-note">
                            <p>Note: You can only update patient status details <br> Please select a patient from the table </p>
                        </div>
                        <div class="form-btn">
                            <input id="reset" type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitUpdate" class="update-btn" value="Update" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="filtering">
                        <h2>Diaries</h2>
                        <input type="text" name="search" id="search3" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter3" required>
                            <!-- <option value="" selected hidden>Select by</option> -->
                            <option value="2">Patient</option>
                            <option value="3">Hospital</option>
                            <option value="4">Ward No.</option>
                            <option value="5">Bed No.</option>
                            <option value="6">Condition</option>
                            <option value="7">Doctor</option>
                            <option value="8">Status</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table id="table3" width="100%">
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
                                            <p>Patient</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Hospital</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Ward No.</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Bed No.</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Condition</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Doctor</p>
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
                                    include_once '../classes/hospital_diary.php';
                                    $fetchdata=new HospitalDiary();
                                    $sql=$fetchdata->hd_fetchdata();
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
                                            <td id=diary_id'.$cnt.'>
                                                <div>
                                                    '.$row['hosDiary_ID'].'
                                                </div>
                                            </td>
                                            <td id=diary_name'.$cnt.'>
                                                <div>
                                                    '.$row['p_name'].'
                                                </div>
                                            </td>
                                            <td id=h_name'.$cnt.'>
                                                <div>
                                                    '.$row['name'].'
                                                </div>
                                            </td>
                                            <td id=diary_wardNo'.$cnt.'>
                                                <div>
                                                    '.$row['wardNo'].'
                                                </div>
                                            </td>
                                            <td id=diary_BedNo'.$cnt.'>
                                                <div>
                                                    '.$row['bedNo'].'
                                                </div>
                                            </td>
                                            <td id=condition'.$cnt.'>
                                                <div>
                                                    '.$row['p_condition'].'
                                                </div>
                                            </td>
                                            <td id=d_name'.$cnt.'>
                                                <div>
                                                    '.$row['d_name'].'
                                                </div>
                                            </td>  
                                            <td id=status'.$cnt.'>
                                                <div>
                                                    '.$row['status'].'
                                                </div>
                                            </td> 
                                            <td>
                                                <div class="update">
                                                    <button  id="updaterow" onclick="loadData3('.$cnt.')"><span class="fa fa-pencil"></span></button>
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

        // empty the search input when category changed for hospital table
        document.getElementById("searchfilter2").onchange = function(){
            var x = document.getElementById('search2').value = "";
        }

        // search inside the table using specific category for hospital table
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

        // empty the search input when category changed for diary table
        document.getElementById("searchfilter3").onchange = function(){
            var x = document.getElementById('search3').value = "";
        }
        
        // search inside the table using specific category for diary table
        document.getElementById("search3").onkeyup = function() {

            var x = document.getElementById('searchfilter3').value;
            var searchfilter = parseInt(x, 10);
            var filter = document.getElementById('search3').value.toUpperCase();
            var table = document.getElementById('table3');
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

        function showDiv(select){
            if(select.value==1){
                document.getElementById('p_table').style.display = "block";
                document.getElementById('h_table').style.display = "none";
            } else{
                document.getElementById('p_table').style.display = "none";
                document.getElementById('h_table').style.display = "block";
            }
        } 

        // load the row selected from the patients table into the insert form
        function loadData1(rowNo){
            document.getElementById("p_id").value = document.getElementById('pat_id'+ rowNo).innerText;
        }

        // load the row selected from the hospitals table into the insert form
        function loadData2(rowNo){
            document.getElementById("h_id").value = document.getElementById('hos_id'+ rowNo).innerText;
        }

        // load the row selected from the diary table into the insert form
        function loadData3(rowNo){
            document.getElementById("d_id").value = document.getElementById('diary_id'+ rowNo).innerText;
            document.getElementById("d_wardNo").value = document.getElementById('diary_wardNo'+ rowNo).innerText;
            document.getElementById("d_bedNo").value = document.getElementById('diary_BedNo'+ rowNo).innerText;
            document.getElementById("d_condition").value = document.getElementById('diary_con'+ rowNo).innerText;
            document.getElementById("d_status").value = document.getElementById('diary_status'+ rowNo).innerText;
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