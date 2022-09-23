
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Franchisee Pin Transfer
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
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
		  	<p style="padding-left: 20px; padding-top: 20px; color: red;"><?=@$response?></p>
            <!-- form start -->
           <?= form_open('admin_dashboard/pintransfer_submit', array( 'class' => 'form-horizontal')); ?>  
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. of Pins to transfer</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Enter no. of pins to transfer" type="text" name="pins">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User to Transfer Pins</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="User Id" type="text" name="username">
                  </div>
                </div>
                 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Transfer</button>
              </div>
              <!-- /.box-footer -->
             <?= form_close(); ?>
          </div>

      </div>
        </div>
          <!-- /.box -->
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php if($this->session->flashdata('msg')){ ?>
<script>
  swal("<?php echo $this->session->flashdata('msg'); ?>")
</script>
<?php } ?>

  <?php

 include "includes/footer.php";
?>