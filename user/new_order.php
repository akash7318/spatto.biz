<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php





$sql = "select `name`,city,state,address,pincode,landmark from `join_store` where `id` = '$mid';";           
$result = mysqli_query($s_dbid,$sql);
list($store,$city,$state,$address,$pincode,$landmark) = mysqli_fetch_row($result);


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 1363px; height:1364px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order
        <small>New Order</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class=" col-sm-5" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Add Products</h3>

          
        </div>
        <div class="box-body">
          
			
              				<div class="alert alert-info"> <strong>New Order for Customer</strong></div>
              <form method="post" action="submit_order.php"  id="personalform" enctype="multipart/form-data"  onsubmit="return validate(this);">	
              
              <input type="hidden" name="sid" value="<?=$mid?>">
              
              <div class="form-group">
			  							
			  							<input type="text" class="form-control" name="customer_code" id="customer_code" aria-describedby="customer_code" placeholder="Customer Code" style="width: 60%;float: left;" required>
			  							<input type="text" class="form-control" name="customer_name" id="customer_name" aria-describedby="customer_name" placeholder="Customer Name" style="width: 30%;float: left;" readonly>
              						</div>
              						<div class="form-group"><br><br></div>
              				
              <?php
              $ctr=01;
              while($ctr<27){
              ?>
              					
              						<div class="form-group">
			  							<label for="userid" style="width:10%;float: left;padding-right: 15px;font-size: 18px;"><?=$ctr?>. </label>
			  							<input type="text" class="form-control" name="product_name[]" id="product_name[]" aria-describedby="product_name[]" placeholder="Product Name" style="width: 50%;float: left;">
			  							<input type="text" class="form-control" name="product_qty[]" id="product_qty[]" aria-describedby="product_qty[]" placeholder="Quantity" style="width: 20%;float: left;">
			  							<input type="text" class="form-control" name="product_price[]" id="product_price[]" aria-describedby="product_price[]" placeholder="Price" style="width: 20%;float: left;">
              						</div>
              						<div class="form-group"><br></div>
              						
             <?php
                $ctr++;
              }
             ?> 						
              
              <br><br>				
                                    <div style="float:left">
                                    <input type="button" name="cancel" value="Clean" id="cancel" class="btn btn-rose btn-round"/>		
              						&nbsp;&nbsp;
              						
              						</div>
              						<div style="float:right"><input type="submit" name="submit" value="Submit!!" id="submit" onClick='return confirmSubmit()' class="btn btn-rose btn-round"/></div>
              						
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
    <strong>Copyright &copy; 2022 Spatto Services.</strong> All rights
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

<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
{
var agree=confirm("Are you sure you want to submit?");
if (agree)
 return true ;
else
 return false ;
}
// -->


<!--
function confirmHold()
{
var agree=confirm("Are you sure you want to hold?");
if (agree)
 return true ;
else
 return false ;
}
// -->



 
		$("#customer_code").keyup(function(){
		    $.ajax({
		        url:'getcustomer.php',
		        method:'post',
		        data: JSON.stringify({name:$(this).val()}),
		        success:function(data){
		             $("#customer_name").val(JSON.parse(data).message);
		        }
		    })
		})
</script>


</body>
</html>
