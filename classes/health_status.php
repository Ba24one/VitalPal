<!-- Health Status class -->
<?php

    include_once 'config.php';

    class HealthStatus {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }
        

        public function hs_fetchdata($id){
            $result=mysqli_query($this->vpc,"SELECT * FROM patient_diary WHERE patient_id='$id'");
            return $result;
        }      

        public function hs_fetchonerecord($newsid){
            
        }       

    }

?>