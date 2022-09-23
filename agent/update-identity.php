<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>

<?php
$sql = "select `name`,`email`,`mobile` from `join` where `username` = '$s_username';";           
$result = mysqli_query($s_dbid,$sql);
list($s_name,$s_email,$s_phone) = mysqli_fetch_row($result);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        KYC Documents
        <small>Update Aadhaar Card</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Aadhaar Card</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff">
        
		
	  
        <div class="box-body">
         
		  <?php
			if(@$_GET['msg']!=""){				
		  ?>				
		  <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:visible;"><?=@$_GET['msg']?></span>
					<br /><br />
		  <?php
			}
		  ?>
			  <?php
			      $sql = "SELECT  `panimage`, `afront`, `aback`, `panstatus`, `idstatus` FROM `bank` WHERE `jid` = '$mid'";
			      $result = @mysqli_query($s_dbid,$sql);
			      list($panimage,$afront,$aback,$panstatus,$idstatus) = @mysqli_fetch_row($result);
			  ?>	
              <form method="post" name="form" action="submit-identity.php" enctype="multipart/form-data">
              				UPLOAD YOUR AADHAAR CARD FRONT
              													
              													<div style=" padding: 10px;">	
              													  <table width="95%" border="0" align="center">
              														  <tbody>
              															<tr>
              															  <td width="29%" height="150" align="center">
              															      <?php
              				                								      if($afront==""){
              				                								    ?>	        
              															      <input name="idfront" type="file" style="opacity: 1; height: 24px; margin-top: 10px; font-size: 12px;" />
              															      <?php
              															      }
              															      else{
              														        ?>
              														          <img src="uploads/<?=$afront?>" style="height:150px;">
              														        <?php
              															      }
              															    ?>
              															 </td>
              															  <td width="35%" align="left" valign="top">
              															      <?php
              				                								      if($afront=="" || $idstatus=="Rejected"){
              				                								          if($idstatus=="Rejected") { echo "Your ID proof was rejected pls upload documents to verify again.<br><br>";}
              				                								    ?>
              																  <div style="padding-left: 20px;">
              																  <p style="font-size: 12px;">ID Proof Type *</p>
              																  <p style="font-size: 12px;">
              																	<select name="idtype" id="select" class="form-control"  style="font-size: 12px; width: 80%; height: 30px;"> 
              																	  <option>Select</option>
              																		<option value="Aadhaar Card">Aadhaar Card</option>
              																		<option value="Passport">Passport</option>
              																	</select>
              																  </p>
              																  <p style="font-size: 12px;">ID Proof No.*										        </p>
              																  <p style="font-size: 12px;">
              																   	        
              																	<input type="text" name="idnumber" id="textfield" style="font-size: 12px; width: 80%; height: 30px;" required/>
              																	
              																  </p>
              																  </div>
              																  <?php 
              															      } 
              																  else{
              																      echo $idstatus;
              																  }
              																  ?>
           																  </td>
           															    </tr>
              															<tr>
              															  <td height="10" colspan="2" align="center">&nbsp;</td>
           															    </tr>
              															<tr>
              															  <td height="150" colspan="2" valign="top"><p style="font-size: 16px;">Guidelines for Identity Card Upload</p>
                                                                            <ul style="font-size: 14px;">
                                                                              <li>Image size should be 200px width &amp; 200px height for better view.</li>
                                                                              <li>Uploaded image should be clearly visible.</li>
                                                                              <li>Blur Image will not be accepted.</li>
                                                                              <li>Identification number of your Identity card must be clearly visible.</li>
                                                                          </ul></td>
           															    </tr>
              															
              														  </tbody>
              														</table>
              													</div>	
	
              														
              				                                        <p>
				  
				  <hr>
</p>
              													UPLOAD YOUR IDENTITY CARD BACK
              													
              													
				<div style=" padding: 10px;">	
              													  <table width="95%" border="0" align="center">
              														  <tbody>
              					
              															<tr>
              															  <td width="29%" height="150" align="center">
              															    <?php
              				            								      if($aback==""){
              				            								    ?>	  
              																  <input name="idback" type="file" style="opacity: 1; height: 24px; margin-top: 10px; font-size: 12px;" />
              																<?php
              															      }
              															      else{
              														        ?>
              														          <img src="uploads/<?=$aback?>" style="height:150px;">
              														        <?php
              															      }
              															    ?>  
              															  </td>
              															  <td width="35%" align="left" valign="top">
              																  <div style="padding-left: 20px;">
              				<!--
              																  <p style="font-size: 12px;">ID Proof Type *</p>
              																  <p style="font-size: 12px;">
              																	<select name="select" id="select" class="form-control"  style="font-size: 12px; width: 80%; height: 30px;"> 
              																	  <option>Select</option>
              																	</select>
              																  </p>
              																  <p style="font-size: 12px;">ID Proof No.*										        </p>
              																  <p style="font-size: 12px;">
              																	<input type="text" name="textfield" id="textfield" style="font-size: 12px; width: 80%; height: 30px;"/>
              																  </p>
              				-->
              																  </div>
              																</td>
           															    </tr>
              															<tr>
              															  <td height="10" colspan="2" align="center">&nbsp;</td>
           															    </tr>
              															<tr>
              															  <td height="150" colspan="2" valign="top"><p style="font-size: 16px;">Guidelines for Identity Card Upload</p>
                                                                            <ul style="font-size: 14px;">
                                                                              <li>Image size should be 200px width &amp; 200px height for better view.</li>
                                                                              <li>Uploaded image should be clearly visible.</li>
                                                                              <li>Blur Image will not be accepted.</li>
                                                                              <li>Identification number of your Identity card must be clearly visible.</li>
                                                                          </ul></td>
           															    </tr>
              															
              														  </tbody>
              														</table>
              													</div>
              													
				<?php
																	if(@$_GET['errmsg']!=""){				
																?>				
																<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:visible;"><?=@$_GET['errmsg']?></span>
																<?php
																	}
																?>
																<br><br>
									
									                                    <?php
																	      if($afront==""){
																	    ?>
									                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary pull-right" />
									                                    <?php
																	      }
									                                    ?>
              
              				
              				
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
