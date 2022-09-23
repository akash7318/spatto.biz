<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>

<?php
$sql = "select `account_no`,`panimage`,`afront`,`aback`,`panstatus`, `idstatus`, `bank_status` from `bank` where `jid` = '$mid';";
$result = mysqli_query($s_dbid,$sql);
list($acctno,$pancard,$afront,$aback,$panstatus,$idstatus,$bank_status) = mysqli_fetch_row($result);



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

$sql = "SELECT sum(`amount`) FROM withdraw WHERE `jid`='$mid' and `wtype` not like 'iWallet%' and `wtype` not like 'Token';";
$result = mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);
//echo "-W:".$w_amt;
$e_amt = $p_amt;

$wallet = $p_amt - $w_amt;
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wallet
        <small>Wallet to iWallet Withdrawal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wallet to iWallet Withdrawal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff" class="col-sm-6">
        
		<div class="box-header with-border">
         <h3 class="box-title">Wallet to iWallet Withdrawal</h3>
        </div>
	  
        <div class="box-body">
         
		  <?php
			  date_default_timezone_set("Asia/Kolkata");
			  
    $weekday =  date("l");
    $normalized_weekday = strtolower($weekday);

              
			  
			  $sql_ch = "SELECT status FROM withdraw WHERE `jid`='$mid' and status like 'pending';";
                $result_ch = mysqli_query($s_dbid,$sql_ch);
                list($status) = @mysqli_fetch_row($result_ch);
			    if($status!="pending"){
                			  
                			  ?>          
                              <form method="post" action="submit-withdrawl-iwallet.php" onsubmit="javascript:return validate();" id="myform">
                			  				<?php
                			  						if(@$_GET['errmsg']!=""){				
                			  					?>				
                			  					<span id="mainmsg" style="color:Red;display:visible;"><?=@$_GET['errmsg']?></span>
                			  					<?php
                			  						}
                			  					?>
                			  					
                              				<table class="table table-bordered table-striped text-center">
                              				                            <tbody> 
                              				                                  
                              				                            <tr class=" ">
                              				                                <td width="41%"><font color="#000" size="2">Total Income</font></td>
                              				                                <td width="36%">&nbsp;&nbsp;&nbsp; <span><span id="ctl00_ContentPlaceHolder1_lblincometotal"><?=round($p_amt,2)?> INR</span></span> </td>
                              				                            </tr> 
                              				                              
                              				                            
                              				                                 <tr class="">
                              				                                <td><font color="#000" size="2">Total Withdrawal</font></td>
                              				                                <td>&nbsp;&nbsp;&nbsp; <span><span id="ctl00_ContentPlaceHolder1_lblwithdrawl"><?=$w_amt?> INR</span></span> </td>
                              				                            </tr> 
                              				                         <tr class="">
                              				                                <td><font color="#000" size="2">Net Income   :</font></td>
                              				                                <td>&nbsp;&nbsp;&nbsp; <span><span id="ctl00_ContentPlaceHolder1_lblincome"><?=round($wallet,2)?> INR</span></span> </td>
                              				                            </tr>
                              				                                
                              				                            
                              				                            <tr>
                              				                                <td><font color="#000" size="2">Enter Withdrawal Amount :</font></td>
                              				                                <td>
                              				                                <input type="number" min="100" id="withrsc" name="withrsc" n  onKeyUp="check_amt()" autocomplete="off" style=" border:solid 1px #ccc; width:55%; padding:5px; height:30px;"  />
                              				                                
                              				                                </td>
                              				                            </tr> 	
                              				                            
                              				                            <tr>
                              				                                <td><font color="#000" size="2">Withdrawal Type :</font></td>
                              				                                <td>
                              				                                <select name="wtype">
                              				                                    <option value="iWallet">iWallet</option>
                              				                                    <!--<option value="Paytm">Paytm</option>-->
                              				                                    <!--<option value="Googlepay">Googlepay</option>-->
                              				                                    <!--<option value="Phonepe">Phonepe</option>-->
                              				                                    <!--<option value="UPI">UPI</option>-->
                              				                                </select>    
                              				                                
                              				                                </td>
                              				                            </tr>
                              									  
                              				                    <!--        <tr>-->
                                                						<!--	<td><input type="text" name='otp' id='otp' placeholder="Mobile Verification OTP" class="form-control" required></td>-->
                                                						<!--	<td><input type='button' id="otpbtn" value='Send Mobile OTP'></td>-->
                                                						<!--	<span id="otpmessage"></span>-->
                                                						<!--</tr> -->
                              				                               
                              				                            <tr>
                              				                                <td >&nbsp;</td>
                              				                                <br />
                              				                               <td>
                              				<?php if($wallet>0){?>
                              				                                <input type="submit" name="submit" value="Withdrawal" id="submit" class="btn btn-warning" />
                              				<?php }?>                                </td>
                              				                              </tr>  
                              				                            
                              				                             
                              				                                          
                              				                        </tbody></table>               
                              					
                              						
                              
                              					
                              
                              					
                              				
                              				</form>
                			  <?php
                			  
			    }
			    else{
			        
                		     // echo "You already have a pending Withdrawal Request.";
                		     echo "iWallet Withdrawal is Under Maintenance - will be live asap.";
                	
			    }
			  
			  
			  ?>		
		
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2021 Spatto Services.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>




<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>
<script>
$(document).ready(function() {
   $('#datatable').DataTable({
	   "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //debugger;
            var index = iDisplayIndexFull + 1;
            $("td:first", nRow).html(index);
            return nRow;
        }
   })
   
	$('#select_date').daterangepicker()
   
} );

	
</script>


<script>

function check_amt(){
	
	var amt = document.getElementById("withrsc").value;
	var pamt = <?=$p_amt?>;
	if(amt>pamt){
		alert("Invalid Amount!!");
		document.getElementById("withrsc").value = <?=$p_amt?>;
	}
	else{
		document.getElementById("amount_final").value = document.getElementById("withrsc").value - (document.getElementById("withrsc").value/100)*<?=@$wded?>;
		
		document.getElementById("amount_ded").value = (document.getElementById("withrsc").value/100)*<?=@$wded?>; 
	}
}	
	

function validate(){
	
	var amt = document.getElementById("withrsc").value;
	if(amt<100){
		alert("Invalid Amount!! Minimum amount for withdrawal id 100.");
		document.getElementById("withrsc").value = <?=$p_amt?>;
		document.getElementById("amount_final").value = 0;
		document.getElementById("amount_ded").value = 0;
		return false;
	}
}
</script>

<script type="text/javascript">
            
            $("#otpbtn").on('click', function (){
                
                $.ajax({
                    url:'sendotp.php',
                    method:'post',
                    data: JSON.stringify({amt:$("#withrsc").val()}),
                    success:function(data){
                         
                         $("#otpmessage").css('color','orange');
                         
                         $("#otpmessage").html(JSON.parse(data).message);
                         document.getElementById("mainmsg").innerHTML = "";
                         setTimeout(function(){ $("#otpmessage").html("");}, 10000);
                         //alert(JSON.parse(data).output);
                    }
                })
            })
</script>

</body>
</html>
