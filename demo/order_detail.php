<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>



<style>
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>

<?php
          $oid = $_POST['oid'];

            $sql  = "SELECT `id`, `mid`, `sid`, `order_date`,`status` FROM `orders` WHERE id = '$oid'";
            $result = mysqli_query($s_dbid,$sql);
            list($id,$mid,$sid,$order_date,$status) = @mysqli_fetch_row($result);
            
            
            $sql2 ="SELECT `store_name`,`name`, `state`, `city`, `address`, `pincode`, `landmark`,`username` FROM `join_store` WHERE id = '$sid'";
              $result2 = mysqli_query($s_dbid,$sql2);    
              list($store_name,$name,$state,$city,$address,$pincode,$landmark,$store_username)  = @mysqli_fetch_row($result2);
            
            $sql2 ="SELECT `name`, `username` FROM `join` WHERE  id = '$mid'";
            $result2 = mysqli_query($s_dbid,$sql2);    
            list($customer_name,$customer_user)  = @mysqli_fetch_row($result2);
            $total = 0;
          ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
        <small><?php if($status=='Closed') {?>Billed <?php } else {?> Customer<?php } ?> Order Detail</small>
      </h1>
      <!--<ol class="breadcrumb">-->
      <!--  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
        <!--<li class="active"><?php if($status=='Closed') {?>Billed <?php } else {?> Customer<?php } ?> Order Detail</li>-->
      <!--</ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div  style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title"><?php if($status=='Closed') {?>Billed <?php } else {?> Customer<?php } ?> Order Detail</h3>

          
        </div>
        <div class="box-body">
 
	    
	    	<div class=" col-sm-7" style="background: #fff">
	    
        
        <!--<div class="box-header with-border">-->
        <!--  <h3 class="box-title">-->
              <?php if($status=='Closed') {?>
          <!--Billed Order List-->
          <?php 
              
          } else {
              //echo " Order List";
          }?>
          <!--</h3>-->

          
        <!--</div>-->
        <div class="box-body">
        <form method="post" action="update_order.php"  id="personalform" enctype="multipart/form-data">	
              
              <input type="hidden" name="sid" value="<?=$sid?>">
              <input type="hidden" name="mid" value="<?=$mid?>">
              <input type="hidden" name="oid" value="<?=$oid?>">  
          
		<div id="GFG" >	    	
  			<div class="alert alert-info"> <strong>Customer : <?=$customer_name?> - <?=$customer_user?> &nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;Store : <?=$store_name?> - <?=$store_username?> &nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;  Bill No.  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  <?=date("d-m-Y",strtotime($order_date))?></strong></div>
              
              <!--<div class="form-group">-->
              <table width="100%" cellpadding="4" cellspacing="4" style="border: 1px solid #e6e6e6;" cell-padding="4">
              <tr style="border-bottom: 1px solid #ccc; line-height: 30px;">      
      			<td align="center"><strong># </strong></td>
      			<td align="center"><strong>Item/HSN Code</strong></td>
				<td align="center"><strong>Qty</strong></td>  
      			<td align="center"><strong>Bill </strong></td>
      			<!--<td align="center"><strong>Total </strong></td>-->
      			<td align="center"><strong>GST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</strong></td>
      			
      		</tr>				
              <?php
            $sql2 ="SELECT `product_name`, `product_qty`,`product_price` FROM `order_detail` WHERE  order_id = '$oid'";
            $result2 = mysqli_query($s_dbid,$sql2);    
            // $cnt = count(array_filter($_POST['product_name'], function($x) { return !empty($x); }));
              $ctr=1;
              while(list($product_name,$product_qty,$product_price) = @mysqli_fetch_row($result2)){
              ?>
            <tr>
                <td align="center" style="width:40px"><label for="userid" style="font-size: 18px;"><?=$ctr?>. </label></td>
                <td align="center"><input type="text" class="form-control" style="border: 0px none;text-align: center;" name="product_name[]" id="product_name[]" aria-describedby="product_name[]" value="<?=$product_name?>" placeholder="Product Name" ></td>
                <td align="center"><input type="text" class="form-control" style="border: 0px none;text-align: center;" name="product_qty[]" id="product_qty[]" aria-describedby="product_qty[]"  value="<?=$product_qty?>" placeholder="Quantity" ></td>
                <td align="center"><input type="text" class="form-control product_price" style="border: 0px none;text-align: center;" name="product_price[]" id="product_price[]" aria-describedby="product_price[]"  value="<?=$product_price?>" placeholder="Price" ></td>
                <!--<td align="center"><input type="text" class="form-control" style="border: 0px none;text-align: center;" name="product_bill[]" id="product_bill[]" aria-describedby="product_bill[]"  value="<?=$product_price*$product_bill?>" placeholder="" ></td>-->
                <td align="center"><input type="text" class="form-control product_gsttotalprice" style="border: 0px none;text-align: right;" name="product_gsttotalprice[]" id="product_gsttotalprice[]" aria-describedby="product_gsttotalprice[]"  value="<?=$product_price?>" placeholder="Price" ></td>
            </tr>          					
  		<!--<div class="form-group">-->
  		<!--	<label for="userid" style="width:10%;float: left;padding-right: 15px;font-size: 18px;"><?=$ctr?>. </label>-->
  		<!--	<input type="text" class="form-control" name="product_name[]" id="product_name[]" aria-describedby="product_name[]" value="<?=$product_name?>" placeholder="Product Name" style="width: 60%;float: left;">-->
  		<!--	<input type="text" class="form-control" name="product_qty[]" id="product_qty[]" aria-describedby="product_qty[]"  value="<?=$product_qty?>" placeholder="Quantity" style="width: 10%;float: left;">-->
  		<!--	<input type="text" class="form-control" name="product_price[]" id="product_price[]" aria-describedby="product_price[]"  value="<?=$product_price?>" placeholder="Price" style="width: 10%;float: left;">-->
  		<!--</div>-->
  		<!--</div>-->
            <!--<div class="form-group"><br></div>-->
              						
             <?php
                $total += $product_price;
                $ctr++;
              }
             ?>
             
             
             <tr style="line-height: 45px; border-top: 1px solid #ccc;">
                <td align="center" style="width:40px"></td>
                <td align="center"></td>
                <td align="center"><b>Total</b></td>
                <td align="center"><input type="text" class="form-control" style="border: 0px none; text-align: center; background-color: transparent;" name="totalprice" id="totalprice"  readonly></td>
                <td align="center"><input type="text" class="form-control" style="border: 0px none; text-align: center; background-color: transparent;" name="gsttotalprice" id="gsttotalprice"  readonly></td>
            </tr> 
             
             </table>
              
              <br><br>
              
              </div>
              						<?php if($status!='Closed') {?><input type="submit" name="submit" value="Close Order!!" id="submit" class="btn btn-rose btn-round"/><?php }
              						else{
              						?>
              						<input type="button" name="invoice" onclick="location.href='https://spatto.biz/user/orders-history.php';" value="Back" id="invoice" class="btn btn-rose btn-round"/>
              						
              						<?php
              						}
              						?>
              						
              						
              						<div style="text-align: right; float: right;"><input type="button" value="Print!!" class="btn btn-rose btn-round" onclick="printDiv()" style=""></div>
              						
              						<!--<input type="button" name="btnprint" value="Print" onclick="PrintMe('GFG')"/>-->
              						<!--<input type="button" name="invoice" onclick="location.href='order-invoice.php?oid=<?=$oid?>';" value="View Order!!" id="invoice" class="btn btn-rose btn-round"/>-->
              						
             </form> 						
			
			
			
        </div>
        
        
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
    
	    
		
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

