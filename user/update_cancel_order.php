<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;



$wdate = Date("Y-m-d");


$oid = $_POST['oid'];


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
	


        
    //print_r($_POST['product_name']);    
    
    
    
        		
               
         
        		$cdate = Date("Y-m-d");
        		
        		
        		
        		
        		
        		
        		$sql3 = "UPDATE `orders` SET `status` = 'Cancel' WHERE `orders`.`id` = '$oid';";
        		$result3 = mysqli_query($s_dbid,$sql3);
        		
        		
        		$msg = "Order Canceled successfully.";
        	
    //die();     	

		header("Location: orders.php?msg=$msg");


?>