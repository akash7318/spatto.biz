<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;


$uid = $_POST['uid'];
$amount= $_POST['package'];
$pins = $_POST['npin'];
$wamount = 1150;
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




	$ptype = "RDC";


$sql = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `misc`, `wdate`, `account`, `txn_id`,`wtype`,`remark`) VALUES (NULL, '$uid', '$wamount', 'Completed', '$wdate',NULL,NULL,'cash wallet','Pin Purchased - $amount/$pins')";
$result = mysqli_query($s_dbid,$sql); 

for($ctr=0;$ctr<$pins;$ctr++){

//$var = uniqid() . '_' . md5(mt_rand()); 
$var = rand(1111111111,9999999999);
$pin = $ptype.$var;

	

   $sql = "INSERT INTO `walletpin` (`id`, `pin`, `misc`) VALUES (NULL, '$pin', '$uid');";
   mysqli_query($s_dbid, $sql);
}




	$msg = "Pins Purchased Successfully.";


	

		header("Location: purchase-pin.php?msg=$msg");


?>