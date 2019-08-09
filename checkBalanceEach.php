<?php
require 'Client.php';
if(isset($_POST)){
    $VIN2=$_POST['VIN2'];
    $Client->SetVIN2($VIN2);
    $res=$Client->Check();
    $result=array();
    $rows=array();
    $count=0;
while($fetch=$res->fetch_array()){
    $count+=1;
    
    $result['MotorID']=$fetch['VIN2'];
    $result['Paid']=round($fetch['paidMoney']);
    $result['Value']=$fetch['value'];
    $result['Rest']=round($fetch['value']-$fetch['paidMoney']);
    $result['You_have_to_pay_this_money_in_each_round']=round($fetch['value']/$fetch['payValue']);
    array_push($rows,$result);
}}
if($count>0){
    $return=array('Message'=>'Success','Data'=>$rows,'Status'=>1,'Return'=>$count);
    echo json_encode($return);
}
else{
    $return=array('Message'=>'Unkown ID check motor ID please','Status'=>0);
   echo json_encode($return);
} 

?>