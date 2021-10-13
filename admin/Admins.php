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

    // code the update function for admins

}

else if(isset($_POST['submitInsert'])){

    // code the create function for admins

}

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Admin-Admins</title>
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
                            <div class="marker">
                                <span class="fa fa-thumb-tack"></span>
                            </div>         
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

            <div class="insert-container" id="insert-container">
                <div class="head">
                    <div class="title">INSERT DETAILS</div>
                    <div  id="hide-insert" class="hideinsert"><span class="fa fa-minus"></span></div>
                </div>
                <form action="" method="POST">
                    <div class="insert-details">
                        <div class="input-value">
                            <small>Admin Name</small>
                            <input type="text" name="name"  placeholder="KH Senaratne" required>
                        </div>
                        <div class="input-value">
                            <small>Role</small>
                            <input type="text" name="role" placeholder="Ordinary" required>
                        </div>
                        <div class="input-value">
                            <small>Date of Birth</small>
                            <input type="text" id="dob" name="dob" placeholder="MM-DD-YYYY" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                        </div>
                        <div class="input-value">
                            <small>NIC</small>
                            <input type="text" name="nic" placeholder="855485635V" required>
                        </div>
                        <div class="input-value">
                            <small>Username</small>
                            <input type="text" name="username" placeholder="good admin" required>
                        </div>
                        <div class="input-value">
                            <small>Password</small>
                            <input type="text" name="password" placeholder="ab24cd" required>
                        </div>
                    </div>
                    <div class="insert-elements">
                        <input type="reset" name="reset"  class="reset-btn" value="Reset">
                        <input type="submit" name="submitInsert" class="insert-btn" value="Insert" id="insertbtn">
                    </div>
                </form>
            </div>

            <div class="grid">

                <form action="" method="POST" id="form">
                    <div class="form-card">
                        <div class="form-head">
                            <h3>UPDATE DETAILS</h3>
                            <div  id="show-insert" class="showinsert"><span class="fa fa-plus"></span></div>
                        </div>

                        <div class="form-input">
                            <small>ID </small> <br>
                            <input  type="text" name="id" id="a_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Admin Name </small> <br>
                            <input  type="text" name="name" id="a_name" required>
                        </div>
                        <div class="form-input">
                            <small>Role</small> <br>
                            <input  type="text" name="practice" id="a_role" required>
                        </div>
                        <div class="form-input">
                            <small>Date of Birth</small> <br>
                            <input  type="text" name="dob" id="a_dob" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                        </div>
                        <div class="form-input">
                            <small>NIC</small> <br>
                            <input  type="text" name="nic" id="a_nic" required>
                        </div>
                        <div class="form-input">
                            <small>Username</small> <br>
                            <input  type="text" name="username" id="a_username" required>
                        </div>
                        <div class="form-input">
                            <small>Status </small> <br>
                            <select name="status" class="currentstatus" id="a_status" required>
                                <option value="" selected hidden>Select status</option>
                                <option value="a">Active</option>
                                <option value="i">Inactive</option>
                            </select>
                        </div>

                        <div class="form-note">
                            <p>Note: Please select a admin from the table </p>
                        </div>
                        <div class="form-btn">
                            <input type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitUpdate" class="update-btn" value="Update" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="filtering">
                        <h2>Admins</h2>
                        <input type="text" name="search" id="search" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                            <option value="2">Name</option>
                            <option value="3">Role</option>
                            <option value="5">NIC</option>
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
                                            <p>Admin Name</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Role</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Date of Birth</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>NIC</p>
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
                                
                                
                                // copy and paste codes from line 279 to 340 from Patients.php and change according to the table heading tha I've given


                            </tbody>
                        </table>
                    </div>
                </div>
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