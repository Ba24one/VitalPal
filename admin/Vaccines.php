<?php
// include function file
include_once("../classes/vaccine.php");

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

    $updatestatus=new Vaccine();

    $update = $updatestatus->v_update($_REQUEST['id'], $_REQUEST['type'],$_REQUEST['description'], $_REQUEST['location'], $_REQUEST['date'], $_REQUEST['status']);
    if($update){
        
        echo "<script>alert('Account updated successfully!');</script>";
        // Code for redirection
        echo "<script>window.location.href='Vaccines.php'</script>";
    }
    else
    {
        // Code for redirection
        echo "<script>alert('Couldn't update status! Please Try Again!');</script>";
    }
}

else if(isset($_POST['submitInsert'])){

    $vaccine=new Vaccine();

    $register = $vaccine->v_create($_REQUEST['name'],$_REQUEST['description'], $_REQUEST['location'], $_REQUEST['date']);
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
        <title>Admin-Vaccines</title>
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
                            <div class="marker">
                                <span class="fa fa-thumb-tack"></span>
                            </div> 
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
                            <small>Type</small>
                            <input type="text" name="name"  placeholder="Sinopharm" required>
                        </div>
                        <div class="input-value">
                            <small>Description</small>
                            <textarea type="text" name="description" placeholder="Add your description" required></textarea>
                        </div>
                        <div class="input-value">
                            <small>Location</small>
                            <input type="text" name="location"  placeholder="MoH" required>
                        </div>
                        <div class="input-value">
                            <small>Date</small>
                            <input type="text" id="date" name="date" placeholder="MM-DD-YYYY" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                        </div>
                    </div>
                    <div class="insert-elements">
                        <input id="reset1" type="reset" name="reset"  class="reset-btn" value="Reset">
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
                            <input  type="text" name="id" id="v_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Type</small> <br>
                            <input  type="text" name="type" id="v_type" required>
                        </div>
                        <div class="form-input">
                            <small>Decription</small> <br>
                            <textarea type="text" name="description" id="v_description" required></textarea>
                        </div>
                        <div class="form-input">
                            <small>Location</small> <br>
                            <input  type="text" name="location" id="v_location" required>
                        </div>
                        <div class="form-input">
                            <small>Date</small> <br>
                            <input type="text" id="v_date" name="date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                        </div>
                        <div class="form-input">
                            <small>Status </small> <br>
                            <select name="status" class="currentstatus" id="v_status" required>
                                <option value="" selected hidden>Select status</option>
                                <option value="a">Active</option>
                                <option value="i">Inactive</option>
                            </select>
                        </div>

                        <div class="form-note">
                            <p>Note: Please select a mealplan from the table </p>
                        </div>
                        <div class="form-btn">
                            <input id="reset2" type="reset" name="reset"  class="cancel-btn" value="Cancel">
                            <input type="submit" name="submitUpdate" class="update-btn" value="Update" id="submitbtn">
                        </div>
                    </div>
                </form>

                <div class="data">
                    <div class="filtering">
                        <h2>Vaccines</h2>
                        <input type="text" name="search" id="search" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                            <option value="2">Type</option>
                            <option value="3">Description</option>
                            <option value="4">Location</option>
                            <option value="5">Status</option>
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
                                            <p>Type</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Description</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Location</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Date</p>
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
                                    include_once '../classes/vaccine.php';
                                    $fetchdata=new Vaccine();
                                    $sql=$fetchdata->v_fetchdata();
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
                                            '.$row['vaccine_ID'].'
                                        </div>
                                    </td>
                                    <td id=type'.$cnt.'>
                                        <div>
                                            '.$row['type'].'
                                        </div>
                                    </td>
                                    <td id=description'.$cnt.'>
                                        <div>
                                            '.$row['description'].'
                                        </div>
                                    </td>     
                                    <td id=location'.$cnt.'>
                                        <div>
                                            '.$row['location'].'
                                        </div>
                                    </td>   
                                    <td id=date'.$cnt.'>
                                        <div>
                                            '.$row['date'].'
                                        </div>
                                    </td>                                                                       
                                    <td id=status'.$cnt.'>
                                        <div>
                                            '.$row['v_status'].'
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
        document.getElementById('reset1').onclick = function(){
            var txtArea = document.querySelector("textarea");
            txtArea.setAttribute("style", "height: 40px");
        }

        document.getElementById('reset2').onclick = function(){
            var txtArea = document.getElementById("v_description");
            txtArea.setAttribute("style", "height: 40px");
        }

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
            document.getElementById("v_id").value = document.getElementById('id'+ rowNo).innerText;
            document.getElementById("v_type").value = document.getElementById('type'+ rowNo).innerText;
            document.getElementById("v_description").value = document.getElementById('description'+ rowNo).innerText;
            document.getElementById("v_location").value = document.getElementById('location'+ rowNo).innerText;
            document.getElementById("v_date").value = document.getElementById('date'+ rowNo).innerText;
            document.getElementById("v_status").value = document.getElementById('status'+ rowNo).innerText;
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
        document.getElementById("date").setAttribute("min", today); 
        document.getElementById("v_date").setAttribute("min", today); 

    </script>

    
</body>
</html>