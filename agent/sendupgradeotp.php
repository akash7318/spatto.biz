<?php
@session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
require "text.php";
$s_dbid = FALSE;

$data  = json_decode(file_get_contents("php://input"), TRUE);

$username = $data['username'];


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


$username = $_SESSION['username'];
$sql = "select `id`,`phone`,`email`,`name` from `join` where `username` = '$username';";
$result = @mysqli_query($s_dbid,$sql);
list($mid,$phone,$email,$name) = @mysqli_fetch_row($result);

$sql = "INSERT INTO `vcode` (`id`, `username`, `code`, `date`) VALUES (NULL, '$username', '$vcode','$jdate')";
$result = mysqli_query($s_dbid,$sql);

$message = rawurlencode("Dear ".$username." an upgrade request is placed from your iwallet. Your one time password is ".$vcode.". Spatto Services www.spattoservices.com");

send_otp($username,$phone,$vcode,$message); 


$matter="";
			
$a ="

<!doctype html>
<html>
<head>
<meta charset='UTF-8'>
<style type='text/css'>
body {
	background-color: #DBDBDB;
}
</style>
</head>

<body>

<table width='80%' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tbody>
    <tr>
      <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>Spatto Services Pvt. Ltd.</td>
    </tr>
    <tr>
      <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>
        <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
          <tr>
            <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>
              <br>
              Welcome to Spatto. We have recieved your OTP request.<br><br>
              		
              An upgrade request is placed from your iwallet OTP is mentioned below : <br>
              OTP : ".$vcode."<br>
			  
			 
			  </p>
              <p>If you have any questions, do not hesitate to contact our support staff, and they will get back to you within 24 hours.<br>
              </p>
              <p> </p>
              <p>Regards, <br>
              Spatto<br>
              <br>
              </p></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2021 Spatto. All rights reserved.</td>
    </tr>
  </tbody>
</table>
</body>
</html>



			";

			$matter .= $a;
			
			$to = $email;
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: info@spattoservices.com' . "\r\n";			
			//mail($to,"OTP for Wallet",$matter,$headers);




$result = "Mobile OTP Sent";
echo $result;

symp_disconnect();

?>