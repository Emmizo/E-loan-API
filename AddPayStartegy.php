<?php
require 'admin.php';
if(isset($_POST)){
    $payPeriod=$_POST['payPeriod'];
    $payValue=$_POST['payValue'];
    $Admin->SetPeriod($payPeriod);
    $Admin->SetPayValue($payValue);
    $res=$Admin->SetPayPeriod();
    $data=array();
    if ($res){
        $message="New Insurance";
        $status=1;
    }
    else{
        $message="Not Added";
        $status=0;
    }
}
$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);
?>