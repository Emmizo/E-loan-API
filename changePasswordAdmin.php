<?php
require 'admin.php';
if(isset($_POST)){
    $id=$_POST['id'];
    $oldPassword=$_POST['oldPassword'];
    $password=md5($_POST['password']);
    $Admin->setOldPassword($oldPassword);
    $Admin->SetPass($password);
    $Admin->SetID($id);
    $res=$Admin->changePasswordAdmin();
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