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
        <small>Update PAN Card</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update PAN Card</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff">
        <div class="box-header with-border">
         <h3 class="box-title">Update PAN Card</h3>
        </div>
		
	  
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
<script>
function validateForm(formId)
        {
            var inputs, index;
            var form=document.getElementById(formId);
            inputs = form.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                // deal with inputs[index] element.
                if (inputs[index].value==null || inputs[index].value=="")
                {
                    alert("Pan no. can not be empty. Please enter pan no. and try again.");
                    return false;
                }
            }
        }
</script>
              <form method="post" name="form" action="submit-pan.php" enctype="multipart/form-data" onsubmit="return validateForm('form');">
              				
              				                                      <br />
              														<?php
              												if(@$_GET['msg']!=""){				
              											?>				
              											<!--<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:visible;"><?=@$_GET['msg']?></span>-->
              											<!--			<br /><br />-->
              											<?php
              												}
              											?>
              														
              											<?php
              											    $sql = "SELECT  `panimage`, `afront`, `aback`, `panstatus`, `idstatus` FROM `bank` WHERE `jid` = '$mid'";
              											    $result = @mysqli_query($s_dbid,$sql);
              											    list($panimage,$afront,$aback,$panstatus,$idstatus) = @mysqli_fetch_row($result);
              											    
              											?>			
              											
              													
              														
              													
              													  <table width="95%" border="0" align="center">
              														  <tbody>
              															<tr>
              															  <td width="60%" height="150" align="center">
              															      <?php
              															      if($panimage=="" || $panstatus=="Rejected"){
              															      ?>
              															      <input name="panimage" type="file" style="opacity: 1; height: 24px; margin-top: 10px; font-size: 12px;" />
              															      <?php
              															      }
              															      else{
              														          ?>
              														          <img src="uploads/<?=$panimage?>" style="height:150px;">
              														          <?php
              															      }
              															      ?>
              															  </td>
              															  <td width="35%" align="left" valign="top">
																			  
              															      <?php
              															      if($panimage=="" || $panstatus=="Rejected"){
              															          
              															          echo "<font color='red'>Your Pan Card was rejected pls upload documents to verify again.<br><br></font>";
              															      ?>
              															      
              																  <div style="padding-left: 20px;">
              																  <p style="font-size: 12px;">PAN Card No.*										        </p>
              																  <p style="font-size: 12px;">
              																	<input type="text" name="pancard" id="pancard" style="font-size: 12px; width: 80%; height: 30px;"  pattern="\S+" required/>
              																  </p>
              																  </div>
              																  <?php 
              															      } 
              																  else{
              																      echo $panstatus;
              																  }
              																  ?>
																				  
              																</td>
              															  
              															</tr>
              															<tr>
              															  <td height="10" colspan="2" align="center">&nbsp;</td>
           															    </tr>
              															<tr>
              															  <td colspan="2">
																			
              																<p style="font-size: 16px;">Guidelines for Pan Card Upload</p>
              														        <ul style="font-size: 14px;">
              														          <li>Image size should be 200px width &amp; 200px height for better view.</li>
              														          <li>Uploaded image should be clearly visible.</li>
              														          <li>Blur Image will not be accepted.</li>
              														          <li>Identification number of your Identity card must be clearly visible.</li>
              												              </ul>										      </td>
																			
           															    </tr>
              															
              														  </tbody>
              														</table>
              													
              												
              														
              				
              				                                        
                <div class="form-group label-floating">
              				                                            
              				
              				 
              											<?php
              												if(@$_GET['errmsg']!=""){				
              											?>				
              											<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:visible;"><?=@$_GET['errmsg']?></span>
              											<?php
              												}
              											?>
              				<br><br>
              				                                    <?php
              				    							      if($panimage=="" || $panstatus="Rejected"){
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
