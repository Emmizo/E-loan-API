<?php
require 'admin.php';
if(isset($_POST)){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $Admin->SetUsername($username);
    $Admin->SetPass($password);
    $res=$Admin->setAdmin();
    if(empty($username)){
        $message=array('Message'=>'Fill username ','Status'=>0);
        echo json_encode($message);
    }
    if(empty($password)){
        $message=array('Message'=>'Fill password ','Status'=>0);
        echo json_encode($message);
    }
    elseif($res){
        $message=array('Message'=>'success!','Status'=>1);
        echo json_encode($message);
    }
    else{
        $message=array('Message'=>'there is error occured','Status'=>0);
        echo json_encode($message);
    }
}

?>