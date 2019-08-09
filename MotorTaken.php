<?php
require 'admin.php';
$res=$Admin->TakenMotor();
$result=array();
$rows=array();
$message=array('Not Found');
$status=0;
$count=0;
while($fetch=$res->fetch_array()){
    $count +=1;
    $result['ClientName']=$fetch['fname']." ".$fetch['lname'];
    $result['VIN:']=$fetch['VIN'];
    $result['Model']=$fetch['model'];
    $result['Frw']=$fetch['value'];
    $result['Paid']=$fetch['paidMoney'];
    $result['value']=$fetch['status'];
    array_push($rows,$result);
}
if($count>0){
    $returnJs = array('message'=>'Motor taken','data'=>$rows,'status'=>1,'Number'=>$count);
    echo json_encode($returnJs);
}else{
    $returnJs = array('message'=>'None taken','status'=>0,'Number'=>$count);
    echo json_encode($returnJs);
}
    
    
?>