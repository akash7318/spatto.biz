<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menus</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="<?= base_url(); ?>admin_dashboard"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        
        <li><a href="<?= base_url(); ?>admin_dashboard/allstorelist_pending"><i class="fa fa-link"></i> <span>New Stores</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Activation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url(); ?>admin_dashboard/activeusers">Active User</a></li>
            <li><a href="<?= base_url(); ?>admin_dashboard/pendinguser">Pending User</a></li>
          </ul>
        </li>
		
         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>User Management</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="<?= base_url(); ?>admin_dashboard/allusers_bank_address">Users/Bank/Address/KYC </a></li>-->
            <!--<li><a href="<?= base_url(); ?>admin_dashboard/allusers">Users/Bank </a></li>-->
			<li><a href="<?= base_url(); ?>admin_dashboard/alluserlist">All Users</a></li>
            <!--<li><a href="<?= base_url(); ?>admin_dashboard/edituser">Edit User</a></li>-->
            
            <li><a href="<?= base_url(); ?>admin_dashboard/allstorelist">All Stores</a></li>
            <li><a href="<?= base_url(); ?>admin_dashboard/allagentlist">All Agents</a></li>
            <li><a href="<?= base_url(); ?>admin_dashboard/allsuperviserlist">All Supervisers</a></li>
            
            
            <!--<li><a href="<?= base_url(); ?>admin_dashboard/pancard_request">Pancard Approval</a></li>-->
            <!--<li><a href="<?= base_url(); ?>admin_dashboard/idcard_request">ID card Approval</a></li>-->
            <!--<li><a href="<?= base_url(); ?>admin_dashboard/bank_request">Bank Details Approval</a></li>-->
          </ul>
        </li>
		
		
		
		
		<!-- <li class="treeview">
		  <a href="#"><i class="fa fa-link"></i> <span>News</span>
		    <span class="pull-right-container">
		        <i class="fa fa-angle-left pull-right"></i>
		      </span>
		  </a>
		  <ul class="treeview-menu">
		    <li><a href="<?= base_url(); ?>admin_dashboard/get_news">News</a></li>
		    <li><a href="<?= base_url(); ?>admin_dashboard/add_news">Add News</a></li>
		  </ul>
		</li> -->
		
		 <!-- <?= base_url(); ?>admin_dashboard/sendsmstousers -->
		<li><a href=""><i class="fa fa-link"></i> <span>Send SMS to Users</span></a></li>
        <li><a href="<?= base_url(); ?>admin_dashboard/change_admin_password"><i class="fa fa-link"></i> <span>Change Admin Password</span></a></li>
         <li><a href="<?= base_url(); ?>admin_login/logout"><i class="fa fa-link"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
