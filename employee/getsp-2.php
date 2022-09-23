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

$q = mysqli_query($s_dbid,"select name,misc from `join` where username='" . $type_post . "'");

//list($value,$status) = mysqli_fetch_row($q);
//$val_fra = $value;

//if($status=="pending"){
//
//echo $val_fra;
//}
//else{
//
//    echo $status;
//}

$array = mysqli_fetch_row($q);

    //print_r(json_encode($array));
    echo json_encode($array);
?>