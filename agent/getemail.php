<?php
@session_start();
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

$type_post = $_GET['value'];

$q = mysqli_query($s_dbid,"select name,email,phone from `join` where username='" . $type_post . "'");

list($value,$email,$phone) = mysqli_fetch_row($q);
$phone = substr($phone,-4);
$val_fra = $value;
if(mysqli_num_rows($q)>0){
	if($status=="pending"){
		echo $val_fra." : Pending";
	}
	else{
	    echo $val_fra." : ".$email." : xxxxxx".$phone;
	}
}
 
?>