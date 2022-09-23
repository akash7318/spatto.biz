<?php
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

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

$otp = $_GET['otp'];
$phone = $_GET['phone'];
$flag = TRUE;
$msg="";

$sql  = "SELECT * FROM `vcode` WHERE `username` = '$phone' and `code` = '$otp'";
    $result = mysqli_query($s_dbid,$sql);
    $nrows=0;
    $nrows = @mysqli_num_rows($result);    
    if ((int)$nrows<=0){
      $msg= "Invalid OTP";
    }
    else{
      $msg= "Valid OTP";
    }
    echo $msg;
?>    