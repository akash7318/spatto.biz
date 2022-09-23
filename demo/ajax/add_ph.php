<?php
session_start();
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$amount = $_POST['amount'];
$username = $_SESSION['username'];

// $amount = $_GET['amount'];
// $username = $_GET['username'];

   function symp_connect() {
      global $s_dbhost, $s_dbuser, $s_dbpass, $s_dbname,$s_dbid;

         $s_dbid = @mysqli_connect($s_dbhost, $s_dbuser, $s_dbpass,$s_dbname);

         
   }

    function symp_disconnect() {
      global $s_dbid;

         mysqli_close($s_dbid);
         $s_dbid = FALSE;
   }



$manager =  "";
$smanager = "";
$zmanager = "";


function get_manager($user){
	global $s_dbid,$manager;

	$sql = "SELECT sponsor FROM `join` where `username`='$user'";
	$result = @mysqli_query($s_dbid,$sql);
	list($sponsor) = @mysqli_fetch_row($result);

	$sql2 = "SELECT level FROM `join` where `username`='$sponsor'";
	$result2 = @mysqli_query($s_dbid,$sql2);
	list($lvl) = @mysqli_fetch_row($result2);
	if($lvl==1){
		$manager =  $sponsor;
	}
	else{
		get_manager($sponsor);
	}
}

function get_smanager($user){
	global $s_dbid,$smanager;

	$sql1 = "SELECT sponsor FROM `join` where `username`='$user'";
	$result1 = @mysqli_query($s_dbid,$sql1);
	list($sponsor1) = @mysqli_fetch_row($result1);

	$sql2 = "SELECT level FROM `join` where `username`='$sponsor1'";
	$result2 = mysqli_query($s_dbid,$sql2);
	list($lvl) = mysqli_fetch_row($result2);

	if($lvl==2){
		$smanager = $sponsor1;
	}
	else{
		get_smanager($sponsor1);
	}
}

function get_zmanager($user){
	global $s_dbid,$zmanager;

	$sql = "SELECT sponsor FROM `join` where `username`='$user'";
	$result = @mysqli_query($s_dbid,$sql);
	list($sponsor) = @mysqli_fetch_row($result);

	$sql2 = "SELECT level FROM `join` where `username`='$sponsor'";
	$result2 = @mysqli_query($s_dbid,$sql2);
	list($lvl) = @mysqli_fetch_row($result2);
	if($lvl==3){
		$zmanager =  $sponsor;
	}
	else{
		get_zmanager($sponsor);
	}
}
	
	symp_connect();



date_default_timezone_set('Asia/Kolkata');

$pdate = date("Y-m-d H:i:s");

$boardsql = "SELECT id,name FROM `join` where `username`='$username'";
$bresult = @mysqli_query($s_dbid,$boardsql);
list($ph_id) = @mysqli_fetch_row($bresult);



get_manager($username);
// get_smanager($username);
// get_zmanager($username);



$msql = "SELECT id FROM `join` where `username`='$manager'";
$mresult = @mysqli_query($s_dbid,$msql);
list($gh_id) = @mysqli_fetch_row($mresult);
$gh_orderno = $gh_id.substr(round(microtime(true) * 1000),-10);

$smsql = "SELECT id FROM `join` where `username`='$smanager'";
$smresult = @mysqli_query($s_dbid,$smsql);
list($gh_id_s) = @mysqli_fetch_row($smresult);
$gh_orderno_s = $gh_id_s.substr(round(microtime(true) * 1000),-10);

$zmsql = "SELECT id FROM `join` where `username`='$zmanager'";
$zmresult = @mysqli_query($s_dbid,$zmsql);
list($gh_id_z) = @mysqli_fetch_row($zmresult);
$gh_orderno_z = $gh_id_z.substr(round(microtime(true) * 1000),-10);

$m_amount = ($amount/100)*10;
// $s_amount = ($amount/100)*3;
// $z_amount = ($amount/100)*2;
$s_amount = 0;
$z_amount = 0;

$ph_orderno = substr(round(microtime(true) * 1000),-10).$gh_id;
	
	$sql_m = "INSERT INTO `help_links` (`id`, `mid`, `orderno`, `amount`, `pdate`, `touser`, `status`, `hashcode`, `help_type`, `link`,`gh_order`) VALUES (NULL, '$ph_id', '$ph_orderno', '$m_amount', '$pdate', '$gh_id', 'pending', NULL, NULL, '1','$gh_orderno');";
    $result_m = mysqli_query($s_dbid, $sql_m);


// $sql_pa = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$m_amount', 'Pending', '$ph_id', '$pdate', '$ph_orderno', 'ph');";
// $result_pa = mysqli_query($s_dbid, $sql_pa);

$sql_ga = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$m_amount', 'Pending', '$gh_id', '$pdate', '$gh_orderno', 'gh');";
$result_ga = mysqli_query($s_dbid, $sql_ga);


//  ------   //

// $ph_orderno = substr(round(microtime(true) * 1000),-10).$gh_id_s;
//     $sql_s = "INSERT INTO `help_links` (`id`, `mid`, `orderno`, `amount`, `pdate`, `touser`, `status`, `hashcode`, `help_type`, `link`,`gh_order`) VALUES (NULL, '$ph_id', '$ph_orderno', '$s_amount', '$pdate', '$gh_id_s', 'pending', NULL, NULL, '1','$gh_orderno_s');";
//     $result_s = mysqli_query($s_dbid, $sql_s);

// $sql_pb = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$s_amount', 'Pending', '$ph_id', '$pdate', '$ph_orderno', 'ph');";
// $result_pb = mysqli_query($s_dbid, $sql_pb);

// $sql_gb = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$s_amount', 'Pending', '$gh_id_s', '$pdate', '$gh_orderno_s', 'gh');";
// $result_gb = mysqli_query($s_dbid, $sql_gb);

//  ------   //

// $ph_orderno = substr(round(microtime(true) * 1000),-10).$gh_id_z;
//     $sql_z = "INSERT INTO `help_links` (`id`, `mid`, `orderno`, `amount`, `pdate`, `touser`, `status`, `hashcode`, `help_type`, `link`,`gh_order`) VALUES (NULL, '$ph_id', '$ph_orderno', '$z_amount', '$pdate', '$gh_id_z', 'pending', NULL, NULL, '1','$gh_orderno_z');";
//     $result_z = mysqli_query($s_dbid, $sql_z);

// $sql_pc = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$z_amount', 'Pending', '$ph_id', '$pdate', '$ph_orderno', 'ph');";
// $result_pc = mysqli_query($s_dbid, $sql_pc);

// $sql_gc = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$z_amount', 'Pending', '$gh_id_z', '$pdate', '$gh_orderno_z', 'gh');";
// $result_gc = mysqli_query($s_dbid, $sql_gc);


//  ------   //


$u_amount = $amount -($m_amount + $s_amount + $z_amount);
//$ph_orderno = substr(round(microtime(true) * 1000),-10).$ph_id;
$sql_pc = "INSERT INTO `help_orders` (`id`, `help_amt`, `status`, `mid`, `tdate`, `order_no`, `help_type`) VALUES (NULL, '$amount', 'Pending', '$ph_id', '$pdate', '$ph_orderno', 'ph');";
$result_pc = mysqli_query($s_dbid, $sql_pc);


$data = array("success"=>"1","amount"=>$amount);
echo json_encode($data);
?>