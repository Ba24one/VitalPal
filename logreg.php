<?php
   include_once 'classes/patient.php';
   $patient = new Patient();

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
      
      $register = $patient->p_register($_REQUEST['name'],$_REQUEST['gender'], $_REQUEST['dob'],  $_REQUEST['nic'], $_REQUEST['address'],$_REQUEST['email'],  $_REQUEST['username'], $_REQUEST['password']);
      if($register){
        echo "Registration Successful!";
        echo $_POST['gender'];
      }
      else
      {
        echo "Entered email or username already exists!";
      }
   }
?>

<!DOCTYPE html>
<html>
    <meta charset="UTF=8"> 
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
<head>
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="css/style_2.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="login-registration">
                <form action="" method="POST" class="login-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-anchor"></i>
                        <select name="users" class="usertype" required>
                            <option value="" selected hidden>Select user type</option>
                            <option value="patient">Patient</option>
                            <option value="doctor">Doctor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                </form>

                <form action="" method="POST" class="registration-form">
                    <h2 class="title">Register</h2>
                    <h3 class="smalltitle">--- Registration is only for patients ---</h3>
                    <div class="input-field">
                        <i class="fa fa-pencil"></i>
                        <input type="text" name="name" placeholder="Name with Initials">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-birthday-cake"></i>
                        <input type="text" id="dob" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-map-marker"></i>
                        <input type="text" name="address" placeholder="Address">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-venus-mars"></i>
                        <select name="gender" class="gendertype" required>
                            <option value="" selected hidden>Select gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="fa fa-id-card"></i>
                        <input type="text" name="nic" placeholder="NIC">
                    </div>
                    <div class="input-field">
                        <i class="fa fa-user"></i>
                        <input type="text" name="username" placeholder="Username">
                    </div>                    
                    <div class="input-field">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" value="Register" class="btn solid">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <img src="images/vitalpal_logo_bw.png" alt="">
                    <h3>New patient?</h3>
                    <p>If you are a new patient to the system please click below to visit the registration page</p>
                    <button class="btn transparent" id="register-btn">Register</button>
                </div>

                <img src="images/registration.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <img src="images/vitalpal_logo_bw.png" alt="">
                    <h3>Already have an account?</h3>
                    <p>If you are a registered user of the system please click below to visit the login page</p>
                    <button class="btn transparent" id="login-btn">Login</button>
                </div>

                <img src="images/login.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <!-- <script src="app.js"></script> -->
    <script>
        const login_btn = document.querySelector("#login-btn");
        const registration_btn = document.querySelector("#register-btn");
        const container = document.querySelector(".container");

        registration_btn.addEventListener('click', () => {
            container.classList.add("register-mode");
        });

        login_btn.addEventListener('click', () => {
            container.classList.remove("register-mode");
        });

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
    </script>
</body>
</html>