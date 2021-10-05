<?php

    include_once 'config.php';

    class Patient {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        // Register function 
        public function p_register($name, $gender, $dob, $nic, $address, $email, $username, $password){

            $password = md5($password);
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $checkuser = mysqli_query($con, "SELECT patient_id FROM patient WHERE p_username='$username'");            
            $result1 = mysqli_num_rows($checkuser);       
           
            if ($result1 == 0) {
                $register = mysqli_query($con, "INSERT INTO patient (p_name, gender, p_dob, nic, address, email, p_username, p_password) VALUES 
                ('$name','$gender','$dob','$nic','$address','$email', '$username', '$password')") or die(mysqli_error($con));                   
                return $register;
            } else {
                return false;
            }
        }

        public function p_login(){

        }

        public function p_name(){

        }

        public function p_session(){

        }

        public function p_logout(){

        }

        public function p_fetchdata(){

        }

        public function p_fetchonerecord(){

        }

        public function p_update(){

        }

    }

?>