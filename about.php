<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <h1>About Us</h1>

</section>

<!-- -------- about us content --------- -->

<section class="about-us">
    
    <div class="row">
        <div class="about-col">
            <h1>Only platform solely dedicated to render services related to Covid in the island</h1>
            <p>
                The VitalPal Covid Patient Management System is a web-based application where it bridges self-quarantined patients and the Ministry of health
                to understand the patients who are currently undergoing domestic medication to recover from the Covid-19 Corona Virus.
            </p>
                <a href="index.php" class="common-btn green-btn">EXPLORE NOW</a>
        </div>
        <div class="about-col">
            <img src="images/about.jpg" alt="">
        </div>
    </div>

</section>

<!-- ------ team ------ -->

<section class="team">

    <h1>Our Development Team</h1>
    <p>Millennials from the University of Moratuwa</p>

    <div class="row">
        <div class="team-col">
            <img src="images/london.png" alt="">
            <dive class="layer">
                <h3>BAVAN</h3>
            </dive>
        </div>
        <div class="team-col">
            <img src="images/washington.png" alt="">
            <dive class="layer">
                <h3>POOJA</h3>
            </dive>
        </div>
        <div class="team-col">
            <img src="images/newyork.png" alt="">
            <dive class="layer">
                <h3>SHATHIR</h3>
            </dive>
        </div>
    </div>

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