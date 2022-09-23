<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php
$sql = "select `id`,`name`,`email`,`phone`,`misc` from `join` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
list($jid,$s_name,$s_email,$s_phone,$status) = mysqli_fetch_row($result);



$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$jid' and status != 'Unconfirmed' and `remarks`!='Wallet Transfer ' ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt) = @mysqli_fetch_row($result);
$p_amt = $p_amt - ($p_amt*10)/100;

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$jid' and status != 'Unconfirmed' and `remarks`='Wallet Transfer ' ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt2) = @mysqli_fetch_row($result);

$p_amt += $p_amt2;

$sql = "SELECT sum(`amount`) + sum(`amount_ded`) FROM withdraw WHERE `jid`='$jid';";
$result = mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);

$e_amt = $p_amt;
$wallet = $p_amt - $w_amt;

$sql  = "SELECT * FROM `iwallet_request` WHERE `jid` = '$jid' and status='Pending'";
$result = mysqli_query($s_dbid,$sql);
$pstatus = mysqli_num_rows($result);



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Request iWallet Fund
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Request iWallet Fund</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div class=" col-sm-6" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Request iWallet Fund</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php if(@$_GET['msg']!=""){?>
      <div class="col-md-12">
          <div class="errorHandler alert alert-danger ">
              <i class="fa fa-times-sign"></i> <?=$_GET['msg']?>
          </div>
      </div>
      <?php }?>
			<form role="form" name="form1"  method="post" action="submit-iwallet.php" onsubmit="return validate();" enctype="multipart/form-data">
			                                          <!--<input type="hidden" value="11800" name="amt">-->
			                                          <input type="hidden" value="<?=$mid?>" name="mid">
			  										
			                                              <label>User Id for iWallet </label>
			                                              <input required class="form-control" name="username" id="sponsor" type="text"  value="<?=$username?>" onKeyUp="get_data(this.value)" readonly autocomplete="off">
			  											<div  style="width: 290px;align-items: left; color: red;" class="result"></div>

			  										

			                                              <label>Amount : </label>
			                                              <input required class="form-control" name="amt" id="amt" type="text" autocomplete="off">
			              
			  											<div  style="width: 290px;align-items: left; color: red;" class="result"></div>

			  										

			                                             

			  								
<?php
			  								$sqlinv  = "SELECT hashcode FROM `investment` WHERE `hashcode` is not null and `mid` = '$jid' ";
                                            $resultinv = @mysqli_query($s_dbid,$sqlinv);
                                            list($hash) = @mysqli_fetch_row($resultinv);
                                            $nrows = @mysqli_num_rows($resultinv);
                                            
			  								?>		
			  										
			  									<?php
			  								
                                            if($nrows<=0){
												
			  								?>	

			                                              <label>Transaction Number </label>
			                                              <input class="form-control" id="trno" name="trno" type="text" required>

			  										<br>

			                                              <label>Transaction Date </label>
			                                              <input data-max-date="today" class="flatpickr form-control flatpickr-input active" id="trdate" name="trdate" type="text" placeholder="Select Date.."  required>

			  										<br>

			  										    <label>Upload Payment Proof</label><br>
			  										    Select image to upload:
														<input type="file" name="slip" id="slip" required>

			  										
			  								<br>
			  								<button type="submit" class="btn btn-primary">Proceed to Payment</button>
    			                             <?php
                                                }
                                                else{
                                                    ?>

			                                              <label>Transaction Number </label>
			                                              <input class="form-control" id="trno" name="trno" type="text" value="<?=$hash?>" readonly>

			  										<br>
                                                    <?php
                                                    echo "Your request is already in process.";
                                                }
    			                             ?>   				
				
				<br><br>
				
			                                      </form>
			
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
	
	<div class=" col-sm-1" >
		</div>
		
	<div class=" col-sm-4" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Bank Details</h3>

          
        </div>
        <div class="box-body">
          
			 
			                                              Bank Name : ICICI Bank<br>
			                                              Account Holder : Spatto Services PVT. LTD.<br>
			                                              Account No. : 2522 05 000 395<br>
			                                              IFSC Code : ICIC0002522<br>
			                                              BRANCH : ROHTAK
			                                              <br><br>
														Note : We do not accept Cheque, DD or Cash. You can transfer payment via NEFT/RTGS/IMPS/Online Banking (Net Banking).
			
        </div>
        <!-- /.box-body -->
    
        <!-- /.box-footer-->
      </div>	


<div class="box-body" style="background:#ecf0f5"><br>&nbsp;<br></div>

<div class="box-body" style="background: #fff">
    <div class="box-header with-border">
         <h3 class="box-title">Order History</h3>
        </div>
    <table id="datatable" class="table table-striped">
      <thead>
      <tr>
		        <th>#</th>
		        <th style="display: none;">Sno</th>
		        <th>Date</th>
		        <th>Amount</th>
		        <th>Status</th>
		        
      </tr>
      </thead>
      <tbody>
          <?php
            $sql = "SELECT amt,cdate,status FROM `iwallet_request` where jid = '$jid'";
	        $result = mysqli_query( $s_dbid, $sql );
	        $cnt=1;
	        while (list( $amt, $tdate,$status ) = mysqli_fetch_row( $result )) {
          ?>
          <tr>
	      	<td><?=$cnt?></td>
	      	<td style="display: none;"><?=$cnt?></td>
	      	<td><?=$tdate?></td>
	      	<td><?=$amt?></td>
	      	<td><?=$status?></td>
	       </tr>
          <?php $cnt++;  } ?>
      </tbody>
    </table> 
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
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
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

<script >
	
	function validate(){

	    val = document.getElementById("plan").value;
        if(val=="investment"){    
            amt = document.getElementById("amt2").value;
            if(amt<1000 || amt == NULL){
                alert("Invalid amount for activation!");
	            return false;
            }
        }
	}
</script>	
<script>
    $(document).ready(function(){
       
      
       $("#plan1").click(function(){
              $("#amtdiv").show();
               $("#amtdiv2").hide();
               $("#plan2").prop("checked", false);
          
       });
       $("#plan2").click(function(){
               $("#amtdiv2").show();
               $("#amtdiv").hide();
               $("#amt1").val="";
               $("#plan1").prop("checked", false);
       });                        
    var today = new Date();  
   	$('#trdate').datepicker({
      autoclose: true,
      endDate: "today",
      maxDate: today
    })
      
    });


			
	//bind change event once DOM is ready
	function get_data(value){
						//alert(value);	
								$.ajax({
	        url: "http://spattoservices.com/user/getsp.php",
	        type: "GET",
	        data: "value=" + value,
	        success: function(data) {
	          
				$(".result").html(data);
	        }
	     });
								}
	</script>
</body>
</html>
