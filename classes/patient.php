<!-- Patient class -->
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
            
            $checkuser = mysqli_query($this->vpc, "SELECT patient_id FROM patient WHERE p_username='$username'");            
            $result1 = mysqli_num_rows($checkuser);       
           
            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO patient (p_name, gender, p_dob, nic, address, email, p_username, p_password) VALUES 
                ('$name','$gender','$dob','$nic','$address','$email', '$username', '$password')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
        }

        // Login function
        public function p_login($username, $password){

            $password = md5($password);

            $check = mysqli_query($this->vpc, "SELECT * FROM patient WHERE p_username='$username' AND p_password='$password'");
            $data = mysqli_fetch_array($check);
            $result = mysqli_num_rows($check);
        
            if ($result == 1) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $data['patient_id'];
                return true;
            } else {
                return false;
            }
        }

        public function p_name($id){
            
            $result = mysqli_query($this->vpc, "SELECT * FROM patient WHERE patient_id='$id'");
            $row = mysqli_fetch_array($result);
            echo $row['p_name'];
        }

        public function p_session(){
            if (isset($_SESSION['login'])) {
                return $_SESSION['login'];
            }
        }

        public function p_logout(){

            $_SESSION['login'] = false;
            session_destroy();
        }

        public function p_fetchdata(){

        }

        public function p_fetchonerecord(){

        }

        public function p_update(){

        }

    }

?>