<?php
require 'admin.php';
$res=$Admin->AvailableMotor();
$result=array();
$rows=array();
$count=0;
while($fetch=$res->fetch_array()){
    $count +=1;
    $result['VIN']=$fetch['VIN'];
    $result['Model']=$fetch['model'];
    $result['Frw']=$fetch['value'];
    $result['value']=$fetch['status'];
    array_push($rows,$result);
}
    if($count>0){
        $returnJs = array('message'=>'success','status'=>1,'data'=>$rows,'number'=>$count);
        echo json_encode($returnJs); 
    }else{
        $returnJs = array('message'=>'No one Available,','status'=>0,'Number'=>$count);
        echo json_encode($returnJs); 
    }
        
       
?>