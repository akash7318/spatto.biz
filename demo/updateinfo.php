<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php
$sql = "select `id` FROM `join_store` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
list($jid) = mysqli_fetch_row($result);

$sql = "select * FROM `join_store` where `username` = '$username';";           
$result = mysqli_query($s_dbid,$sql);
$data = mysqli_fetch_array($result);

$sql = "select * from bank_store where `jid` = '$jid'";
$result = mysqli_query($s_dbid,$sql);
$bank = mysqli_fetch_array($result);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Edit Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	<form method="post" action="update-profile.php"  id="personalform" enctype="multipart/form-data">	
	<div class=" col-sm-5" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
			
              				<div class="alert alert-info"> <strong>Personal Infomation</strong></div>
              				
              
              					
              						<div class="form-group">
			  							<label for="userid">User ID</label>
			  							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$username?>" readonly="">
              						</div>
              
              						<div class="form-group">
              							<label for="referalid">Referral ID</label>
              							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$sponsor?>" readonly="">
              						</div>
              						<div class="form-group">
              							<label for="email">Email</label>
              							<input name="email" class="form-control"  type="text" value="<?=$email?>" id="email" readonly/>
              						</div>
              
              						<div class="form-group">
              							<label for="name">Name </label>
              							<input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="<?=$name?>" required>
              						</div>
              						
              						<div class="form-group">
              							<label>Mobile Number</label>
			  							<input name="phone" type="text" value="<?=$phone?>" id="phone" class="form-control" placeholder="Mobile Number" readonly/>
              						</div>
              						
              						
			
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
    
    <div class=" col-sm-1" >
    </div>
    <div class=" col-sm-5" style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">&nbsp;</h3>
          
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
			
              				<!--<p><br><br><br></p>-->
              				
              
              					
              						
              						
              						<div class="form-group">
              							<label>City</label>
			  							<input name="city" type="text" value="<?=$data['city']?>" id="city" class="form-control" placeholder="City"/>
              						</div>
              						
              						<div class="form-group">
              							<label>State</label>
			  							<input name="state" type="text" value="<?=$data['state']?>" id="state" class="form-control" placeholder="State" />
              						</div>
              						
              						<div class="form-group">
              							<label>Address</label>
			  							<textarea name="address" class="form-control"><?=$data['address']?></textarea>
              						</div>
              						
              						<div class="form-group">
              							<label>Landmark</label>
			  							<input name="pincode" type="text" value="<?=$data['landmark']?>" id="landmark" class="form-control" placeholder="Landmark"/>
              						</div>
              						
              						<div class="form-group">
              							<label>Pincode</label>
			  							<input name="pincode" type="text" value="<?=$data['pincode']?>" id="pincode" class="form-control" placeholder="Pincode"/>
              						</div>
              						

              <br><br>
              
              					<input type="submit" name="ctl00$ContentPlaceHolder1$btnprofile" value="Update Personal Information" id="ctl00_ContentPlaceHolder1_btnprofile" class="btn btn-rose btn-round"/>
              

			
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      
     </form> 
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
</body>
</html>
