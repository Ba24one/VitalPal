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

    <h1>Contact Us</h1>

</section>

<!-- -------- contact us --------- -->

<section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d610.4136310858245!2d79.
    8650566385883!3d6.919872382554272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2590d314fceb5%3A0x42dac9f28ee981e0!
    2sMinistry%20of%20Health!5e0!3m2!1sen!2slk!4v1632928634593!5m2!1sen!2slk" width="600" height="450" style="border:0;" 
    allowfullscreen="" loading="lazy"></iframe>
</section>


<section class="contact-us">

    <div class="row">
        <div class="contact-col">
            <div>
                <i class="fa fa-home"></i>
                <span>
                    <h5> XYZ Road, ABC Building</h5>
                    <p>Colombo, Western Province, Sri Lanka</p>
                </span>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h5>+94 77 123 4567</h5>
                    <p> Monday to Friday, 9.00 a.m. to 4.15 p.m. </p>
                </span>
            </div>
            <div>
                <i class="fa fa-envelope-o"></i>
                <span>
                    <h5>community.vitalpal @gmail.com</h5>
                    <p>Email us your query</p>
                </span>
            </div>
        </div>
        <div class="contact-col">

            <form action="contactpage_email.php" method="POST">
                <input type="text" name="name" placeholder="Enter your name" required>
                <input type="email" name="email" placeholder="Enter email address" required>
                <input type="text" name="subject" placeholder="Enter your subject"required>
                <textarea rows="8" name="message" placeholder="Message" required></textarea>                  
                <button type="submit" class="common-btn green-btn">Send Message</button>
            </form>

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

