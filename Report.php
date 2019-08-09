<?php
require 'client.php';
if(isset($_POST)){
    $identity2=$_POST['identity2'];
    $Client->SetID2($identity2);
    $data=array();
    $rows=array();
    $count=0;
    $qr=$Client->checkTransaction();
    while($fetch=$qr->fetch_array()){
        $count+=1;
      $data['Motor_identity']=$fetch['VIN2'];
      $data['Transaction_data_time']=$fetch['transaction_time'];
      $data['MoneyPaid']=$fetch['paidMoney'];
      array_push($rows,$data);  
    }
}
if($count>0){
    $return=array('Message'=>'All transaction occured on your account','Data'=>$rows,'Status'=>1,'Number'=>$count);
    echo json_encode($return);
}else{
    $return=array('Message'=>'No transaction happaned on this account or check if identity reach there','Status'=>0,'Number'=>$count);
    echo json_encode($return);
}

?>