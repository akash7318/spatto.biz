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
        Wallet
        <small>Wallet Statement</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wallet Statement</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff">
        <div class="box-header with-border">
         <h3 class="box-title">Wallet Statement</h3>
        </div>
		
	  
        <div class="box-body">
         <div>
              <p >Note : Transactions are including TDS and Other deductions. </p>
              <b>Current Balance : Rs. <?=round($wallet,2)?>/- </b>
            </div>
          </div>
		<table id="datatable" class="table table-striped">
      <thead>
      <tr>
		        <th>#</th>
		        <th style="display: none;">Sno</th>
		        <th>Date</th>
		        <th>Transaction Type</th>
		        <th>Cr Amount</th>
		        <th>Dr Amount</th>
		        <th>Remarks</th>
		        <th>Old Balance</th>
                <th>Balance</th>
      </tr>
      </thead>
      <tbody>
		      <?php
		      
		        $cnt=1;
		        $cramt1=0;
		        $cramt=0;
		        //$sql = "SELECT `comm`, `remarks`, `ttime`,`amount`, `wdate`, `wtype`, `remark`,b.status FROM `inv_transactions` b LEFT OUTER JOIN `withdraw` ON (0) WHERE  mid = '$mid' UNION ALL SELECT `comm`, `remarks`, `ttime`,`amount`, `wdate`, `wtype`, `remark`,b.status FROM `inv_transactions` b RIGHT OUTER JOIN `withdraw` ON (0) WHERE  jid = '$mid' order by ttime,wdate";
		        $sql = "SELECT b.id,`comm`,`remarks`, IFNULL(ttime, wdate) AS tdate,`amount`, `wtype`, `remark`,b.status,rname FROM `inv_transactions` b LEFT OUTER JOIN `withdraw` ON (0) WHERE  mid = '$mid' and `remarks` NOT IN ('iWallet Fund Transfer from Admin','iWallet Funds','iWallet Transfer')  and `remarks` NOT LIKE 'Token%' and `remarks` NOT LIKE 'Monthly Cashback Income' UNION ALL SELECT withdraw.id,`comm`, `remarks`, IFNULL(wdate,ttime) AS tdate,`amount`, `wtype`, `remark`,b.status,rname FROM `inv_transactions` b RIGHT OUTER JOIN `withdraw` ON (0) WHERE  jid = '$mid' and wtype not like 'iWallet%' and remark not like ('VTC Sale to Wallet') order by  tdate asc,comm desc,id asc";
		        $oldbal=$bal=0;
		       
		        $result = mysqli_query( $s_dbid, $sql );
		        while (list( $id,$comm, $remarks, $tdate, $amount, $wtype,$remark,$status,$rname ) = mysqli_fetch_row( $result )) {
		        	
		        
		        
		        if($status!="Unconfirmed"){
		        if($comm>0){
		            if(strpos($remarks, 'Wallet Transfer') !== false || strpos($remarks, 'Fund Transfer') !== false){
		                $cramt += $comm;
		                $detail = $remarks." to ".strtoupper($rname);
		            }
		            else{
		                $cramt += $comm-($comm/100)*10;
		                $detail = $remarks;    
		            }
		            
		            $dramt = 0;
		            $bal += $cramt;
		            $tdate = $tdate;
		            
		            $transtype = "Cr";
		        }
		        else{
		            $cramt = 0;
		            $dramt = $amount;
		            $bal -= $dramt;
		            $tdate = $tdate;
		            $detail = $wtype." - ".$remark;
		            $transtype = "Dr";
		        }
		        
		        ?>
		        
		       <tr>
		      	<td><?=$cnt?></td>
		      	<td style="display: none;"><?=$cnt?></td>
		      	<td><?=$tdate?></td>
		      	<td><?=$transtype?></td>
		      	<td><?=$cramt?></td>
		      	<td><?=$dramt?></td>
		      	<td><?=$detail?></td>
		      	<td><?=$oldbal?></td>
		      	<td><?=$bal?></td>
		       </tr>
		      <?php 
		      $dramt=$cramt=0;
		      $oldbal=$bal;
		      $cnt++;
		      }
		        }
		       // echo $cramt1;
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
	   order: [[ 1, 'desc' ]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
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

</body>
</html>
