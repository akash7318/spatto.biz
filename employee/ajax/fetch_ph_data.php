<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$ph_id = $_POST['ph_id'];


   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);

         
   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }

   	symp_connect();


$sql = "SELECT `touser`,`amount` FROM `help_links` WHERE `id` = '$ph_id'";
$result = mysqli_query($s_dbid, $sql);
list($gh_id,$amount) = mysqli_fetch_row($result);

$boardsql = "SELECT name,email,phone FROM `join` where `id`='$gh_id'";
$bresult = @mysqli_query($s_dbid,$boardsql);
list($name,$email,$phone) = @mysqli_fetch_row($bresult);

$boardsql = "SELECT `bank_name`, `account_no`, `aname`, `ifsc`,`btc`, `paytm`, `googlepay`, `phonepe`, `bheem_upi`, `netteller`, `skrill`, `payoneer` FROM `bank` WHERE `jid`='$gh_id'";
$bresult = @mysqli_query($s_dbid,$boardsql);
list($bank,$account,$aname,$ifsc,$btc,$paytm,$gpay,$phonepe,$upi,$netteller,$skrill,$payoneer) = @mysqli_fetch_row($bresult);

$ph_data = array
(   
            "ph_id" => $ph_id,
            "receiver_name" => $aname,
            "receiver_bank" => $bank,
            "ifsc" => $ifsc,
            "account" => $account,
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "btc" => $btc,
            "paytm" => $paytm,
            "gpay" => $gpay,
            "phonepe" => $phonepe,
            "upi" => $upi,
            "netteller" => $netteller,
            "skrill" => $skrill,
            "payoneer" => $payoneer,
            "amount" => $amount
);


   
echo json_encode(array("ph_data"=>$ph_data,"success"=>"1"));    

?>