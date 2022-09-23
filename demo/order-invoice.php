<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
        <small>Order Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div  style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Order Detail</h3>

          
        </div>
        <div class="box-body">
 
	    
	    	<div class=" col-sm-7" style="background: #fff">
        
        <div class="box-body">
          
          <?php
          $oid = $_GET['oid'];

            $sql  = "SELECT `id`, `mid`, `sid`, `order_date` FROM `orders` WHERE id = '$oid'";
            $result = mysqli_query($s_dbid,$sql);
            list($id,$mid,$sid,$order_date) = @mysqli_fetch_row($result);
            
            $sql2 ="SELECT `name`, `username` FROM `join` WHERE  id = '$mid'";
            $result2 = mysqli_query($s_dbid,$sql2);    
            list($customer_name,$customer_user)  = @mysqli_fetch_row($result2);
            
            $sql2 ="SELECT `name`, `username` FROM `join_store` WHERE  id = '$sid'";
            $result2 = mysqli_query($s_dbid,$sql2);    
            list($store_name,$store_user)  = @mysqli_fetch_row($result2);
          
          ?>
			
  			
              
              
              <input type="hidden" name="sid" value="<?=$sid?>">
              <input type="hidden" name="mid" value="<?=$mid?>">
              <input type="hidden" name="oid" value="<?=$oid?>">
              
              <table style="border:1px solid #ccc;"  width="100%">
              <tr>
                  <td style="padding: 20px;">
                <table width="100%" border="0" cellpadding="4" cellspacing="4">
  <tbody>
    <tr style="line-height: 50px; font-weight: bold;">
      <td width="92">Code - <?=$store_user?></td>
      <td width="92" align="right">GST No. - </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><h2><?=$store_name?></h2></td>
    </tr>
    <tr>
      <td colspan="2"><hr></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0">
        <tbody>
          <tr style="line-height: 50px; font-weight: bold;">
            <td width="33%">Customer Code - <?=$customer_user?></td>
            <td width="33%" align="center"><b style="font-style: italic;">Call - </b></td>
            <td width="33%" align="right"> Date - <?=date("d-m-Y",strtotime($order_date))?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0">
        <tbody>
          <tr style="line-height: 50px; font-weight: bold;">
            <td width="50%" align="left">Name  - <?=$customer_name?></td>
            
            <td width="50%" align="right">Order No. - <?=$oid?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0">
        <tbody>
          <tr>
            <td width="6%" align="center" style="border: 1px solid black; border-collapse: collapse; height:50px; font-size: 16px;"><strong>#</strong></td>
            <td width="24%" align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 16px;"><strong>Item/HSN Code</strong></td>
            <td width="10%" align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 16px;"><strong>Qty</strong></td>
            <td width="10%" align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 16px;"><strong>Rate</strong></td>
            <td width="10%" align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 16px;"><strong>Bill</strong></td>
            <td width="10%" align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 16px;"><strong>Total</strong></td>
            <td width="20%" align="center" style="border: 1px solid black; border-collapse: collapse; font-size: 16px;"><strong>GST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total</strong></td>
          </tr>
          
          <?php
            $sql2 ="SELECT `product_name`, `product_qty`,`product_price` FROM `order_detail` WHERE  order_id = '$oid'";
            $result2 = mysqli_query($s_dbid,$sql2);    
            // $cnt = count(array_filter($_POST['product_name'], function($x) { return !empty($x); }));
              $ctr=1;
              while(list($product_name,$product_qty,$product_price) = @mysqli_fetch_row($result2)){
              ?>
              	<tr>
            <td align="center" style="border: 1px solid black; border-collapse: collapse; height:50px;"><?=$ctr?></td>
            <td align="center" style="border: 1px solid black; border-collapse: collapse;"><?=$product_name?></td>
            <td align="center" style="border: 1px solid black; border-collapse: collapse;"><?=$product_qty?></td>
            <td align="center" style="border: 1px solid black; border-collapse: collapse;"><?=$product_price?></td>
            <td align="center" style="border: 1px solid black; border-collapse: collapse;">&nbsp;</td>
            <td align="center" style="border: 1px solid black; border-collapse: collapse;">&nbsp;</td>
          </tr>
              					

              						
             <?php
                $ctr++;
              }
             ?> 
          
          
        </tbody>
      </table></td>
      
        
    </tr>
    <tr>
      <td colspan="2" >&nbsp;</td>
    </tr>
    <tr>
      <table style="width: 100%;">
          <tr  style="line-height: 100px; background-color: #F05A24;">
              <td width="33%" align="center"><h1 style="font-weight: bold;">हमारा वादा</h1></td>
              <td width="33%" align="center"><img src="spatto-logo-white.jpg" style="height: 60%; padding: 20px;"></td>
            <td width="33%" align="center"><h1 style="font-weight: bold;">सबका फायदा</h1></td>
          </tr>
      </table>
    </tr>
  </tbody>
</table>
                  </td>    
              <tr>
              </table>
              				
              						
              
              <br><br>						
              						<input type="submit" name="submit" value="Close Order!!" id="submit" class="btn btn-rose btn-round"/>
              						
             		
			
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

</body>
</html>
