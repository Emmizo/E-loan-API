<?php
require 'client.php';
if(isset($_POST)){
    $identity2=$_POST['identity2'];
    $oldPassword=$_POST['oldPassword'];
    $password=md5($_POST['password']);
    $Client->setOldPassword($oldPassword);
    $Client->SetPass($password);
    $Client->SetID2($identity2);
    $res=$Client->changePassword();
}
    if($res){
        $return=array('Message'=>'Password changed','Status'=>1);
        echo json_encode($return);
    }
    else{
        $return=array('Message'=>'Wrong previous password, make sure that you wrote current password correct','Status'=>0);
        echo json_encode($return);
    }

?>