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
    $select_date = date("m/d/Y")." - ".date("m/d/Y");
}
$len = strrpos(@$select_date," - ");

$date1 = substr(@$select_date,0,$len);
$date2 = substr(@$select_date,$len+3);

$odate1 = substr(@$select_date,0,$len);
$odate2 = substr(@$select_date,$len+3);

$date1 = date('Y-m-d', strtotime($date1));
$date2 = date('Y-m-d', strtotime($date2));
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Earning
        <small>Earning Statement</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Earning Statement</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff">
        <div class="box-header with-border">
         <h3 class="box-title">Earning Statement</h3>
        </div>
		
	  
        <div class="box-body">
         
		<div class="row">	
          <div class="col-lg-3" style="float:left">
        	            <form name="range" action="<?=$_SERVER['PHP_SELF']?>" method="post">    
            <div class="form-group">
              <!--<label for="select-date-ex1">Date Range</label>-->
              <input id="select_date" name="select_date" value="<?php echo $odate1.' - '.$odate2; ?>" type="text" placeholder="Select Date" class="js-date-range form-control">
            </div>
            <div class="col-lg-2" style="padding-left-:10px">
                <input type="submit" value="Submit">
            </div>
            </form>
        
  			</div>
 		  <div class="col-lg-6" style="float:left">
        
            Earned Total : <input type="text" readonly name="earned_total" id="earned_total" style="background-color:rgba(0, 0, 0, 0);color:red;border: none;outline:none;">
            &nbsp;&nbsp;
            TDS Total : <input type="text" readonly name="tds_total" id="tds_total" style="background-color:rgba(0, 0, 0, 0);color:red;border: none;outline:none;">
        
  </div>
		</div>	
			<br><br>
		
			<table id="datatable" class="table table-striped">
      <thead>
      <tr>
		        <th>#</th>
		        <th>User Id</th>
		        <th>Name</th>
		        <th>Income</th>
		        <th>TDS</th>
		        <th>Admin Charge</th>
		        <th>Dispatched Amt</th>
		        <th>Income Type</th>
		        <th>Date</th>
		        <th>Status</th>
        
      </tr>
      </thead>
      <tbody>
		      <?php
		        $cnt=1;
		        $tamt = 0;
		        $ttds = 0;
		        if($date1==$date2){
		            $sql = "select `join`.name,`join`.username,`comm`,`level`,`remarks`,`ttime`,`rname`,`status` from `join`,inv_transactions where `join`.id = '$mid' and `join`.id = mid and (`remarks` NOT LIKE 'iWallet Fund Transfer from Admin%' and remarks NOT IN ('iWallet Funds','iWallet Transfer','Wallet Transfer'))  order by inv_transactions.ttime";
		        }
		        else{
		            $sql = "select `join`.name,`join`.username,`comm`,`level`,`remarks`,`ttime`,`rname`,`status` from `join`,inv_transactions where `join`.id = '$mid' and `join`.id = mid and ttime >='$date1' and ttime <= '$date2' and (`remarks` NOT LIKE 'iWallet Fund Transfer from Admin%' and remarks NOT IN ('iWallet Funds','iWallet Transfer','Wallet Transfer'))  order by inv_transactions.ttime"; 
		        }
		        
		        $result = mysqli_query( $s_dbid, $sql );
		        while (list( $namet, $usernamet, $amt, $level, $remarks, $tdate,$rname,$status ) = mysqli_fetch_row( $result )) {
		        $tamt += $amt;	
		        $sql1 = "select name from `join` where username = '$rname'";
		        $result1 = mysqli_query( $s_dbid, $sql1 );
		        list($namer) = mysqli_fetch_row( $result1 );
		        if($remarks!="Wallet Transfer "){
		        $damt = $amt - ($amt*10)/100;
		      	  $tds = ($amt*5)/100;
		        }
		        else{
		            $damt = $amt;
		            $tds=0;
		        }
		        $ttds += $tds;
		        
		        if($remarks=="Cashback Income " || $remarks=="Round Table Bonus" || $remarks=="iWallet Deposit Trading Incentive" || $remarks == "iWallet Deposit Weekly Payout"){
		        $rname = $usernamet;
		        $namer = $namet;
		        }
		        else{
		      //      $rname = $usernamet;
		      //  $namer = $namet;
		      
		        }
		        ?>
		       <tr>
		      	<td><?=$cnt?></td>
		      	<td><?=$rname?></td>
		      	<td><?=$namer?></td>
		      	<td><?=$amt?></td>
		      	<td><?=$tds?></td>
		      	<td><?=$tds?></td>
		      	<td><?=$damt?></td>
		      	<td><?=$remarks?></td>
		      	<td><?=date('d-m-Y', @strtotime($tdate));?></td>
		      	<td><?=$status?></td>
		       </tr>
		      <?php 
		      $cnt++;
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

<!--<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>-->
<!--<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->




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
//   $('#datatable').DataTable({
// 	   "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
//             var index = iDisplayIndexFull + 1;
//             $("td:first", nRow).html(index);
//             return nRow;
//         }
//   })

var t = $('#datatable').DataTable( {
        lengthChange: !1,
            buttons: ["print", "excel", "pdf", "colvis"],
            select: !0,
            columnDefs: [ {
            'searchable': false,
            'orderable': false,
            'targets':8, 
            'type':"date-eu"
        } ],
            order: [[ 8, 'desc' ]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            var index = iDisplayIndexFull + 1;
            $("td:first", nRow).html(index);
            return nRow;
        }
    } ).buttons().container().appendTo("#datatable_wrapper .col-md-8:eq(0)");
   
	$('#select_date').daterangepicker()
   $('#earned_total').val(<?=$tamt?>);
    $('#tds_total').val(<?=$ttds?>); 
} );

	
</script>

</body>
</html>
