<?php

    include_once 'config.php';

    class Admin {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function a_login(){

        }

        public function a_name(){

        }

        public function a_session(){

        }

        public function a_logout(){

        }

        public function a_fetchdata(){

        }

        public function a_fetchonerecord(){

        }

        public function a_update(){

        }

    }

?>