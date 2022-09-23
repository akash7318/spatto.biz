<?php
session_start();
$username = @$_SESSION['username'];
$name = @$_SESSION['name'];
$ext = substr(__FILE__, strrpos(__FILE__, ".") + 1);
require dirname(__FILE__)."/config.$ext";
$s_dbid = FALSE;


if($_SESSION['logged']!="yes"){
	$msg = "Invalid Login details. Please enter valid login details and try again.";
	header("Location: index.php?msg=$msg");
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
   
	
	
	symp_connect();


$sql = "select `id`,DATE_FORMAT(`jdate`, '%Y') FROM `join_store` where `username` = '$username';";           
$result = @mysqli_query($s_dbid,$sql);
list($jid,$adate) = @mysqli_fetch_row($result);

$sql = "select `id`,`package`,`misc`,DATE_FORMAT(`jdate`, '%d-%m-%Y') as jdate,`name`,`email`,`phone`,`sponsor` FROM `join_store` where `username` = '$username';";
$result = @mysqli_query($s_dbid,$sql);
list($sid,$package,$status,$jdate,$name,$email,$phone,$s_username) = @mysqli_fetch_row($result);

$sql = "select `name`,`email`,`phone` FROM `join_store` where `username` = '$s_username';";
$result = mysqli_query($s_dbid,$sql);
list($s_name,$s_email,$s_phone) = mysqli_fetch_row($result);


$sql1  = "SELECT DATE_FORMAT(`sdate`, '%d-%m-%Y') as sdate,amount FROM `investment` WHERE `mid` = '$mid' and status = 'active' ";
$result1 = mysqli_query($s_dbid,$sql1);
list($sdate,$package) = mysqli_fetch_row($result1);
//echo $sql1;

$boardsql  = "SELECT count(id) FROM `investment` WHERE `sdate` >= '$sdate' and status = 'active' ";
$bresult = @mysqli_query($s_dbid,$boardsql);
//list($my_users) = @mysqli_fetch_row($bresult);

function getlvls($snode,$enode){
	global $s_dbid,$cnt;
	
	
	$sql1  = "SELECT sponsor FROM `join_store` WHERE `username` = '$snode'";
        $result1 = mysqli_query($s_dbid,$sql1);
		if(mysqli_num_rows($result1)>0){
			while(list($user) = mysqli_fetch_row($result1)){
			if(strtolower($user)==$enode){
				break;
			}
			else{	
			  $cnt++;
				//echo $user;
				getlvls($user,$enode);	
			}
			}
		}
		else{
			//echo $snode;
			
		}
	
	
	
}

function getusers_direct($snode){
    global $s_dbid,$pid,$cnt,$sno,$records_ref;
    
        $sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),status,package,dreferal FROM `join_store` WHERE `dreferal` = '$snode' ";
        $result = mysqli_query($s_dbid,$sql);

        if(mysqli_num_rows($result)>0){
            while(list($mid,$name,$username,$email,$phone,$sponsor,$jdate,$status,$package,$direct) = @mysqli_fetch_row($result)){
                $ruser = $username;
                $cnt=1;
                $sno++;
                $sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
                $resultinv = mysqli_query($s_dbid,$sqlinv);
                list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
                
                $sqlsp  = "SELECT name FROM `join_store` WHERE `username` = '$sponsor' ";
                $resultsp = mysqli_query($s_dbid,$sqlsp);
                list($sponsorname) = mysqli_fetch_row($resultsp);
                if($status!="pending"){} else{ $amount=""; $status="";}
                echo "<tr><td align='center'>".$name."</td><td align='center'>".$username."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'>".$phone."</td><td align='center'> ".$status."</td></tr>";
        
                getusers_direct($ruser,$pos);  
            }
        }
}


function getusers_bonanza($snode){
    global $s_dbid,$pid,$cnt,$sno,$records_ref,$achieved_members2,$achieved_members3,$achieved_members4;
    
        $sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal FROM `join_store` WHERE `sponsor` = '$snode' order by id";
        $result = mysqli_query($s_dbid,$sql);

        if(mysqli_num_rows($result)>0){
            while(list($mid,$name,$username,$email,$phone,$sponsor,$jdate,$direct) = @mysqli_fetch_row($result)){
                $ruser = $username;
                $cnt=1;
                getlvls(strtolower($ruser),strtolower($_SESSION['username']));
                $level = $cnt;
                $sno++;
                $sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
                $resultinv = mysqli_query($s_dbid,$sqlinv);
                list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
                
                
                if($status=="active"){ 
                    if($level == 2){
                     $achieved_members2++;   
                    }
                    if($level == 3){
                     $achieved_members3++;   
                    }
                    if($level == 4){
                     $achieved_members4++;   
                    }
                }
                
        
                getusers_bonanza($ruser);   
            }
        }
}

