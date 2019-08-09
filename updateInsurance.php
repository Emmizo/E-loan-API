<?php
require 'admin.php';
if(isset($_POST)){
    $id=$_POST['insuranceID'];
    $insurance=$_POST['insurance'];
    $percentage=$_POST['percentage'];
    $Admin->SetInsuranceID($id);
    $Admin->SetInsurance($insurance);
    $Admin->SetPercentage($percentage);
    $res=$Admin->UpdateInsurance();
    $data=array();
    if ($res){
        $message="Insurance updated";
        $status=1;
    }
    else{
        $message="Fail to update";
        $status=0;
    }
}
$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);
?>