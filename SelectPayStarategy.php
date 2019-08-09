<?php
require 'admin.php';
$res=$Admin->SelectPayStrategy();
$result=array();
$rows=array();
$count=0;
while($fetch=$res->fetch_array()){
    $count +=1;
    $result['ID']=$fetch['payID'];
    $result['Period']=$fetch['payPeriod'];
    $result['Times']=$fetch['payValue'];
    array_push($rows,$result);
}
$sms=array('Message'=>'success','status'=>1,'Data'=>$rows,'number'=>$count);
echo json_encode($sms);
?>