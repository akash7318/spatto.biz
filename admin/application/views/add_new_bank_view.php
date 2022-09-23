
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Change Password
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
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Admin_dashboard/upload_new_bank'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Name</label>
                  <input class="form-control" id="" placeholder="Bank Name" type="text" name="bank_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Name</label>
                  <input class="form-control" id="" placeholder="Name" type="text" name="name">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Account No</label>
                  <input class="form-control" id="" placeholder="Account No" type="text" name="account_number">
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Ifsc code</label>
                  <input class="form-control" id="" placeholder="Ifsc code" type="text" name ="ifse_code">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input id="exampleInputFile" type="file" name="logo">
                </div>
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
           <?php echo form_close(); ?>
          </div>
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
  swal({
  title: "success",
  text: "Bank profile Updated successfully",
  icon: "success",
  button: "close",
});
</script>
<?php } ?>

  <?php

 include "includes/footer.php";
?>