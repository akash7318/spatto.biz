<?php 

include "includes/header.php";
include "includes/sidebar.php";

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Send Gift Voucher
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Gift Vouchers</a></li>
        <li class="active">dashboard</li>
      </ol>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="box box-info">
            <!-- form start -->
           <?= form_open('admin_dashboard/allocate_gv_admin', array( 'class' => 'form-horizontal')); ?>  
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. of Gift Vouchers</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="amount" placeholder="No. of Gift Vouchers to Send" type="number" name="amount">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">User Id</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputEmail3" placeholder="User Id" onkeyup="get_data(this.value);" type="text" name="user_id">
					<div  style="width: 290px;align-items: left; color: red;" class="result"></div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Remarks</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="remarks" placeholder="Enter Remarks" type="number" name="remarks">
                  </div>
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Send Vouchers</button>
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
	        url: "http://venjio.com/user/getsp.php",
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