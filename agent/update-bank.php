<?
session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;




$bank_name= $_POST['bank_name'];
$branch_name= $_POST['branch_name'];
$account_holder = $_POST['account_holder'];
$account_no = $_POST['account_no'];
$ifsc = $_POST['ifsc'];
$pan = $_POST['pan'];

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

$username = $_SESSION['username'];
$sql = "select `id` from `join` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);



$sql = "select * from bank where `jid` = '$jid'";
$result = mysqli_query($s_dbid,$sql);
$nrows = mysqli_num_rows($result);

//echo $nrows;

if($nrows>0){
$banksql = "UPDATE `bank` SET  `bank_name` =  '$bank_name', `branch_name` = '$branch_name', `account_no` = '$account_no', `aname` = '$account_holder', `ifsc` = '$ifsc', `pancard` = '$pan', `bank_status` = 'Awaiting Approval'  WHERE `jid` ='$jid';";
}
else{
$banksql = "INSERT INTO `bank` (`id`, `bank_name`, `branch_name`, `account_no`, `account_type`, `aname`, `jid`, `ifsc`, `pancard`, `paytm`, `phonepe`, `googlepay`, `upi`, `panimage`, `afront`, `aback`, `idnumber`, `idtype`, `panstatus`, `idstatus`, `bank_status`) VALUES (NULL, '$bank_name', '$branch_name', '$account_no', NULL, '$account_holder', '$jid', '$ifsc', '$pan', NULL, NULL, NULL, NULL, NULL, '$fname', '$bname', '$idnumber', '$idtype', NULL, NULL, 'Awaiting Approval');";
}
$result = mysqli_query($s_dbid,$banksql);
//echo $banksql;

header("Location: bank_details.php");
symp_disconnect();

?>