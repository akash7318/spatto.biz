<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
require "textmessage.php";
$s_dbid = FALSE;

$package="";
$walletamt = $_POST['walletamt'];
$iwalletamt = $_POST['iwalletamt'];

$puser = $_POST['touser'];
$mid= $_POST['mid'];
$amt1 = $_POST['amt1'];
$amt2 = $_POST['amt2'];
$plan = $_POST['plan'];
$otp = @$_POST['otp'];
if($plan=="voucher"){
    $amt = $amt1;
    $g_amt = $amt + ($amt/100)*18;
}
else{
    $amt = $amt2;
    $g_amt = $amt;
}

if($iwalletamt<$amt){
    $msg = "Invalid amount submitted.";
    header("Location: upgrade-id-wallet.php?msg=$msg");
}
//echo $amt." - ".$plan;
//die;


$wallet = $_POST['wallet'];



// if(substr($amt,0,1)=="S"){
//     $package = "Silver";
//     $amt = substr($amt,1);
// }
// if(substr($amt,0,1)=="G"){
//     $package = "Gold";
//     $amt = substr($amt,1);
// }
$package = $plan;
$wdate = date("Y-m-d");

$check = "cancel";

   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass, $s_dbname);

   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }
	

   function add_level_income($id)
    {
        global $s_dbid,$amt;
      
       	
       	$q = "select * from `join` where id = '$id'";	
        $r=mysqli_query($s_dbid,$q);
       	$data = mysqli_fetch_array($r);
       	
       	$username = $data['username'];
        $rname = $data['username'];

			        $cnt = 1;
			        $amount = $amt/100;
			        	while ($username!="" && $username!="0"){
			        				
		        					$q1 = "select * from `join` where username = '$username'";	
                                    $r1=mysqli_query($s_dbid,$q1);
		        					$spdata = mysqli_fetch_array($r1);
		        					
			        				$sponsor = $spdata['dreferal'];
			        				
			        				if($cnt==1){
			        				 //   if($package==""){
    			        	// 			    if($amt==10000){
    			        				        $pp = $amount*10;	
    			        	// 			    }
    			        	// 			    else{
    			        	// 			        $pp = $amount*5;	
    			        	// 			    }
			        				 //   }
			        				 //   else{
			        				 //       $pp = $amount*5;	
			        				 //   }
			        				}
			        				if($cnt==2){
			        				$pp = $amount*5;	
			        				}
			        				if($cnt==3){
			        				$pp = $amount*3;	
			        				}
			        				if($cnt==4){
			        				$pp = $amount*2;	
			        				}
			        				if($cnt==5){
			        				$pp = $amount*2;	
			        				}
			        				if($cnt==6){
			        				$pp = $amount*2;	
			        				}
			        				if($cnt>6 && $cnt<=16){
			        				$pp = $amount*1;	
			        				}
			        				
			        				$username = $sponsor;
			        				$idate = date("Y-m-d");
			        				
			        				$q2 = "select * from `join` where username = '$sponsor'";	
                                    $r2=mysqli_query($s_dbid,$q2);
			        				$spiddata = mysqli_fetch_array($r2);
			        				
			        				$spid = $spiddata['id'];
			        				
			        				$drows = 0;
                                    
                                    $q3 = "select * from `join` where dreferal = '$sponsor' and `misc` = 'active'";	
                                    $r3=mysqli_query($s_dbid,$q3); 
                                    
			        				$drows = mysqli_num_rows($r3);
			        				
			        				if($drows>1){
			        				    $status = "Confirmed";
			        				}
			        				else{
			        				    $status = "Unconfirmed";
			        				}
			        				
							        if($spid>0 && $cnt<=17){
							            $idate = date("Y-m-d");
							            if($cnt==1){
							                $income = "Direct Income";
							            }
							            else{
							                $income = "Level Income";
							            }
							          $q4="INSERT INTO `inv_transactions` (`id`, `mid`, `amt`, `comm`, `remarks`, `ttime`, `level`, `rname`,`tleft`,`tright`,`status`) VALUES (NULL, '$spid', '$amt', '$pp', '$income', '$idate', '$cnt', '$rname',NULL,NULL,'$status');";
							          $r4=mysqli_query($s_dbid,$q4); 
							          //echo $q4."<br>";
							        }
			        			$cnt++	;
			        			//echo $spid."<br>";
			        	}

    }
	
	symp_connect();
	

