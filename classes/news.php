<!-- News class -->
<?php

    include_once 'config.php';

    class News {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function n_create(){
            // For the time beign we are hardcoding the news details
        }

        public function n_fetchdata(){
            $result=mysqli_query($this->vpc,"SELECT * FROM news");
            return $result;
        }

        public function n_fetchonerecord($newsid){
            $oneresult=mysqli_query($this->vpc,"SELECT * FROM news WHERE news_ID='$newsid'");
            return $oneresult;
        }

        public function n_update(){

        }

        public function n_delete(){

        }

    }

?>