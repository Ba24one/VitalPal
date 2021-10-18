<?php

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

?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <head>
        <title>Patient-Vaccination</title>
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
                <img src="../images/vitalpal_logo_square.png?v=<?php echo time(); ?>" alt="">
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
                    <li>
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
                    <li id="dash">
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
    
        <div class="grid">
        <?php
            include_once '../classes/news.php';
            $fetchdata=new News();
            $sql=$fetchdata->n_fetchdata();
            while($row=mysqli_fetch_array($sql)){
        ?>
            <div class="row">
                <div class="news-col">
                    <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($row['picture']);?>" alt="" >
                </div>
                <div class="news-col">
                    <h3>
                        <?php echo htmlentities($row['title']);?>
                    </h3>
                    <p>
                        <?php echo htmlentities($row['description']);?>
                    </p>
                    <div class="line-breaker">
                        
                    </div>
                    <div class="author">
                        <p>
                            <?php echo htmlentities($row['author']);?>
                        </p>
                    </div>
                    <div class="date">
                        <p>
                            <?php echo htmlentities($row['date']);?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
        ?>

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