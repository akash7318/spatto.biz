
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
 <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Withdraw Request
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Profile</a></li>
        <li class="active">dashboard</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">

      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <br>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S NO.</th>
                  <th>User ID</th>
                   <th>User Name</th>
                   <th>User Mobile</th>
                   <th>Payment Details</th>
                   <th>Amount &#8377;</th>
                   <th>Payment Mode</th>
                   <th>Date</th>
                   <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($withdraw) || is_object($withdraw)){ ?>
                 <?php $count= 0; ?>
                <?php foreach ($withdraw as $item): 
                
                $bank_details = "Bank Details : <br>".
                		   "Bank Name: ".$item['bank_name'].
                		   "| Branch: ".$item['branch_name'].
                		   "| Account No.: ".$item['account_no'].
                		   "| Account Name: ".$item['aname'].
                		   "| IFSC: ".$item['ifsc'];
                $paytm_details = "Paytm : ".$item['paytm'];
                $tez_details = "Tez : ".@$item['tez'];
                $phonepe_details = "Phonepe : ".@$item['phonepe'];
				
				$account = $item['wtype'];
				
                if($account=="Bank"){
                	$payment = $bank_details;
                }
                elseif ($account=="Paytm") {
                	$payment = $paytm_details;
                }
                elseif ($account=="PhonePe") {
                	$payment = $phonepe_details;
                }
                elseif ($account=="Tez") {
                	$payment = $tez_details;
                }
                ?>
                 <tr>
                   <td><?php echo $count += 1;  ?></td>
                 <td><?php echo $item['username'] ?></td>
                 <td><?php echo $item['name'] ?></td>
                 <td><?php echo $item['phone'] ?></td>
                 <td><?php echo @$payment ?></td>
                 <td><?php $amt = $item['amount']; echo $amt; ?></td>
                  <td><?php echo $item['wtype'] ?></td>
                  <td><?php echo $item['wdate'] ?></td>
                  <td><a href="<?= base_url(); ?>admin_dashboard/withdraw_done?id=<?=  $item['wid'] ?>&withdraw_status=success" class='btn btn-success'>Success</a> <a href="<?= base_url(); ?>admin_dashboard/withdraw_done?id=<?= $item['wid'] ?>&withdraw_status=blocked" class='btn btn-danger'>Reject</a></td>
                

                 
                </tr>
               <?php endforeach; ?>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
      </div>
      </div>
        </div>
          <!-- /.box -->
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="<?= base_url(); ?>assets/bower_components/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script>
  
   $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
</script>

  <?php

 include "includes/footer.php";
?>