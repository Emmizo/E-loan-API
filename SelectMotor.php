<?php
require 'admin.php';
$res=$Admin->SelectMotor();
$result=array();
$rows=array();
$count=0;
while($fetch=$res->fetch_array()){
    $count +=1;
    $result['VIN:']=$fetch['VIN'];
    $result['Model']=$fetch['model'];
    $result['Frw']=$fetch['value'];
    $result['value']=$fetch['status'];
    array_push($rows,$result);
}
$sms=array('Message'=>'success','status'=>1,'Data'=>$rows,'number'=>$count);
echo json_encode($sms);
?>