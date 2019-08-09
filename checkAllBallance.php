<?php
require 'Client.php';
if(isset($_POST)){
    $identity2=$_POST['identity2'];
    $Client->SetID2($identity2);
    $res=$Client->CheckAll();
    $result=array();
    $rows=array();
while($fetch=$res->fetch_array()){
    $result['MotorID']=$fetch['VIN2'];
    $result['Paid']=round($fetch['paidMoney']);
    $result['Value']=$fetch['value'];
    $result['Rest']=round($fetch['value']-$fetch['paidMoney']);
    $result['You_have_to_pay_this_money_in_each_round_Above']=round($fetch['value']/$fetch['payValue']);
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