<!-- Doctor class -->
<?php

    include_once 'config.php';

    class Doctor {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function d_create($dname, $practice, $specialization, $mbbs, $username, $password){
            $password = md5($password);
            
            $checkuser = mysqli_query($this->vpc, "SELECT doctor_id FROM doctor WHERE d_username='$username'");            
            $result1 = mysqli_num_rows($checkuser);               

            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO doctor (d_name, place_of_practice, specialization, mbbs_no, d_username, d_password, d_status) VALUES 
                ('$dname','$practice','$specialization','$mbbs','$username', '$password', 'a')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
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
            $result=mysqli_query($this->vpc,"SELECT * FROM doctor");
            return $result;
        }

        public function d_fetchonerecord(){

        }

        public function d_update($doctorid, $dname, $practice, $specialization, $mbbs, $username){
            
            $check = mysqli_query($this->vpc, "SELECT doctor_id FROM doctor WHERE doctor_id='$doctorid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE doctor SET d_name='$dname', place_of_practice='$practice', specialization='$specialization',
                mbbs_no='$mbbs', d_username='$username' WHERE doctor_id='$doctorid'") or die(mysqli_error($this->vpc));
                echo "1";
                return $update;
                 
            } else {
                return false;
            }
        }

    }

?>