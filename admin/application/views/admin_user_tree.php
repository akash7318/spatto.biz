
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Tree Search
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
            <div class="box-body overflow_hd">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <!-- <br> -->
                  <div class="search_box_tree_admin">
                     <?php echo form_open('admin_dashboard/get_usertree_submit', array( 'class' => '')); ?>
                    <input type="text" name="username" class="search_box_admin">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <?php echo form_close(); ?>
                  </div><br><br>
                  
                </div>
              </div>
             
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
  <?php

 include "includes/footer.php";
?>