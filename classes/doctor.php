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

            $check1 = mysqli_query($this->vpc, "SELECT * FROM doctor WHERE d_status='a'");
            $data = mysqli_fetch_array($check1);
            $result1 = mysqli_num_rows($check1);

            $check2 = mysqli_query($this->vpc, "SELECT * FROM doctor WHERE d_username='$username' AND d_password='$password'");
            $data = mysqli_fetch_array($check2);
            $result2 = mysqli_num_rows($check2);

            if($result1 == 1){
                if ($result2 == 1) {
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $data['doctor_id'];
                    return true;
                } else {
                    return false;
                }
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