<?php

include '../conect.php';
include 'age.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $content = file_get_contents('php://input');
    $data = json_decode($content, true);

    $patient = $data["patient"];
    $drugAllergy = $data["drugAllergy"];
    $address = $data["address"];

    $cid  = $patient["pid"];
    $prefix  = $patient["prefix"];
    $first_name  = $patient["firstname"];
    $last_name  = $patient["lastname"];
    $full_name  = $prefix.''.$first_name.' '.$last_name;
    $gender  = $patient["gender"];
    $birth  = $patient["birthdate"];
    $birthday_split = explode("-",$birth);
    $bdate  = $birthday_split[2];
    $bmon  = $birthday_split[1];
    $byear  = $birthday_split[0];
    $date_today = explode("-",date("Y-m-d"));
    $age = findAge($date_today[2],$date_today[1],$date_today[0],$bdate,$bmon,$byear);
    $age_y = $age[0];
    $age_m = $age[1];
    $age_d = $age[2];
    $nation  = $patient["nationality"];

    $drug_allergy  = $drugAllergy["drugAllergyValue"];

    $addr_no  = $address["home_number"];
    $addr_moo  = $address["village"];
    $tmb = explode("_",$address["subdistrict"]);
    $addr_tmb = $tmb[0];
    $addr_tmb_name  = $tmb[1];
    $amp = explode("_",$address["district"]);
    $addr_amp = $amp[2];
    $addr_amp_name  = $amp[1];
    $ampcode = $amp[0];
    $changwat = explode("_",$address["province"]);
    $addr_chw = $changwat[0];
    $addr_chw_name  = $changwat[1];
    $tel  = $address["tell_number"];

    $created_at  = $data["today"];
    $created_by  = $data["qr"];
    $updated_at  = $data["today"];
    $updated_by  = $data["qr"];  
    $byear = (int)$byear + 543;

    $hostpital = $data['hostpital'];
    $healty = $data['healty'];
    $risk = $data['risk'];
    $symptomsCheck = $data['symptomsCheck'];

    $hoscode =  explode("_",$hostpital['hostpital'])[0];
    $hosname =  explode("_",$hostpital['hostpital'])[1];

    $sql = "INSERT INTO `patient`(`hoscode`,`cid`,`prefix`,`first_name`, `last_name`, `full_name`, `gender`, `bdate`, 
                              `bmon`, `byear`, `birth`, `age_y`, `age_m`, `age_d`, `nation`, 
                              `drug_allergy`, `addr_no`,`addr_moo`,`addr_tmb`,`addr_tmb_name`, `addr_amp`,`addr_amp_name`,`addr_chw`,`addr_chw_name`, 
                              `tel`, `created_at`, `created_by`, `updated_at`, `updated_by`) 
                              VALUES('$hoscode','$cid','$prefix','$first_name', '$last_name', '$full_name', '$gender', '$bdate', 
                                      '$bmon', '$byear', '$birth', '$age_y', '$age_m', '$age_d', '$nation', 
                                      '$drug_allergy', '$addr_no','$addr_moo','$addr_tmb','$addr_tmb_name','$addr_amp','$addr_amp_name','$addr_chw','$addr_chw_name', 
                                      '$tel', '$created_at', '$created_by', '$updated_at', '$updated_by')";

  if ($conn->query($sql) === TRUE){
    $patient_id = $conn->insert_id;
    $visitDate = explode(" ",$created_at);
    $visit_date = $visitDate[0];
    $visit_time = $visitDate[1];
    $bw = $healty['weigth'];
    $bh = $healty['heigth'];
    $bmi = $bw/(($bh/100)*($bh/100));
    $cc = join(",",$healty['sickness']);

    $sql_visit = "INSERT INTO `visit`(`hoscode`,`patient_id`, `patient_cid`, 
                              `patient_fullname`, `age_y`, `age_m`, `visit_date`, `visit_time`, 
                              `bw`, `bh`, `bmi`, 
                              `cc`,`created_at`, `created_by`, 
                              `updated_at`, `updated_by`) 
                              VALUES ('$hoscode','$patient_id','$cid',
                              '$full_name','$age_y','$age_m','$visit_date','$visit_time',
                              '$bw','$bh','$bmi',
                              '$cc','$created_at','$created_by',
                              '$updated_at','$updated_by'
                              )";
    if ($conn->query($sql_visit) === TRUE){
      $visit_id = $conn->insert_id;

      $risk_val = $risk['riskValue'];
      $color = 'เขียว';
      $lab_result = $symptomsCheck['symptoms'];
      // $lab_date = $symptomsCheck['dateSymptoms'];
      if($risk_val=='มี'){
        $color = 'เหลือง';
      }
      $sql_lab = "INSERT INTO `lab` (
                      `hoscode`, `hosname`, `visit_id`, `patient_id`, `patient_cid`, 
                      `patient_fullname`, 
                      `lab_date`, `lab_time`, `lab_place`, `lab_kind`, `lab_result`, 
                      `doi`, `created_at`, `created_by`, `updated_at`, `updated_by`) 
                      VALUES (
                        '$hoscode','$hosname','$visit_id','$patient_id','$cid',
                        '$full_name',
                        '$visit_date','$visit_time','-','-','$lab_result',
                        '1',
                        '$created_at','$created_by',
                        '$updated_at','$updated_by'
                      )";
      $conn->query($sql_lab);
      
      // tehnplk 2022-06-07 11:33
      $sql_risk = "INSERT INTO `risk` (
                      `hoscode`, `hosname`, `visit_id`, `patient_id`, `patient_cid`, 
                      `patient_fullname`, 
                      `risk_date`, `risk_time`,  
                      `created_at`, `created_by`, `updated_at`, `updated_by`) 
                      VALUES (
                        '$hoscode','$hosname','$visit_id','$patient_id','$cid',
                        '$full_name',
                        '$visit_date','$visit_time',                        
                        '$created_at','$created_by',
                        '$updated_at','$updated_by'
                      )";
      $conn->query($sql_risk);
      if($risk_val=='มี'){ 
          $sql_update_risk = "update risk set ....ตามรายการที่ user เลือก....  where visit_id = '$visit_id'";
      }
      $conn->query($sql_risk);
      
      $sql_triage = "INSERT INTO `triage` (
                    `hoscode`, `hosname`, `ampcode`,`visit_id`, `patient_id`, 
                    `patient_cid`, `patient_fullname`, `patient_age`, `patient_gender`, `patient_chw`, 
                    `patient_amp`, `triage_date`, `triage_time`,
                    `lab_result`,`risk`,`color`, 
                    `created_at`, `created_by`, `updated_at`, `updated_by`) 
                    VALUES (
                      '$hoscode','$hosname','$ampcode','$visit_id','$patient_id',
                      '$cid','$full_name','$age_y','$gender','$addr_chw_name',
                      '$addr_amp_name','$visit_date','$visit_time',
                      '$lab_result','$risk_val','$color',
                      '$created_at','$created_by',
                      '$updated_at','$updated_by'
                    )";
      
      if($conn->query($sql_triage) === TRUE){
        echo true;
      }
    }      
  }
}
?>