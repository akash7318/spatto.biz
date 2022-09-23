<?php
session_start();
ob_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

//$amount_ded = $_POST['amount_ded'];
$amount = $_POST['withrsc'];
$wtype= $_POST["wtype"];
$walletamt= $_POST["walletamt"];
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


$joinsql="SELECT id FROM `join` where `username`='".$_SESSION['username']."'";
$jresult = mysqli_query($s_dbid,$joinsql);
list($jid) = mysqli_fetch_row($jresult);
$username = $_SESSION['username'];

//////////// Check Balance Start //////////////
$sql_token="SELECT token_value,tdate,edate FROM `token_value` order by id asc";
$result_token = @mysqli_query($s_dbid,$sql_token);
$my_total_token = 0;

while(list($token_value,$tdate,$edate) = @mysqli_fetch_row($result_token)){
   
    if($tdate==$edate){
        $sql  = "SELECT sum(amt) FROM `token_wallet` where `ttime` >= '$tdate' and `username` = '$username'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    else{
        $sql  = "SELECT sum(amt) FROM `token_wallet` where `ttime` BETWEEN '$tdate' AND '$edate' AND `username` = '$username'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    
    $my_total_token += $my_token/$token_value;

    if($tdate==$edate){
        $sql  = "SELECT sum(comm) FROM `inv_transactions` where `ttime` >= '$tdate' and `mid` = '$jid' and remarks like 'Token - Cashback Income%'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    else{
        $sql  = "SELECT sum(comm) FROM `inv_transactions` where `ttime` BETWEEN '$tdate' AND '$edate' AND `mid` = '$jid' and remarks like 'Token - Cashback Income%'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    
    $my_token = $my_token -($my_token/100)*10;
    //echo $my_token." ".$token_value."<br>";
    $my_total_token += $my_token/$token_value;
}


$sql  = "SELECT sum(amount) FROM `withdraw` where  `jid` = '$jid' and remark like 'VTC Sale to Wallet'"; 
$result = @mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);

$token_wallet = $my_total_token - $w_amt;


$jsql = "select username,name_user,email_user from `join` where `id` = '$jid'"; 
$jresult = mysqli_query($s_dbid,$jsql);   
list($username,$name,$email) = mysqli_fetch_row($jresult);   

//////////// Check Bal End//////////////
if($token_wallet>=$amount){
    
$pass_sql = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`,`remark`) VALUES (NULL, '$jid', '$amount', 'Completed', '$wdate', NULL, 'NULL', 'Token', '0','VTC Sale to Wallet')"; 
$pass_result = mysqli_query($s_dbid,$pass_sql);
 
$sql  = "INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`, `status`) VALUES (NULL, '$jid', '$walletamt', '0', 'VTC Sold - Wallet Transfer', '$wdate', NULL, '$username', NULL, NULL, 'Confirmed');";
$result = @mysqli_query($s_dbid,$sql);
		
$_SESSION['withdrawl'] = "submited";  
$matter="";
			
	   
		   
		   
$msg = 'Token Sale to Wallet Request has been successfully processed.';
	
}
else{
	$msg = "Insufficient Account Balance.";
}

header("Location: withdraw-message.php?msg=$msg");
?>