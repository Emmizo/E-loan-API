<?php
require 'client.php';
if(isset($_POST)){
    
    $identity2=$_POST['identity2'];
    $VIN2=$_POST['VIN2'];
    $payID2=$_POST['payID2'];
    $insuranceID2=$_POST['insuranceID2'];
}
    $Client->SetID2($identity2);
    $Client->SetVIN2($VIN2);
    $Client->SetPayID($payID2);
    $Client->SetInsurance($insuranceID2);
    $qr=$Client->Apply();
    $result=array();
    $row=array();
    if($qr){
        $message='Application Successfully';
        $status=1;
    }
    else{
        $message='You have to pay before you get another loan motor';
        $status=0; 
    } 
    
$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);
?>