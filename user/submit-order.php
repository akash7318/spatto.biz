<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;


$touser = $_POST['sid'];

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




$sql  = "SELECT id FROM `join` WHERE `username` = '$username'";
$result = mysqli_query($s_dbid,$sql);
list($mid) = mysqli_fetch_row($result);


$sql  = "INSERT INTO `orders` (`id`, `mid`, `sid`, `order_date`) VALUES (NULL, '$mid', '$sid', current_timestamp());";
$result = mysqli_query($s_dbid,$sql);

$order_id = mysqli_insert_id($s_dbid);

$sql2="INSERT INTO `order_detail` (`id`, `order_id`, `product_name`, `product_qty`, `product_price`) VALUES (NULL, '$order_id', 'Dal', '1Kg', '');";
$result2 = mysqli_query($s_dbid,$sql2);

$msg = "Order has been placed successfully.";	


header("Location: store_list.php?msg=$msg");


?>