$tusers=0;
$tpackage=0;
$tleftpackage=0;
$trightpackage=0;
function find_users($snode) {
      global $s_dbid,$tusers,$tpackage;

        $sql  = "SELECT id,username FROM `join_store` WHERE `sponsor` = '$snode'";
        $result = mysqli_query($s_dbid,$sql);
//echo $sql;
		if(mysqli_num_rows($result)>0){
			while(list($uid,$user) = mysqli_fetch_row($result)){
			$sql2  = "SELECT amount FROM `investment` WHERE `mid` = '$uid' and status = 'active'";
        	$result2 = mysqli_query($s_dbid,$sql2);
			if(mysqli_fetch_row($result2)>0){
			list($uamt) = mysqli_fetch_row($result2);
			$tusers++;
			$tpackage +=$uamt;
			}
				
			//echo $user." ".$uamt."<br>";
			find_users($user);
			}
		}
		else{
			//echo $snode;
		}
 //echo $tusers;
}


find_users($username);
$my_users = $tusers;

$damount = 0;
$sql  = "SELECT id FROM `join_store` WHERE `dreferal` = '$username'  ";
$result = mysqli_query($s_dbid,$sql);

$dusers = 0;
while(list($did) = @mysqli_fetch_row($result)){
	$sql1  = "SELECT amount FROM `investment` WHERE `mid` = '$did' and status = 'active'  ";
	$result1 = mysqli_query($s_dbid,$sql1);
	if(mysqli_num_rows($result1)>0){
	list($damt) = mysqli_fetch_row($result1);
	$dusers++;
	$damount +=$damt;
	}
	
}

@$username = $_SESSION[ 'username' ];
$sql = "select `id`,`package`,`misc`,DATE_FORMAT(`jdate`, '%d-%m-%Y') as jdate,`name`,`email`,`phone`,`sponsor` FROM `join_store` where `username` = '$username';";
$result = mysqli_query( $s_dbid, $sql );
list( $mid, $packagej, $status, $jdate, $name, $email, $phone, $sponsor ) = mysqli_fetch_row( $result );

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and status = 'Confirmed' and `remarks` = 'Round Table Bonus'";
$result = @mysqli_query($s_dbid,$sql);
list($round_table_income) = @mysqli_fetch_row($result);

$round_table_income = $round_table_income - ($round_table_income*10)/100; 



//Wallet Start

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and status != 'Unconfirmed' and `remarks` != 'Wallet Transfer ' and `remarks` NOT LIKE 'iWallet%' and `remarks` NOT LIKE 'Token%' and `remarks` NOT LIKE 'Monthly Cashback Income' and `remarks` NOT LIKE 'Monthly Investment Income'and `remarks` NOT LIKE 'VTC%' ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt) = @mysqli_fetch_row($result);
$p_amt = $p_amt - ($p_amt*10)/100;

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and (`remarks`='Wallet Transfer ' or `remarks` = 'Fund Transfer from Admin' or `remarks` like 'VTC%')";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt2) = @mysqli_fetch_row($result);

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and (`remarks`='iWallet Deposit Bonus' or `remarks` = 'iWallet Deposit Weekly Payout' or `remarks` = 'iWallet Deposit Trading Incentive') and status='Confirmed'";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt3) = @mysqli_fetch_row($result);
$p_amt3 = $p_amt3 - ($p_amt3*10)/100;
//echo $p_amt."-".$p_amt2."-".$p_amt3;


//$sql = "SELECT SUM(`comm`) FROM inv_transactions left join `investment` on inv_transactions.mid = investment.mid WHERE inv_transactions.mid = '$mid' and inv_transactions.status != 'Unconfirmed' and plan != 'voucher' and `remarks` LIKE 'Monthly Cashback Income' and investment_id = investment.id";
$sql = "SELECT sum(comm) FROM inv_transactions  WHERE inv_transactions.mid = '$mid' and inv_transactions.status != 'Unconfirmed'  and `remarks` in ('Monthly Cashback Income','Monthly Investment Income')";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt4) = @mysqli_fetch_row($result);
$p_amt4 = $p_amt4 - ($p_amt4*5)/100;
//echo $p_amt4;
$sql = "SELECT SUM(`comm`) FROM inv_transactions left join `investment` on inv_transactions.mid = investment.mid WHERE inv_transactions.mid = '$mid' and inv_transactions.status != 'Unconfirmed' and plan = 'voucher' and `remarks` LIKE 'Monthly Cashback Income' and investment_id IS NULL";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt5) = @mysqli_fetch_row($result);
$p_amt5 = $p_amt5 - ($p_amt5*10)/100;



