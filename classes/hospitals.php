<!-- News class -->
<?php

    include_once 'config.php';

    class Hospital {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function h_create(){
            // For the time beign we are hardcoding the news details
        }

        public function h_fetchdata(){
            
        }

        public function h_fetchonerecord($newsid){
            
        }

        public function h_update(){

        }

        public function h_delete(){

        }

    }

?>