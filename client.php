<?php
require 'config.php';
class Client Extends Config{
private $identity;
private $fname;
private $lname;
private $tel;
private $email;
private $birthyear;
private $username;
private $password;
private $id;
private $identity2;
private $VIN2;
private $insuranceID;
private $insuranceID2;
private $payID2;
private $payID;
private $paidMoney;
private $transaction_time;
private $oldPassword;
public function __construct(){
    $this->connect();
    $this->transaction_time=date('l, Y-m-d, H:m:s');
    $this->status="Payment Progress";
}
public function SetID($ID){
 $this->identity=$ID;
 $this->paidMoney=0;
}
public function setOldPassword($oldPassword){
    $this->oldPassword=$oldPassword;
}
public function SetFname($firstname){
    $this->fname=$firstname;
}
public function SetLname($lastname){
    $this->lname=$lastname;
}
public function SetPhone($telephone){
    $this->tel=$telephone;
}
public function SetEmail($email){
    $this->email=$email;
}
public function SetBirth($birthYear){
    $this->birthyear=$birthYear;
}
public function SetUsername($username){
    $this->username=$username;
}
public function SetPass($password){
    $this->password=$password;
}
public function SetPaid($Pay){
    $this->paidMoney=$Pay;
}
public function SetID2($identity2){
    $this->identity2=$identity2;
}

public function SetInsurance($insuranceID2){
    $this->insuranceID2=$insuranceID2;
}
public function SetInsuranceID($insuranceID){
    $this->insuranceID=$insuranceID;
}
public function SetPayID($payId2){
    $this->payID2=$payId2;
}
public function SetPayID2($payID){
    $this->payID=$payID;
}
public function ID($id){
    $this->id=$id;
}
public function SetVIN2($VIN2){
    $this->VIN2=$VIN2;
}
/**
 * this function hold all code will help new client to create acount but before create account must check if 
 * client are not registered twice
 * (Sign in).
 */
public function CreateAccount(){
    $qr=$this->conn->query("SELECT * FROM client WHERE identity='$this->identity'")or die($this->conn->error);
    if($qr->num_rows<=0){
    $query=$this->conn->query("INSERT INTO `client`(`identity`,`fname`,`lname`,`tel`,`email`,`birthyear`,`username`,`password`) VALUES('$this->identity','$this->fname','$this->lname','$this->tel','$this->email','$this->birthyear','$this->username','$this->password')");
    if($query){
        return $query;
    }
    else{
        return $query.mysqli_error($this->conn);
    }
}}
/**
 * This function are for update clients information
 */
public function UpdateClient(){
    $stmt=$this->conn->query("UPDATE `client` SET `fname` = '$this->fname', `lname` = '$this->lname', `tel` = '$this->tel', `email` = '$this->email', `birthyear` = '$this->birthyear',`username` = '$this->username' WHERE `client`.`identity` = '$this->identity2';")or die(mysqli_error($this->conn));
    
    if($stmt){
        return $stmt;
    }
    else{
        return $stmt.mysqli_error($this->conn->error);
    }

}
/**
 * This function is hold all code which will help client meanwhile he/she want to apply for motor loan
 */
public function Apply(){

    $qr=$this->conn->query("SELECT COUNT(orders.VIN2) AS VIN2,sum(orders.paidMoney) AS paidMoney, sum(motor.value) AS value,`insurance`.`percentage` FROM orders
    INNER JOIN motor ON motor.VIN=orders.VIN2
    INNER JOIN insurance ON insurance.insuranceID=orders.InsuranceID2
    WHERE `orders`.`identity2`='$this->identity2' AND `motor`.`status`='Taken' AND `orders`.`paidMoney`<`motor`.`value` HAVING COUNT(`orders`.`VIN2`)>=2  ")or die($this->conn->error);
    $result=$this->conn->query("SELECT * FROM `insurance`,`motor` WHERE `insurance`.`insuranceID`='$this->insuranceID2' AND `motor`.`VIN`='$this->VIN2'")or die($this->conn->error);
    $fetch=mysqli_fetch_assoc($result);
    $percentage=$fetch['value']*$fetch['percentage']/100;
    // $res=$this->conn->query("SELECT * `orders` WHERE `orders`.`VIN2`='$this->VIN2'");
    if($qr->num_rows<=0 ){
         $query=$this->conn->query("INSERT INTO `orders` (`identity2`, `VIN2`, `payID2`, `insuranceID2`, `paidMoney`,`status`) VALUES ('$this->identity2', '$this->VIN2', '$this->payID2', '$this->insuranceID2', '0','$this->status');")or die($this->conn->error);
         $query=$this->conn->query("UPDATE `motor` SET `status` = 'Taken', `value`=`value`+'$percentage' WHERE `motor`.`VIN` = '$this->VIN2' AND `motor`.`status`='Available' ;");
         if($qr){
           return $qr;
     }
     else{
        return $qr.mysqli_error($this->conn);
     }
     }}
     /**
      * this function hold code which will help users to check balance he/she rest to pay on individual motor.
      */
public function Check(){
    $res=$this->conn->query("SELECT orders.paidMoney AS paidMoney,paystarategy.payValue,motor.value, orders.VIN2  FROM orders 
    INNER JOIN motor ON motor.VIN=orders.VIN2 
    INNER JOIN paystarategy ON paystarategy.payID=orders.payID2
    INNER JOIN client ON client.identity=orders.identity2
    WHERE  orders.VIN2='$this->VIN2' ORDER BY `orders`.`id` desc")or die($this->conn->error);
    if($res){
        return $res;
        
    }
    else{
        return $res.mysqli_error($this->conn);
    }
}
/**
 * this function hold code which will help users to check all motors loaned and money paid on each motor and mone rest according to identity
 */
public function CheckAll(){
    $res=$this->conn->query("SELECT orders.paidMoney AS paidMoney,paystarategy.payValue, motor.value, orders.VIN2  FROM orders 
    INNER JOIN motor ON motor.VIN=orders.VIN2 
    INNER JOIN paystarategy ON paystarategy.payID=orders.payID2
    INNER JOIN client ON client.identity=orders.identity2
    WHERE  orders.identity2='$this->identity2' ORDER BY `orders`.`id` desc")or die($this->conn->error);
    if($res){
        return $res;
        
    }
    else{
        return $res.mysqli_error($this->conn);
    }
}
/**
 * this function hold all code will help user to view all motors he/she got
 */
public function ViewMotorLoaned(){
    $res=$this->conn->query("SELECT orders.paidMoney AS paidMoney, motor.value, orders.VIN2,motor.model  FROM orders 
    INNER JOIN motor ON motor.VIN=orders.VIN2 
    INNER JOIN client ON client.identity=orders.identity2
    WHERE  orders.identity2='$this->identity2' ORDER BY `orders`.`id` desc")or die($this->conn->error);
    if($res){
        return $res;
        
    }
    else{
        return $res.mysqli_error($this->conn);
    }
}
/**
 * this fuction hold code that viewing all client available
 */
public function ReadClient(){
    $sql=$this->conn->query("SELECT * FROM client")or die($this->conn->error);
    if($sql){
        return $sql;
    }
    else{
        return $sql.mysqli_error($this->conn);
    }
}
/**
 * This function viewing Details of client according to his/her identity 
 */
public function ReadEachClient(){
    $sql=$this->conn->query("SELECT * FROM client WHERE `client`.`identity`='$this->identity2'");
    if($sql){
        return $sql;
    }
    else{
        return $sql.mysqli_error($this->conn);
    }
}
/**
 * This function hold all condition client will follow when his going to pay their loan 
 * ex: if he/she choose to pay his motor during two years and per week, system will check if he is going to pay money 
 * which are equal as he must to pay per week or above of that money
 */
public function payCondition(){
    $r=$this->conn->query("SELECT `paystarategy`.`payPeriod`,`orders`.`payID2`,`paystarategy`.`payValue`,`insurance`.`insuranceID`,`insurance`.`insurance`,`insurance`.`percentage`,`orders`.`payID2`,`orders`.`insuranceID2`,`orders`.`VIN2`,`motor`.`value`,`orders`.`paidMoney`FROM orders
    INNER JOIN insurance ON insurance.insuranceID=orders.insuranceID2
    INNER JOIN motor ON motor.VIN=orders.VIN2
    INNER JOIN paystarategy ON paystarategy.payID=orders.payID2 WHERE orders.VIN2='$this->VIN2' AND orders.identity2='$this->identity2' AND round(motor.value/paystarategy.payValue)<=round('$this->paidMoney')");
    
    $rs=$this->conn->query("SELECT COUNT(orders.VIN2) AS VIN2,sum(orders.paidMoney) AS paidMoney,orders.status, sum(motor.value) AS value FROM orders
    INNER JOIN motor ON motor.VIN=orders.VIN2
    WHERE `orders`.`identity2`='$this->identity2' AND `orders`.`VIN2`='$this->VIN2'  ")or die($this->conn->error);
    $row=mysqli_fetch_array($rs);
    
    if($r->num_rows>0){
        if($row['status']=='Paid'){
            return mysqli_error($this->conn);
        }
        elseif(round($row['paidMoney'])>=$row['value']){
            $qr=$this->conn->query("UPDATE `orders` SET `status` = 'Paid' WHERE `orders`.`VIN2` = '$this->VIN2' AND `orders`.`status`='$this->status';");
             return $qr;
        }
        $qr=$this->conn->query("UPDATE `orders` SET `paidMoney` = `paidMoney`+'$this->paidMoney' WHERE `orders`. `VIN2`='$this->VIN2' AND `orders`.`identity2`='$this->identity2' AND `orders`.`status`='$this->status'");
        $qr=$this->conn->query("INSERT INTO `transaction` (`identity2`, `VIN2`, `transaction_time`, `paidMoney`) VALUES ('$this->identity2', '$this->VIN2', '$this->transaction_time', '$this->paidMoney');");
            return $qr;
    }
        else{
            return $qr.mysqli_error($this->conn);
        }
    }

/**
 * Function which help in payment
 * How it work?, when client send money then money will add on current money have been paid before
 * and then keep or transaction happened on each time heor she paid
 */
public function pay(){
    $qr=$this->conn->query("UPDATE `orders` SET `paidMoney` = `paidMoney`+'$this->paidMoney' WHERE `orders`. `VIN2`='$this->VIN2' AND `orders`.`identity2`='$this->identity2' AND `orders`.`status`='$this->status'");
    $qr=$this->conn->query("INSERT INTO `transaction` (`identity2`, `VIN2`, `transaction_time`, `paidMoney`) VALUES ('$this->identity2', '$this->VIN2', '$this->transaction_time', '$this->paidMoney');");
    if($qr){
        return $qr;
    }
    else{
        return $qr.mysqli_error($this->conn);
    }
}
/**
 * This function code help to view all clients available in one insurance company
 */
public function ClientInsurance(){
    $qr=$this->conn->query("SELECT DISTINCT client.fname,client.lname,insurance.insurance,orders.insuranceID2 FROM insurance
    INNER JOIN orders ON insurance.insuranceID=orders.insuranceID2
    INNER JOIN client ON `client`.`identity`=`orders`.`identity2` WHERE `insurance`.`insuranceID`='$this->insuranceID'");
    if($qr){
        return $qr;
    }
    else{
        return $qr.mysqli_error($this->conn);
    }
}
/**
 * This function help in checking all clients chosen the period will use in their payment
 */
public function ClientPayPeriod(){
    $qr=$this->conn->query("SELECT DISTINCT client.fname,client.lname,orders.VIN2, paystarategy.payPeriod FROM paystarategy
    INNER JOIN orders ON paystarategy.payID=orders.payID2
    INNER JOIN client ON `client`.`identity`=`orders`.`identity2` WHERE `paystarategy`.`payID`='$this->payID'")or die($this->conn->error);
    if($qr){
        return $qr;
    }
    else{
        return $qr.mysqli_error($this->conn);
    }
}
/**
 * This function is for checking all transaction accured in client account
 */
public function checkTransaction(){
    $qr=$this->conn->query("SELECT `transaction`.`transaction_time`,`transaction`.`paidMoney`,`transaction`.`VIN2` FROM `transaction`
    INNER JOIN `client` ON `client`.`identity`=`transaction`.`identity2`
    INNER JOIN `motor` ON `motor`.`VIN`=`transaction`.`VIN2` WHERE `client`.`identity`='$this->identity2' ORDER BY transaction_time DESC")or die(mysqli_error($this->conn));
    if($qr){
        return $qr;
    }
    else{
        return $qr.mysqli_error($this->conn);
    }
}
/**
 * this function Hold all codes for changing password on client side
 */
public function changePassword(){
    $qr=$this->conn->query("SELECT * FROM client WHERE `client`.`identity`='$this->identity2'");
    $row=mysqli_fetch_assoc($qr);
    if(md5($_POST['oldPassword'])==$row['password']){
        $r=$this->conn->query("UPDATE client SET `password`='$this->password' WHERE `client`.`identity`='$this->identity2'");
        if($qr){
            return $r;
        }else{
            return $r.mysqli_error($this->error);
        }
    }
}
/**
 * login code
 */
public function loginClient(){
    $qr=$this->conn->query("SELECT * FROM `client` WHERE `client`.`username`='$this->username' AND `client`.`password`=md5('$this->password')");
    if($qr->num_rows >0){
        return $qr;
    }
    else{
        return $qr;
    }
}
}
$Client=new Client();
?>