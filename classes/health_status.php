<!-- Health Status class -->
<?php

    include_once 'config.php';

    class HealthStatus {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }
        

        public function hs_fetchdata($id){
            $result=mysqli_query($this->vpc,"SELECT * FROM patient_diary WHERE patient_id='$id' ORDER BY date DESC");
            return $result;
        }      

        public function hs_fetchonerecord($newsid){
            
        }  
        
        public function hs_create($p_condition, $food, $date, $id){
                        
            
            $register = mysqli_query($this->vpc, "INSERT INTO patient_diary (p_condition, food, date, patient_id) VALUES 
            ('$p_condition','$food','$date','$id')") or die(mysqli_error($this->vpc));                   
            return $register;
            
        }

    }

?>