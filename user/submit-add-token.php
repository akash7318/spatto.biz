<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;


$touser = $_POST['touser'];
$amt = $_POST['amt'];
$username = $_SESSION['username'];

$otp = $_POST['otp'];




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

$sql  = "SELECT * FROM `vcode` WHERE `code` = '$otp' and `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
$nrows1 = mysqli_num_rows($result);

if($nrows1>0){

$sql  = "DELETE FROM `vcode` WHERE `code` = '$otp'";
    $result = mysqli_query($s_dbid,$sql);    
    
$sql  = "SELECT id FROM `join` WHERE `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($mid) = mysqli_fetch_row($result);

$sql  = "SELECT id FROM `join` WHERE `username` = '$touser'";
$result = mysqli_query($s_dbid,$sql);

if(mysqli_num_rows($result)<=0){
$msg= "The user ($touser) does not exist.";
}
else{
	list($tid) = mysqli_fetch_row($result);
	
	
	$tdate = date("Y-m-d H:i:s");
	$wdate = date("Y-m-d H:i:s");
	
	
	
	
		$sql  = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`, `remark`) VALUES (NULL, '$mid', '$amt', 'Completed', '$tdate', '', NULL, 'iWallet Token Purchase', NULL, 'Purchased Token for $touser');";
		$result = mysqli_query($s_dbid,$sql);
	
	if($amt==5000){
	    $amt=5250;
	}
	elseif($amt==10000){
	    $amt=10750;
	}
	elseif($amt==25000){
	    $amt=27500;
	}
	elseif($amt==50000){
	    $amt=57500;
	}
	elseif($amt==100000){
	    $amt=120000;
	}
		
		
		$sql  = "INSERT INTO `token_wallet` (`id`, `mid`, `amt`, `remarks`, `ttime`,`username`, `status`) VALUES (NULL, '$tid', '$amt', 'Token', '$tdate','$username','Confirmed');";
	    $result = @mysqli_query($s_dbid,$sql);
	    
        $msg = "Toke Purchase has been successfull.";	
		
}
}	
else{
    $msg = "Invalid OTP provided. Please enter valid OTP.";
}

		header("Location: add-token.php?msg=$msg");


?>