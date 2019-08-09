<?php
require 'client.php';
if(isset($_POST)){
    $identity= trim(htmlspecialchars($_POST['identity']));
    $fname= trim(htmlspecialchars($_POST['fname']));
    $lname= trim(htmlspecialchars($_POST['lname']));
    $tel= trim(htmlspecialchars($_POST['tel']));
    $email= trim(htmlspecialchars($_POST['email']));
    $birthyear= trim(htmlspecialchars($_POST['birthyear']));
    $username= trim(htmlspecialchars($_POST['username']));
    $password= trim(htmlspecialchars(md5($_POST['password'])));
    $data=array();
    $Client->SetID($identity);
    $Client->SetFname($fname);
    $Client->SetLname($lname);
    $Client->SetPhone($tel);
    $Client->SetEmail($email);
    $Client->SetBirth($birthyear);
    $Client->SetUsername($username);
    $Client->SetPass($password);
    $res=$Client->CreateAccount();
}
    if($res){
        $message='Account created well';
        $status=1;
    }
    else{
        $message='You already have account or make sure that your identity did not used before';
        $status=0; 
    }

$return=array('Message'=>$message,'Status'=>$status);
echo json_encode($return);
?>