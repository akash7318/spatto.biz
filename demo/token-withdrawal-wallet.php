<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>

<?php


$sql_token="SELECT token_value,tdate,edate FROM `token_value` order by id asc";
$result_token = @mysqli_query($s_dbid,$sql_token);
$my_total_token = 0;

while(list($token_value,$tdate,$edate) = @mysqli_fetch_row($result_token)){
   
    if($tdate==$edate){
        $sql  = "SELECT sum(amt) FROM `token_wallet` where `ttime` >= '$tdate' and `username` = '$username'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    else{
        $sql  = "SELECT sum(amt) FROM `token_wallet` where `ttime` BETWEEN '$tdate' AND '$edate' AND `username` = '$username'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    
    $my_total_token += $my_token/$token_value;

    if($tdate==$edate){
        $sql  = "SELECT sum(comm) FROM `inv_transactions` where `ttime` >= '$tdate' and `mid` = '$mid' and remarks like 'Token - Cashback Income%'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    else{
        $sql  = "SELECT sum(comm) FROM `inv_transactions` where `ttime` BETWEEN '$tdate' AND '$edate' AND `mid` = '$mid' and remarks like 'Token - Cashback Income%'"; 
        $result = @mysqli_query($s_dbid,$sql);
        list($my_token) = @mysqli_fetch_row($result);
        
    }
    
    $my_token = $my_token -($my_token/100)*10;
    //echo $my_token." ".$token_value."<br>";
    $my_total_token += $my_token/$token_value;
}


$sql  = "SELECT sum(amount) FROM `withdraw` where  `jid` = '$mid' and remark like 'VTC Sale to Wallet'"; 
$result = @mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);

$token_wallet = $my_total_token - $w_amt;

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wallet
        <small>Sell Token</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sell Token </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff" class="col-sm-6">
        
		<div class="box-header with-border">
         <h3 class="box-title">Sell Token</h3>
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
                              <form method="post" action="submit-token-withdrawl-wallet.php" onsubmit="javascript:return validate();" id="myform">
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
                              				                                <td width="41%"><font color="#000" size="2">Total Token</font></td>
                              				                                <td width="36%">&nbsp;&nbsp;&nbsp; <span><span id="ctl00_ContentPlaceHolder1_lblincometotal"><?=$my_total_token?> VTC</span></span> </td>
                              				                            </tr> 
                              				                              
                              				                            
                              				                                 <tr class="">
                              				                                <td><font color="#000" size="2">Total Withdrawal</font></td>
                              				                                <td>&nbsp;&nbsp;&nbsp; <span><span id="ctl00_ContentPlaceHolder1_lblwithdrawl"><?=$w_amt?> VTC</span></span> </td>
                              				                            </tr> 
                              				                         <tr class="">
                              				                                <td><font color="#000" size="2">Net Income   :</font></td>
                              				                                <td>&nbsp;&nbsp;&nbsp; <span><span id="ctl00_ContentPlaceHolder1_lblincome"><?=round($token_wallet,2)?> VTC</span></span> </td>
                              				                            </tr>
                              				                                
                              				                            
  			                           <tr>
  			                           <td><font color="#000" size="2">Enter Tokens to Sell:</font></td>
  		                                <td>	                                <input type="number" min="1" id="withrsc" name="withrsc"  onKeyUp="check_amt()" autocomplete="off" style=" border:solid 1px #ccc; width:55%; padding:5px; height:30px;"  />
          				                </td>
          				                </tr>
          				                <tr>
  			                           <td><font color="#000" size="2">Amount to Main Wallet :</font></td>
  		                                <td>	                                <input type="text" min="100" id="walletamt" name="walletamt" readonly style=" border:solid 1px #ccc; width:55%; padding:5px; height:30px;"  />
          				                </td>
          				                </tr>
                              				                            
                              				                            <tr>
                              				                                <td><font color="#000" size="2">Transfer to  :</font></td>
                              				                                <td>
                              				                                <select name="wtype">
                              				                                    <option value="Wallet">Wallet</option>
                              				                                    
                              				                                </select>    
                              				                                
                              				                                </td>
                              				                            </tr>
                              									  

                              				                               
                              				                            <tr>
                              				                                <td >&nbsp;</td>
                              				                                <br />
                              				                               <td>
                              				<?php if($token_wallet>0){?>
                              				                                <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-warning" />
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

<?php

$sql_token="SELECT token_value FROM `token_value` order by id desc limit 1";
$result_token = @mysqli_query($s_dbid,$sql_token);
list($token_value) =@mysqli_fetch_row($result_token);

?>
<script>

function check_amt(){
	
	var amt = document.getElementById("withrsc").value;
	var pamt = <?=$token_wallet?>;
	if(amt>pamt){
		alert("Invalid Amount!!");
		document.getElementById("withrsc").value = "";
		document.getElementById("walletamt").value = "";
	}
	else{
		document.getElementById("walletamt").value = document.getElementById("withrsc").value*<?=$token_value?>;
		
	}
}


	

function validate(){
	
	var amt = document.getElementById("withrsc").value;
	if(amt<1){
		alert("Invalid Amount!! Minimum amount for withdrawal id 1.");
		document.getElementById("withrsc").value = "";
		document.getElementById("iwalletamt").value="";
		return false;
	}
}
</script>

<script type="text/javascript">
            
            $("#otpbtn").on('click', function (){
                
                $.ajax({
                    url:'sendotp.php',
                    method:'post',
                    data: JSON.stringify({amt:$("#walletamt").val()}),
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
