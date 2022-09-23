
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
        All User Address and Bank Detail
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
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Address</th>
                   <th>Pan Card</th>
                   <th>Pan Card Image</th>
                   <th>ID Number</th>
                   <th>ID Image</th>
				   <th>Bank Details</th>
                  
                </tr>
                </thead>
                <tbody>
                   <?php if(is_array($all_user) || is_object($all_user)){ ?>
                 <?php $count= 0; ?>
                <?php foreach ($all_user as $item): ?>
                 <tr>
                   <td><?php echo $count += 1;  ?></td>
                 <td><?php echo $item['username'] ?></td>
                 <td><?php echo $item['name'] ?></td>
                 <td><?php echo $item['phone'] ?></td>
                 <td><?php echo $item['email'] ?></td>
                 <td><?php echo $item['address'] ?></td>
                 <td><?=$item['pancard']?></td>
                 <td><?php if($item['panimage']!=""){ ?><a href="/user/uploads/<?=$item['panimage']?>" target="_blank"><img src="/user/uploads/<?=$item['panimage']?>" width="70px" ></a><?php } ?></td>
                 <td><?php echo $item['idnumber'] ?></td> 
                 <td><?php if($item['afront']!=""){ ?><a href="/user/uploads/<?=$item['afront']?>" target="_blank"><img src="/user/uploads/<?=$item['afront']?>" width="70px" ></a>&nbsp;&nbsp;<a href="/user/uploads/<?=$item['aback']?>" target="_blank"><img src="/user/uploads/<?=$item['aback'] ?>" width="70px" ></a><?php }?></td> 
				 
				 <td>
				 <?php echo "Bank Name: ".$item['bank_name'] ."<br>Branch: ".$item['branch_name']."<br>Account No.: ".$item['account_no']. "<br>Name: ".$item['aname']."<br>IFSC: ".$item['ifsc']; ?>
				 <br>
				 <?php //echo   "Paytm:".$item['paytm']."<br>Tez:".$item['tez']."<br>phonePe:".$item['phonepe']; ?></td>
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