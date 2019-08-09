<?php
require 'client.php';
if(isset($_POST)){
    $identity2=$_POST['identity2'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $birthyear=$_POST['birthyear'];
    $username=$_POST['username'];
    $data=array();
    $Client->SetID2($identity2);
    $Client->SetFname($fname);
    $Client->SetLname($lname);
    $Client->SetPhone($tel);
    $Client->SetEmail($email);
    $Client->SetBirth($birthyear);
    $Client->SetUsername($username);
    $res=$Client->UpdateClient();
    if($res){
        $message='client info Updated';
        $status=1;
    }
    else{
        $message='Fail to update';
        $status=0; 
    }
}
$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);

?>