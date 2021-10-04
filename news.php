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
    
    <div class="row">
        <div class="news-col">
            <img src="images/about.jpg" alt="">
        </div>
        <div class="news-col">
            <h3>
                40 more COVID-19 deaths reported: Death toll surges to 13,059
            </h3>
            <p>
                A total of 40 more COVID-19 related deaths that occurred yesterday (02) were confirmed by the Director-General of Health Services today 
                pushing the death toll to 13,059.Acco rding to the Government Information Department, 18 females and 22 males are among the deceased.
                <br> A total of 28 people who are above 60 years of age are among the deceased while 11 of them are between 30 and 59 years of age.
                One death has been reported below 30 years of age.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="news-col">
            <img src="images/about.jpg" alt="">
        </div>
        <div class="news-col">
            <h3>Nine core long-COVID symptoms identified in a new study</h3>
            <p>
                A new study has underlined nine core long-COVID symptoms, occurring 90-180 days after COVID-19 was diagnosed, Dr. Chandima Jeewandara, 
                Director of the Allergy, Immunology and Cell Biology Unit of the Sri Jayawardenepura University said. Dr Jeewandra said the term 'long COVID' 
                is commonly used to describe signs and symptoms that continue or develop after acute COVID-19, which Includes both ongoing symptomatic 
                COVID-19 (from 4 to 12 weeks) and post-COVID-19 syndrome (≥12 weeks). “Long-COVID symptoms were more frequent in those who had been 
                hospitalised, and they were slightly more common in women.” he pointed out. (Sheain Fernandopulle) The core long-COVID symptoms are as follows,                
            </p>
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