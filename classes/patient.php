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

            $password = sha1($password);
            
            $checkuser = mysqli_query($this->vpc, "SELECT patient_id FROM patient WHERE p_username='$username'");            
            $result1 = mysqli_num_rows($checkuser);               

            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO patient (p_name, gender, p_dob, nic, address, email, p_username, p_password, p_status) VALUES 
                ('$name','$gender','$dob','$nic','$address','$email', '$username', '$password', 'a')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
        }

        // Login function
        public function p_login($username, $password){

            $password = sha1($password);

            $check = mysqli_query($this->vpc, "SELECT * FROM patient WHERE p_username='$username' AND p_password='$password' AND p_status='a'");
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
            $result=mysqli_query($this->vpc,"SELECT * FROM patient");
            return $result;
        }

        public function p_fetchdata_active(){
            $result=mysqli_query($this->vpc,"SELECT * FROM patient WHERE p_status='a'");
            return $result;
        }

        public function p_fetchonerecord($patientid){
            $oneresult=mysqli_query($this->vpc,"SELECT * FROM patient WHERE patient_id=$patientid");
    	    return $oneresult;
        }

        public function p_getCount(){
            $result = mysqli_query($this->vpc, "SELECT COUNT(*) FROM patient WHERE p_status = 'a'");
            $row = mysqli_fetch_array($result);

            $total = $row[0];
            echo $total;
        }

        public function p_update($patientid, $name, $gender, $dob, $nic, $address, $email, $guardianName, $guardianNo, $guardianMail, $username, $password, $vaccType, $VaccDose){
            $password = sha1($password);       

            $check = mysqli_query($this->vpc, "SELECT patient_id FROM patient WHERE patient_id='$patientid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE patient SET p_name='$patientid', gender='$gender', p_dob='$dob',
                nic='$nic', address='$address', email='$email', guardianName='$guardianName', guardianNo='$guardianNo', 
                guardianMail='$guardianMail', p_username='$username', p_password='$password', vac_type='$vaccType', vac_dose='$VaccDose' WHERE patient_id='$patientid' ") or die(mysqli_error($this->vpc));
                
                return $update;
                 
            } else {
                return false;
            }
        }

        public function p_statusupdate($patientid, $status){
            $check = mysqli_query($this->vpc, "SELECT patient_id FROM patient WHERE patient_id='$patientid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE patient SET p_status='$status' WHERE patient_id='$patientid' ") or die(mysqli_error($this->vpc));
                
                return $update;
                 
            } else {
                return false;
            }
        }

    }

?>