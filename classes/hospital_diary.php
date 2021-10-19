<!-- Hospital Diary class -->
<?php

    include_once 'config.php';

    class HospitalDiary {

        public function __construct() {
            $con = mysqli_connect(HOST, USER, PASS, DB) or die('Connection Error! '.mysqli_error());
            $this->vpc=$con;
        }

        public function hd_create($wardno, $bedno, $pcondition, $patientid, $hospitalid, $doctorid){
                                   
            $register = mysqli_query($this->vpc, "INSERT INTO hospital_diary (wardNo, bedNo, p_condition, status, patient_ID, doctor_ID, hospital_ID) VALUES 
            ('$wardno','$bedno','$pcondition', 'a', '$patientid', '$doctorid', '$hospitalid')") or die(mysqli_error($this->vpc));                   
            return $register;
            
        }

        public function hd_fetchdata(){
            $result=mysqli_query($this->vpc,"SELECT hd.hosDiary_ID, hd.wardNo, hd.bedNo, hd.p_condition, h.name, d.d_name, p.p_name, hd.status
            FROM hospital h INNER JOIN hospital_diary hd ON h.hospital_ID = hd.hospital_ID
            INNER JOIN doctor d ON d.doctor_id = hd.doctor_ID INNER JOIN patient p ON p.patient_id = hd.patient_ID;");
            return $result;
        }

        public function h_fetchonerecord($newsid){
            
        }

        public function hd_update($hosDiaryID, $wardNo, $bedNo, $condition, $status){
            $check = mysqli_query($this->vpc, "SELECT hosDiary_ID FROM hospital_diary WHERE hosDiary_ID='$hosDiaryID'");
            $result = mysqli_num_rows($check);

            if ($result > 0) {

                $update = mysqli_query($this->vpc,"UPDATE hospital_diary SET wardNo='$wardNo', bedNo='$bedNo', p_condition='$condition',
                status='$status' WHERE hosDiary_ID='$hosDiaryID'") or die(mysqli_error($this->vpc));
                echo "1";
                return $update;
                 
            } else {
                return false;
            }
        }

        public function hd_getCount(){
            $result = mysqli_query($this->vpc, "SELECT COUNT(*) FROM hospital_diary WHERE status = 'a' AND p_condition LIKE '%critical%'");
            $row = mysqli_fetch_array($result);

            $total = $row[0];
            echo $total;
        }

        public function h_delete(){

        }

    }

?>