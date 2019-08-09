<?php
require 'client.php';
if(isset($_POST)){
    $identity2=$_POST['identity2'];
    $Client->SetID2($identity2);
$res=$Client->ReadEachClient();
$result=array();
$rows=array();
$count=0;
while($fetch=$res->fetch_array()){
    $count +=1;
    $result['identity']=$fetch['identity'];
    $result['fullname']=$fetch['fname']." ".$fetch['lname'];
    $result['Telephone']=$fetch['tel'];
    $result['email']=$fetch['email'];
    $result['birthYear']=$fetch['birthyear'];
    array_push($rows,$result);
}}
    $sms=array('Message'=>'success','status'=>1,'Data'=>$rows,'number'=>$count);
    echo json_encode($sms);



?>