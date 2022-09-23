  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";

   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
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
        <div class="col-md-6 col-md-offset-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <?php echo form_open('Admin_dashboard/update_user_profile', array( 'class' => 'form-update')); ?>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url(); ?>assets/dist/img/avatar5.png" alt="User profile picture">
               <input type="hidden" name="id" value="<?= $profile->id; ?>">
              <h3 class="profile-username text-center"><?= $profile->username; ?></h3>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Name</b> <a class="pull-right"><lebel class="lvl"><?= $profile->name; ?></lebel><input type="text" name="name" value="<?= $profile->name; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a> 
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><lebel class="lvl"><?= $profile->email; ?></lebel><input type="text" name="email" value="<?= $profile->email; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>phone Number</b> <a class="pull-right"><lebel class="lvl"><?= $profile->phone; ?></lebel><input type="text" name="phone" value="<?= $profile->phone; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Password</b> <a class="pull-right"><lebel class="lvl address_lvl"><?= $profile->password; ?></lebel><input type="text" name="password" value="<?= $profile->password; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                
                <li class="list-group-item">
                  <b>State</b> <a class="pull-right"><lebel class="lvl address_lvl"><?= $profile->state; ?></lebel><input type="text" name="state" value="<?= $profile->state; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>City</b> <a class="pull-right"><lebel class="lvl address_lvl"><?= $profile->city; ?></lebel><input type="text" name="city" value="<?= $profile->city; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <a class="pull-right"><lebel class="lvl address_lvl"><?= $profile->address; ?></lebel><input type="text" name="address" value="<?= $profile->address; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Pincode</b> <a class="pull-right"><lebel class="lvl address_lvl"><?= $profile->pincode; ?></lebel><input type="text" name="pincode" value="<?= $profile->pincode; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                
                
                <li class="list-group-item">
                  <b>Bank</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->bank_name)) echo $bank->bank_name; ?></lebel><input type="text" name="bank_name" value="<?php if(isset($bank->bank_name)) echo $bank->bank_name; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Branch</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->branch_name)) echo $bank->branch_name; ?></lebel><input type="text" name="branch_name" value="<?php if(isset($bank->branch_name)) echo $bank->branch_name; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
				<li class="list-group-item">
                  <b>Account No</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->account_no)) echo $bank->account_no; ?></lebel><input type="text" name="account_no" value="<?php if(isset($bank->account_no)) echo $bank->account_no; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
				<li class="list-group-item">
                  <b>Account Name</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->aname)) echo $bank->aname; ?></lebel><input type="text" name="aname" value="<?php if(isset($bank->aname)) echo $bank->aname; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>  
				<li class="list-group-item">
                  <b>IFSC Code</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->ifsc)) echo $bank->ifsc; ?></lebel><input type="text" name="ifsc" value="<?php if(isset($bank->ifsc)) echo $bank->ifsc; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li> 
				<li class="list-group-item">
                  <b>Pan Card</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->pancard)) echo $bank->pancard; ?></lebel><input type="text" name="pancard" value="<?php if(isset($bank->pancard)) echo $bank->pancard; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
                <li class="list-group-item">
                  <b>Addhaar Card</b><a class="pull-right"><lebel class="lvl address_lvl"><?php if(isset($bank->idnumber)) echo $bank->idnumber; ?></lebel><input type="text" name="acard" value="<?php if(isset($bank->idnumber)) echo $bank->idnumber; ?>" class="inp_cng text-center form-control_profile" style="display: none;"></a>
                </li>
              </ul>
             <div class="row inp_cng" style="display: none;">
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block" id="show_normal"><b>Cancel</b></button>
               </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-block"><b>Save Change</b></button>
               </div>
             </div>

              <button type="button" class="btn btn-primary btn-block lvl" id="show_form"><b>Update</b></button>
            </div>
            <!-- /.box-body -->
            <?= form_close();  ?>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <?php 

  include "includes/footer.php";

   ?>