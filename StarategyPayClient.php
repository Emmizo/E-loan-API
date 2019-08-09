<?php
require 'client.php';
if(isset($_POST)){
    $payID=trim($_POST['payID']);
    $Client->SetPayID2($payID);
    $qr=$Client->ClientPayPeriod();
    
}
    $result=array();
    $rows=array();
    $count=0;
while($fetch=$qr->fetch_array()){
    $count+=1;
    $result['fullname']=$fetch['fname']." ".$fetch['lname'];
    $result['MotorID']=$fetch['VIN2'];
    $result['period']=$fetch['payPeriod'];
    array_push($rows,$result);
}
if(empty($payID)){
    $message=array('Message'=>'Enter PayID');
    echo json_encode($message);
}
elseif($count>0){
    $return=array('Message'=>'Success','Data'=>$rows,'status'=>1,'Number'=>$count);
    echo json_encode($return);
}else{
    $return=array('Message'=>'Fail, check if your pay period id are correct','status'=>0);
    echo json_encode($return);
}
?>