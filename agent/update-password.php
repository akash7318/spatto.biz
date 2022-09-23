<?php
session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$oldpassword = $_POST['old_passcode'];
$password = $_POST['new_passcode'];
$username = $_SESSION['username'];

if($username == ''){
 echo  ' <meta http-equiv="refresh" content="0;url=index.php">';
}



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

$detailsql = "select `password` from `join` WHERE `username` = '$username' ;"; 
 $detailresult = mysqli_query($s_dbid,$detailsql);
list($tpassword) = mysqli_fetch_row($detailresult);

if($tpassword!=$oldpassword){
	header("Location: change_password.php?errmsg=Current password does not match.");
}
else{

if($password!=""){
$detailsql = "UPDATE `join` SET `password` = '$password' WHERE `username` = '$username' ;"; 
 $detailresult = mysqli_query($s_dbid,$detailsql);
}
header("Location: change_password.php?errmsg=Password changed successfully.");
}



  
symp_disconnect();

?>