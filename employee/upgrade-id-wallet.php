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
list($mid,$s_name,$s_email,$s_phone,$status) = mysqli_fetch_row($result);



$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and status != 'Unconfirmed' and `remarks`!='Wallet Transfer ' and  `remarks` NOT LIKE 'iWallet%' ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt) = @mysqli_fetch_row($result);
$p_amt = $p_amt - ($p_amt*10)/100;

$sql = "SELECT SUM(`comm`) FROM inv_transactions WHERE mid = '$mid' and (`remarks`='Wallet Transfer ' or `remarks` = 'Fund Transfer from Admin') ";
$result = @mysqli_query($s_dbid,$sql);
list($p_amt2) = @mysqli_fetch_row($result);

$p_amt += $p_amt2;

$sql = "SELECT sum(`amount`)  FROM withdraw WHERE `jid`='$mid' and wtype not like 'iWallet%';";
$result = mysqli_query($s_dbid,$sql);
list($w_amt) = @mysqli_fetch_row($result);

$e_amt = $p_amt;
$wallet = $p_amt - $w_amt;



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upgrade ID
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upgrade ID</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div class=" col-sm-6" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Upgrade ID</h3>

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
			<form role="form" name="form1"  method="post" action="submit-id-wallet.php" enctype="multipart/form-data">
			                                          <input type="hidden" value="<?=$wallet?>" name="walletamt" id="walletamt">
			                                          <input type="hidden" value="<?=$iwallet?>" name="iwalletamt" id="iwalletamt">
			                                          
			                                          <input type="hidden" value="<?=$mid?>" name="mid">
			  										<div class="form-group">
			                                              <label>User Id to Upgrade </label>
			                                              <input required class="form-control" name="touser" id="sponsor" type="text"  value="" onKeyUp="get_data(this.value)"  autocomplete="off">
			  											<div  style="width: 290px;align-items: left; color: red;" class="result"></div>
			                                        </div>
			  										   <hr>       
			  										<div class="form-group">
			                                              <!--<label>Amount : </label>-->
			                                              <!--<input required class="form-control" name="amt" id="amt" type="text"  value="11800"  readonly autocomplete="off">-->
			              <!--&nbsp;&nbsp;<input type="radio" name="amt" id="amt" value="10000">&nbsp;11800&nbsp;&nbsp;-->
                 <!--        <input type="radio" name="amt" id="iamt" value="100000">&nbsp;118000                                -->
                            <div id="amtdiv" style="display: none">
                              <select class="form-control" name="amt1" id="amt1">
