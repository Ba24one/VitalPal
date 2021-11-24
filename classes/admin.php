<!-- Admin class -->
<?php

    include_once 'config.php';

    class Admin {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function create($aname, $role, $dob, $nic, $username, $password){
            $password = sha1($password);
            
            $checkuser = mysqli_query($this->vpc, "SELECT admin_id FROM admin WHERE a_username='$username'");            
            $result1 = mysqli_num_rows($checkuser);               

            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO admin (a_name, role, dob, nic, a_username, a_password, a_status) VALUES 
                ('$aname','$role','$dob','$nic','$username', '$password', 'a')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
        }

        public function a_login($username, $password){
            $password = sha1($password);

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
            $result=mysqli_query($this->vpc,"SELECT * FROM admin");
            return $result;
        }

        public function a_fetchonerecord(){

        }

        public function a_update($adminid, $aname, $role, $dob, $nic, $username, $status){
            $check = mysqli_query($this->vpc, "SELECT admin_id FROM admin WHERE admin_id='$adminid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE admin SET a_name='$aname', role='$role', dob='$dob',
                nic='$nic', a_username='$username', a_status='$status' WHERE admin_id='$adminid'") or die(mysqli_error($this->vpc));
                echo "1";
                return $update;
                 
            } else {
                return false;
            }
        }

        public function a_changePass($adminid, $oldPass, $newPass){
            $oldPass = sha1($oldPass);
            $newPass = sha1($newPass);

            $checkPass = mysqli_query($this->vpc, "SELECT admin_id FROM admin WHERE admin_id='$adminid' AND a_password='$oldPass'");
            $result = mysqli_num_rows($checkPass);

            if ($result > 0){
                $changePass = mysqli_query($this->vpc,"UPDATE admin SET a_password='$newPass' WHERE admin_id='$adminid'") or die(mysqli_error($this->vpc));
                return $changePass;
            }
            else {
                return false;
            }
        }

    }

?>