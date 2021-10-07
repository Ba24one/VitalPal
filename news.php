<!DOCTYPE html>
<html>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <head>
        <title>VitalPal - Home Page</title>
        <link rel="stylesheet" href="css/style_1.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
<body>

<!----- Header ----->

<section class="sub-header">
    <nav>
        <a href="index.html"><img src="images/vitalpal_logo.png"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="news.php">NEWS</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li> <a href="logreg.php" class="asklogin-btn" target="_blank">LOGIN</a>  </li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <h1>News</h1>

</section>

<!-- ------ news page content ------ -->

<section class="news-content">

<?php
        include_once 'classes/news.php';
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

<?php
        }
?>

</section>

<!-- ----- Footer ------ -->

<section class="footer">
    <h4>About Us</h4>
    <p>
        The only platform to support both pre-covid and post-covid conditions in the island.
    </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made with <i class="fa fa-heart-o"></i> by Millennials from University of Moratuwa </p>
</section>



<!------Javascript for toggle menu------>
<script>

    var navLinks = document.getElementById("navLinks");

    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }

</script>



</body>
</html>