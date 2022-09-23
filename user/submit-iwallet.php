<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
require "textmessage.php";
$s_dbid = FALSE;


$puser = $_POST['username'];
$jid= $_POST['mid'];
$trno = $_POST['trno'];
$trdate = $_POST['trdate'];
$amt= $_POST['amt'];
$wdate = date("Y-m-d");



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
	

$sql_check  = "SELECT trno FROM `iwallet_request` WHERE `trno` = '$trno'";
$result_check = mysqli_query($s_dbid,$sql_check);
$trn_rows = mysqli_num_rows($result_check);
if($trn_rows<=0){
        $sql  = "SELECT * FROM `iwallet_request` WHERE `jid` = '$mid' and status='Pending'";
        $result = mysqli_query($s_dbid,$sql);
        $pstatus = mysqli_num_rows($result);
        
        if($pstatus<=0){
        
        		
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["slip"]["name"]);
        
                move_uploaded_file($_FILES["slip"]["tmp_name"], $target_file);
                $slip = basename( $_FILES["slip"]["name"]);
         
        		$cdate = date("Y-m-d");
        		
        		$sql = "INSERT INTO `iwallet_request` (`id`, `amt`, `jid`, `cdate`, `status`, `trno`, `slip`, `trdate`) VALUES (NULL, '$amt', '$jid', '$cdate', 'Pending', '$trno', '$slip', '$trdate');";
        		$result = mysqli_query($s_dbid,$sql);
        	    
        		
        		
        		
        		$msg = "Request placed for iWallet and pending approval.";
        	
        }
        else{
        		$msg = "Request already Pending";
        }	
}
else{
    $msg = "This transaction number is already used, please use valid transaction number.";
}
		header("Location: request-iwallet-fund.php?msg=$msg");


?>