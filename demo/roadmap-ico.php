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
        Spatto ICO Roadmap
        <small>Timeline</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Spatto ICO</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    1 Dec. 2021
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:00</span>

                <h3 class="timeline-header"><a href="#">Spatto Token</a> Launched</h3>

                <div class="timeline-body">
                  Spatto Token is virtual currency from Spatto Services launched with ICO of 100,000,00 Tokens. Spatto Token can be used for purchase at Spatto online website and Other Utilities. 10% Spatto Token is mandatory for account activation from 1 Dec 2021 onwards. <br>
                </div>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-university bg-aqua"></i>

              <div class="timeline-item">
                

                <h3 class="timeline-header no-border">Spatto Token is equivalent to company regulated value in INR, which will depend on token market cap and fluctuation of sale/purchase.</h3>
              </div>
            </li>
            <!-- END timeline item -->
            
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold (7th Dec 2021)
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">1st milestone achieved of selling 10 Lakh Spatto Tokens, now onwards rate of Spatto Token will be equivalent to 1.25₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    12.5 Lakh Spatto Token sold (24th Dec 2021)
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">2nd milestone achieved of selling 10 Lakh Spatto Tokens, now onwards rate of Spatto Token will be equivalent to 1.50₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">3rd milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 4₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">4th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 5₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">5th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 6₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">6th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 7₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">7th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 8₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">8th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 9₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-trophy bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header">9th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 10₹.</h3>
                
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
			  
			<!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    10 Lakh Spatto Token sold
                  </span>
            </li><!-- /.timeline-label -->
            <!-- timeline item -->
            <!--<li>-->
            <!--  <i class="fa fa-trophy bg-purple"></i>-->

            <!--  <div class="timeline-item">-->

            <!--    <h3 class="timeline-header">10th milestone achieved of selling 10 Lakh Spatto Tokens, rate of Spatto Token will be equivalent to 11₹.</h3>-->
                
            <!--  </div>-->
            <!--</li>-->
            <!-- END timeline item -->
            <!-- timeline item -->  
            
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
