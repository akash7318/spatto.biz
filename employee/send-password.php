<?php
@session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
//require "text.php";

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

$msg="";
//check for validations
		       
$username = $_POST['username'];

$loginsql  = "SELECT name,password,email FROM `join` WHERE `username` = '$username'";
$myresult = mysqli_query($s_dbid,$loginsql);
$nrows=0;
$nrows = mysqli_num_rows($myresult);

if ((int)$nrows>0){			
list($name,$password,$email) = mysqli_fetch_row($myresult);			
			
			
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
              Welcome to Spatto. We have recieved your password recovery request.<br><br>
              		
              You can login with your Username and Password.Password is mentioned below : <br>
              
              Password : ".$password."<br>
			  </p>
              <p>If you have any questions, do not hesitate to contact our support staff, and they will get back to you within 24 hours.<br>
              </p>
              <p> </p>
              <p>Regards, <br>
              Spatto Services Pvt. Ltd.<br>
              <br>
              </p></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2021 Spatto Services Pvt. Ltd. All rights reserved.</td>
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
			$headers .= 'From: info@spatto.co' . "\r\n";			
			mail($to,"Password Recovery",$matter,$headers);



//$msg = 'Registration Successfull. Your Username is '.$username.'. <br><br>We have sent a welcome mail to your registered email address. <br><br>In order to login you will need the username/password, which is provided in your welcome mail. ';

$sms_msg = "Dear ".$name." Congratulations on your decision to join Spatto. Login ID ".$username." and Password is ".urlencode($password)." ";
		
		//send_registration_message($name,$phone,$username,$password); 
			//Send Sms
		
//	echo $sms_msg;	

$msg = "Dear ".$name." your password has been sent to your registered email from Spatto. www.spatto.co";


      $url="";
		
	//echo "<iframe src='http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=Spatto&smstype=TRANS&numbers=".$phone."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d' style='width:0;height:0;border: 0;border: none;'></iframe>";
            
            

			echo "<META HTTP-EQUIV='refresh' content='0; URL=forgot.php?msg=".$msg."'>"; 	
		}
		else{
		    $msg = "Invalid Email.";
			echo "<META HTTP-EQUIV='refresh' content='0; URL=forgot.php?errmsg=".$msg."&user=".$username."'>";
		}

		
			

symp_disconnect();

?>