
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>


   <?php

   function showtree($downpos){
          if(is_array($downpos) || is_object($downpos)){
        if($downpos[0]['misc'] == "active"){
            echo "<img src='". base_url() ."assets/dist/img/user123.png' style='width: 50px;'>";
            echo "<p>".$downpos[0]['username']."</p>";
              }
              else{
                   echo "<img src='". base_url() ."assets/dist/img/userpending.png' style='width: 50px;'>";
                   echo "<p>".$downpos[0]['username']."</p>";
                   }
                 }
        
   }

   function shownotree(){
    echo "<img src='". base_url() ."assets/dist/img/nousers.png' style='width: 50px;'>";
    echo "<p>No user</p>";
   }
                              
   ?>
 <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tree View
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
                  <div class="search_box_tree">
                     <?php echo form_open('admin_dashboard/get_usertree_submit', array( 'class' => '')); ?>
                    <input type="text" name="username">
                    <button type="submit">Search</button>
                    <?php echo form_close(); ?>
                  </div><br><br>
                  
                </div>
              </div>

              <div class="fix-width">
              <div class="row">
                <div class="col-md-12 text-center">
                          <img src="<?= base_url(); ?>assets/dist/img/user123.png" style="width: 50px;">
                          <p><?= $down ?></p>
                          <div class="vert_line"></div>
                          

                </div>
              </div>

               <div class="row">
                 <div class="border_top"></div>
                    <div class="col-md-6 col-sm-6  col-xs-6 text-center">
                           <div class="vert_line"></div>
                          <?php
                          if($down1){
                             showtree($down1);
                           }
                           else{
                            shownotree();
                           }
                            
                           ?>
                            
                            <div class="row">
                              <div class="vert_line"></div>
                              <div class="border_top"></div>
                              <div class="col-md-6 col-sm-6  col-xs-6 text-center">
                                <div class="vert_line"></div>
                                  <?php
                                  if(!empty($down11)){
                                  showtree($down11);
                                  }
                                  else{
                                    shownotree();
                                   }
                            
                                   ?>
                              </div>
                              <div class="col-md-6 col-sm-6  col-xs-6 text-center">
                               <div class="vert_line"></div>
                                  <?php
                                  if(!empty($down12)){
                                  showtree($down12);
                                  }
                                  else{
                                    shownotree();
                                   }
                            
                                   ?>
                              </div>
                            </div>
                     </div>
                     <div class="col-md-6 col-sm-6  col-xs-6 text-center">
                           <div class="vert_line"></div>
                            <?php
                                  if(!empty($down2)){
                                  showtree($down2);
                                  }
                                  else{
                                    shownotree();
                                   }
                            
                                   ?>
                             <div class="row">
                              <div class="vert_line"></div>
                              <div class="border_top"></div>
                              <div class="col-md-6 col-sm-6  col-xs-6 text-center">
                                <div class="vert_line"></div>
                                  <?php
                                  if(!empty($down21)){
                                  showtree($down21);
                                  }
                                  else{
                                    shownotree();
                                   }
                            
                                   ?>
                              </div>
                              <div class="col-md-6 col-sm-6  col-xs-6 text-center">
                               <div class="vert_line"></div>
                                 <?php
                                  if(!empty($down22)){
                                  showtree($down22);
                                  }
                                  else{
                                    shownotree();
                                   }
                            
                                   ?>
                              </div>
                            </div>
                     </div>
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