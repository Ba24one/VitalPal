<!-- Treatments class -->
<?php

    include_once 'config.php';

    class Treatment {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function t_create($patientid, $dosage, $description, $type, $date, $id){
                     
            $register = mysqli_query($this->vpc, "INSERT INTO treatment (dosage, description, type, date, doctor_id, patient_id) VALUES 
            ('$dosage','$description','$type','$date', '$id', $patientid)") or die(mysqli_error($this->vpc));                   
            return $register;
            
        }

        public function t_fetchdata(){
            $result=mysqli_query($this->vpc,"SELECT t.treatment_ID, p.p_name, p.nic, t.dosage, t.description, t.type, t.date, d.d_name
            FROM treatment t INNER JOIN patient p ON t.patient_id = p.patient_id
            INNER JOIN doctor d ON d.doctor_id = t.doctor_id;");
            return $result;
        }

        public function h_fetchonerecord($newsid){
            
        }       

        public function h_delete(){

        }

    }

?>