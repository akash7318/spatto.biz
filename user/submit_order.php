<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;



$wdate = Date("Y-m-d");

$customer_username = $_POST['customer_code'];
$sid = $_POST['sid'];

if($_POST['submit']=="Hold!!"){
    $status = "Hold";
}
else{
    $status = "Pending";
}


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
	

$boardsql  = "SELECT id FROM `join` WHERE `username` = '$customer_username'";
$bresult = @mysqli_query($s_dbid,$boardsql);
list($cid) = @mysqli_fetch_row($bresult);
        
    //print_r($_POST['product_name']);    
    
    $cnt = count(array_filter($_POST['product_name'], function($x) { return !empty($x); }));
    
        		
               
         
        		$cdate = Date("Y-m-d");
        		
        		$sql = "INSERT INTO `orders` (`id`, `mid`, `sid`, `order_date`,`status`) VALUES (NULL, '$cid', '$sid', current_timestamp(),'$status');";
        		$result = mysqli_query($s_dbid,$sql);
        	    
        		$order_id = @mysqli_insert_id($s_dbid);
        		
        		while($cnt>0){
        		    echo $cnt."<br>";
        		    $cnt--;
        		    $sql2 = "INSERT INTO `order_detail` (`id`, `order_id`, `product_name`, `product_qty`, `product_price`) VALUES (NULL, '$order_id', '".$_POST['product_name'][$cnt]."', '".$_POST['product_qty'][$cnt]."', '".$_POST['product_price'][$cnt]."');";
        		    $result2 = mysqli_query($s_dbid,$sql2);
        		    //echo $sql2."<br>";
        		}
        		
        		
        		$msg = "Order created successfully.";
        	
    //die();     	

		header("Location: orders.php?msg=$msg");


?>