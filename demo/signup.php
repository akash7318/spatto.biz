<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Spatto Store | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style> 
        .lg {
            display: none;
        }    
    @media only screen and (min-width: 600px) {
        .lg {
            display: inline-block;
        }
    }
</style>
    
</head>
<body class="hold-transition register-page" style="background-image: url('login-bg.jpg');">
<div style="margin-left: 10px; margin-right: 10px; margin-top: 20px;">
  <div class="register-logo">
    <a href="#"><b><img src="https://spatto.co/assets/images/spatto-logo.png" style="width: 200px;margin-left: auto;margin-right: auto; margin-top:0px;"></b><br>Store</a>
  </div>

  <div class="register-box-body" style="background:rgba(255, 255, 255, 0.74)">
<!--    <p class="login-box-msg">-->
	  <h3 align="center">Register as a StoreOwner</h3>
<!--	  </p>-->
<center> <span style="color: red;"><?=@$_GET['errmsg']?></span></center>
    <br>
<!--   -->
	<form data-form-output="form-output-global" data-form-type="contact" method="post" action="submit.php" class=" text-left" onSubmit="return validate()">
    <input type="hidden" name="otp_status" id="otp_status">                                       

                                        <div class="register">

                                            <div class="row">
                                                
            <!--                                    <div class="col-sm-4">-->
            <!--                                        <div class="form-group">-->
            <!--                                            <label>  Referral Username: </label>-->
            <!--                                            <input type="text" id="sponsor" name="sponsor" value="<?=@$_GET['ref']?>" class="form-control" required="" style="border-color: orange;"/>-->
            <!--                                            <span id="spnDetails"></span>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
												<!--<div class="col-sm-2">-->
            <!--                                        <div class="form-group">-->
            <!--                                            <label class="lg">&nbsp;</label>-->
            <!--                                            <input type="text" id="fetchFullname" class="form-control" style="border-color: orange;" readonly/>-->
            <!--                                        </div>-->
            <!--                                    </div>-->

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Title</label>
<!--                                                        <input type="text" id="name" name="name" class="form-control" />-->
														<select class="form-control" name="title">
															<option>Select</option>															
															<option value="Mr.">Mr.</option>															
															<option value="Mrs.">Mrs.</option>
															<option value="Ms.">Ms.</option>

														</select>
                                                    </div>
                                                </div>
												<div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" required=""/>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Store Name<span class="mendatory"></span></label>
                                                        <input type="text" id="store_name" name="store_name" class="form-control"  />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email ID<span class="mendatory"></span></label>
                                                        <input type="text" id="email" name="email" class="form-control"  />
                                                    </div>
                                                </div>
												
												<div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="text-left">Mobile No.<span class="mendatory">*</span></label>
                                                        <div class="clearfix"></div>   
                                                        <input type="text" id="txtcontrycome" value="" style="display:none" disabled="disabled" class=" cssOnlyNumeric countrycome mobile-code" maxlength="5" placeholder="" /> 
                                                        <input type="number" id="phone" name="phone" class="cssOnlyNumeric form-control" maxlength="10"  required=""/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="text-left">Alternate Mobile No.<span class="mendatory">*</span></label>
                                                        <div class="clearfix"></div>   
                                                        <input type="text" id="txtcontrycome" value="" style="display:none" disabled="disabled" class=" cssOnlyNumeric countrycome mobile-code" maxlength="5" placeholder="" /> 
                                                        <input type="number" id="phone_2" name="phone_2" class="cssOnlyNumeric form-control" maxlength="10"  required=""/>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Login Password<span class="mendatory">*</span></label>
                                                        <input type="password" id="password" name="password" class="form-control"  required=""/>

                                                        <div class="progress progress-striped active" style="display:none">
                                                            <div id="jak_pstrength" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Login Password Strength</div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="col-sm-6  pass-log">
                                                    <div class="form-group">
                                                        <label class="text-left">Confirm Login Password<span class="mendatory">*</span></label>
                                                        <input type="password" id="password2" class="form-control"  required=""/>
                                                    </div>
                                                </div>
												
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <input type="text" id="country" name="country" class="form-control" required="" value="India" readonly />
                                                        
                                                      <span id="flagimg" style="display:none;"></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                                
												
												
												<div class="col-sm-6  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Pin Code<span class="mendatory">*</span></label>
                                                        <input type="text" id="pincode" name="pincode" class="form-control" required/>
                                                    </div>
                                                </div>
												
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>State</label>

                                                        <select id="state" name="state" class="form-control"><option value="">Select State</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Delhi/NCR">Delhi/NCR</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-left">City</label>
                                                        <input type="text" id="city" name="city" class="form-control"  required=""/>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Landmark<span class="mendatory">*</span></label>
                                                        <input type="text" id="landmark" name="landmark" class="form-control"  required=""/>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-sm-6  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Address<span class="mendatory">*</span></label>
                                                        <textarea id="address" name="address" class="form-control" required style="line-height: 1"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-left">Referral Agent<span class="mendatory">*</span></label>
                                                        <input type="text" id="referral" name="referral" class="form-control" required/>
                                                    </div>
                                                </div>



                                                <!--<div class="col-sm-6">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label class="text-left">Aadhaar Card<span class="mendatory">*</span></label>-->
                                                <!--        <input type="number" id="aadhaar" name="aadhaar" class="form-control" required/>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                
												
                                                <!--<div class="col-sm-6  pass-log-trans">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label class="text-left">Pan Card<span class="mendatory">*</span></label>-->
                                                <!--        <input type="text" id="pan" name="pan" class="form-control" required/>-->
                                                <!--    </div>-->
                                                <!--</div>-->
												
												<div class="col-sm-6  pass-log-trans" style="height: 74px;">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
												
	
												

												
                                                <div class="col-sm-12"  style="padding-top: 20px;">
                                                    <div id="divTerms" class="clearfix">
                                                        <input id="checkterm" type="checkbox"/>&nbsp;&nbsp;<span class="mendatory">*</span>
                                                        <span>I Accept</span> <a id="termOfUse12">Term and Conditions</a>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2" style="padding-top: 20px;">
                                                    <button type="submit" class="btn btn-primary btn-block btn-sm offset-top-22">Store Registration</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
    
