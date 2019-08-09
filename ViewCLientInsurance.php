<?php
require 'client.php';
if(isset($_POST)){
    $insuranceID2=$_POST['insuranceID'];
    $Client->SetInsuranceID($insuranceID2);
    $qr=$Client->ClientInsurance();
    $result=array();
    $rows=array();
    $count=0;
while($fetch=$qr->fetch_array()){
    $count+=1;
    $result['fullname']=$fetch['fname']." ".$fetch['lname'];
    $result['insurance']=$fetch['insurance'];
    array_push($rows,$result);
}
}
if(empty($insuranceID2)){
    $message=array('Message'=>'Enter insurance ID');
    echo json_encode($message);
}
if($count>0){
    $return=array('Message'=>'Success','Data'=>$rows,'status'=>1,'Number'=>$count);
    echo json_encode($return);
}else{
    $return=array('Message'=>'Fail, check if your insurance id reach there','status'=>0);
    echo json_encode($return);
}
?>