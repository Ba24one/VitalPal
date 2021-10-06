<!-- Admin class -->
<?php

    include_once 'config.php';

    class Admin {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function create(){
            // For the time beign we are hardcoding the doctors details
        }

        public function a_login($username, $password){
            $password = md5($password);

            $check = mysqli_query($this->vpc, "SELECT * FROM admin WHERE a_username='$username' AND a_password='$password' AND a_status='a'");
            $data = mysqli_fetch_array($check);
            $result = mysqli_num_rows($check);
        
            if ($result == 1) {
                $_SESSION['login'] = true;
                $_SESSION['id'] = $data['admin_id'];
                return true;
            } else {
                return false;
            }
        }

        public function a_name($id){
            $result = mysqli_query($this->vpc, "SELECT * FROM admin WHERE admin_id='$id'");
            $row = mysqli_fetch_array($result);
            echo $row['a_name'];
        }

        public function a_session(){
            if (isset($_SESSION['login'])) {
                return $_SESSION['login'];
            }
        }

        public function a_logout(){
            $_SESSION['login'] = false;
            session_destroy();
        }

        public function a_fetchdata(){

        }

        public function a_fetchonerecord(){

        }

        public function a_update(){

        }

    }

?>