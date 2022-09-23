<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;


$puser = $_POST['memberid'];
//$jid= $_POST['mid'];
//$pin = $_POST['pin'];
$nop = $_POST['nofpins'];
$username = $_SESSION['username'];



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

$sql  = "SELECT id FROM `join` WHERE `username` = '$puser'";
$result = mysqli_query($s_dbid,$sql);
if(mysqli_num_rows($result)<=0){
$msg= "The user ($puser) does not exist.";
}
else{
	list($mid) = mysqli_fetch_row($result);
	
	
	$tdate = date("Y-m-d");
	//echo $sql;
// 	if ((int)$nrows<=0){
// 		$msg= "The pin that you have selected has been used. Please try again with a different Pin.";
		
// 	}
// 	else{
		$ctr =0;
		while($ctr<$nop){
		$sql  = "SELECT id FROM `join` WHERE `username` = '$username'";
		$result = mysqli_query($s_dbid,$sql);
		list($uid) = mysqli_fetch_row($result);
		
		$sql  = "SELECT `pin` FROM `walletpin` WHERE `misc` = '$uid'";
	    $result = @mysqli_query($s_dbid,$sql);
	    list($pin) = @mysqli_fetch_row($result);
		
		$sql  = "update `walletpin` set `misc`='$mid' WHERE `pin` = '$pin'";
		$result = @mysqli_query($s_dbid,$sql);
		
		$sql  = "update `pintransfer` set `misc` = '1' where `to` = '$username' and `pin` = '$pin'";
		$result = @mysqli_query($s_dbid,$sql);
		
		$sql  = "INSERT INTO `pintransfer` (`id`, `pin`, `to`, `from`, `tdate`, `misc`) VALUES (NULL, '$pin', '$puser', '$username', '$tdate', '0');";
		$result = @mysqli_query($s_dbid,$sql);
		$ctr++;
		}
		//echo $sql;
		$msg = "Pin transferred successfully.";
	//}
}
	

		header("Location: pin-transfer.php?msg=$msg");


?>