<!-- Vaccines class -->
<?php

    include_once 'config.php';

    class Vaccine {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function v_create($type, $description, $location, $date){
                        
            $checkuser = mysqli_query($this->vpc, "SELECT vaccine_ID FROM vaccine WHERE type='$type'");            
            $result1 = mysqli_num_rows($checkuser);               

            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO vaccine (type, description, location, date, v_status) VALUES 
                ('$type','$description','$location','$date', 'a')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
        }

        public function v_fetchdata(){
            $result=mysqli_query($this->vpc,"SELECT * FROM vaccine");
            return $result;
        }

        public function v_fetchonerecord(){
            
        }

        public function v_update($vaccineid, $type, $description, $location, $date, $status){
            $check = mysqli_query($this->vpc, "SELECT vaccine_ID FROM vaccine WHERE vaccine_ID='$vaccineid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE vaccine SET type='$type', description='$description', location='$location',
                v_status='$status' WHERE vaccine_ID='$vaccineid'") or die(mysqli_error($this->vpc));
                echo "1";
                return $update;
                 
            } else {
                return false;
            }
        }

        public function v_delete(){

        }


    }

?>