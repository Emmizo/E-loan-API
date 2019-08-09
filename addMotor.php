<?php
require 'admin.php';
if (isset($_POST)){
    $VIN=$_POST['VIN'];
    $model=$_POST['model'];
    $value=$_POST['value'];
    $Admin->SetVIN($VIN);
    $Admin->SetModel($model);
    $Admin->SetValue($value);
    
    $Data=array();
    $res=$Admin->CreateMotor();
    if ($res){
        $message="New Motor Added";
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