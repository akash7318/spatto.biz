<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$gh_id = $_POST['gh_id'];
$username = $_SESSION['username'];

// $amount = $_GET['amount'];
// $username = $_GET['username'];

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



date_default_timezone_set('Asia/Kolkata');

$pdate = date("Y-m-d H:i:s");

$boardsql = "UPDATE `help_links` SET `status`='accepted' WHERE `id` = '$gh_id'";
$bresult = @mysqli_query($s_dbid,$boardsql);


$data = array("success"=>"1");
echo json_encode($data);
?>