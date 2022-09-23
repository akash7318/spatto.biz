<?=include("header.php")?>

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
                if($status!="active"){ $status="Pending";}
                echo "<tr><td align='center'>".$sno."</td><td align='center'>".$name."</td><td align='center'>".$username."</td><td align='center'>".$sponsor."</td><td align='center'>".$direct."</td><td align='center'>".$jdate."</td><td align='center'>".$sdate."</td><td align='center'> ".$status."</td><td align='center'> ".$level."</td></tr>";
        
                getusers($ruser);   
            }
        }
}


$sql  = "SELECT id,DATE_FORMAT(jdate, '%d-%m-%Y') FROM `join` WHERE `username` = '$username' order by id";
$result = mysqli_query($s_dbid,$sql);
list($userid,$jdate) = mysqli_fetch_row($result);

$sql  = "SELECT DATE_FORMAT(sdate, '%d-%m-%Y'),DATE_FORMAT(DATE_ADD(sdate, INTERVAL 6 MONTH), '%d-%m-%Y'),amount FROM `investment` WHERE `mid` = '$userid' order by id";
$result = mysqli_query($s_dbid,$sql);
list($sdate,$vdate,$package) = mysqli_fetch_row($result);

if($amount==11800){
    $tax = "1800";
}
elseif($amount==118000){
    $tax = "18000";
}
else{
    $tax = "GST included in the price";
}

?>


<div class="page-wrap">
  
    <?=include("sidebar.php")?>

  

  <div class="page-content">
    
<div class="container-fluid">
  <div class="main-container p-invoice">
    <div class="p-invoice__header">
      <div class="p-invoice__company">
        <img src="http://spattoservices.com/images/logo-white.png" alt="" class="p-invoice__company-avatar">
        <ul class="p-invoice__company-info">
          <li>Spatto TRAVELS</li>
          <li>Office No- 203, 1st Floor ,</li>
          <li>Town Center Near D Park,</li>
          <li>Rohtak 124001</li>
          <li>Ph:7404116542,8929106000</li>
        </ul>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <h3 class="p-invoice__name">Invoice #VA-1549176639</h3>
          <table class="p-invoice__table table-responsive">
            <thead>
            <tr>
              <th>Bill to</th>
              <th>Date</th>
              <th>Valid Till</th>
              <th>Terms</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>
                <ul class="p-invoice__company-info">
                  <li><?=$name?></li>
                  <!--<li>Email: <?=$email?></li>-->
                  <!--<li>Ph: <?=$phone?></li>-->
                  <!--<li>VAT: SI55336795</li>-->
                </ul>
              </td>
              <td><?=$jdate?></td>
              <td><?=$vdate?></td>
              <!--<td>Click Here</td>-->
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <table class="table p-invoice__items table-responsive-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Description</th>
              <th>Validity</th>
              <th>QTY</th>
              <th>Rate</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Travel Package</td>
              <td>6 Months</td>
              <td>1</td>
              <td><?=$package?></td>
              <td><?=$package?></td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="p-invoice__footer">
      <div class="p-invoice__notes">
        <h6 class="p-invoice__notes-heading">Notes</h6>
        <ul class="p-invoice__notes-list">
          <li>Your package is valid till <?=$vdate?></li>
          <li>All package have a validity of 6 months</li>
          <li>from date of activation.</li>
        </ul>
        <div class="mt-4">Thank you for your business!</div>
      </div>
      <div class="p-invoice__total">
        <table class="table table-responsive-sm">
          <tr>
            <td><span class="text-muted-md">Subtotal:</span></td>
            <td>Rs <?=$package?></td>
          </tr>
          <tr>
            <td><span class="text-muted-md">GST (18%):</span></td>
            <td><?=$tax?></td>
          </tr>
          <tr class="p-invoice__total-row">
            <td><span class="text-muted-md">Total:</span></td>
            <td><span class="p-invoice__total-amount">Rs <?=$package?></span></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

  </div>
</div>




  <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/js/select2.full.min.js"></script>
<script src="vendor/simplebar/simplebar.js"></script>
<script src="vendor/text-avatar/jquery.textavatar.js"></script>
<script src="vendor/tippyjs/tippy.all.min.js"></script>
<script src="vendor/flatpickr/flatpickr.min.js"></script>
<script src="vendor/wnumb/wNumb.js"></script>
<script src="js/main.js"></script>


<script src="vendor/datatables/datatables.min.js"></script>
<script src="js/preview/datatables.min.js"></script>


<div class="sidebar-mobile-overlay"></div>


  




  



</body>
</html>
