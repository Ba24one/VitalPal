<?php

    include_once 'config.php';

    class Patient {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function p_register(){

        }

        public function p_login(){

        }

        public function p_name(){

        }

        public function p_session(){

        }

        public function p_logout(){

        }

        public function p_fetchdata(){

        }

        public function p_fetchonerecord(){

        }

        public function p_update(){

        }

    }

?>