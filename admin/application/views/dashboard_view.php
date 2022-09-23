
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
   <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $total_user - $total_active_user; ?></h3>
              <p>Pending Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$total_active_user; ?></h3>
              <p>Active Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $today_registration ?></h3>
              <p>Today Registration</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->

          <div class="col-lg-3 col-sm-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $today_activated ?></h3>
              <p>Today Activated</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           
          </div>
        </div>
        
        

         
      </div>

       <div class="row">
        
        
        
        
        
        
        
        
        
        
      </div> 
      
      <div class="row">
        
        
        
        
        
        
        <!--<div class="col-lg-3 col-sm-3 col-xs-12">-->
           

        <!--  <div class="small-box bg-green">-->
        <!--    <div class="inner">-->
        <!--      <h3><?= $bankwithdrawal; ?></h3>-->
        <!--      <p>Total Bank Withdrawal</p>-->
        <!--    </div>-->
        <!--    <div class="icon">-->
        <!--      <i class="ion ion-person-add"></i>-->
        <!--    </div>-->
           
        <!--  </div>-->
        <!--</div>-->
        
        
        
        
        <!--<div class="col-lg-3 col-sm-3 col-xs-12">-->
           

        <!--  <div class="small-box bg-green">-->
        <!--    <div class="inner">-->
        <!--      <h3><?= round($walletwithdrawal); ?></h3>-->
        <!--      <p>Total Wallet-Wallet Withdrawal</p>-->
        <!--    </div>-->
        <!--    <div class="icon">-->
        <!--      <i class="ion ion-person-add"></i>-->
        <!--    </div>-->
           
        <!--  </div>-->
        <!--</div>-->
      </div> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php

 include "includes/footer.php";
?>