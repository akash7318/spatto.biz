<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php
if(isset($_POST['select_date'])){
$select_date = @$_POST['select_date'];
}
else{
    $select_date = @date("m/d/Y")." - ".@date("m/d/Y");
}

$len = strrpos(@$select_date," - ");

$date1 = substr(@$select_date,0,$len);
$date2 = substr(@$select_date,$len+3);

$odate1 = substr(@$select_date,0,$len);
$odate2 = substr(@$select_date,$len+3);

$date1 = date('Y-m-d', strtotime(@$date1));
$date2 = date('Y-m-d', strtotime(@$date2));

// if(isset($_POST['package'])){
// $s_package = @$_POST['package'];
// }
// else{
    $s_package = "";
//}



?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Orders
        <small>Order List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer Billed Orders</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div  style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Customer Billed Orders</h3>

          
        </div>
        <div class="box-body">
 <!--         <form name="range" action="<?=$_SERVER['PHP_SELF']?>" method="post">  -->
 <!--<div class="col-lg-2" style="float:left">-->
 <!--       <div class="row">-->
              
 <!--             <input id="select_date" name="select_date" value="<?php echo $odate1.' - '.$odate2; ?>" type="text" placeholder="Select Date" class="js-date-range form-control">-->
            
            
 <!--       </div>-->
 <!-- </div> -->
 <!-- <div class="col-md-1" style="float:left">-->
 <!-- </div>-->
 <!-- <div class="col-lg-2" style="float:left">-->
 <!--       <div class="row">-->
            

            
 <!--       </div>-->
 <!-- </div>-->
 <!-- <div class="col-md-1" style="float:left">-->
 <!-- </div>-->
 <!-- <div class="col-lg-2" style="float:left">-->
 <!--       <div class="row">-->
 <!--           <input type="submit" value="Submit">-->
 <!--       </div>-->
 <!-- </div>            -->
 <!-- </form>-->
<!--		<br>-->
<!--<br>-->
	
		<table id="datatable" class="table table-bordered table-striped">
  <thead>
  <tr>
	<th align='left' scope="col">#</th>								
	<th align='left' scope="col">Customer Name</th>
	<th align='left' scope="col">Customer A/C Code</th>
	<th align='left' scope="col">Order Date</th>
	<!--<th align='center' scope="col">Status</th>-->
	<th align='left' scope="col"></th>
  </tr>
  </thead>
  <tbody>
	<?php 

  $sno =0;
  $sql  = "SELECT `id`, `mid`, `sid`, `order_date`,`status` FROM `orders` WHERE mid = '$mid' and status= 'Closed'";
  $result = mysqli_query($s_dbid,$sql);
  $cnt=1;

  while(list($oid,$mid,$sid,$order_date,$status) = @mysqli_fetch_row($result)){

//   $sql2 ="SELECT `name`, `state`, `city`, `address`, `pincode`, `landmark` FROM `join_store` WHERE id = '$sid'";
//   $result2 = mysqli_query($s_dbid,$sql2);    
//   list($store_name,$state,$city,$address,$pincode,$landmark)  = @mysqli_fetch_row($result2);

$sql2 ="SELECT `name`, `username` FROM `join` WHERE  id = '$mid'";
  $result2 = mysqli_query($s_dbid,$sql2);    
  list($customer_name,$customer)  = @mysqli_fetch_row($result2);



?>  
<tr>
    <td align='left'></td>
    <td align='left'><?=$customer_name?></td>
    <td align='left'><?=$customer?></td>
    <td align='left'><?=date("d-m-Y",strtotime($order_date))?></td>
    <!--<td align='center'>Delivered</td>-->
    <td align='left'>
        <form method="post" action="order_detail.php">
          <input type="hidden" name="oid" value="<?=$oid?>">
          <input type="submit" name="submit" value="Order Detail"/>
        </form>
    </td>
</tr>
<?php		
//$cnt++;
}




?>
  </tbody>
</table>	
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
