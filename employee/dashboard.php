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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<p>Your refer link is :  <a href="http://spatto.biz/employee/signup.php?ref=<?=$username?>">http://spatto.biz/employee/signup.php?ref=<?=$username?></a>&nbsp;&nbsp;&nbsp;  
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=http://spatto.biz/employee/signup.php?ref=<?=$username?>" style="color: #3b5998" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a> &nbsp;

                                <a href="https://twitter.com/intent/tweet?source=http://spatto.biz/employee/signup.php?ref=<?=$username?>" style="color: #00acee" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>&nbsp;

                                <a href="whatsapp://send?text=click on the link to register : http://spatto.biz/employee/signup.php?ref=<?=$username?>" data-action="share/whatsapp/share" style="color: green"><i class="fa fa-whatsapp fa-2x"></i></a>
                            </p>
		<hr style="border-top: 1px solid #37acc1;">
	<?php 
					$gsql  = "SELECT title FROM `gnews` order by id desc";
					$gresult = @mysqli_query($s_dbid,$gsql);
					list($gdetail) = @mysqli_fetch_row($gresult);
					if($gdetail!=""){
					?> 	
	 <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Latest News</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
			  
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                   
										<span class="marquee" style="font-size: 3rem; font-weight: bold">Dear User - 
										<h4><?php echo htmlspecialchars_decode($gdetail)?></h4>
										</span>
                                                        
                                                         
                  </p>

                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
			   
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>	
	<?php
					}
				  ?> 
	<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=round($wallet,2)?><sup style="font-size: 20px">Rs</sup></h3>

              <p>Main Wallet</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=round($w_amt,2)?><sup style="font-size: 20px">Rs</sup></h3>

              <p>Total Withdrawal</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$dusers?></h3>

              <p>Direct Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$my_users?></h3>

              <p>Total Downline</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->	
	
		

		
	  
      <!-- Small boxes (Stat box) -->
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
			
          <!-- Custom tabs (Charts with tabs)-->
          
          <!-- /.nav-tabs-custom -->

          <div class="row">
  	<div class="col-lg-4">
  		<div class="nav-tabs-custom">
			
			<ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i> Member Details</li>
            </ul>
			
			
  		
  		
  		  
  		
  		<table class="table" style=" text-align:left;">
  		
  		  <tbody>
  		<?php
$username = @$_SESSION['username'];
$name = @$_SESSION['name'];
      ?>
  		     <tr> <td>User ID</td> <td><span id="ctl00_ContentPlaceHolder1_lbluserid"><?=$username?></span></td>   </tr>
  		   <tr> <td>Name</td> <td><span id="ctl00_ContentPlaceHolder1_lblname"><?=$name?></span></td>   </tr>
  		
  		   <tr> <td>Email ID</td> <td><span id="ctl00_ContentPlaceHolder1_lblemailid"><?=$email?></span></td>   </tr>
  		   <tr> <td>Mobile</td> <td><span id="ctl00_ContentPlaceHolder1_lblmobile"><?=$phone?></span></td>   </tr>
  		   <tr> <td>Joining Date : </td> <td><span id="ctl00_ContentPlaceHolder1_lbljoindate"><?=$jdate?></span></td>   </tr>
  		   <tr> <td>Activation Date : </td> <td><span id="ctl00_ContentPlaceHolder1_lbljoindate"><?=$sdate?></span></td>   </tr>
  		   <tr> <td>Status </td> <td>
  			   <a id="ctl00_ContentPlaceHolder1_hlink" class="btn btn-success btn-xs"><span id="ctl00_ContentPlaceHolder1_lblstatus"></span><div class="ripple-container"></div></a>
  			   <?=$status?>
  			   </td>   </tr>
  		
  		   </tbody>
  		   </table>
  		  
  		<!--    <a href="updateinfo.php" class="btn btn-rose btn-round">Update Profile</a>-->
  		                                </div>
  		
  		
  		<!--  <h1 style=" width:100%; float:left; height:38px; margin:0px;"></h1>-->
  		
  		</div>
  	</div>
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          
          <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

          <!-- Calendar -->
          
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

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


<!-- PH Amount Modal  -->
        

        <!-- Pay now modal -->
        

        <!-- GH more details modal -->
        

        <!-- Happiness Letter Modal  -->
        

        <!-- Celebration Modal -->
        

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

<script type="text/javascript" src="assets/dashboard_v3.js"></script>

</body>
</html>
