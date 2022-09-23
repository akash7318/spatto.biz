<?php
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
require "text.php";
$s_dbid = FALSE;

$data  = json_decode(file_get_contents("php://input"), TRUE);

$phone = $data['phone'];


   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;


         $s_dbid = mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);
          

   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }
  

    
    function gencode($length)
    {
      //return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
        $number = rand(100,100000);
        $t=time();
        $random = $number.$t;
        
        return substr($random,-8);
    }

    
    symp_connect();
date_default_timezone_set('Asia/Kolkata');
$jdate = date("Y-m-d H:i:s");

$vcode = gencode(8);

if($phone!=""){
$sql = "INSERT INTO `vcode` (`id`, `username`, `code`, `date`) VALUES (NULL, '$phone', '$vcode','$jdate')";
$result = mysqli_query($s_dbid,$sql);

$message = rawurlencode("Dear User your one time password is ".$vcode.". Spatto Services Pvt. Ltd. www.spattoservices.com");

send_reg_otp($phone,$message); 
$result = "Mobile OTP Sent";
}
else{
$result = "Invalid Mobile No.";
}


echo $result;

symp_disconnect();

?>