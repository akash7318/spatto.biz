
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
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
            <!-- form start -->
           <?= form_open('Admin_dashboard/adduser_submit', array( 'class' => 'form-horizontal')); ?>  
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">introducer Id</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="introducer Id" type="text" name="introducer_id">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Id</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="User Id" type="text" name="user_id">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="User Name" type="text" name="user_name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Email" type="text" name="user_email">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">user Mobile</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="user Mobile" type="text" name="user_mobile">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Adhar No</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Adhar No" type="text" name="user_adhar">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" placeholder="Password" type="password" name="user_password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" placeholder="Address" type="text" name="user_address">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Add User</button>
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