<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>

<?php




$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and `remarks` like 'iWallet%' and `remarks`!='iWallet Deposit Bonus' and `remarks` != 'iWallet Deposit Weekly Payout' and `remarks` != 'iWallet Deposit Trading Incentive' ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt) = @mysqli_fetch_row($result);


$sql = "SELECT sum(`amount`)  FROM withdraw WHERE `jid`='$mid' and wtype like 'iWallet%'";
$result = mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);
echo $sql;
$e_amt = $p_amt;
$wallet = $p_amt - $w_amt;

$sql = "SELECT `phone` FROM `join` WHERE `id`='$mid';";
$result = mysqli_query($s_dbid,$sql);
list($phone) = @mysqli_fetch_row($result);


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Token to Token Wallet
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Token</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff" class="col-sm-6">
        
		
	  <div class="box-header with-border">
         <h3 class="box-title">Add Token</h3>
        </div>
        <div class="box-body">
         
		  <form method="post" action="submit-add-token.php" onsubmit="javascript:return validate();" id="myform">
			  				<?php
			  						if(@$_GET['msg']!=""){				
			  					?>				
			  					<span id="mainmsg" style="color:Red;display:visible;"><?=@$_GET['msg']?></span>
			  					<?php
			  						}
			  					?>
			  					
              				<table class="table table-bordered table-striped text-center">
              				                            <tbody> 
              				                         
              				                         <tr class="">
              				                                <td><font color="#000" size="2">Wallet Balance   :</font></td>
              				                                <td>
              				                                <input type="text" id="wallet" name="wallet"  value="<?=$wallet?>" style=" border:solid 1px #ccc; width:55%; padding:5px; height:30px;" readonly disabled/>
              				                                </td>
              				                            </tr>         
              				                             
              				                         <tr class="">
              				                                <td><font color="#000" size="2">Transfer to User   :</font></td>
              				                                <td>
              				                                <input type="text" id="touser" name="touser" value="<?=$username?>"  style=" border:solid 1px #ccc; width:55%; padding:5px; height:30px;" readonly/>
              				                                </td>
              				                            </tr>
              				                                
              				                            
              				                            <tr>
              				                                <td><font color="#000" size="2">Enter Transfer Amount :</font></td>
              				                                <td>
              				                                <!--<input type="text" id="amt" name="amt" autocomplete="off" style=" border:solid 1px #ccc; width:55%; padding:5px; height:30px;" required />-->
              				                                
              				                                <select name ="amt" id="amt">
              				                                    <option value="5000">5000 - 5% Bonus(Limited Period)<option>
              				                                    <option value="10000">10000 - 7.5% Bonus(Limited Period)<option>
              				                                    <option value="25000">25000 - 10% Bonus(Limited Period)<option>
              				                                    <option value="50000">50000 - 15% Bonus(Limited Period)<option>
              				                                    <option value="100000">100000 - 20% Bonus(Limited Period)<option>                  
              				                                </select>
              				                                
              				                                </td>
              				                            </tr> 	
              				                            
              				                            
              									        <tr>
                                							<td>
                                							    Registered Mobile number : xxxxxx<?=substr($phone,-4)?>
                                							    <input type="text" name='otp' id='otp' placeholder="Mobile Verification OTP" class="form-control" required></td>
                                							<td><input type='button' id="otpbtn" value='Send OTP'></td>
                                							<span id="otpmessage"></span>
                                						</tr>
              				                             
              				                               
              				                            <tr>
              				                                <td >&nbsp;</td>
              				                                <br />
              				                               <td>
              				<?php if($wallet>0){?>
              				                                <input type="submit" name="submit" value="Transfer" id="submit" class="btn btn-warning" />
              				<?php }
              				else{
              				    echo "Insufficient wallet Balance.";
              				}
              				?>                                </td>
              				                              </tr>  
              				                            
              				                             
              				                                          
              				                        </tbody></table>               
              					
              						
              
              					
              
              					
              				
              				</form>		
		
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>

<div class="col-lg-12"><br><br></div>

    

    </section>
    <!-- /.content -->
    <div class="row" style="padding-left:12px;">
    <section>
        <div class="col-lg-10">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header"><i class="fa fa-inbox"></i> Token Statement</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              
            <div class="box-body">
              <div class="table-responsive">

				<table id="datatable" class="table table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>User Id</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Remark</th>
        <th>Date</th>
      </tr>
      </thead>
      <tbody>
<?php
$cnt = 1;
$sql_token = "SELECT amt,remarks,ttime,token_value,name FROM `token_wallet`,`join` where token_wallet.username = '$username' and mid = `join`.id order by token_wallet.id desc";
$result_token = @mysqli_query($s_dbid,$sql_token);


while(list($token,$remark,$pdate,$token_value,$name) = mysqli_fetch_row($result_token)){

$my_token = $token/$token_value;
?>
       <tr>
      	<td><?=$cnt?></td>
      	<td><?=$username?></td>
      	<td><?=$name?></td>
      	<td><?=$my_token?></td>
      	<td><?=ucfirst($remark)?></td>
      	<td><?=$pdate?></td>
       </tr>
      <?php $cnt++; }?>
      
      
      </tbody>
    </table>  
				  
              </div>
              <!-- /.table-responsive -->
            </div>  
			  
            </div>
          </div>
        </div>
    </section>    
    </div>
    
    
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
	
			
			
	//bind change event once DOM is ready
	function get_data(value){
						//alert(value);	
								$.ajax({
	        url: "getemail.php",
	        type: "GET",
	        data: "value=" + value,
	        success: function(data) {
	          
				$(".result").html(data);
	        }
	     });
								}
	</script>

  
<script>


	

function validate(){
	
	var amt = document.getElementById("withrsc").value;
	var maxamt = 1026208	if(amt>maxamt){
		alert("Invalid Amount!! ");
		return false;
	}
}
	
	
</script>
<script type="text/javascript">
            
            
            $("#otpbtn").on('click', function (){
                
                $.ajax({
                    url:'sendotp.php',
                    method:'post',
                    data: JSON.stringify({amt:$("#amt").val()}),
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
