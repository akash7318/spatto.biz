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
	$boardsql = "SELECT id,name FROM `join` where username='".$username."' and password='".$password."'";
	$bresult = mysqli_query($s_dbid,$boardsql);
	$num = mysqli_num_rows($bresult);

	
	if($num>0){
			@list($jid,$name) = mysqli_fetch_row($bresult);
	
			$_SESSION['logged']="yes";
			$_SESSION['username']=$_POST["username"]; 
			$_SESSION['password']=$_POST["password"]; 
			
			$_SESSION['jid']=$jid;
			$_SESSION['name']=$name;
			$sqlplan = "select package from `join` where `id` = '$jid'";
			$resultplan = mysqli_query($s_dbid,$sqlplan);
			list($ttype) = mysqli_fetch_row($resultplan);
			$_SESSION['plan']=$ttype;
			
			$data = array("success"=>"1");
			echo json_encode($data);
	}
	else{
			$data = array("success"=>"0","message"=>"Invalid Login Details.");
			echo json_encode($data);
    }



symp_disconnect();



?>