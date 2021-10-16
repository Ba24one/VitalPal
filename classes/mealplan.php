<!-- News class -->
<?php

    include_once 'config.php';

    class Mealplan {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function m_create($mealtype, $diettype, $dietplan){
            $checkuser = mysqli_query($this->vpc, "SELECT meal_ID FROM mealplan WHERE meal_type='$mealtype' AND diet_plan='$diettype'");            
            $result1 = mysqli_num_rows($checkuser);               

            if ($result1 == 0) {
                $register = mysqli_query($this->vpc, "INSERT INTO mealplan (meal_type, diet_type, diet_plan, m_status) VALUES 
                ('$mealtype','$diettype','$dietplan', 'a')") or die(mysqli_error($this->vpc));                   
                return $register;
            } else {
                return false;
            }
        }

        public function m_fetchdata(){
            $result=mysqli_query($this->vpc,"SELECT * FROM mealplan");
            return $result;
        }

        public function m_fetchonerecord(){
            
        }

        public function m_update($mealid, $mealtype, $diettype, $dietplan, $status){
            $check = mysqli_query($this->vpc, "SELECT meal_ID FROM mealplan WHERE meal_ID='$mealid'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE mealplan SET meal_type='$mealtype', diet_type='$diettype', diet_plan='$dietplan',
                m_status='$status' WHERE meal_ID='$mealid'") or die(mysqli_error($this->vpc));
                echo "1";
                return $update;
                 
            } else {
                return false;
            }
        }

        public function m_delete(){

        }

    }

?>