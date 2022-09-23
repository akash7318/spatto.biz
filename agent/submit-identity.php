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
$target_filea = $target_dir . basename($_FILES["idfront"]["name"]);	
$target_fileb = $target_dir . basename($_FILES["idback"]["name"]);	

$idtype = $_POST['idtype'];
$idnumber = $_POST['idnumber'];
	
	symp_connect();

$pansql = "select id from `bank` WHERE `idnumber` = '$idnumber' ;"; 
$panresult = mysqli_query($s_dbid,$pansql);

if(mysqli_num_rows>0){
	$msg="Identity no. is already used. Use is different ID";
 echo  ' <meta http-equiv="refresh" content="0;url=update-identity.php?msg='.$msg.'">';
}


$detailsql = "select id from `join` WHERE `username` = '$username' ;"; 
$detailresult = mysqli_query($s_dbid,$detailsql);
list($mid) = mysqli_fetch_row($detailresult);

move_uploaded_file($_FILES["idfront"]["tmp_name"], $target_filea);
$fname = basename($_FILES["idfront"]["name"]);

move_uploaded_file($_FILES["idback"]["tmp_name"], $target_fileb);
$bname = basename($_FILES["idback"]["name"]);

$sql = "select * from `bank` where jid='$mid'";
$result = mysqli_query($s_dbid,$sql);
$nrows = mysqli_num_rows($result);

if($nrows>0){
    $detailsql = "UPDATE `bank` SET `afront` = '$fname',`aback` = '$bname',`idtype` = '$idtype',`idnumber` = '$idnumber',`idstatus` = 'Awaiting Approval' WHERE `bank`.`jid` = '$mid' ;"; 
    $detailresult = mysqli_query($s_dbid,$detailsql);
}
else{
    
    $detailsql = "INSERT INTO `bank` (`id`, `bank_name`, `branch_name`, `account_no`, `account_type`, `aname`, `jid`, `ifsc`, `pancard`, `paytm`, `phonepe`, `googlepay`, `upi`, `panimage`, `afront`, `aback`, `idnumber`, `idtype`, `panstatus`, `idstatus`, `bank_status`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, '$mid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$fname', '$bname', '$idnumber', '$idtype', NULL, 'Awaiting Approval', NULL);"; 
    $detailresult = mysqli_query($s_dbid,$detailsql);
}
header("Location: update-identity.php?msg=Identity Information Uploaded successfully.");

  
symp_disconnect();

?>