<script src="vendor/datatables/datatables.min.js"></script>

<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>

<script>
$('input').on('input',function(i,v){

    var pricesum = 0;
    $('.product_price').each(function() {
        pricesum += Number($(this).val());
    });
    $("#totalprice").val(pricesum);
    
    // var gst_pricesum = 0;
    // $('.product_gsttotalprice').each(function() {
    //     gst_pricesum += Number($(this).val());
    // });
    // $("#totalprice").val(gst_pricesum);
    
    
});


            
            
            
        </script> 

<script>
$(document).ready(function() {
   var t = $('#datatable').DataTable( {
        lengthChange: !1,
            buttons: ["print", "excel", "pdf", "colvis"],
            select: !0,
            columnDefs: [ {
            'searchable': false,
            'orderable': false,
            'targets':3, 
            'type':"date-eu"
        } ],
            order: [[ 3, 'desc' ]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //debugger;
            var index = iDisplayIndexFull + 1;
            $("td:first", nRow).html(index);
            return nRow;
        }
    } ).buttons().container().appendTo("#datatable_wrapper .col-md-3:eq(0)");
    
    
} );

</script>

<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > ');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
<script language="javascript">
function PrintMe(DivID) {
var disp_setting="toolbar=yes,location=no,";
disp_setting+="directories=yes,menubar=yes,";
disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(DivID).innerHTML;
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title>My Title</title>');
   docprint.document.write('<style type="text/css">body{ margin:0px;');
   docprint.document.write('font-family:verdana,Arial;color:#000;');
   docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
   docprint.document.write('a{color:#000;text-decoration:none;} </style>');
   docprint.document.write('</head><body onLoad="self.print()"><center>');
   docprint.document.write(content_vlue);
   docprint.document.write('</center></body></html>');
   docprint.document.close();
   docprint.focus();
}
</script>
</body>
</html>
