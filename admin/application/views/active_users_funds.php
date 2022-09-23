
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
        Active User Funds
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
                   <th>User Name</th>
                   <th>Name</th>
                   <th>Level Income</th>
                   <th>Cashback Income</th>
                   <th>Direct Income</th>
                   <th>Admin Fund</th>
                   <th>User Transfer</th>
                   <th>iWallet</th>
                   <th>Round Table</th>
                   <th>Withdraw Total</th>
                   <th>Wallet Balance</th>
                    <th></th>
                  
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($active_user) || is_object($active_user)){ ?>
                 <?php $count= 0; ?>
                <?php foreach ($active_user as $item): 
                $wallet = ($item['UFund']+$item['AFund']+($item['directincome'] - ($item['directincome']*10/100))+($item['cashback']-($item['cashback']*10/100))+($item['levelincome']-($item['levelincome']*10/100))+($item['iFund']-($item['iFund']*10/100))+($item['RoundTable']-($item['RoundTable']*10/100)))-$item['withdraw'];
                if($wallet>0){
                    $mid = $item['mid'];
                
                ?>
                 <tr>
                   <td><?php echo $count += 1;  ?></td>
                 <td><?php echo $item['username'] ?></td>
                 <td><?php echo $item['name'] ?></td>
                 <td><?php echo ($item['levelincome']-($item['levelincome']*10/100)); ?></td>
                 <td><?php echo ($item['cashback']-($item['cashback']*10/100)); ?></td>
                 <td><?php echo ($item['directincome'] - ($item['directincome']*10/100)); ?></td>
                 <td><?php echo $item['AFund'] ?></td>
                 <td><?php echo $item['UFund'] ?></td>
                 <td><?php echo ($item['iFund'] - ($item['iFund']*10/100)) ?></td>
                 <td><?php echo ($item['RoundTable'] - ($item['RoundTable']*10/100)) ?></td>
                 <td><?php echo $item['withdraw'] ?></td>
                 <td><?php echo $wallet; ?></td>
                 <td><form method="post" action="<?= base_url(); ?>admin_dashboard/withdrawfunds"> <input type="hidden" name="wallet" value="<?=$wallet?>"><input type="hidden" name="mid" value="<?=$mid?>"><input type="submit" value="Withdraw Funds"></form></td>
                

                 
                </tr>
               <?php
                }
               endforeach; ?>
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