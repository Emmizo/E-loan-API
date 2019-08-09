<?php
require 'client.php';
if(isset($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $Client->SetUsername($username);
    $Client->SetPass($password);
    $res=$Client->loginClient();
}
    $data=array();
    $rows=array();
    $count=0;
    while($fetch=$res->fetch_array()){
    $count+=1;
    $data['identity']=$fetch['identity'];
    $data['Fullname']=$fetch['fname']." ".$fetch['lname'];
}
if(empty($username )){
    $message=array('Message'=>'your input username');
    echo json_encode($message);
}
elseif(empty($password)){
    $message=array('Message'=>'your input password ');
    echo json_encode($message);
}
elseif($count>0){
    $result=array('Message'=>'You logged in well','Data'=>$data,'Status'=>1,'number'=>$count);
    echo json_encode($result);
}else{
    $result=array('Message'=>'wrong password or username','Status'=>0);
    echo json_encode($result);
}
?>