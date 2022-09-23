<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php
function getbp($amount){
    // if($amount==11800){
    //     $points = 10;
    // }
    // elseif($amount==118000){
    //     $points = 100;
    // }
    // elseif($amount==12000){
    //     $points = 10;
    // }
    // elseif($amount==50000){
    //     $points = 50;
    // }
    // elseif($amount==28000){
    //     $points = 30;
    // }
    // elseif($amount==35000){
    //     $points = 40;
    // }
    // elseif($amount==55000){
    //     $points = 60;
    // }
    // elseif($amount==10000){
    //     $points = 10;
    // }
    // elseif($amount==70000){
    //     $points = 70;
    // }
    $points = round($amount/1000);
    return 0;
}
function getusers($snode){
    global $s_dbid,$pid,$cnt,$sno,$records_ref,$achieved_members2,$achieved_members2_total,$achieved_members3,$achieved_members3_total,$achieved_members4,$achieved_members4_total,$achieved_members5,$achieved_members5_total,$achieved_members6,$achieved_members6_total,$achieved_members7,$achieved_members7_total,$achieved_members8,$achieved_members9,$achieved_members10,$achieved_members11,$achieved_members12,$achieved_members13,$achieved_members14,$achieved_members15,$achieved_members16,$rdate2,$rdate3;
    
        $sql  = "SELECT `join`.id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal FROM `join`,`investment` WHERE `sponsor` = '$snode' and `join`.id=`investment`.mid order by sdate";
        $result = mysqli_query($s_dbid,$sql);

        if(mysqli_num_rows($result)>0){
            while(list($mid,$name,$username,$email,$phone,$sponsor,$jdate,$direct) = @mysqli_fetch_row($result)){
                $points=0;
                $ruser = $username;
                $cnt=1;
                getlvls(strtolower($ruser),strtolower($_SESSION['username']));
                $level = $cnt;
                $sno++;
                $sqlinv  = "SELECT amount,status,DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$mid' ";
                $resultinv = mysqli_query($s_dbid,$sqlinv);
                list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
                
                $points = getbp($amount);
                        
                //echo $ruser." ".$sdate."<br>";
                if($status=="active"){ 
                    if($level == 2){
                     $achieved_members2++; 
                     $achieved_members2_total+=$points; 
                    // echo $ruser." ".$sdate."<br>";
                     if($achieved_members2_total==40){ 
                        //echo $ruser." ".$sdate."<br>"; 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate2) = mysqli_fetch_row($resultinv);
                        
                     }
                    }
                    if($level == 3){
                     $achieved_members3++;
                     $achieved_members3_total+=$points; 
                     if($achieved_members3_total==80){ 
                        //echo $ruser." ".$sdate."<br>"; 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate3) = mysqli_fetch_row($resultinv);
                        
                     }
                    }
                    if($level == 4){
                     $achieved_members4++;  
                     $achieved_members4_total+=$points; 
                     if($achieved_members4_total==160){ 
                        //echo $ruser." ".$sdate."<br>"; 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate4) = mysqli_fetch_row($resultinv);
                        
                     }
                    }
                    if($level == 5){
                     $achieved_members5++;   
                     $achieved_members5_total+=$points; 
                     if($achieved_members5_total==320){ 
                        //echo $ruser." ".$sdate."<br>"; 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate5) = mysqli_fetch_row($resultinv);
                        
                     }
                    }
                    if($level == 6){
                     $achieved_members6++;
                     $achieved_members6_total+=$points; 
                     if($achieved_members6_total==640){ 
                        //echo $ruser." ".$sdate."<br>"; 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate6) = mysqli_fetch_row($resultinv);
                        
                     }
                    }
                    if($level == 7){
                     $achieved_members7++; 
                     $achieved_members7_total+=$points; 
                     if($achieved_members7_total==1280){ 
                        //echo $ruser." ".$sdate."<br>"; 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate7) = mysqli_fetch_row($resultinv);
                        
                     }
                    }
                    if($level == 8){
                     $achieved_members8++;   
                    }
                    if($level == 9){
                     $achieved_members9++;   
                    }
                    if($level == 10){
                     $achieved_members10++;   
                    }
                    if($level == 11){
                     $achieved_members11++;   
                    }
                    if($level == 12){
                     $achieved_members12++;   
                    }
                    if($level == 13){
                     $achieved_members13++;   
                    }
                    if($level == 14){
                     $achieved_members14++;   
                    }
                    if($level == 15){
                     $achieved_members15++;   
                    }
                    if($level == 16){
                     $achieved_members16++;   
                    }
                }
                
        
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
        <small>Rewards & Royalty</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rewards & Royalty</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		 
	<div  style="background: #fff">
        <div class="box-header with-border">
         <h3 class="box-title">Rewards - Royalty</h3>
        </div>
		
	  
        <div class="box-body">
         
		<table id="datatable" class="table table-striped">
      <thead>
      <tr>
        								
                        <th>S No.</th>
                        <th>Level</th>
                        <th>Required Business (Rs)</th>
                        <th>Your Business (Rs)</th>
                        <th>Qualify Date</th>
                        <th style="width: 300px;">Promotional Rewards</th>
                        <th>Eligibity</th>
                        <th>Status</th>
                        <th>Date</th>
      </tr>
      </thead>
      <tbody>
      <?php
                       $achieved_members1_total=0;
                       $sql1  = "SELECT amount FROM `join`,`investment` WHERE `dreferal` = '$username' and `join`.id = investment.mid and investment.status = 'active' order by investment.sdate asc ";
                          $result1 = @mysqli_query($s_dbid,$sql1);
                       //$achieved_members1_total = @mysqli_num_rows($result1);
                       while(list($amt)=mysqli_fetch_row($result1)){
                           $points = getbp($amt);
                           $achieved_members1_total+=$points;
                       }
                       
                       $sql1  = "SELECT `join`.username FROM `join`,`investment` WHERE `dreferal` = '$username' and `join`.id = investment.mid and investment.status = 'active' order by investment.sdate asc limit 1,1";
                          $result1 = @mysqli_query($s_dbid,$sql1);
                          $achieved_members1 = @mysqli_num_rows($result1);
                      
                          if($achieved_members1>0){ 
                             list($ruser) = mysqli_fetch_row($result1); 
                        $sqlr  = "SELECT id FROM `join` WHERE `username` = '$ruser' ";
                        $resultr = mysqli_query($s_dbid,$sqlr);
                        list($rid) = mysqli_fetch_row($resultr); 
                        
                        $sqlinv  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$rid' ";
                        $resultinv = mysqli_query($s_dbid,$sqlinv);
                        list($rdate1) = mysqli_fetch_row($resultinv);
                     }
                      
                      $sql1  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y') FROM `investment` WHERE `mid` = '$mid' and status = 'active' ";
                          $result1 = mysqli_query($s_dbid,$sql1);
                          list($sdate) = mysqli_fetch_row($result1);
                                                  
                          $sno =0;                        
                          $sql  = "SELECT `join`.id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal FROM `join` LEFT JOIN investment ON `join`.id = investment.mid WHERE `sponsor` = '$username' order by investment.id;";
                          $result = mysqli_query($s_dbid,$sql);
      
                          while(list($mid,$name,$luser,$email,$phone,$sponsor,$jdate,$direct) = @mysqli_fetch_row($result)){
                  		
                  		
                  		$ruser = $luser;
                  		$cnt=1;
                  		getlvls(strtolower($ruser),strtolower($_SESSION['username']));
                  		$level = $cnt;
                  		
                          $sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
                          $resultinv = mysqli_query($s_dbid,$sqlinv);
                          list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
      
                          
                          if($status=="active"){ 
                              if($level == 2){
                               $achieved_members2++;   
                              }
                              if($level == 3){
                               $achieved_members3++;   
                              }
                              if($level == 4){
                               $achieved_members4++;   
                              }
                              if($level == 5){
                               $achieved_members5++;   
                              }
                              if($level == 6){
                               $achieved_members6++;   
                              }
                              if($level == 7){
                               $achieved_members7++;   
                              }
                              if($level == 8){
                               $achieved_members8++;   
                              }
                              if($level == 9){
                               $achieved_members9++;   
                              }
                              if($level == 10){
                               $achieved_members10++;   
                              }
                              if($level == 11){
                               $achieved_members11++;   
                              }
                              if($level == 12){
                               $achieved_members12++;   
                              }
                              if($level == 13){
                               $achieved_members13++;   
                              }
                              if($level == 14){
                               $achieved_members14++;   
                              }
                              if($level == 15){
                               $achieved_members15++;   
                              }
                              if($level == 16){
                               $achieved_members16++;   
                              }
                          }
                          if($luser!=""){
                          $sno++;    
                          
                          getusers($luser);   
                          }
                      
                      }
                      
                          
                       
                       ?>
			
						<tr>
						   <td>1</td>
						   <td>1</td>
						   <td>10,000/-</td>
						   <td><?=$achieved_members1_total?></td>
						   <td><?=$rdate1?></td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">NA</td>
						   <td><?php if($achieved_members1_total>=20) { echo "Qualified";}?></td>
						   <td></td>
						   <td></td>
						</tr>
						 <tr>
						   <td>2</td>
						   <td>2</td>
						   <td>20,000/-</td>
						   <td><?=$achieved_members2_total?></td>
						   <td><?=$rdate2?></td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">NA</td>
						   <td><?php if($achieved_members2_total>=40) { echo "Qualified";}?></td>
						   <td></td>
						   <td></td>
						</tr>
						 <tr>
						   <td>3</td>
							<td>3</td>
							<td>50,000/-</td>
							<td><?=$achieved_members3_total?></td>
							<td><?=$rdate3?></td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">Shopping Voucher Rs. 2000/-</td>
							<td><?php if($achieved_members3_total>=80) { echo "Qualified";}?></td>
							<td></td>
						   <td></td>
						 </tr>
						 <tr>
						   <td>4</td>
						   <td>4</td>
						   <td>100,000/-</td>
						   <td><?=$achieved_members4_total?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">32Shopping Voucher Rs. 5000/-</td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
						</tr>
						<tr>
						  <td>5</td>
							<td>5</td>
							<td>200,000/-</td>
							<td><?=$achieved_members5_total?></td>
							<td>&nbsp;</td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">32&quot; LED TV or Rs 6000/- Cash</td>
							<td>&nbsp;</td>
							<td></td>
						   <td></td>
		    </tr>
						 <tr>
						   <td>6</td>
						   <td>6</td>
						   <td>500,000/-</td>
						   <td><?=$achieved_members6_total?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">Android Mobile Phone or Rs 10,000/- Cash</td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
						</tr>
						<tr>
						  <td>7</td>
							<td>7</td>
							<td>10,00,000/-</td>
							<td><?=$achieved_members7_total?></td>
							<td>&nbsp;</td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">5% Royalty CTO Life Time</td>
							<td>&nbsp;</td>
							<td></td>
						   <td></td>
		    </tr>
						 <tr>
						   <td>8</td>
						   <td>8</td>
						   <td>25,00,000/-</td>
						   <td><?=$achieved_members8?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">Suzuki Access 125 CC or Rs 50,000/- Cash</td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
						</tr>  
						<tr>
						  <td>9</td>
							<td>9</td>
							<td>50,00,000/-</td>
							<td><?=$achieved_members9?></td>
							<td>&nbsp;</td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">4% Royalty CTO Life Time</td>
							<td>&nbsp;</td>
							<td></td>
						   <td></td>
		    </tr>
						 <tr>
						   <td>10</td>
						   <td>10</td>
						   <td>100,00,000/-</td>
						   <td><?=$achieved_members10?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive"><div title="Page 1">
						     <div>
						       <div>
						         <div>
						           <p>100 Gram 24 CT Gold or R 300,000 Cash </p>
					             </div>
					           </div>
					         </div>
						     </div></td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
						</tr>
						<tr>
						  <td>11</td>
							<td>11</td>
							<td>250,00,000/-</td>
							<td><?=$achieved_members11?></td>
							<td>&nbsp;</td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">Honda City Car or Rs 800,000/- Cash</td>
							<td>&nbsp;</td>
							<td></td>
						   <td></td>
		    </tr>
						 <tr>
						   <td>12</td>
						   <td>12</td>
						   <td>500,00,000/-</td>
						   <td><?=$achieved_members12?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">2% Royalty CTO Life Time</td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
						</tr>
						<tr>
						  <td>13</td>
							<td>13</td>
							<td>1000,00,000/-</td>
							<td><?=$achieved_members13?></td>
							<td>&nbsp;</td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">Fortuner Car  or Rs&nbsp;3,000,000/- Cash</td>
							<td>&nbsp;</td>
							<td></td>
						   <td></td>
		    </tr>
						 <tr>
						   <td>14</td>
						   <td>14</td>
						   <td>2500,00,000/-</td>
						   <td><?=$achieved_members14?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">1.5% Royalty CTO Life Time</td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
						</tr>
						<tr>
						  <td>15</td>
							<td>15</td>
							<td>5000,00,000/-</td>
							<td><?=$achieved_members15?></td>
							<td>&nbsp;</td>
							<td bordercolor="#DAD6D6" class="table-hover table-responsive">1% Royalty CTO Life Time</td>
							<td>&nbsp;</td>
							<td></td>
						   <td></td>
		    </tr>
						 <tr>
						   <td>16</td>
						   <td>16</td>
						   <td>10000,00,000/-</td>
						   <td><?=$achieved_members16?></td>
						   <td>&nbsp;</td>
						   <td bordercolor="#DAD6D6" class="table-hover table-responsive">1% Royalty CTO Life Time</td>
						   <td>&nbsp;</td>
						   <td></td>
						   <td></td>
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

</body>
</html>
