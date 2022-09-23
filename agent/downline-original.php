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

if(isset($_POST['package'])){
$s_package = @$_POST['package'];
}
else{
    $s_package = "";
}



?>

<?php
function getusers($snode){
    global $s_dbid,$pid,$cnt,$sno,$records_ref,$date1,$date2,$s_package;
            
        $sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal,package FROM `join` WHERE `sponsor` = '$snode' order by id";  
        $result = mysqli_query($s_dbid,$sql);

        if(mysqli_num_rows($result)>0){
            while(list($mid,$name,$username,$email,$phone,$sponsor,$jdate,$direct,$package) = @mysqli_fetch_row($result)){
                $ruser = $username;
                $cnt=1;
                getlvls(strtolower($ruser),strtolower($_SESSION['username']));
                $level = $cnt;
                $sno++;
                if($date1==$date2){    
                    $sqlinv  = "SELECT amount,status,DATE_FORMAT(sdate, '%d-%m-%Y'),plan FROM `investment` WHERE `mid` = '$mid' ";
                }
                else{
                    $sqlinv  = "SELECT amount,status,DATE_FORMAT(sdate, '%d-%m-%Y'),plan FROM `investment` WHERE `mid` = '$mid' and sdate >='$date1' and sdate <= '$date2' ";
                }
                if($s_package!=""){
                    $sqlinv  = "SELECT amount,status,DATE_FORMAT(sdate, '%d-%m-%Y'),plan FROM `investment` WHERE `mid` = '$mid' and sdate >='$date1' and sdate <= '$date2' and amount ='$s_package' ";
                }
                
                $resultinv = mysqli_query($s_dbid,$sqlinv);
                list($amount,$status,$sdate,$package) = mysqli_fetch_row($resultinv);
                $status = strtolower($status);
                $sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
                $resultsp = mysqli_query($s_dbid,$sqlsp);
                list($sponsorname) = mysqli_fetch_row($resultsp);
                if(strtolower($status)!="active"){ $status="Pending";}
                //".$sno."
                $status = strtolower($status);
                if($amount=="11800"){
                    $package = "Travel Package";
                }
                if($date1==$date2){
					//if($s_package!="" && $amount==$s_package){
                	echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$username."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$amount."</td><td align='center'> ".$package."</td><td align='center'> ".$level."</td></tr>";
					//}
                }
                else{
                    
                    if($amount!=""){
                        echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$username."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$amount."</td><td align='center'> ".$package."</td><td align='center'> ".$level."</td></tr>";
                    }
                }
                //echo $ruser."<br>";
                getusers($ruser);   
            }
        }
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Network
        <small>Downline</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Downline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div  style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Downline</h3>

          
        </div>
        <div class="box-body">
          <form name="range" action="<?=$_SERVER['PHP_SELF']?>" method="post">  
 <div class="col-lg-2" style="float:left">
        <div class="row">
              
              <input id="select_date" name="select_date" value="<?php echo $odate1.' - '.$odate2; ?>" type="text" placeholder="Select Date" class="js-date-range form-control">
            
            
        </div>
  </div> 
  <div class="col-md-1" style="float:left">
  </div>
  <div class="col-lg-2" style="float:left">
        <div class="row">
            <select name="package" id="package">
                          <option value="">Select Package</option>
				
                          <option value="1000" <?php if($s_package==1000) { echo "selected"; }?>>&#8377; 1000</option>
                          <option value="2000" <?php if($s_package==2000) { echo "selected"; }?>>&#8377; 2000</option>
                          <option value="3000" <?php if($s_package==3000) { echo "selected"; }?>>&#8377; 3000</option>
                          <option value="5000" <?php if($s_package==5000) { echo "selected"; }?>>&#8377; 5000</option>
                          <option value="8000" <?php if($s_package==8000) { echo "selected"; }?>>&#8377; 8000</option>
                          <option value="12000" <?php if($s_package==12000) { echo "selected"; }?>>&#8377; 12000</option>
						  <option value="12000" <?php if($s_package==25000) { echo "selected"; }?>>&#8377; 25000</option>
						  <option value="12000" <?php if($s_package==50000) { echo "selected"; }?>>&#8377; 50000</option>
                        </select>

            
        </div>
  </div>
  <div class="col-md-1" style="float:left">
  </div>
  <div class="col-lg-2" style="float:left">
        <div class="row">
            <input type="submit" value="Submit">
        </div>
  </div>            
  </form>
		<br>
<br>
	
		<table id="datatable" class="table table-bordered table-striped">
  <thead>
  <tr>
	<th align='center' scope="col">#</th>								
	<th align='center' scope="col">Name</th>
	<th align='center' scope="col">Username</th>
	<th align='center' scope="col">Sponsor</th>
	<th align='center' scope="col">Direct</th>
	<th align='center' scope="col">Joining Date</th>
	<th align='center' scope="col">Activation Date</th>
	<th align='center' scope="col">Status</th>
	<th align='center' scope="col">Package</th>
	<th align='center' scope="col">Investment Type</th>
	<th align='center' scope="col">Level</th>
  </tr>
  </thead>
  <tbody>
	<?php 
  $sql1  = "SELECT sdate FROM `investment` WHERE `mid` = '$mid' and status = 'active' ";
  $result1 = mysqli_query($s_dbid,$sql1);
  list($sdate) = mysqli_fetch_row($result1);

  $sno =0;

  $sql  = "SELECT `join`.id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal,investment.plan FROM `join` LEFT JOIN investment ON `join`.id = investment.mid WHERE `sponsor` = '$username' order by investment.id;";
  $result = mysqli_query($s_dbid,$sql);
  $cnt=1;

  while(list($mid,$name,$luser,$email,$phone,$sponsor,$jdate,$direct,$package) = @mysqli_fetch_row($result)){


  $ruser = $luser;
  
  $level = 1;
  $sqlinv  = "SELECT amount,status,DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$mid' ";
  $resultinv = mysqli_query($s_dbid,$sqlinv);
  list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
  
  if($status!=""){    
  $sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
  $resultsp = mysqli_query($s_dbid,$sqlsp);
  list($sponsorname) = mysqli_fetch_row($resultsp);
  if(strtolower($status)!="active"){ $status="Pending";}
  if($luser!=""){
  $sno++;    
if($amount=="11800"){
    $package = "Travel Package";
}
  $status = strtolower($status);

$contractDateBegin = date('Y-m-d', @strtotime("01/01/2001"));
$contractDateEnd = date('Y-m-d', @strtotime("01/01/2012"));
$paymentDate=date('Y-m-d', @strtotime($sdate));  

  if($s_package!=""){



	if($amount == $s_package){  
		if($date1==$date2){
			echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$luser."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$amount."</td><td align='center'> ".$package."</td><td align='center'> ".$level."</td></tr>";
		}
		else
		{
			if (($paymentDate >= $date1) && ($paymentDate <= $date2)){
				echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$luser."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$amount."</td><td align='center'> ".$package."</td><td align='center'> ".$level."</td></tr>";
			}
		}
	}
  }
  else{
	if($date1==$date2){  
	echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$luser."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$amount."</td><td align='center'> ".$package."</td><td align='center'> ".$level."</td></tr>"; 
		
		
	}
	else
		{
			if (($paymentDate >= $date1) && ($paymentDate <= $date2)){
				echo "<tr><td align='center'></td><td align='center'>".$name."</td><td align='center'>".$luser."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$amount."</td><td align='center'> ".$package."</td><td align='center'> ".$level."</td></tr>";
			}
		}
  }


  }

  getusers($luser);   
  }
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
            'targets':6, 
            'type':"date-eu"
        } ],
            order: [[ 10, 'asc' ]],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            //debugger;
            var index = iDisplayIndexFull + 1;
            $("td:first", nRow).html(index);
            return nRow;
        }
    } ).buttons().container().appendTo("#datatable_wrapper .col-md-6:eq(0)");
    
    
} );

</script>

</body>
</html>
