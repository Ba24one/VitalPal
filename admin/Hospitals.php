<?php
// include function file
include_once("../classes/hospitals.php");

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

    $updatestatus=new Hospital();

    $update = $updatestatus->h_update($_REQUEST['id'], $_REQUEST['name'],$_REQUEST['location'], $_REQUEST['contact'], $_REQUEST['type'], $_REQUEST['status']);
    if($update){
        
        echo "<script>alert('Account updated successfully!');</script>";
        // Code for redirection
        echo "<script>window.location.href='Hospitals.php'</script>";
    }
    else
    {
        // Code for redirection
        echo "<script>alert('Couldn't update status! Please Try Again!');</script>";
    }

}

else if(isset($_POST['submitInsert'])){

    $hospital=new Hospital();

    $register = $hospital->h_create($_REQUEST['name'],$_REQUEST['location'], $_REQUEST['contact'],  $_REQUEST['type']);
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
        <title>Admin-Hospitals</title>
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
                            <div class="marker">
                                <span class="fa fa-thumb-tack"></span>
                            </div>   
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

            <div class="insert-container" id="insert-container">
                <div class="head">
                    <div class="title">INSERT DETAILS</div>
                    <div  id="hide-insert" class="hideinsert"><span class="fa fa-minus"></span></div>
                </div>
                <form action="" method="POST">
                    <div class="insert-details">
                        <div class="input-value">
                            <small>Name</small>
                            <input type="text" name="name"  placeholder="Colombo Teaching Hospital" required>
                        </div>
                        <div class="input-value">
                            <small>Location</small>
                            <input type="text" name="location"  placeholder="Kalubowila" required>
                        </div>
                        <div class="input-value">
                            <small>Contact</small>
                            <input type="text" name="contact"  placeholder="+94 11 2396 586" required>
                        </div>
                        <div class="input-value">
                            <small>Type</small>
                            <input type="text" name="type" placeholder="Government Hospital" required>
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
                            <input  type="text" name="id" id="h_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Name</small> <br>
                            <input  type="text" name="name" id="h_name" required>
                        </div>
                        <div class="form-input">
                            <small>Location</small> <br>
                            <input  type="text" name="location" id="h_location" required>
                        </div>
                        <div class="form-input">
                            <small>Contact</small> <br>
                            <input  type="text" name="contact" id="h_contact" required>
                        </div>
                        <div class="form-input">
                            <small>Type</small> <br>
                            <input  type="text" name="type" id="h_type" required>
                        </div>
                        <div class="form-input">
                            <small>Status </small> <br>
                            <select name="status" class="currentstatus" id="h_status" required>
                                <option value="" selected hidden>Select status</option>
                                <option value="a">Active</option>
                                <option value="i">Inactive</option>
                            </select>
                        </div>

                        <div class="form-note">
                            <p>Note: Please select a hospital from the table </p>
                        </div>
                        <div class="form-btn">
                            <input type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitUpdate" class="update-btn" value="Update" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="filtering">
                        <h2>Hospitals</h2>
                        <input type="text" name="search" id="search" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                            <option value="2">Name</option>
                            <option value="3">Location</option>
                            <option value="4">Contact</option>
                            <option value="5">Type</option>
                            <option value="6">Status</option>
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
                                            <p>Location</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Contact</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Type</p>
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
                                    include_once '../classes/hospitals.php';
                                    $fetchdata=new Hospital();
                                    $sql=$fetchdata->h_fetchdata();
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
                                    <td id=contact'.$cnt.'>
                                        <div>
                                            '.$row['contact'].'
                                        </div>
                                    </td>
                                    <td id=type'.$cnt.'>
                                        <div>
                                            '.$row['type'].'
                                        </div>
                                    </td>                                    
                                    <td id=status'.$cnt.'>
                                        <div>
                                            '.$row['h_status'].'
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

        document.getElementById('hide-insert').onclick = function(){
            document.getElementById('insert-container').style.display = 'none';
        }

        document.getElementById('show-insert').onclick = function(){
            document.getElementById('insert-container').style.display = 'grid';
        }

        document.getElementById("searchfilter").onchange = function(){
            var x = document.getElementById('search').value = "";

        }

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

        function loadData(rowNo){
            //alert(rowNo);
            document.getElementById("h_id").value = document.getElementById('id'+ rowNo).innerText;
            document.getElementById("h_name").value = document.getElementById('name'+ rowNo).innerText;
            document.getElementById("h_location").value = document.getElementById('location'+ rowNo).innerText;
            document.getElementById("h_contact").value = document.getElementById('contact'+ rowNo).innerText;
            document.getElementById("h_type").value = document.getElementById('type'+ rowNo).innerText;
            document.getElementById("h_status").value = document.getElementById('status'+ rowNo).innerText;
        }

    </script>

    
</body>
</html>