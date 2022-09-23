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
$wdate = Date("Y-m-d");

if($amt==10000){
    $plan = 1;
}
else{
    $plan = 2;
}

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
	

$sql_check  = "SELECT hashcode FROM `investment` WHERE `hashcode` = '$trno'";
$result_check = mysqli_query($s_dbid,$sql_check);
$trn_rows = mysqli_num_rows($result_check);
if($trn_rows<=0){
        $sql  = "SELECT misc FROM `join` WHERE `username` = '$puser'";
        $result = mysqli_query($s_dbid,$sql);
        list($pstatus) = mysqli_fetch_row($result);
        
        if($pstatus!="active"){
        
        		
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["slip"]["name"]);
        
                move_uploaded_file($_FILES["slip"]["tmp_name"], $target_file);
                $slip = basename( $_FILES["slip"]["name"]);
         
        		$cdate = Date("Y-m-d");
        		
        		$sql = "INSERT INTO `investment` (`id`, `plan`, `amount`, `mid`, `sdate`, `ppercentage`, `dailypay`, `status`, `hashcode`, `last_transaction`, `days`, `dlast_transaction`, `mlast_transaction`, `slip`,`slip_date`) VALUES (NULL, '$plan', '$amt', '$jid', '$cdate', '0', '0', 'Pending', '$trno', NULL, NULL, NULL, NULL, '$slip','$trdate');";
        		$result = mysqli_query($s_dbid,$sql);
        	    
        		
        		
        		
        		$msg = "Request placed for account activation pending approval.";
        	
        }
        else{
        		$msg = "Id already active.";
        }	
}
else{
    $msg = "This transaction number is already used, please use valid transaction number.";
}
		header("Location: upgrade-id.php?msg=$msg");


?>