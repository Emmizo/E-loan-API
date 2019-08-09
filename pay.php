<?php
require 'client.php';
if(!empty($_POST)){
    $identity2=$_POST['identity2'];
    $VIN2=$_POST['VIN2'];
    $paidMoney=$_POST['paidMoney'];
    $Client->SetID2($identity2);
    $Client->SetVIN2($VIN2);
    $Client->SetPaid($paidMoney);
    $qr=$Client->payCondition();
    $data=array();
}
    if($qr==true){
        $return=array('Message'=>'Payment Successfully!','Status'=>true);
         echo json_encode($return);
    }
    elseif($qr){
        $return=array('Message'=>'Invalid Money!','Status'=>true);
         echo json_encode($return);
    }
    else{
        $message=array('Message'=>'You finish to pay. Thank you!','Status'=>false);
        echo json_encode($message);
    }

?>