<br>
    <center><a href="index.php" class="text-center">I already have a membership</a></center>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">
        $("#otpbtn").on('click', function (){
			var str = $("#phone").val();
			var n = str.length;
			if(n==10){
            $.ajax({
                url:'sendregotp.php',
                method:'post',
                data: JSON.stringify({phone:$("#phone").val()}),
                success:function(data){
                     $("#otpmessage").css('color','orange');
                     $("#otpmessage").html(data);
                     setTimeout(function(){ $("#otpmessage").html("");}, 10000);
                }
            })
			}
			else{
				$("#otpmessage").css('color','orange');
				$("#otpmessage").html("Invalid Mobile no.");
				setTimeout(function(){ $("#otpmessage").html("");}, 10000);
			}
        })
</script>	
<script>  
		$("#sponsor").keyup(function(){
		    $.ajax({
		        url:'getsp.php',
		        method:'post',
		        data: JSON.stringify({name:$(this).val()}),
		        success:function(data){
		             $("#fetchFullname").val(JSON.parse(data).message);
		        }
		    })
		})
	
$("#phone1").keyup(function(){
		    $.ajax({
		        url:'getphone.php',
		        method:'post',
		        data: JSON.stringify({phone:$(this).val()}),
		        success:function(data){
		             $("#fetchphone").val(JSON.parse(data).message);
		        }
		    })
		})
$("#email1").keyup(function(){
		    $.ajax({
		        url:'getregemail.php',
		        method:'post',
		        data: JSON.stringify({email:$(this).val()}),
		        success:function(data){
		             $("#fetchemail").val(JSON.parse(data).message);
		        }
		    })
		})
$("#aadhaar1").keyup(function(){
		    $.ajax({
		        url:'getaadhaar.php',
		        method:'post',
		        data: JSON.stringify({aadhaar:$(this).val()}),
		        success:function(data){
		             $("#fetchaadhaar").val(JSON.parse(data).message);
		        }
		    })
		})
$("#pan1").keyup(function(){
		    $.ajax({
		        url:'getpan.php',
		        method:'post',
		        data: JSON.stringify({pan:$(this).val()}),
		        success:function(data){
		             $("#fetchpan").val(JSON.parse(data).message);
		        }
		    })
		})

$("#otp").keyup(function(){
		    $.ajax({
		        url:'getotp-signup.php',
		        method:'get',
		        data:{ 
                      phone:$("#phone").val(), 
                      otp: $("#otp").val()
                  },
		        success:function(data){
		             $("#otp_status").val(data);
		             $("#otpmessage").html(data);
		        }
		    })
		})		
	
		function validate(){
			var password = document.getElementById("password").value; 
			var password2 = document.getElementById("password2").value; 
			var tpassword = document.getElementById("tpassword").value; 
			var tpassword2 = document.getElementById("tpassword2").value; 
			
			if(password!=password2){
				alert("Password and Confirm Password doesn't match. Please try again.")
				return false;
			}
			if(tpassword!=tpassword2){
				alert("Transaction Password and Confirm Transaction Password doesn't match. Please try again.")
				return false;
			}
			
			if (document.getElementById('checkterm').checked) {
            return true;
			} else {
				alert("Please accept the Terms and Conditions by clicking the check box.");
				return false;
			}
			otp = document.getElementById("otp_status").value;
			if ( otp.trim() == "Invalid OTP") {
			    alert("Please enter valid OTP.");
                return false;
			} else {
				return true;
			}
			
		}
	  </script>	
</body>
</html>
