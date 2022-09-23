<?
session_start();

$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);

require dirname(__FILE__)."/config.$ext";

$s_dbid = FALSE;


$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];



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

$detailsql = "UPDATE `join` SET `name` = '".$name."',`email` = '".$email."', `phone` = '$mobile', `city` = '$city', `state` = '$state', `address` = '$address', `pincode` = '$pincode' WHERE `id` = '".$jid."' ;"; 
$detailresult = mysqli_query($s_dbid,$detailsql);




//echo $nrows;



header("Location: updateinfo.php");
symp_disconnect();

?>