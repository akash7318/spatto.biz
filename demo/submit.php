<?php
@session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
//require "text.php";

$s_dbid = FALSE;
$store_name = $_POST['store_name'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = strtolower($_POST['email']);
$sponsor= strtolower($_POST['referral']);
//$direct = preg_replace('/\s+/', '', $direct);
//$username = strtolower($_POST['username']);
//$username = preg_replace('/\s+/', '', $username);
$password = $_POST['password'];
$tpassword = @$_POST['tpassword'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$title = @$_POST['title'];
$pan = @$_POST['pan'];
$aadhaar = @$_POST['aadhaar'];
$address = @$_POST['address'];
$pincode = @$_POST['pincode'];
$landmark = @$_POST['landmark'];

function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);

         
}

function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }

$psponsor = "";
$ppos = 0;
function getpos(){
    global $s_dbid,$psponsor,$ppos;
    
    $sql  = "SELECT id,sponsor,position FROM `join_store` order by id DESC limit 1";
	$result = mysqli_query($s_dbid,$sql);
    list($lid,$lsponsor,$lpos) = mysqli_fetch_row($result);
    if($lpos<3){
        $psponsor = $lsponsor;
        $ppos = $lpos+1;
    }
    else{
        $sql  = "SELECT id FROM `join_store` where username = '$lsponsor'";
        $result = mysqli_query($s_dbid,$sql);
        list($lid) = mysqli_fetch_row($result);
        
        $lid++;
        
        $sql  = "SELECT username FROM `join_store` where id = '$lid'";
        $result = mysqli_query($s_dbid,$sql);
        list($lsponsor) = mysqli_fetch_row($result);
        
        $psponsor = $lsponsor;
        $ppos = 1;
    }
    
}

    function genuser()
{
       //Start Random number loop
       //do {
       //Create 6 digit random number
       $rn1 = rand(0, 9);
       $rn2 = rand(0, 9);
       $rn3 = rand(0, 9);
	   $rn4 = rand(0, 9);
	   $rn5 = rand(0, 9);
	   $rn6 = rand(0, 9);
       $rn7 = rand(1, 9);


       $pin = "VE"."$rn1$rn2$rn3$rn4$rn5$rn6$rn7";
       //}
       //Search for a match in existing list ($xp)
       //while(preg_match("/$pin/", $xp));
       //End loop
return $pin;

}

function gencode()
{
return rtrim(base64_encode(md5(microtime())),"=");
}

$downlineuser="";


function find_position($snode,$pos) {
      global $s_dbid,$downlineuser,$position;

        $sql  = "SELECT username FROM `join_store` WHERE `sponsor` = '$snode' and `position` = '$pos'";
        $result = mysqli_query($s_dbid,$sql);
		if(mysqli_num_rows($result)==0)
		{
			$downlineuser = $snode;

		}
		else
		{
			list($user) = mysqli_fetch_row($result);
			find_position($user,$pos);
		}
		
		
		 
   }

function getNodeInsertPostionByParentId($parentId){
        global $s_dbid;
    
        $position = array('status'=>false);
        $parents = array();
    
        foreach($parentId as $parent){  
            
                $qry = "select username,position FROM `join_store` where sponsor ='".$parent."' order by position";
                $rst = mysqli_query($s_dbid,$qry);
            
                $count = mysqli_num_rows($rst);
           // echo $count."<br>";
                if($count==3){
                    while($row = mysqli_fetch_assoc($rst)){
                        $parents[$parent][] = $row['username'];
                       // print_r($parents);
                    }   
                }elseif($count==2){
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '3';
                    //echo '<pre>1';print_r($position);echo '</pre>';
                    return $position;
                }elseif($count==1){
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '2';
                    //echo '<pre>1';print_r($position);echo '</pre>';
                    return $position;
                }else{
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '1';
                    //echo '<pre>2';print_r($position);echo '</pre>';
                    return $position;
                }
            }

        return searchByParents($parents);
    }

function searchByParents($parents){
        foreach($parents as $parent){
            return getNodeInsertPostionByParentId($parent);  
        }
    }


	symp_connect();


