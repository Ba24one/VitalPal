<?php
// include function file
include_once("../classes/mealplan.php");

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

    $updatestatus=new Mealplan();

    $update = $updatestatus->m_update($_REQUEST['id'], $_REQUEST['mealType'],$_REQUEST['dietType'], $_REQUEST['dietPlan'], $_REQUEST['status']);
    if($update){
        
        echo "<script>alert('Account updated successfully!');</script>";
        // Code for redirection
        echo "<script>window.location.href='Meals.php'</script>";
    }
    else
    {
        // Code for redirection
        echo "<script>alert('Couldn't update status! Please Try Again!');</script>";
    }

}

else if(isset($_POST['submitInsert'])){

    $meal=new Mealplan();

    $register = $meal->m_create($_REQUEST['mealType'],$_REQUEST['dietType'], $_REQUEST['dietPlan']);
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
        <title>Admin-Meals</title>
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
                            <div class="marker">
                                <span class="fa fa-thumb-tack"></span>
                            </div> 
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
                            <small>Meal Type</small>
                            <input type="text" name="mealType"  placeholder="Lunch" required>
                        </div>
                        <div class="input-value">
                            <small>Diet Type</small>
                            <input type="text" name="dietType"  placeholder="Diarrhea" required>
                        </div>
                        <div class="input-value">
                            <small>Diet Plan</small>
                            <textarea type="text" name="dietPlan" placeholder="Add the plan" required></textarea>
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
                            <input  type="text" name="id" id="m_id" required data-readonly>
                        </div>
                        <div class="form-input">
                            <small>Meal Type</small> <br>
                            <input  type="text" name="mealType" id="m_mealType" required>
                        </div>
                        <div class="form-input">
                            <small>Diet Type</small> <br>
                            <input  type="text" name="dietType" id="m_dietType" required>
                        </div>
                        <div class="form-input">
                            <small>Diet Plan</small> <br>
                            <textarea  type="text" name="dietPlan" id="m_dietPlan" required></textarea>
                        </div>
                        <div class="form-input">
                            <small>Status </small> <br>
                            <select name="status" class="currentstatus" id="m_status" required>
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
                        <h2>Meals</h2>
                        <input type="text" name="search" id="search" placeholder="Search here...." >
                        <select data="fa fa-filter" name="filter" class="searchbyfilter" id="searchfilter" required>
                            <option value="1">Meal Type</option>
                            <option value="2">Diet Type</option>
                            <option value="3">Diet Plan</option>
                            <option value="4">Status</option>
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
                                            <p>Meal Type</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Diet Type</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>Diet Plan</p>
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
                                    include_once '../classes/mealplan.php';
                                    $fetchdata=new Mealplan();
                                    $sql=$fetchdata->m_fetchdata();
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
                                            '.$row['meal_ID'].'
                                        </div>
                                    </td>
                                    <td id=mealType'.$cnt.'>
                                        <div>
                                            '.$row['meal_type'].'
                                        </div>
                                    </td>
                                    <td id=dietType'.$cnt.'>
                                        <div>
                                            '.$row['diet_type'].'
                                        </div>
                                    </td>     
                                    <td id=dietPlan'.$cnt.'>
                                        <div>
                                            '.$row['diet_plan'].'
                                        </div>
                                    </td>                                                                       
                                    <td id=status'.$cnt.'>
                                        <div>
                                            '.$row['m_status'].'
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
            var txtArea = document.getElementById("m_dietPlan");
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
            document.getElementById("m_id").value = document.getElementById('id'+ rowNo).innerText;
            document.getElementById("m_mealType").value = document.getElementById('name'+ rowNo).innerText;
            document.getElementById("m_dietType").value = document.getElementById('dietType'+ rowNo).innerText;
            document.getElementById("m_dietPlan").value = document.getElementById('dietPlan'+ rowNo).innerText;
            document.getElementById("m_status").value = document.getElementById('status'+ rowNo).innerText;
        }

    </script>

    
</body>
</html>