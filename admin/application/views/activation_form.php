
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Activate User
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
           <?= form_open('admin_dashboard/activate_user_action', array( 'class' => 'form-horizontal')); ?>  
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Name" type="text" name="name" value="<?= $profile->name ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Username" type="text" name="Username" value="<?= $profile->username ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <!--<input class="form-control" id="inputEmail3" placeholder="Amount in $" type="text" name="amount">-->
                    <select class="form-control" name="amt" id="amt">
                              <option value="10000">11800</option>
                              <option value="100000">118000</option>
                              <option value="S12000">Silver Package 100gm - 12000</option>
                              <option value="S50000">Silver Package 500gm - 50000</option>
                              <option value="G28000">Gold Package 22karat  4gm - 28000</option>
                              <option value="G35000">Gold Package 22karat 5gm - 35000</option>
                              <option value="G55000">Gold Package 22karat 8gm - 55000</option>
                              <option value="G10000">Gold Package 24karat 1gm - 10000</option>
                              <option value="G70000">Gold Package 24karat 10gm - 70000</option>
                          </select>	
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Confirm</button>
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