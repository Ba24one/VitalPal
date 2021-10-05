<?php

    include_once 'config.php';

    class Patient {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        // Register function 
        public function p_register($name, $gender, $dob, $nic, $address, $email, $username, $password){

            $pass = md5($pass);
        
            $checkuser = mysqli_query($this->vpc, "SELECT patient_id FROM patient WHERE username='$username'");
            $result1 = mysqli_num_rows($checkuser);            

            if ($result1 == 0) {
                if ($result2 == 0){
                    $register = mysqli_query($this->vpc, "INSERT INTO patient 
                    (p_name, gender, p_dob, nic, address, email, p_username, p_password) VALUES ('$name','$gender','$dob','$nic','$address','$email', '$username', '$password')") or 
                    die(mysqli_error());
                    return $register;
                }
                else {
                    return false;
                }
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