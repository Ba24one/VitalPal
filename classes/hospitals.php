<!-- Hospital class -->
<?php

    include_once 'config.php';

    class Hospital {

        // Fetch DB connection
        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        // Create hospital record
        public function h_create($hname, $location, $contact, $type){
                        
            $checkuser = mysqli_query($this->vpc, "SELECT hospital_ID FROM hospital WHERE name='$hname' AND location='$location'");            
            $result1 = mysqli_num_rows($checkuser);               

            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO hospital (name, location, contact, type, h_status) VALUES 
                ('$hname','$location','$contact','$type', 'a')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
        }

        // Read all hospital data
        public function h_fetchdata(){
            $result=mysqli_query($this->vpc,"SELECT * FROM hospital");
            return $result;
        }

        // Read active hospital data
        public function h_fetchdata_active(){
            $result=mysqli_query($this->vpc,"SELECT * FROM hospital WHERE h_status='a'");
            return $result;
        }

        public function h_fetchonerecord($newsid){
            
        }

        // Update hospital records
        public function h_update($hospitalid, $hname, $location, $contact, $type, $status){
            $check = mysqli_query($this->vpc, "SELECT hospital_ID FROM hospital WHERE hospital_ID='$hospitalid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE hospital SET name='$hname', location='$location', contact='$contact',
                type='$type', h_status='$status' WHERE hospital_ID='$hospitalid'") or die(mysqli_error($this->vpc));
                echo "1";
                return $update;
                 
            } else {
                return false;
            }
        }

        public function h_delete(){

        }

    }

?>