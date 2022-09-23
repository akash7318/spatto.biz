<?php

session_start();
ob_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

//$amount_ded = $_POST['amount_ded'];
$amount = $_POST['withrsc'];
$wtype= $_POST["wtype"];
$wdate = Date("Y-m-d H:i:s");

// $otp = $_POST['otp'];

   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass, $s_dbname);

   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }
	
	
	symp_connect();

// $sql  = "SELECT * FROM `vcode` WHERE `code` = '$otp' and `username` = '$username' order by id DESC";
// $result = mysqli_query($s_dbid,$sql);
// $nrows1 = mysqli_num_rows($result);

// if($nrows1>0){

// $sql  = "DELETE FROM `vcode` WHERE `code` = '$otp'";
//     $result = mysqli_query($s_dbid,$sql);

$joinsql  = "SELECT id FROM `join` where `username`='".$_SESSION['username']."'";
	$jresult = mysqli_query($s_dbid,$joinsql);
	list($jid) = mysqli_fetch_row($jresult);

$joinsql  = "SELECT id FROM `join` where `username`='".$_SESSION['username']."'";
	$jresult = mysqli_query($s_dbid,$joinsql);
	list($mid) = mysqli_fetch_row($jresult);
	
//////////// Check Balance Start //////////////
$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and status != 'Unconfirmed' and `remarks` != 'Wallet Transfer ' and `remarks` NOT LIKE 'iWallet%' and `remarks` NOT LIKE 'Token%' and `remarks` NOT LIKE 'Monthly Cashback Income' and `remarks` NOT LIKE 'Monthly Investment Income'and `remarks` NOT LIKE 'VTC%' ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt) = @mysqli_fetch_row($result);
$p_amt = $p_amt - ($p_amt*10)/100;

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and (`remarks`='Wallet Transfer ' or `remarks` = 'Fund Transfer from Admin' or `remarks` like 'VTC%')";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt2) = @mysqli_fetch_row($result);

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and (`remarks`='iWallet Deposit Bonus' or `remarks` = 'iWallet Deposit Weekly Payout' or `remarks` = 'iWallet Deposit Trading Incentive') and status='Confirmed'";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt3) = @mysqli_fetch_row($result);
$p_amt3 = $p_amt3 - ($p_amt3*10)/100;
//echo $p_amt."-".$p_amt2."-".$p_amt3;


//$sql = "SELECT SUM(`comm`) FROM inv_transactions left join `investment` on inv_transactions.mid = investment.mid WHERE inv_transactions.mid = '$mid' and inv_transactions.status != 'Unconfirmed' and plan != 'voucher' and `remarks` LIKE 'Monthly Cashback Income' and investment_id = investment.id";
$sql = "SELECT sum(comm) FROM inv_transactions  WHERE inv_transactions.mid = '$mid' and inv_transactions.status != 'Unconfirmed'  and `remarks` in ('Monthly Cashback Income','Monthly Investment Income')";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt4) = @mysqli_fetch_row($result);
$p_amt4 = $p_amt4 - ($p_amt4*5)/100;
//echo $p_amt4;
$sql = "SELECT SUM(`comm`) FROM inv_transactions left join `investment` on inv_transactions.mid = investment.mid WHERE inv_transactions.mid = '$mid' and inv_transactions.status != 'Unconfirmed' and plan = 'voucher' and `remarks` LIKE 'Monthly Cashback Income' and investment_id IS NULL";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt5) = @mysqli_fetch_row($result);
$p_amt5 = $p_amt5 - ($p_amt5*10)/100;
//echo $p_amt. " + ". $p_amt2. " + " .$p_amt3. " + ". $p_amt4. " + " .$p_amt5;
$p_amt = $p_amt + $p_amt2 + $p_amt3 + $p_amt4 + $p_amt5;

$sql = "SELECT sum(`amount`) FROM withdraw WHERE `jid`='$mid' and `wtype` not like 'iWallet%' and `wtype` not like 'Token';";
$result = mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);
//echo "-W:".$w_amt;
$e_amt = $p_amt;

$wallet_bal = $p_amt - $w_amt;




//////////// Check Bal End//////////////
if($wallet_bal>=$amount){
    
		$pass_sql = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`,`remark`) VALUES (NULL, '$jid', '$amount', 'Pending', '$wdate', NULL, 'NULL', '$wtype', '$amount_ded','withdrawal by user')"; 
		$pass_result = mysqli_query($s_dbid,$pass_sql);
		 
		//echo $pass_result;
		$jsql = "select name,email from `join` where `id` = '$jid'"; 
		$jresult = mysqli_query($s_dbid,$jsql);   
		list($name,$email) = @mysqli_fetch_row($jresult);   
		
		$_SESSION['withdrawl'] = "submited";  
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
      <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>Spatto Travels</td>
    </tr>
    <tr>
      <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>
        <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
          <tr>
            <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>
              <br>
              A withdrawal request for ".$amount." has been successfully placed.
			  
			  </p>
              <p>If you have any questions, do not hesitate to contact our support staff, and they will get back to you within 24 hours.<br>
              </p>
              <p> </p>
              <p>Regards, <br>
              Spatto Travels<br>
              <br>
              </p></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2021 Spatto Travels. All rights reserved.</td>
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
			$headers .= 'From: Spatto<info@spattoservices.com>' . "\r\n";			
			//mail($to,"Withdrawl Confirmation",$matter,$headers);  
		   
		   
		   
		   
		   $msg = 'Withdrawal Request has been successfully placed. It will be processed in your bank account within 48 hours.';
	//}
	//else{
	  // $msg = 'Withdrawal could not be processed, please try again after some time.';
	//}
}
else{
	$msg = "Insufficient account balance.";
}

// }	
// else{
//     $msg = "Invalid OTP provided. Please enter valid OTP.";
// }


		header("Location: withdraw-message.php?msg=$msg");
        //echo $msg;


?>