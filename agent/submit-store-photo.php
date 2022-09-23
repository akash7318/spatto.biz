<?php
session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;




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
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["storephoto"]["name"]);	

	symp_connect();


move_uploaded_file($_FILES["storephoto"]["tmp_name"], $target_file);
$storephoto = basename( $_FILES["storephoto"]["name"]);
$sid = $_POST['sid'];

$detailsql = "UPDATE `join_store` SET `store_photo` = '$storephoto' WHERE `id` = '$sid'"; 

$detailresult = mysqli_query($s_dbid,$detailsql);




header("Location: agent_stores.php?msg=Store Photo Uploaded successfully.");




  
symp_disconnect();

?>