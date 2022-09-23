
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
        iWallet Request
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Add funds to iWallet</a></li>
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
                   <th>User phone</th>
                   <th>User Email</th>
                   <th>Amount</th>
                   <th>Request Date</th>
				   <th>Tr no.</th>
				   <th>Deposit Slip</th>
                   <th>Activate</th> 
                   <th>Delete</th> 
                  
                </tr>
                </thead>
                <tbody>




                  <?php if(is_array($pending_user) || is_object($pending_user)){ ?>
                 <?php $count= 0; ?>
                <?php foreach ($pending_user as $item): ?>
                 <tr>
                   <td><?php echo $count += 1;  ?></td>
                 <td><?php echo $item['username'] ?></td>
                 <td><?php echo $item['name'] ?></td>
                 <td><?php echo $item['phone'] ?></td>
                 <td><?php echo $item['email'] ?></td>
                 <td><?php echo $item['amt'] ?></td>
                 <td><?php echo $item['cdate'] ?></td>
                 <td><?php echo $item['trno'] ?></td>
				 <td><?php if($item['slip']!="") { ?><a href="../../user/uploads/<?php echo $item['slip'] ?>" target="_blank"><img src="../../user/uploads/<?php echo $item['slip'] ?>" width="50" height="50" alt=""/></a><?php }?></td>
                  <td><a class="btn btn-success" href="<?= base_url()?>Admin_dashboard/iwallet_approve_action?id=<?=$item['wid'] ?>">Approve</a></td>
                  <td><a class="btn btn-warning" href="<?= base_url()?>Admin_dashboard/iwallet_reject_action?id=<?=$item['wid'] ?>">Reject</a></td>
                 <!-- <td></td> -->

                 
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