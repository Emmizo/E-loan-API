<?php
require 'admin.php';

if(!empty($_POST['insurance'])&& !empty($_POST['percentage'])){
    $insurance= trim(htmlspecialchars($_POST['insurance']));
    $percentage= trim(htmlspecialchars($_POST['percentage']));
    $Admin->SetInsurance($insurance);
    $Admin->SetPercentage($percentage);
    $res=$Admin->CreateInsurance();
    $data=array();
}
    if(empty($insurance )&&empty($percentage)){
        $message='Please there is some inputbox that are empty';
        $status=0;
    }
     
    elseif ($res){
        $message="New Insurance";
        $status=1;
    }
    else{
        $message="Not Added";
        $status=0;
    }

$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);
?>