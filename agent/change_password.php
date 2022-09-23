<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php
$sql = "select `id` from `join` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);

$sql = "select * from `join` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
$data = mysqli_fetch_array($result);

$sql = "select * from bank where `jid` = '$jid'";
$result = mysqli_query($s_dbid,$sql);
$bank = mysqli_fetch_array($result);
?>
<script>
	function checkform() {
		if(document.pform.old.value == "") {
			alert("Please enter Current Password");
			return false;
		}
		
		if(document.pform.new1.value == "") {
			alert("Please enter New Password");
			return false;
		}
		
		if(document.pform.new2.value == "") {
			alert("Please confirm New Password");
			return false;
		}
		
		if(document.pform.new2.value != document.pform.new1.value) {
			alert("New Password must match with Confirm Password");
			return false;
		}

		return true;	
	}
	</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Change Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div class=" col-sm-6" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
			<form method="post" action="update-password.php" name="pform" id="pform" onsubmit="return checkform()">
              				<div class="alert alert-info"> <strong>Set New Password</strong></div>
              				
              
              					
              						<div class="form-group">
			  							<label for="userid">Current Password</label>
			  							<input name="old_passcode" type="password" id="old" class="form-control valid" />
              						</div>
              
              						<div class="form-group">
              							<label for="referalid">New Password</label>
              							<input name="new_passcode" type="password" id="new1" class="form-control valid" />
              						</div>
              						<div class="form-group">
              							<label for="email">Confirm New Password</label>
              							<input name="ctl00$ContentPlaceHolder1$txtconfirm" type="password" id="new2" class="form-control valid" />
              							 
              														<?php
              															if(@$_GET['errmsg']!=""){				
              														?>				
              														<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:visible;"><?=@$_GET['errmsg']?></span>
              														<?php
              															}
              														?>
              						</div>
              
              						
              
              
              					
              
              
              
              					<input type="submit" name="ctl00$ContentPlaceHolder1$btnprofile" value="Submit" id="ctl00_ContentPlaceHolder1_btnprofile" class="btn btn-rose btn-round"/>
              
              				
              				
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
</body>
</html>
