<?php

    include_once 'config.php';

    class Doctor {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function d_login(){

        }

        public function d_name(){

        }

        public function d_session(){

        }

        public function d_logout(){

        }

        public function d_fetchdata(){

        }

        public function d_fetchonerecord(){

        }

        public function d_update(){

        }

    }

?>