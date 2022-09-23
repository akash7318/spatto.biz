<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;
$slip = "";

$link_id = $_POST['hid_gh_id'];
$slipno = $_POST['slipno'];
$username = $_SESSION['username'];
$htype = $_POST['htype'];
// $amount = $_GET['amount'];
// $username = $_GET['username'];
print_r($_FILES);
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


//echo $_FILES['slip']['name'];
$slip = $_FILES['slip']['name'];

//echo $slip;

$pdate = date("Y-m-d H:i:s");


$target_dir = $_SERVER['DOCUMENT_ROOT'] ."/costa/uploads/";
$target_file = $target_dir . $slip;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo $target_file;
// Allow certain file formats
if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
|| $imageFileType != "gif" ) {
    move_uploaded_file($slip, $target_file);
    echo $_FILES["slip"]["error"];

$sql_pc = "UPDATE `help_links` SET `hashcode`='$slipno',`slip`='$slip',`slipdate`='$pdate',`help_type`='$htype' WHERE `id` = '$link_id'";
$result_pc = mysqli_query($s_dbid, $sql_pc);

$data = array("success"=>"1");
}
else{


$data = array("success"=>"0","message"=>"Payment Proof not uploaded please try again.");

}



//echo json_encode($data);
header('Location: ../dashboard.php');
?>