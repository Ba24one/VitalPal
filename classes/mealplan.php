<!-- News class -->
<?php

    include_once 'config.php';

    class Mealplan {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function m_create(){
            // For the time beign we are hardcoding the news details
        }

        public function m_fetchdata(){
            
        }

        public function m_fetchonerecord(){
            
        }

        public function m_update(){

        }

        public function m_delete(){

        }

    }

?>