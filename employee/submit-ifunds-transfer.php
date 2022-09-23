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
	
	
	$tdate = date("Y-m-d");
	$wdate = date("Y-m-d H:i:s");
	
	
		$sql  = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`, `remark`) VALUES (NULL, '$mid', '$amt', 'Completed', '$tdate', '', NULL, 'iWallet Transfer', NULL, 'Transfer to $touser');";
		$result = mysqli_query($s_dbid,$sql);
		
		
		$sql  = "INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`, `status`) VALUES (NULL, '$tid', '$amt', '0', 'iWallet Transfer ', '$tdate', NULL, '$username', NULL, NULL, 'Confirmed');";
	    $result = @mysqli_query($s_dbid,$sql);
	    
        $msg = "iWallet Transfer has been successfull.";	
		
}
}	
else{
    $msg = "Invalid OTP provided. Please enter valid OTP.";
}

		header("Location: iwallet-transfer.php?msg=$msg");


?>