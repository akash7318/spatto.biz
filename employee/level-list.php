<?php
include("header.php");
?>
  <!-- Left side column. contains the logo and sidebar -->
  
<?php
include("sidebar.php");
?>


<?php
function getusers($snode){
    global $s_dbid,$pid,$cnt,$sno,$records_ref;
    
        $sql  = "SELECT id,name,username,email,phone,sponsor,DATE_FORMAT(jdate, '%d-%m-%Y'),dreferal FROM `join` WHERE `sponsor` = '$snode' order by id";
        $result = mysqli_query($s_dbid,$sql);

        if(mysqli_num_rows($result)>0){
            while(list($mid,$name,$username,$email,$phone,$sponsor,$jdate,$direct) = @mysqli_fetch_row($result)){
                $ruser = $username;
                $cnt=1;
                getlvls(strtolower($ruser),strtolower($_SESSION['username']));
                $level = $cnt;
                $sno++;
                $sqlinv  = "SELECT amount,status,sdate FROM `investment` WHERE `mid` = '$mid' ";
                $resultinv = mysqli_query($s_dbid,$sqlinv);
                list($amount,$status,$sdate) = mysqli_fetch_row($resultinv);
                
                $sqlsp  = "SELECT name FROM `join` WHERE `username` = '$sponsor' ";
                $resultsp = mysqli_query($s_dbid,$sqlsp);
                list($sponsorname) = mysqli_fetch_row($resultsp);
                if($status!="pending"){} else{ $amount=""; $status="";}
                echo "<tr><td align='center'>".$name."</td><td align='center'>".$username."</td><td align='center'>".$sponsor."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$level."</td></tr>";
        
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
        <small>Level Wise List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Level Wise List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
	<div  style="background: #fff">
        <div class="box-header with-border">
          <h3 class="box-title">Level Wise List</h3>

          
        </div>
        <div class="box-body">
          
		<table id="datatable" class="table table-striped">
      <thead>
      <tr>
        <th width="31%" height="30" align="center" bgcolor="#B5DAED">Level</th>
        <th  align="center" bgcolor="#B5DAED">Required Active Members</th>
        <th  align="center" bgcolor="#B5DAED">Total Members</th>
        <th  align="center" bgcolor="#B5DAED">Active Members</th>
        <th  align="center" bgcolor="#B5DAED">Inactive Members</th>
		<th  align="center" bgcolor="#B5DAED"></th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td height="24" align="center">1</td>
        <td width="24%" align="center">2</td>
        <td width="24%" align="center">
      	
      	<?php
      	$inactive1=$inactive2=$inactive3=$inactive4=$inactive5=$inactive6=$inactive7=$inactive8=$inactive9=$inactive10=$inactive11=$inactive12=$inactive13=$inactive14=$inactive15=$inactive16=0;
      	$active1=$active2=$active3=$active4=$active5=$active6=$active7=$active8=$active9=$active10=$active11=$active12=$active13=$active14=$active15=$active16=0;
      	  
      	  		$boardsql  = "SELECT username,misc FROM `join` WHERE `sponsor` = '$username' ";
      			$bresult = @mysqli_query($s_dbid,$boardsql);
      			echo mysqli_num_rows($bresult);
                  while(list($susers,$ustatus) = mysqli_fetch_row($bresult)){
                  @$topuserstxt .=  "'".$susers."',";
                  if($ustatus=="active"){
                      $active1++; 
                  }
                  else{
                      $inactive1++;
                  }
                  }
                  //echo $sql2;
      		
      	  ?>
      	</td>
      	<td height="24" align="center"><?=$active1?></td>
      	<td height="24" align="center"><?=$inactive1?></td>
        <td width="45%" align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="1"> <input type="hidden" name="users" value="<?=$topuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">2</td>
        <td align="center">4</td>
        <td align="center">
      	<?php
      	  $secondlvl=0;
      	  $boardsql  = "SELECT username  FROM `join` WHERE `sponsor` = '$username' ";
      		$bresult = @mysqli_query($s_dbid,$boardsql);
      	    //echo $boardsql;
      		while(list($susers) = mysqli_fetch_row($bresult)){
      			$sql2  = "SELECT username,misc  FROM `join` WHERE `sponsor` = '$susers' ";
      			$result2 = @mysqli_query($s_dbid,$sql2);
                  while(list($susers2,$ustatus) = mysqli_fetch_row($result2)){
                  @$suserstxt .=  "'".$susers2."',";
                  if($ustatus=="active"){
                      $active2++; 
                  }
                  else{
                      $inactive2++;
                  }
                  }
      			$secondlvl += mysqli_num_rows($result2);
                  //echo $sql2;
      		}
      	  echo $secondlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active2?></td>
      	<td height="24" align="center"><?=$inactive2?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="2"> <input type="hidden" name="users" value="<?=$suserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">3</td>
        <td align="center">8</td>
        <td align="center">
      	<?php
      	$suserstxt = substr($suserstxt,0,-1);
      	 $thirdlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$suserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$tuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active3++; 
                  }
                  else{
                      $inactive3++;
                  }
      			$thirdlvl += 1;
      		}
      	  //echo $sql3."<br>";
      	  echo $thirdlvl;
      	  ?>
      	</td>
      	<td height="24" align="center"><?=$active3?></td>
      	<td height="24" align="center"><?=$inactive3?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="3"> <input type="hidden" name="users" value="<?=$tuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">4</td>
        <td align="center">16</td>
        <td align="center">
      	
      	<?php
      	$tuserstxt = substr($tuserstxt,0,-1);
      	 $fourthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$tuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$fuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active4++; 
                  }
                  else{
                      $inactive4++;
                  }
      			$fourthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $fourthlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active4?></td>
      	<td height="24" align="center"><?=$inactive4?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="4"> <input type="hidden" name="users" value="<?=$fuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">5</td>
        <td align="center">32</td>
        <td align="center">
      	
      	  <?php
      	$fuserstxt = substr($fuserstxt,0,-1);
      	 $fifthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$fuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$fiuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active5++; 
                  }
                  else{
                      $inactive5++;
                  }
      			$fifthlvl += 1;
      		}
      	  
      	  echo $fifthlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active5?></td>
      	<td height="24" align="center"><?=$inactive5?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="5"> <input type="hidden" name="users" value="<?=$fiuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
        <tr>
        <td height="24" align="center">6</td>
        <td align="center">64</td>
        <td align="center">
      	
      	<?php
      	$fiuserstxt = substr($fiuserstxt,0,-1);
      	 $sixthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$fiuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$sixuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active6++; 
                  }
                  else{
                      $inactive6++;
                  }
      			$sixthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $sixthlvl;
      	  ?>
      	</td>
      	<td height="24" align="center"><?=$active6?></td>
      	<td height="24" align="center"><?=$inactive6?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="6"> <input type="hidden" name="users" value="<?=$sixuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">7</td>
        <td align="center">128</td>
        <td align="center">
      	<?php
      	$sixuserstxt = substr($sixuserstxt,0,-1);
      	 $seventhlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$sixuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$seuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active7++; 
                  }
                  else{
                      $inactive7++;
                  }
      			$seventhlvl += 1;
      		}
      	  
      	  echo $seventhlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active7?></td>
      	<td height="24" align="center"><?=$inactive7?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="7"> <input type="hidden" name="users" value="<?=$seuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">8</td>
        <td align="center">256</td>
        <td align="center">
      	<?php
      	$seuserstxt = substr($seuserstxt,0,-1);
      	 $eigthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$seuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$euserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active8++; 
                  }
                  else{
                      $inactive8++;
                  }
      			$eigthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $eigthlvl;
      	  ?>
      	</td>
      	<td height="24" align="center"><?=$active8?></td>
      	<td height="24" align="center"><?=$inactive8?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="8"> <input type="hidden" name="users" value="<?=$euserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">9</td>
        <td align="center">512</td>
        <td align="center">
      	
      	<?php
      	$euserstxt = substr($euserstxt,0,-1);
      	 $ninthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$euserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$nuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active9++; 
                  }
                  else{
                      $inactive9++;
                  }
      			$ninthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $ninthlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active9?></td>
      	<td height="24" align="center"><?=$inactive9?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="9"> <input type="hidden" name="users" value="<?=$nuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">10</td>
        <td align="center">1024</td>
        <td align="center">
      	
      	  <?php
      	$nuserstxt = substr($nuserstxt,0,-1);
      	 $tenthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$nuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$teuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active10++; 
                  }
                  else{
                      $inactive10++;
                  }
      			$tenthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $tenthlvl;
      	  
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active10?></td>
      	<td height="24" align="center"><?=$inactive10?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="10"> <input type="hidden" name="users" value="<?=$teuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
        <tr>
        <td height="24" align="center">11</td>
        <td align="center">2048</td>
        <td align="center">
      	
      	<?php
      	$teuserstxt = substr($teuserstxt,0,-1);
      	 $eleventhlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$teuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$eluserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active11++; 
                  }
                  else{
                      $inactive11++;
                  }
      			$eleventhlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $eleventhlvl;
      	  ?>
      	</td>
      	<td height="24" align="center"><?=$active11?></td>
      	<td height="24" align="center"><?=$inactive11?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="6"> <input type="hidden" name="users" value="<?=$sixuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">12</td>
        <td align="center">4096</td>
        <td align="center">
      	<?php
      	$eluserstxt = substr($eluserstxt,0,-1);
      	 $twelthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$eluserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$twuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active12++; 
                  }
                  else{
                      $inactive12++;
                  }
      			$twelthlvl += 1;
      		}
      	  
      	  echo $twelthlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active12?></td>
      	<td height="24" align="center"><?=$inactive12?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="7"> <input type="hidden" name="users" value="<?=$seuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">13</td>
        <td align="center"><p>8192</p></td>
        <td align="center">
      	<?php
      	$twuserstxt = substr($twuserstxt,0,-1);
      	 $thirteenlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$twuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$thiruserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active13++; 
                  }
                  else{
                      $inactive13++;
                  }
      			$thirteenlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $thirteenlvl;
      	  ?>
      	</td>
      	<td height="24" align="center"><?=$active13?></td>
      	<td height="24" align="center"><?=$inactive13?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="8"> <input type="hidden" name="users" value="<?=$euserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">14</td>
        <td align="center"><p>16384</p></td>
        <td align="center">
      	
      	<?php
      	$thiruserstxt = substr($thiruserstxt,0,-1);
      	 $fourteenlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$thiruserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$fourteenuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active14++; 
                  }
                  else{
                      $inactive14++;
                  }
      			$fourteenlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $fourteenlvl;
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active14?></td>
      	<td height="24" align="center"><?=$inactive14?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="9"> <input type="hidden" name="users" value="<?=$nuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
      <tr>
        <td height="24" align="center">15</td>
        <td align="center"><p>32768</p></td>
        <td align="center">
      	
      	  <?php
      	  
      	$fourteenuserstxt = substr($fourteenuserstxt,0,-1);
      	 $fifteenthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$fourteenuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$fifteenuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active15++; 
                  }
                  else{
                      $inactive15++;
                  }
      			$fifteenthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $fifteenthlvl;
      	  
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active15?></td>
      	<td height="24" align="center"><?=$inactive15?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="10"> <input type="hidden" name="users" value="<?=$teuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
        </tr>
        <tr>
        <td height="24" align="center">16</td>
        <td align="center"><p>65536</p></td>
        <td align="center">
      	
      	  <?php
      	$fifteenuserstxt = substr($fifteenuserstxt,0,-1);
      	 $sixteenthlvl = 0; 
      	$sql3 = "SELECT `username`,misc FROM `join` WHERE `sponsor` IN (".$fifteenuserstxt.")";
      	$result3 = mysqli_query($s_dbid,$sql3);
      	  while(list($tusers,$ustatus) = mysqli_fetch_row($result3)){
      			
      			@$sixteenuserstxt .=  "'".$tusers."',";
      			if($ustatus=="active"){
                      $active16++; 
                  }
                  else{
                      $inactive16++;
                  }
      			$sixteenthlvl += 1;
      		}
      	  //echo $sql3;
      	  echo $sixteenthlvl;
      	  
      	  ?>
      	
      	</td>
      	<td height="24" align="center"><?=$active16?></td>
      	<td height="24" align="center"><?=$inactive16?></td>
        <td align="center"><form action="level-detail.php" method="post"><input type="hidden" name="level" value="10"> <input type="hidden" name="users" value="<?=$teuserstxt?>"> <input type="submit" value="Get Detail" /> </form></td>
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