<!--                              <option value="12000">Travels Package with family 3 Night/ 4 Days Hotal Stay with breakfast - Rs 12000/-</option>-->
                              <option value="1000">Rs 1000/- | - Rs 1000 Shopping Voucher</option>
                              <option value="2000">Rs 2000/- | - Rs 2000 Shopping Voucher</option>
                              <option value="3000">Rs 3000/- | - Rs 3000 Shopping Voucher</option>
                              <option value="5000">Rs 5000/- | - Rs 5500 Shopping Voucher</option>
                              <option value="8000">Rs 8000/- | - Rs 9000 Shopping Voucher</option>
                              <option value="12000">Rs 12000/- | - Rs 13000 Shopping Voucher</option>
                              <option value="25000">Rs 25000/- | - Rs 27000 Shopping Voucher</option>
                              <option value="50000">Rs 50000/- | - Rs 55000 Shopping Voucher</option>
                              </select>	
                              <div  style="align-items: left; color: red;" class="result">You will get 5% Monthly Cashback for 20 Months.</div>
                            </div>
                          <div id="amtdiv2" style="display: none">
                          <input  class="form-control" name="amt2" id="amt2" type="number" placeholder="Enter amount for Activation" min="1000" autocomplete="off">	
                          <div  style="align-items: left; color: red;" class="result">You will get minimum 8% Monthly for 10 Months and 50% for 2 Months.</div>
			  											<!--<div  style="width: 290px;align-items: left; color: red;" class="bal">Wallet Balance :<?=$wallet?></div>-->
			  			 </div>								
			                                        </div>
                                            
                            <div class="form-group">
                                  <label>Select Plan : </label>
                                  <?php
                                  //if($status!="active"){
                                  ?>
                                  &nbsp;&nbsp;<input type="radio" name="plan" id="plan1" value="voucher">&nbsp;<label id = "lblplan1">Voucher</label>
                                  <?php
                                  //}
                                  ?>
                                  &nbsp;&nbsp;<input type="radio" name="plan" id="plan2" value="monthly-investment">&nbsp;<label id = "lblplan2">Investment</label>            
                            </div>                            
			  										<hr>
			  								<div class="form-group">
			                                              <label>Topup from Wallet : </label>
			              &nbsp;&nbsp;<input type="radio" name="wallet" id="iwallet" value="iwallet" <?php if($iwallet<1000) { echo 'disabled unchecked';} else { echo 'checked';}?>>&nbsp;iWallet                                
                          
			  											<!--<div  style="width: 290px;align-items: left; color: red;" class="bal">Main Wallet Balance :<?=$wallet?></div>-->
			  											<div  style="width: 290px;align-items: left; color: red;" class="bal">iWallet Balance :<?=$iwallet?></div>
			                                        </div>
			                                        Note : All amount are excluding 18% GST. For each package 18% GST is applicable and will be deducted on purchase.
			  										<hr>
			  								<?php
			  								$sqlinv  = "SELECT hashcode FROM `investment` WHERE `hashcode` is not null and `mid` = '$jid' ";
                                            $resultinv = @mysqli_query($s_dbid,$sqlinv);
                                            list($hash) = @mysqli_fetch_row($resultinv);
                                            $nrows = @mysqli_num_rows($resultinv);
                                            
			  								?>		
			  								<div class="form-group">	
                                             <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-left">OTP Verification<span class="mendatory">*</span></label>
														<input type="text" name='otp' id='otp' placeholder="Enter Mobile Verification OTP code" class="form-control" required>
                                                    </div>
												<span id="otpmessage" style="color:red"></span>		 
                                                </div>
												<div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-left">&nbsp;</label>
                                                        <input type='button' id="otpbtn" value='Send Mobile OTP' class="form-control">
														
                                                    </div>
												
                                                </div> 
                                            </div>   
                                            <br><br><br>
			  										<hr>    
			  										<div></div>
			  									<?php
			  								
                                            if($nrows<=0){
			  								?>			
			  										
			                                 <?php
			                                 
			                                 
			                                 if($wallet>=1000 || $iwallet>=1000){
			                                 ?>         
			  								<div class="form-group" id="submit">
			  								<button type="submit" class="btn btn-primary">Submit</button>
			  								</div>
			                                 <?
			                                 }
			                                 else{
			                                     echo "Insufficient wallet Balance.";
			                                 }
			                                 ?>   
			                                 <?php
                                                }
                                                else{
                                                    ?>
                                                    <div class="form-group">
			                                              <label>Transaction Number </label>
			                                              <input class="form-control" id="trno" name="trno" type="text" value="<?=$hash?>" readonly>
			                                          </div>
			  										<br>
                                                    <?php
                                                    echo "Your request is already in process.";
                                                }
    			                             ?>
			                                      </form>
			
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
      
   
      
    });

$("#otpbtn").on('click', function (){
    
			var str = '<?=$username?>';
			var n = str.length;
			//if(n==10){
            $.ajax({
                url:'sendupgradeotp.php',
                method:'post',
                data: JSON.stringify({username:'<?=$username?>'}),
                success:function(data){
                     $("#otpmessage").css('color','orange');
                     $("#otpmessage").html(data);
                     setTimeout(function(){ $("#otpmessage").html("");}, 10000);
                }
            })
// 			}
// 			else{
// 				$("#otpmessage").css('color','orange');
// 				$("#otpmessage").html("Invalid Mobile no.");
// 				setTimeout(function(){ $("#otpmessage").html("");}, 10000);
// 			}
        })
			
	//bind change event once DOM is ready
	function get_data(value){
						//alert(value);	
								$.ajax({
	        url: "http://spattoservices.com/user/getsp_id.php",
	        type: "GET",
	        data: "name=" + value,
	        success: function(data) {
	          
				$(".result").html(data);
				if(data!="Invalid Sponsor"){
				    var str = data; 
                    var n = str.search(":");
                    n = n+1;
                    var res = str.substr(n);
                    if(res=="active"){
    				    $("#plan1").prop("checked", false);
    				    $("#plan2").prop("checked", true);
    				    $("#plan1").hide();
    				    $("#amtdiv").hide();
    				    $("#lblplan1").hide();
    				    $("#amtdiv2").show();
                    }
				}
				
	        }
	     });
								}
	</script>
</body>
</html>
