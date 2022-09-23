<?php
@session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;

$data  = json_decode(file_get_contents("php://input"), TRUE);

$sponser_name = $data['name'];


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


$boardsql  = "SELECT name FROM `join` WHERE `username` = '$sponser_name'";
        $bresult = @mysqli_query($s_dbid,$boardsql);
        list($sname) = @mysqli_fetch_row($bresult);

       if($sname){
           $result = array('status' => "true" ,'message'=>$sname );
           echo json_encode($result);
       }
      else{
         $result = array('status' => "false" ,'message'=>"Invalid sponsor" );
          echo json_encode($result);
      }


symp_disconnect();

?>