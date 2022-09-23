
  <?php 

  include "includes/header.php";
  include "includes/sidebar.php";
  $len = count($users_mobile);
  
  for ($x = 0; $x < $len; $x++) {
    if($x==0){
        $users = $users_mobile[$x]['phone'];
    }
    else{
    $users = $users.",".$users_mobile[$x]['phone'];
    }
}
    
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Send SMS to Users
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> SMS to Users</a></li>
        <li class="active">dashboard</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
            <!-- form start -->
           <?= form_open('admin_dashboard/sms_submit', array( 'class' => 'form-horizontal')); ?>
           
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Users</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="users" type="text" name="users" value="<?=$users?>" >
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Message</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="Message"  type="text" name="message">
					
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
<script>
		
	//bind change event once DOM is ready
	function get_data(value){
	//alert(value);	
			$.ajax({
	        url: "http://venjio.com/getsp.php",
	        type: "GET",
	        data: "value=" + value,
	        success: function(data) {
	          
				$(".result").html(data);
	        }
	     });
								}
	</script>
<?php if($this->session->flashdata('msg')){ ?>
<script>
  
  swal("<?php echo $this->session->flashdata('msg'); ?>")
</script>
<?php } ?>

  <?php

 include "includes/footer.php";
?>