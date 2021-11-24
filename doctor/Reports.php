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

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Doctor-Reports</title>
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
                    <li id="dash">
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

            Under Maintanence
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