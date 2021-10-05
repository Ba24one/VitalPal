<?php 

    if($_POST['submit1']){

        session_start();
        include_once 'classes/patient.php';
        $patient = new Patient();
        if ($patient->p_session())
        {
            header("location:login_tests/Patient.php");
        }

        $patient = new Patient();
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $login = $patient->p_login($_REQUEST['username'],$_REQUEST['password']);
            if($login){
                header("location:login_tests/Patient.php");
            }
            else
            {
                echo "Login Failed!";
            }
        }
    } else if($_POST['submit2']){

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

    } 

?>