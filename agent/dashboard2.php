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
		
	<p>Your refer link is :  <a href="http://spattoservices.com/user/signup.php?ref=<?=$username?>">http://spattoservices.com/user/signup.php?ref=<?=$username?></a>&nbsp;&nbsp;&nbsp;  
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=http://spattoservices.com/user/signup.php?ref=<?=$username?>" style="color: #3b5998" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a> &nbsp;

                                <a href="https://twitter.com/intent/tweet?source=http://spattoservices.com/user/signup.php?ref=<?=$username?>" style="color: #00acee" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>&nbsp;

                                <a href="whatsapp://send?text=click on the link to register : http://spattoservices.com/user/signup.php?ref=<?=$username?>" data-action="share/whatsapp/share" style="color: green"><i class="fa fa-whatsapp fa-2x"></i></a>
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
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li><a href="#gh" data-toggle="tab">Last 5 Withdrawals</a></li>
              <li class="active"><a href="#ph" data-toggle="tab">Last 5 Earnings</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Transactions</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              
              <div class="chart tab-pane" id="gh" style="position: relative; height: 300px;">
				<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Last 5 Withdrawals</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
<!--
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Name</th>
					<th>User ID</th>   
					<th>Amount</th>     
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Global</td>
					<td>Global1</td>
					<td>1000$</td>  
                    <td><span class="label label-success">Completed</span></td>
					<td>2021-11-15</td>  
                  </tr>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Global</td>
					<td>Global1</td>
					<td>1000$</td>  
                    <td><span class="label label-warning">Completed</span></td>
					<td>2021-11-15</td>  
                  </tr>  
                  </tbody>
                </table>
-->
				<table id="datatable" class="table table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>User Id</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Remark</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
      </thead>
      <tbody>
      <?php
        $cnt=1;
        $sql = "select `join`.name,`join`.username,`amount`,`Status`,`wdate`,wtype,remark from `join`,withdraw where `join`.id = '$mid' and `join`.id=`withdraw`.jid and `wtype` NOT LIKE 'iWallet%' order by wdate desc limit 5";
        
        $result = mysqli_query( $s_dbid, $sql );
        while(list( $name, $username, $amt, $Status, $tdate, $wtype, $remark ) = mysqli_fetch_row( $result )){
            
        ?>
       <tr>
      	<td><?=$cnt?></td>
      	<td><?=$username?></td>
      	<td><?=$name?></td>
      	<td><?=$amt?></td>
      	<td><?=ucfirst($wtype)?></td>
      	<td><?=ucfirst($remark)?></td>
      	<td><?=$Status?></td>
      	<td><?=$tdate?></td>
       </tr>
      <?php $cnt++; }?>
      
      
      </tbody>
    </table>  
				  
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
<!--
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
-->
            <!-- /.box-footer -->
          </div>  
				</div>
			  <div class="chart tab-pane active" id="ph" style="position: relative; height: 300px;">	
				<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Last 5 Earnings</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
<!--
                <table class="table no-margin">
                  <tr>
                    <th>Order ID</th>
                    <th>Name</th>
					<th>User ID</th>   
					<th>Amount</th>     
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Global</td>
					<td>Global1</td>
					<td>1000$</td>  
                    <td><span class="label label-success">Completed</span></td>
					<td>2021-11-15</td>  
                  </tr>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Global</td>
					<td>Global1</td>
					<td>1000$</td>  
                    <td><span class="label label-warning">Pending</span></td>
					<td>2021-11-15</td>  
                  </tr>
				  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Global</td>
					<td>Global1</td>
					<td>1000$</td>  
                    <td><span class="label label-danger">Rejected</span></td>
					<td>2021-11-15</td>  
                  </tr>	  
                </table>
-->
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
		        
		            $sql = "select `join`.name,`join`.username,`comm`,`level`,`remarks`,`ttime`,`rname`,`status` from `join`,inv_transactions where `join`.id = '$mid' and `join`.id = mid and (`remarks` NOT LIKE 'iWallet Fund Transfer from Admin%' and remarks NOT IN ('iWallet Funds','iWallet Transfer','Wallet Transfer'))  order by inv_transactions.ttime desc limit 5";
		        
		        
		        
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
		        
		        if($remarks =="Token - Cashback Income"){
		        $sql_token = "SELECT token_value FROM `token_value` where tdate <= '$tdate' AND edate >= '$tdate'";
                $result_token = @mysqli_query($s_dbid,$sql_token);
                if(mysqli_num_rows($result_token)>0){
                    list($token_value) = @mysqli_fetch_row($result_token);
                    
                }
                else{
                    $sql_token = "SELECT token_value FROM `token_value` where edate <= '$tdate' order by id desc limit 1";
                    $result_token = @mysqli_query($s_dbid,$sql_token);
                    if(mysqli_num_rows($result_token)>0){
                        list($token_value) = @mysqli_fetch_row($result_token);
                    }
                }
                $amt = $amt - ($amt*10)/100;
                $damt = $amt/$token_value;
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
		      	<td><?=$tdate?></td>
		      	<td><?=$status?></td>
		       </tr>
		      <?php 
		      $cnt++;
		      }
		      ?>     
      </tbody>
    </table>	  
				  
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
<!--
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
-->
            <!-- /.box-footer -->
          </div>  
			  </div>
            </div>
          </div>
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
