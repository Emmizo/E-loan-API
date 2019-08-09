<?php
require 'admin.php';

if(isset($_POST)){
    $id=$_POST['id'];
    $VIN=$_POST['VIN'];
    $model=$_POST['model'];
    $value=$_POST['value'];
    $Admin->SetID($id);
    $Admin->SetVIN($VIN);
    $Admin->SetModel($model);
    $Admin->SetValue($value);
    $sqr=$Admin->UpdateMotor();
    if ($sqr){
        $message="Motor Updated";
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