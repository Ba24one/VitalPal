<!-- Doctor class -->
<?php

    include_once 'config.php';

    class Doctor {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function d_create(){
            // For the time beign we are hardcoding the doctors details
        }

        public function d_login($username, $password){
            $password = md5($password);

            $check = mysqli_query($this->vpc, "SELECT * FROM doctor WHERE d_username='$username' AND d_password='$password' AND d_status='a'");
            $data = mysqli_fetch_array($check);
            $result = mysqli_num_rows($check);
            
            if($result == 1){
                
                $_SESSION['login'] = true;
                $_SESSION['id'] = $data['doctor_id'];
                return true;               
            }
            else{
                return false;
            }
        }

        public function d_name($id){
            $result = mysqli_query($this->vpc, "SELECT * FROM doctor WHERE doctor_id='$id'");
            $row = mysqli_fetch_array($result);
            echo $row['d_name'];
        }

        public function d_session(){
            if (isset($_SESSION['login'])) {
                return $_SESSION['login'];
            }
        }

        public function d_logout(){
            $_SESSION['login'] = false;
            session_destroy();
        }

        public function d_fetchdata(){

        }

        public function d_fetchonerecord(){

        }

        public function d_update(){

        }

    }

?>