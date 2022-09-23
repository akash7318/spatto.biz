<?php
@session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

$data  = json_decode(file_get_contents("php://input"), TRUE);

$phone = $data['phone'];


   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;


         $s_dbid = mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);
          

   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }
  
    
    symp_connect();


$boardsql  = "SELECT phone FROM `join` WHERE `phone` = '$phone'";
        $bresult = @mysqli_query($s_dbid,$boardsql);
        list($phone) = @mysqli_fetch_row($bresult);

       if($phone){
           $result = array('status' => "true" ,'message'=>"Invalid No. | Phone already Registered" );
           echo json_encode($result);
       }
      else{
         $result = array('status' => "false" ,'message'=>"Valid Phone No." );
          echo json_encode($result);
      }


symp_disconnect();

?>