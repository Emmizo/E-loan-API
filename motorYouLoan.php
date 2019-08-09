<?php
require 'Client.php';
if(isset($_POST)){
    $identity2=$_POST['identity2'];
    $Client->SetID2($identity2);
    $res=$Client->ViewMotorLoaned();
    $result=array();
    $rows=array();
while($fetch=$res->fetch_array()){
    $result['MotorID']=$fetch['VIN2'];
    $result['Model']=$fetch['model'];
    $result['Value']=$fetch['value'];
    array_push($rows,$result);
}}
if($res){
    $message='Success';
    $status=1;
}
else{
    $message='Fail';
    $status=0; 
} 
$return=array('Message'=>$message,'Data'=>$rows,'Status'=>$status);
echo json_encode($return);
?>