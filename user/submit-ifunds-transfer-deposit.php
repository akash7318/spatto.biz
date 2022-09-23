<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;


//$touser = $_POST['touser'];
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

$cnt=1;
   function add_income($user,$amt,$mainuser) {
      global $s_dbid,$cnt;

         $roisql1="select sponsor from `join` where `username`='".$user."'";
		 $roi_r1=mysqli_query($s_dbid,$roisql1);
		 list($sponsor) = mysqli_fetch_row($roi_r1);
		 
		 if($cnt<16 && $sponsor!=""){
		    echo $cnt." User:".$sponsor." Income:".$amt." "; 
		    $comm=0;
		    $dsql="select * from `join` where `sponsor`='".$sponsor."' and misc = 'active'";
    		$dresult=mysqli_query($s_dbid,$dsql);
    		$direct = mysqli_num_rows($dresult);
    		 if($cnt==1){ 
    		     $comm = $amt*5/100;
    		 }
    		 elseif($cnt==2){ 
    		     $comm = $amt*3/100;
    		 }
    		 elseif($cnt==3){ 
    		     $comm = $amt*2/100;
    		 }
    		 elseif($cnt==4){ 
    		     $comm = $amt*2/100;
    		 }
    		 elseif($cnt==5){ 
    		     $comm = $amt*1/100;
    		 }
    		 elseif($cnt==6){ 
    		     $comm = $amt*1/100;
    		 }
    		 elseif($cnt==7){ 
    		     $comm = $amt*1/100;
    		 }
    		 elseif($cnt>=8 && $cnt<16){ 
    		     $comm = $amt*0.5/100;
    		 }
    		 if($direct<$cnt){
    		     $comm=0;
    		 }
    		 if($comm>0){
    		     $q1a="select id from `join` where `username`='".$sponsor."'";
				 $r1a=mysqli_query($s_dbid,$q1a);
				 list($userid) = mysqli_fetch_row($r1a);
    		     $idate = date("Y-m-d",time());
				 $sql  = "INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`, `status`) VALUES (NULL, '$userid', '$comm', '$amt', 'iWallet Deposit Bonus', '$idate', NULL, '$mainuser', NULL, NULL, 'Confirmed');";
				 $rx1=mysqli_query($s_dbid,$qx1);
				 echo "<br>".$qx1."<br>";
    		 }
    		 echo "<br><br>";
    		 
    		 $cnt++;
		 
		 
		 add_income($sponsor,$amt,$mainuser);
		 }
		 
   }
   
   function add_income2($user,$amt,$mainuser) {
      global $s_dbid,$cnt;

         $roisql1="select sponsor from `join` where `username`='".$user."'";
		 $roi_r1=mysqli_query($s_dbid,$roisql1);
		 list($sponsor) = mysqli_fetch_row($roi_r1);
		 
		 if($cnt<4 && $sponsor!=""){
		    echo $cnt." User:".$sponsor." Income:".$amt." "; 
		    $comm=0;
		    $dsql="select * from `join` where `sponsor`='".$sponsor."' and misc = 'active'";
    		$dresult=mysqli_query($s_dbid,$dsql);
    		$direct = mysqli_num_rows($dresult);
    		 if($cnt==1){ 
    		     $comm = $amt*5/100;
    		 }
    		 elseif($cnt==2){ 
    		     $comm = $amt*3/100;
    		 }
    		 elseif($cnt==3){ 
    		     $comm = $amt*2/100;
    		 }
    		 if($direct<$cnt){
    		     $comm=0;
    		 }
    		 if($comm>0){
    		     $q1a="select id from `join` where `username`='".$sponsor."'";
				 $r1a=mysqli_query($s_dbid,$q1a);
				 list($userid) = mysqli_fetch_row($r1a);
    		     $idate = date("Y-m-d",time());
				 $sql  = "INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`, `status`) VALUES (NULL, '$userid', '$comm', '$amt', 'iWallet Deposit Bonus', '$idate', NULL, '$mainuser', NULL, NULL, 'Confirmed');";
				 $rx1=mysqli_query($s_dbid,$qx1);
				 echo "<br>".$qx1."<br>";
    		 }
    		 echo "<br><br>";
    		 
    		 $cnt++;
		 
		 
		 add_income2($sponsor,$amt,$mainuser);
		 }
		 
   }


$sql  = "SELECT * FROM `vcode` WHERE `code` = '$otp' and `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
$nrows1 = mysqli_num_rows($result);

if($nrows1>0){

$sql  = "DELETE FROM `vcode` WHERE `code` = '$otp'";
    $result = mysqli_query($s_dbid,$sql);    
    
$sql  = "SELECT id,name FROM `join` WHERE `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($mid,$name) = mysqli_fetch_row($result);

// $sql  = "SELECT id FROM `join` WHERE `username` = '$touser'";
// $result = mysqli_query($s_dbid,$sql);

if(mysqli_num_rows($result)<=0){
$msg= "The user ($touser) does not exist.";
}
else{
	list($tid) = mysqli_fetch_row($result);
	
	
	$tdate = date("Y-m-d");
	$wdate = date("Y-m-d H:i:s");
	
	
		$sql  = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`, `remark`) VALUES (NULL, '$mid', '$amt', 'Completed', '$tdate', '', NULL, 'iWallet Transfer', NULL, 'Transfer to Depsit Fund');";
		$result = mysqli_query($s_dbid,$sql);
		
		
		//$sql = "INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`, `status`) VALUES (NULL, '$tid', '$amt', '0', 'Deposit Fund', '$tdate', NULL, '$username', NULL, NULL, 'Confirmed');";
	    if($amt>5000 && $amt<100001){
            $wpay = $amt*4/100;
        }
        else if($amt>100000 && $amt<500001){
            $wpay = $amt*0.7/100;
        }
        else if($amt>500000 && $amt<1000001){
            $wpay = $amt*0.8/100;
        }
	    
	    $sql = "INSERT INTO `deposit_fund` (`id`, `mid`, `user`, `name`, `amt`, `idate`, `weekly_pay`) VALUES (NULL, '$mid', '$username', '$name', '$amt', '$tdate', '$wpay');";
	    $result = @mysqli_query($s_dbid,$sql);
	    if($amt>5000 && $amt<100001){
            add_income($username,$amt,$username);
        }
        else{
            add_income2($username,$amt,$username);
        }
	    
        $msg = "iWallet Deposit Fund Transfer has been successfull.";	
		
}
}	
else{
    $msg = "Invalid OTP provided. Please enter valid OTP.";
}

		header("Location: iwallet-transfer-deposit.php?msg=$msg");


?>