$sql  = "SELECT * FROM `vcode` WHERE `username` = '$username' and `code` = '$otp'";
    $result = mysqli_query($s_dbid,$sql);
    $nrows=0;
    $nrows = @mysqli_num_rows($result);    
    if ((int)$nrows<=0){
      $msg= "The OTP entered is invalid please enter correct OTP and try again";
      header("Location: upgrade-id-wallet.php?msg=$msg");
      $check = "cancel";
    }
    else{
      $sql  = "DELETE FROM `vcode` WHERE `username` = '$username' and `code` = '$otp'";
      $result = mysqli_query($s_dbid,$sql);
    }

if($wallet=="main"){
    if($walletamt>=$g_amt){
        $check = "ok";
    }
    else{
        $check = "cancel";
    }
}
elseif($wallet=="iwallet"){
    
    if($iwalletamt>=$g_amt){
        $check = "ok";
    }
    else{
        $check = "cancel";
    }
}

if($check=="ok"){
    $sql  = "SELECT misc FROM `join` WHERE `username` = '$puser'";
    $result = mysqli_query($s_dbid,$sql);
    list($pstatus) = mysqli_fetch_row($result);
    
    if((strtolower($pstatus)!="active") ||(strtolower($pstatus)=="active" && $plan != "voucher")){
    
            $cdate = date("Y-m-d");
    
    		$sql  = "SELECT id FROM `join` WHERE `username` = '$puser'";
            $result = mysqli_query($s_dbid,$sql);
            list($tid) = mysqli_fetch_row($result);
            
            $sql  = "SELECT id FROM `investment` WHERE `mid` = '$tid'";
            $result = mysqli_query($s_dbid,$sql);
            
            if((mysqli_num_rows($result)<=0) || (strtolower($pstatus)=="active" && $plan != "voucher")){
            
            $iamt = $g_amt;
    		$sql = "INSERT INTO `investment` (`id`, `plan`, `amount`, `mid`, `sdate`, `ppercentage`, `dailypay`, `status`, `hashcode`, `last_transaction`, `days`, `dlast_transaction`, `mlast_transaction`, `slip`) VALUES (NULL, '$package', '$iamt', '$tid', '$cdate', '0', '0', 'Active', NULL, NULL, NULL, NULL, NULL, NULL);";
    		$result = mysqli_query($s_dbid,$sql);
    		
    		$sql = "UPDATE `join` SET `misc`='active',`package`='$package' WHERE `id` = '$tid'";
    		$result = mysqli_query($s_dbid,$sql);
    	    
    	    if($wallet=="main"){
    	        $remark = "Account Activated";
    	    }
    	    else{
    	        $remark = "iWallet Account Activated";
    	    }
    	    
    	    $sql  = "INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`, `remark`) VALUES (NULL, '$mid', '$iamt', 'Completed', '$cdate', '', NULL, '$remark', NULL, 'Activated user : $puser');";
    		$result = mysqli_query($s_dbid,$sql);
            $code = time();
            
           // add_level_income($tid);
            
            $sql = "INSERT INTO `contest` (`id`, `username`, `mid`, `date`, `voucher`, `reward`, `position`) VALUES (NULL, '$touser', '$tid', '$tdate', '$code', NULL, NULL);";
            //$result = mysqli_query($s_dbid,$sql);
            
            
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
          <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>Spatto</td>
        </tr>
        <tr>
          <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>
            <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>
            <tbody>
              <tr>
                <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>
                  <br>
                  Welcome to Spatto. We have recieved your membership request.<br><br>
                  		
                  You are eligible for Spatto February Lucky Draw Contest, your voucher code for the lucky draw is mentioned below : <br>
                  Voucher Code : ".$code."<br>
                  
    			  
    			 
    			  </p>
                  <p>Results of the draw will be notified to you and it will alos be displayed in your user panel on Spatto website.<br>
                  </p>
                  <p> </p>
                  <p>Regards, <br>
                  Spatto<br>
                  <br>
                  </p></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2021 Spatto. All rights reserved.</td>
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
    			$headers .= 'From: info@spattoservices.com' . "\r\n";			
    			//mail($to,"Voucher Code for Spatto Lucky Draw Contest - February 19",$matter,$headers);
            
            
    		$msg = "Account activated successfully.";
            }
            else{
                
                $msg = "Account activation request is already in process.";
            }
    	
    }
    else{
    		$msg = "Id already active.";
    }
}
else{
    $msg = "Invalid Amount.";
}

		header("Location: upgrade-id-wallet.php?msg=$msg");


?>