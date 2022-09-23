<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>

<?php
$sql = "select `account_no`,`panimage`,`afront`,`aback`,`panstatus`, `idstatus`, `bank_status` from `bank` where `jid` = '$mid';";
$result = mysqli_query($s_dbid,$sql);
list($acctno,$pancard,$afront,$aback,$panstatus,$idstatus,$bank_status) = mysqli_fetch_row($result);





?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wallet
        <small>Withdrawal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Wallet Withdrawal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff" class="col-sm-6">
        
		<div class="box-header with-border">
         <h3 class="box-title">Wallet Withdrawal</h3>
        </div>
	  
        <div class="box-body">
         
		  <table class="table table-bordered table-striped text-center">
                          <tbody> 
                                
                          <tr class=" ">
                              <td><font color="#000" size="2"><?php
  								
                                if(@$_GET['msg']!=""){ echo @$_GET['msg']; }
  								
  								?></font></td>
                            </tr>  
                          
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

  
<script>

function check_amt(){
	
	var amt = document.getElementById("withrsc").value;
	var pamt = <?=$p_amt?>;
	if(amt>pamt){
		alert("Invalid Amount!!");
		document.getElementById("withrsc").value = <?=$p_amt?>;
	}
	else{
		document.getElementById("amount_final").value = document.getElementById("withrsc").value - (document.getElementById("withrsc").value/100)*<?=@$wded?>;
		
		document.getElementById("amount_ded").value = (document.getElementById("withrsc").value/100)*<?=@$wded?>; 
	}
}	
	

function validate(){
	
	var amt = document.getElementById("withrsc").value;
	if(amt<500){
		alert("Invalid Amount!! Minimum amount for withdrawal is 500.");
		document.getElementById("withrsc").value = <?=$p_amt?>;
		document.getElementById("amount_final").value = 0;
		document.getElementById("amount_ded").value = 0;
		return false;
	}
}
</script>

<script type="text/javascript">
            
            $("#otpbtn").on('click', function (){
                
                $.ajax({
                    url:'sendotp.php',
                    method:'post',
                    data: JSON.stringify({amt:$("#withrsc").val()}),
                    success:function(data){
                         
                         $("#otpmessage").css('color','orange');
                         
                         $("#otpmessage").html(JSON.parse(data).message);
                         document.getElementById("mainmsg").innerHTML = "";
                         setTimeout(function(){ $("#otpmessage").html("");}, 10000);
                         //alert(JSON.parse(data).output);
                    }
                })
            })
</script>
</body>
</html>