$flag = TRUE;
$msg="";
//check for validations
		       
    // $sql  = "SELECT * FROM `vcode` WHERE `username` = '$phone' and `code` = '$otp'";
    // $result = mysqli_query($s_dbid,$sql);
    // $nrows=0;
    // $nrows = @mysqli_num_rows($result);    
    // if ((int)$nrows<=0){
    //   $msg= "The OTP entered is invalid please enter correct OTP and try again";
    //   echo "<META HTTP-EQUIV='refresh' content='0; URL=signup.php?errmsg=".$msg."'>";
    //   $flag = FALSE;
    // }
    // else{
    //   $sql  = "DELETE FROM `vcode` WHERE `phone` = '$phone' and `code` = '$otp'";
    //   $result = mysqli_query($s_dbid,$sql);
    // }

    $sql  = "SELECT * FROM `join_store` WHERE `phone` = '$phone'";
    $result = mysqli_query($s_dbid,$sql);
    $nrows=0;
    $nrows = mysqli_num_rows($result);    
    if ((int)$nrows>0){
    //   $msg= "This phone no. is already registered. Please try again by selecting a different phone no.<br>";
    //   echo "<META HTTP-EQUIV='refresh' content='0; URL=signup.php?errmsg=".$msg."'>";
    //   $flag = FALSE;
    }
    
    $loginsql  = "SELECT * FROM `join_store` WHERE `email` = '$email'";
        $myresult = mysqli_query($s_dbid,$loginsql);
        $nrows=0;
    $nrows = mysqli_num_rows($myresult);
    if ((int)$nrows>0){
    //   $msg.= "This email is already registered. Please try again by selecting a different email.<br>";
    //     echo "<META HTTP-EQUIV='refresh' content='0; URL=register.php?errmsg=".$msg."'>"; 
    //     $flag = FALSE;
    }

    $sql  = "SELECT * FROM `bank_store` WHERE `pancard` = '$pan'";
    $result = mysqli_query($s_dbid,$sql);
    $nrows=0;
    $nrows = mysqli_num_rows($result);    
    if ((int)$nrows>0){
    //   $msg= "This PAN no. is already registered. Please try again by selecting a different PAN no.<br>";
    //   echo "<META HTTP-EQUIV='refresh' content='0; URL=signup.php?errmsg=".$msg."'>";
    //   $flag = FALSE;
    }
    
    $loginsql  = "SELECT * FROM `bank_store` WHERE `idnumber` = '$aadhaar'";
        $myresult = mysqli_query($s_dbid,$loginsql);
        $nrows=0;
    $nrows = mysqli_num_rows($myresult);
    if ((int)$nrows>0){
    //   $msg.= "This Addhaar is already registered. Please try again by selecting a different Aadhaar.<br>";
    //     echo "<META HTTP-EQUIV='refresh' content='0; URL=register.php?errmsg=".$msg."'>"; 
    //     $flag = FALSE;
    }


    $sql  = "SELECT * FROM `join_agent` WHERE `username` = '$sponsor'";
    $result = mysqli_query($s_dbid,$sql);
    $nrows=0;
    $nrows = mysqli_num_rows($result);		
    if ((int)$nrows<=0){
    	$msg= "Agent Code (".$sponsor.") does not exist.<br>";
    	$flag = FALSE;
    }
        

		
		
//echo $flag."test";

		if($flag==TRUE){
			


		$msg="";

			$sqlc  = "SELECT username FROM `join_store` order by id desc";
	        $resultc = mysqli_query($s_dbid,$sqlc);
			list($lastid) = mysqli_fetch_row($resultc);	
			//$username = genuser();
			//$username = $username.$lastid;
			//find_position($sponsor,$pos);
			$lastid = substr($lastid,2);
            $lastid++;
            $username = "SS".$lastid;
			//$data = getNodeInsertPostionByParentId(array('SA1002'));
            //$pos = $data['node'];
            $pos = NULL;
            //$sponsor = $data['parentId'];
            
			$jdate = date("Y-m-d");	
			
			
			$sql = "INSERT INTO `join_store` VALUES (NULL, '$name', '$phone', '$email', '$sponsor', '$username', '$password', NULL, '$direct',  NULL, 'pending', '$jdate', '$tpassword',  '$title', '$country', '$state', '$city', '$address','$pincode','$landmark','$store_name');";
			$result = mysqli_query($s_dbid,$sql);
			
			
			$sql  = "SELECT * FROM `join_store` WHERE `username` = '$username'";
        	$result = mysqli_query($s_dbid,$sql);
			list($jid) = mysqli_fetch_row($result);
            
            $sql_bank = "INSERT INTO `bank_store` (`id`, `bank_name`, `branch_name`, `account_no`, `account_type`, `aname`, `jid`, `ifsc`, `pancard`, `paytm`, `phonepe`, `googlepay`, `upi`, `panimage`, `afront`, `aback`, `idnumber`, `idtype`, `panstatus`, `idstatus`, `bank_status`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, '$jid', NULL, '$pan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$aadhaar', NULL, NULL, NULL,NULL);";
            $result_bank = mysqli_query($s_dbid,$sql_bank);
			$jdate = date("Y-m-d");
			
			
			
			
			
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
              Welcome to Spatto Store Owner Registration. We have recieved your membership request.<br><br>
              		
              You can login with your Username and Password. Login details are mentioned below : <br>
              Username : ".$username."<br>
              Password : ".$password."<br>
              Sponsor Agent : ".$sponsor."<br>
			  
			 
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
      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2022 Spatto Services Pvt. Ltd.. All rights reserved.</td>
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
			$headers .= 'From: info@spatto.biz' . "\r\n";			
			mail($to,"Membership Registration",$matter,$headers);
		
$_SESSION['username'] = $username;
$_SESSION['msg'] = $matter;


$msg = 'Registration Successfull. Your Username is '.$username.'. <br><br>We have sent a welcome mail to your registered email address. <br><br>In order to login you will need the username/password, which is provided in your welcome mail. ';

$sms_msg = "Dear ".$name." Congratulations on your decision to join Spatto. Login ID ".$username." and Password is ".urlencode($password)." ";
		
		//send_registration_message($name,$phone,$username,$password); 
			//Send Sms
		
//	echo $sms_msg;	

$message = "Dear ".$name." You have Successfully Registered. Your User ID is ".$username." Password is ".urlencode($password)." Thank You for joining with us. Spatto Travel www.spattoservices.com";


      $url="";
		
	//echo "<iframe src='http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=Spatto&smstype=TRANS&numbers=".$phone."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d' style='width:0;height:0;border: 0;border: none;'></iframe>";
            
            

			echo "<META HTTP-EQUIV='refresh' content='0; URL=message.php?msg=".$msg."'>"; 	
		}
		else{
			echo "<META HTTP-EQUIV='refresh' content='0; URL=signup.php?errmsg=".$msg."&user=".$username."'>";
		}

		
			

symp_disconnect();

?>