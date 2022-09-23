<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php

$users = substr($_POST['users'],0,-1);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Network
        <small>Level Wise List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Level Wise List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff">
        <div class="box-header with-border">
         <a href="level-list.php">Level List : </a> <h3 class="box-title">Level Wise List : Level <?=$_POST['level']?></h3>
        </div>
		
	  
        <div class="box-body">
         
		<table id="datatable" class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Sponsor</th>
        <th scope="col">Direct</th>								
        <th scope="col">Joining Date</th>
        <th scope="col">Activation Date</th>
        <th scope="col">Status</th>
      </tr>
      </thead>
      <tbody>
	  	<?php 
	  	                                            
	  	                    $sno =0;                        
	  	                    $sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal FROM `join` WHERE `username` IN (".$users.") order by id ";
	  	                    $result = mysqli_query($s_dbid,$sql);
	  	
	  	                    while(list($mid,$name,$luser,$email,$phone,$sponsor,$jdate,$direct) = @mysqli_fetch_row($result)){
	  	            
	  	                    $sqlinv  = "SELECT amount,status,DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$mid' ";
	  	                    $resultinv = mysqli_query($s_dbid,$sqlinv);
	  	                    list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
	  	
	  	                    $sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
	  	                    $resultsp = mysqli_query($s_dbid,$sqlsp);
	  	                    list($sponsorname) = mysqli_fetch_row($resultsp);
	  	                    //if($status!="pending"){} else{ $amount=""; $status="";}
	  	                    if($luser!=""){
	  	                    $sno++;    
	  	                    echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$luser."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td></tr>";
	  	                    
	  	                    }
	  	                
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

</body>
</html>
