<?php

// include function file
include_once("../classes/health_status.php");

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

if(isset($_POST['submitInsert'])){

    $healthStatus=new HealthStatus();

    $register = $healthStatus->hs_create($_REQUEST['condition'],$_REQUEST['food'], $_REQUEST['date'],  $id);
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
        <title>Patient-Health Status</title>
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
                <img src="../images/vitalpal_logo_bw.png" alt="">
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
                    <li id="dash">
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
                <span class="fa fa-info"> </span>
                <span class="fa fa-cog"> </span>
            </div>
        </header>

        <main>
            <div class="insert-container" id="insert-container">
                    
            <?php
            
                date_default_timezone_set('Asia/Colombo');
            
                $myDate = date('Y/m/d');

                if (date('H') > 13){                    
                        
                    include_once '../classes/config.php';
                    $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error($con));

                    $checkuser = mysqli_query($con, "SELECT * FROM patient_diary WHERE patient_id = '$id' AND date = '$myDate'") or die(mysqli_error($con));
                    $result = mysqli_num_rows($checkuser);
                
                    if ($result == 0){
            ?>
                        <div class="head">
                            <div class="title">INSERT STATUS</div>
                        </div>
                        
                        <form action="" method="POST">
                            <div class="insert-details">
                                <div class="input-value">
                                    <small>Condition</small>
                                    <select name="condition" class="conditionscale" required>
                                        <option value="" selected hidden>Select status</option>
                                        <option value="much better">Much Better</option>
                                        <option value="better">Better</option>
                                        <option value="same">Same</option>
                                        <option value="worse">Worse</option>
                                        <option value="much worse">Much Worse</option>
                                    </select>
                                </div>
                                <div class="input-value">
                                    <small>Food</small>
                                    <textarea type="text" name="food" placeholder="What did you have?" required></textarea>
                                </div>
                                <div class="input-value">
                                    <small>Date</small>
                                    <input type="text" id="date" name="date" placeholder="MM-DD-YYYY" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                                </div>
                            </div>
                            <div class="insert-elements">
                                <input id="reset" type="reset" name="reset"  class="reset-btn" value="Reset">
                                <input type="submit" name="submitInsert" class="insert-btn" value="Enter" id="insertbtn">
                            </div>
                        </form>
            <?php 
                    } else{ 
            ?>
                        <div class="no-head">
                            <div class="title">You can enter your status details only once a day.</div>
                        </div>
            <?php 
                    } 

                } else { 
            ?>
                    <div class="no-head">
                        <div class="title">You are allowed to enter your status everyday after 6.00 p.m only</div>
                    </div>
            <?php
                }
            ?>                   

            </div>

            <div class="grid">
                <div class="data">
                    <div class="filtering">
                        <h2>Records</h2>
                        <input type="text" name="search" id="search" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                            <option value="1">Condition</option>
                            <option value="2">Food</option>
                            <option value="3">Date</option>
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
                                            <p>Condition</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Food</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Date</p>
                                        </div>
                                    </td>
                                </tr>
                                
                                <?php
                                    include_once '../classes/health_status.php';
                                    $fetchdata=new HealthStatus();
                                    $sql=$fetchdata->hs_fetchdata($id);
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
                                    <td id=condition'.$cnt.'>
                                        <div>
                                            '.$row['p_condition'].'
                                        </div>
                                    </td>
                                    <td id=food'.$cnt.'>
                                        <div>
                                            '.$row['food'].'
                                        </div>
                                    </td>
                                    <td id=date'.$cnt.'>
                                        <div>
                                            '.$row['date'].'
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

        //This is to reset the textarea height once the reset is clicked
        document.getElementById('reset').onclick = function(){
            var txtArea = document.querySelector("textarea");
            txtArea.setAttribute("style", "height: 40px");
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
        document.getElementById("date").setAttribute("max", today); 
        document.getElementById("n_date").setAttribute("max", today); 
    </script>
</body>
</html>