
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
        Pin Transfer
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
                  <th>Pin</th>
                   <th>Transferred To</th>
                   <th>Transferred From</th>
                   <th>Date</th>
                  
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($pin_transfer) || is_object($pin_transfer)){ ?>
                 <?php $count= 0; ?>
                <?php foreach ($pin_transfer as $item): ?>
                 <tr>
                   <td><?php echo $count += 1;  ?></td>
                 <td><?php echo $item['pin'] ?></td>
                 <td><?php echo $item['to'] ?></td>
                 <td><?php echo $item['from'] ?></td>
                 <td><?php echo $item['tdate'] ?></td>

                 
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