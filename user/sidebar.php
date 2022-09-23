<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li class="active">
          <a href="daily-sale.php"><i class="fa fa-dashboard"></i> <span>Daily Sale</span></a>
        </li>
        <li class="active">
          <a href="new_order.php"><i class="fa fa-dashboard"></i> <span>Create Order</span></a>
        </li>
        <li class="active">
          <a href="orders.php"><i class="fa fa-dashboard"></i> <span>Orders List</span></a>
        </li>
        <li >
          <a href="orders-history.php"><i class="fa fa-dashboard"></i> <span>Billed Orders</span></a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="updateinfo.php"><i class="fa fa-address-card"></i> Edit Profile</a></li>
            <li><a href="change_password.php"><i class="fa fa-key"></i> Change Password</a></li>
            <li><a href="bank_details.php"><i class="fa fa-university"></i> Upload Bank Details</a></li>
          </ul>
        </li>
        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i>
            <span>KYC </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="update-identity.php"><i class="fa fa-money"></i> Update Aadhaar</a></li>
            <li><a href="update-pan.php"><i class="fa fa-university"></i> Update Pan</a></li>
          </ul>
        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Profit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="earning-statement.php"><i class="fa fa-bar-chart"></i> Profit Statement</a></li>
            <!-- <li><a href="iwallet-earning-statement.php"><i class="fa fa-pie-chart"></i> iWallet Earning Statement</a></li> -->
			<!--<li><a href="cashback.php"><i class="fa fa-rupee"></i>  Cashback</a></li>-->
<!-- 			<li><a href="directincome.php"><i class="fa fa-money"></i> Direct Income</a></li>
			<li><a href="levelincome.php"><i class="fa fa-money"></i> Level Income</a></li>
			<li><a href="royaltyincome.php"><i class="fa fa-money"></i> Royalty Income</a></li>   -->
          </ul>
        </li>
   <!--     <li class="treeview">-->
   <!--       <a href="#">-->
   <!--         <i class="fa fa-sitemap"></i>-->
   <!--         <span>My Network</span>-->
   <!--         <span class="pull-right-container">-->
   <!--           <i class="fa fa-angle-left pull-right"></i>-->
   <!--         </span>-->
   <!--       </a>-->
   <!--       <ul class="treeview-menu">-->
   <!--         <li><a href="direct_users.php"><i class="fa fa-user"></i> Direct Team</a></li>-->
   <!--         <li><a href="downline.php"><i class="fa fa-users"></i> Downline</a></li>-->
			<!--<li><a href="level-list.php"><i class="fa fa-list-ol"></i> Level Wise List</a></li>-->
			<!-- <li><a href="rewards-users.php"><i class="fa fa-gift"></i> Rewards & Royalty</a></li> -->
   <!--       </ul>-->
   <!--     </li> -->
        
		<!--<li class="treeview">-->
  <!--        <a href="#">-->
  <!--          <i class="fa fa-google-wallet"></i>-->
  <!--          <span>Wallet</span>-->
  <!--          <span class="pull-right-container">-->
  <!--            <i class="fa fa-angle-left pull-right"></i>-->
  <!--          </span>-->
  <!--        </a>-->
  <!--        <ul class="treeview-menu">-->
  <!--          <li><a href="withdrawal.php"><i class="fa fa-money"></i> Wallet Withdrawal</a></li>-->
		<!--	<li><a href="withdrawalhistory.php"><i class="fa fa-edit"></i> Withdrawal History</a></li>-->
			
  <!--        </ul>-->
  <!--      </li>  -->
		<li><a href="logout.php"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>