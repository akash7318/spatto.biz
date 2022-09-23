<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;



$wdate = Date("Y-m-d");

$mid = $_POST['mid'];
$sid = $_POST['sid'];
$oid = $_POST['oid'];
$totalprice = $_POST['totalprice'];

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
    
    $cnt = count(array_filter($_POST['product_name'], function($x) { return !empty($x); }));
    
        		
               
         
        		$cdate = Date("Y-m-d");
        		
        		
        		
        		while($cnt>0){
        		    //echo $cnt."<br>";
        		    $cnt--;
        		    $sql2 ="UPDATE `order_detail` SET `product_price` = '".$_POST['product_price'][$cnt]."' WHERE `product_name` = '".$_POST['product_name'][$cnt]."' and `product_qty` = '".$_POST['product_qty'][$cnt]."' and `order_id` = '$oid';";
        		    $result2 = mysqli_query($s_dbid,$sql2);
        		  //  echo $sql2."<br>";
        		    
        		}
        		
        		
        		$sql3 = "UPDATE `orders` SET `status` = 'Closed', `total`= '$totalprice' WHERE `orders`.`id` = '$oid';";
        		$result3 = mysqli_query($s_dbid,$sql3);
        		
        		
        		$msg = "Order placed successfully.";
        	
    //die();     	

		header("Location: orders.php?msg=$msg");


?>