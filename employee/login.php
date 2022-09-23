<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;




   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);

         
   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }
	
	symp_connect();






// convert username and password from _POST or _SESSION 

	$username=$_POST["username"]; 
	$password=$_POST["password"];   
	$boardsql = "SELECT id,name FROM `join_superviser` where username='".$username."' and password='".$password."'";
	$bresult = mysqli_query($s_dbid,$boardsql);
	$num = mysqli_num_rows($bresult);

// echo $num;
// echo $boardsql;

// die;
	if($num>0){
	@list($jid,$name) = mysqli_fetch_row($bresult);
	//$boardsql2 = "SELECT status FROM `vcode` where mid='".$jid."'";
	//$bresult2 = mysqli_query($s_dbid,$boardsql2);
	//list($vstatus) = mysqli_fetch_row($bresult2);
	
			//if($vstatus=="Verified"){
						$_SESSION['logged']="yes";
						$_SESSION['username']=$_POST["username"]; 
						$_SESSION['password']=$_POST["password"]; 
						
						$_SESSION['jid']=$jid;
						$_SESSION['name']=$name;
				// 		$sqlplan = "select package from `join` where `id` = '$jid'";
				// 		$resultplan = mysqli_query($s_dbid,$sqlplan);
				// 		list($ttype) = mysqli_fetch_row($resultplan);
				// 		$_SESSION['plan']=$ttype;
						  echo "<meta http-equiv='REFRESH' content='0;url=dashboard.php'>";
			//}
			//else{
			?>
				<!--<meta http-equiv="refresh" content="0;URL='index.php?msg=Your Email Verification is pending. Please verify your email and try again.'" /> -->
				
			<?php 
			//}
	}
	else{
	?>
	  <meta http-equiv="refresh" content="0;URL='index.php?msg=Invalid username/password. Please try again.'" />
	<?php
    }



symp_disconnect();

?>