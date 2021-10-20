<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>VitalPal - Home Page</title>
        <link rel = "icon" type = "image/png" href = "images/vitalpal_logo_square.png">
        <link rel="stylesheet" href="css/style_1.css?v=<?php echo time(); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
<body>

<!----- Header ----->

<section class="header">
    <nav>
        <a href="index.html"><img src="images/vitalpal_logo.png?v=<?php echo time(); ?>"></a>
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

<div class="text-box">
    <h1>Sri Lanka's Only Covid Support Platform</h1>
    <p>Covid has made one of the biggest impacts in the recent history of Sri Lanka. Our VitalPal is the <br> only platform to support
        both pre-covid and post-covid conditions in the island.
    </p>
    <a href="logreg.php" target="_blank" class="common-btn">Positive?</a>
</div>

</section>


<!----- Need of vital pal ----->

<section class="needs">
    <h1>Why you need VitalPal?</h1>
    <p>Find out how we would help you</p>

    <div class="row">
        <div class="needs-col">
            <h3> Reliable Service </h3>
            <p>                
                We are a leading brand in rpivate healthcare in Sri Lanka. Our people are some of the most dedicated, skilled and experienced healthcare 
                providers and medical experts in the country. They are adept at using many of the most cutting-edge medical equipment and technology in the 
                industry. We also follow the most stringent international standards in all our processes to ensure a safe and healthy environment for 
                everyone.                 
            </p>
        </div>
        <div class="needs-col">
            <h3> Better Care</h3>
            <p>
                All hospitals within the Application rigorously maintain continuous compliance with internationally-recognized standards providing safe and 
                effective patient care. Reflecting the organization’s commitment to quality and patient care,we are your total healthcare provider – and that 
                means you can reach out to us when you are ill or hurt, but also when you want to live life to the fullest and be your healthiest self.           
            </p>
        </div>
        <div class="needs-col">
            <h3>Innovation & Excellence</h3>
            <p>                
                Our service philosophy is built on the precepts of commitment to clinical protocols, provision of compassionate care and service excellence 
                that transcends the conventional healthcare offer. Recognising that service excellence is dynamic in nature, we continuously seek to enhance 
                our service delivery in a bid to provide you – our customers – with world-class healthcare experiences.
            </p>
        </div>
    </div>
</section>


<!-- ----- Services ----- -->

<section class="services">
    <h1>Our Services</h1>
    <p>
        The system comprises of four main sub-systems: Patient Diary, Hospital Diary, Admin Diary and the Report Center.
        If a patient is Covid 19 Positive and there is a shortage of hospital beds, then they can make use of
        this system to register through the Patient Diary by providing the necessary information required to complete
        the registration. <br> Once a patient registers with VitalPal they will be taken on a quick tour on how to make use
        of the system and how to record the condition of the patient.
    </p>

    <div class="row">
        <div class="services-col">
            <img src="images/patient_diary.png?v=<?php echo time(); ?>">
            <h3>Patient Diary</h3>
            <p>
                It records all Covid 19 patient reocrds who are self quarantined and unable to find hospitals for treatment.
            </p>
        </div>
        <div class="services-col">
            <img src="images/hospital_diary.png?v=<?php echo time(); ?>">
            <h3>Hospital Diary</h3>
            <p>
                It is the portal where critical patients details are been recorded when admitted to a hospital for doctors supervision and treatments.
            </p>
        </div>
        <div class="services-col">
            <img src="images/report_center.png?v=<?php echo time(); ?>">
            <h3>Report Centre</h3>
            <p>
                It is the management information system which provides a detail insight of the self quarantined patients.
            </p>
        </div>
    </div>
</section>


<!-- ----- Footer ------ -->

<section class="footer">
    <h4>About Us</h4>
    <p> 
        The VitalPal Covid Patient Management System is a web-based application where it bridges self-quarantined patients and the Ministry of health 
         <br> to understand the patients who are currently undergoing domestic medication to recover from the Covid-19 Corona Virus. 
    </p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p> Made with <i class="fa fa-heart-o"></i> by Millennials from University of Moratuwa </p>
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