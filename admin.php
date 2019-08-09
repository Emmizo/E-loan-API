<?php
require 'Config.php';
class Admin extends Config{
    private $id;
    private $model;
    private $value;
    private $payPriod;
    private $payValue;
    private $insurance;
    private $percentage;
    private $status;
    private $VIN;
    private $insuranceID;
    private $oldPassword;
    private $username;
    private $password;
    public function __construct(){
        $this->connect();
        $this->status='Available';
    }
    public function setOldPassword($oldPassword){
        $this->oldPassword=$oldPassword;
    }
    public function SetUsername($username){
        $this->username=$username;
    }
    public function SetPass($password){
        $this->password=$password;
    }
    public function SetID($id){
        $this->id=$id;
    }
    public function SetInsuranceID($insuranceID){
        $this->insuranceID=$insuranceID;
    }
    public function SetVIN($VIN){
        $this->VIN=$VIN;
    }
    
    public function SetModel($Model){
        $this->model=$Model;
    }
    public function SetValue($Value){
        $this->value=$Value;
    }
    public function SetPeriod($payPeriod){
        $this->payPeriod=$payPeriod;
    }
    public function SetPayValue($payvalue){
        $this->payValue=$payvalue;
    }
    public function SetInsurance($insurance){
        $this->insurance=$insurance;
    }
    public function SetPercentage($percentage){
        $this->percentage=$percentage;
    }
    /**
     * This function hold code which will help admin to create or add new motor in system
     */
    public function CreateMotor(){
        $qr=$this->conn->query("INSERT INTO `motor`(`VIN`,`model`,`value`,`status`) VALUES('$this->VIN','$this->model','$this->value','$this->status')");
        if($qr){
            return $qr;
        }
        else{
            return $qr.mysqli_error($this->conn->error);
        }
    }
    /**
     * this function hold code which will help admin to update motor when there is same error happen in their entry
     * 
     */
    public function UpdateMotor(){

        $sqr=$this->conn->query("UPDATE `motor` SET `VIN` = '$this->VIN', `model` = '$this->model', `value` = '$this->value', `status` = '$this->status' WHERE `motor`.`id` = '$this->id' AND `status`='$this->status';");
        if($sqr){
            return $sqr;
        }
        else{
            return $sqr.mysqli_error($this->conn->error);
        }
    }
    /**
     * function for creating new insurance
     * 
     */
    public function CreateInsurance(){
        $stmt=$this->conn->query("INSERT INTO `insurance`(`insurance`,`percentage`)VALUES('$this->insurance','$this->percentage')");
        if($stmt){
            return $stmt;
        }
        else{
            return $stmt.mysqli_error($this->conn->error);
        }
    }
    /**
     * function for updating insurance information when there is some changes happen
     */
    public function UpdateInsurance(){
        $qr=$this->conn->query("UPDATE `insurance` SET `insurance` = '$this->insurance', `percentage` = '$this->percentage' WHERE `insurance`.`insuranceID` = '$this->insuranceID';");
        if($qr){
            return $qr;
        }
        else{
            return $qr.mysqli_error($this->conn->error);
        }
    }
    /**
     * function for selecting all motors taken and available 
     */
    public function SelectMotor(){
        $stmt=$this->conn->query("SELECT * FROM motor WHERE id order by id");
        if($stmt){
            return $stmt;
        }
        else{
            return $stmt.mysqli_error($this->conn->error);
        }
    }
    /**
     * function which hold code which will display only motor are available
     */
    public function AvailableMotor(){
        $res=$this->conn->query("SELECT * FROM motor WHERE `status`='Available' ORDER BY id DESC");
        if($res){
            return $res;
         }
    else{
        return $res.mysqli_error($this->conn->error);
    }
}
/**
 * function of all motors taken
 */
public function TakenMotor(){
    $res=$this->conn->query("SELECT orders.paidMoney,motor.VIN,motor.model,motor.value,motor.status,client.fname,client.lname FROM motor
    INNER JOIN orders ON motor.VIN=orders.VIN2
    INNER JOIN client ON client.identity=orders.identity2 WHERE `status`='Taken' ORDER BY `orders`.`id` DESC")or die($this->conn->error);
    if($res){
        return $res;
}
else{
    return $res.mysqli_error($this->conn->error);
}
}
/**
 * function for creating period of payment
 */
public function SetPayPeriod(){
    $qr=$this->conn->query("INSERT INTO `paystarategy`(`payPeriod`,`payValue`)VALUES('$this->payPeriod','$this->payValue')")or die($this->conn->error);
    if($qr){
        return $qr;
    }
    else{
        return $qr.mysqli_error($this->conn->error);
    }
}
/**
 * function for selecting all strategy of payment
 */
public function SelectPayStrategy(){
    $query=$this->conn->query("SELECT * FROM paystarategy");
    if($query){
        return $query;
    }
    else{
        return $query.mysqli_error($this->conn->error);
    }
}
/**
 * code for changing password
 */
public function changePasswordAdmin(){
    $qr=$this->conn->query("SELECT * FROM `admin` WHERE `admin`.`id`='$this->id'");
    $row=mysqli_fetch_assoc($qr);
    if(md5($_POST['oldPassword'])==$row['password']){
        $r=$this->conn->query("UPDATE `admin` SET `password`='$this->password' WHERE `admin`.`id`='$this->id'");
        if($qr){
            return $qr;
        }else{
            return $qr.mysqli_error($this->error);
        }
    }
}
/**
 * admin login
 */
public function loginAdmin(){
    $qr=$this->conn->query("SELECT * FROM `admin` WHERE `client`.`username`='$this->username' AND `client`.`password`=md5('$this->password')");
    if($qr->num_rows >0){
        return $qr;
    }
    else{
        return $qr;
    }
}
/**
 * adding new admin
 */
public function setAdmin(){
 $qr=$this->conn->query("INSERT INTO `admin` (`username`, `password`) VALUES ( '$this->username', '$this->password');");
 if($qr){
     return $qr;
 }else{
     return $qr.mysqli_error($this->error);
 }
}
}
$Admin=new Admin();
?>