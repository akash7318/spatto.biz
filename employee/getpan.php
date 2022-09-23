<?php
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

$data  = json_decode(file_get_contents("php://input"), TRUE);

$pan = $data['pan'];


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


$boardsql  = "SELECT pancard FROM `bank` WHERE `pancard` = '$pan'";
        $bresult = @mysqli_query($s_dbid,$boardsql);
        list($pan) = @mysqli_fetch_row($bresult);

       if($pan){
           $result = array('status' => "true" ,'message'=>"Invalid Pan | Pan already Registered" );
           echo json_encode($result);
       }
      else{
         $result = array('status' => "false" ,'message'=>"Valid Pan" );
          echo json_encode($result);
      }


symp_disconnect();

?>