//echo $p_amt. " + ". $p_amt2. " + " .$p_amt3. " + ". $p_amt4. " + " .$p_amt5;
$p_amt = $p_amt + $p_amt2 + $p_amt3 + $p_amt4 + $p_amt5;

$sql = "SELECT sum(`amount`) FROM withdraw WHERE `jid`='$mid' and `wtype` not like 'iWallet%' and `wtype` not like 'Token'";
$result = mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);
//echo "-W:".$w_amt;
$e_amt = $p_amt;

$wallet = $p_amt - $w_amt;

//Wallet End



$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and status = 'Unconfirmed' ";
$result = mysqli_query($s_dbid,$sql);
list($uwallet) = mysqli_fetch_row($result);
$uwallet = $uwallet - ($uwallet*10)/100;


$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and `remarks` like 'iWallet%' and `remarks`!='iWallet Deposit Bonus' and `remarks` != 'iWallet Deposit Weekly Payout' and `remarks` != 'iWallet Deposit Trading Incentive' ";
$result = @mysqli_query($s_dbid,$sql);
list($ip_amt) = @mysqli_fetch_row($result);
//echo $sql;
$sql = "SELECT sum(`amount`)  FROM withdraw WHERE `jid`='$mid' and `wtype` like 'iWallet%';";
$result = mysqli_query($s_dbid,$sql);
list($iw_amt) = @mysqli_fetch_row($result);
//echo $sql;
$e_amt = $p_amt;
$iwallet = $ip_amt - $iw_amt;


$sql1 = "select pin from walletpin where `misc` ='$mid'";
$result1 = @mysqli_query($s_dbid,$sql1);
$pins = mysqli_num_rows($result1);



$rank = "";
		  

@$sql  = "SELECT count(id) as tjoin FROM `investment` WHERE `sdate` = '".date("Y-m-d")."'  ";
$result = mysqli_query($s_dbid,$sql);
list($tjoin) = mysqli_fetch_row($result);


$boardsql  = "SELECT count(id) FROM `join_store` WHERE `dreferal` = '$username' and misc = 'active'";
$bresult = @mysqli_query($s_dbid,$boardsql);
list($dusers) = @mysqli_fetch_row($bresult);

$investment=0;
$gsql  = "SELECT sum(`amount`) FROM `investment` WHERE `mid`='$mid' and plan = 'investment'  and sdate < '2021-08-19'";

$gresult = @mysqli_query($s_dbid,$gsql);
list($investment) = @mysqli_fetch_row($gresult);
if($investment==""){
    $investment = 0;
}


$minvestment=0;
$gsql  = "SELECT sum(`amount`) FROM `investment` WHERE `mid`='$mid' and plan = 'monthly-investment'  and sdate >= '2021-08-19'";

$gresult = @mysqli_query($s_dbid,$gsql);
list($minvestment) = @mysqli_fetch_row($gresult);
if($minvestment==""){
    $minvestment = 0;
}

$investment += $minvestment;

$dinvestment=0;
// and idate >= '2021-08-19'
$gsql  = "SELECT sum(`amt`) FROM `deposit_fund` WHERE `mid`='$mid'";
$gresult = @mysqli_query($s_dbid,$gsql);
list($dinvestment) = @mysqli_fetch_row($gresult);
if($dinvestment==""){
    $dinvestment = 0;
}
$investment += $dinvestment;

$gv=0;
$gsql  = "SELECT sum(`comm`) FROM `gift_vouchers` WHERE `mid`='$mid'";
$gresult = @mysqli_query($s_dbid,$gsql);
list($gv) = @mysqli_fetch_row($gresult);

if($gv==""){
    $gv=0;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Member | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->	
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
	
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">	
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b> S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Spatto Store</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="font-size: 24px;padding: 8px 20px;">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <p style="padding-left: 30%;width: 40%;float: left;font-size: 20px;padding-top: 10px;color: #fff;"> <?=$name?></p>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$name?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$name?> - <?=$username?>
                  <small>Member since <?=$adate?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>