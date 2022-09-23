<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Spatto Services | Registration Page</title>
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div style="margin-left: 150px; margin-right: 150px; margin-top: 50px;">
  <div class="register-logo">
    <a href="#"><b>Spatto</b>Services</a>
  </div>

  <div class="register-box-body">
<!--    <p class="login-box-msg">-->
	  <h3 align="center">Register a new membership</h3>
<!--	  </p>-->
<center> <span style="color: red;"><?=@$_GET['errmsg']?></span></center>
    <br>
<!--   -->
	<form data-form-output="form-output-global" data-form-type="contact" method="post" action="submit.php" class=" text-left" onSubmit="return validate()">
    <input type="hidden" name="otp_status" id="otp_status">                                       

                                        <div class="register">



                                            <div class="row">
                                                
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>  Referral ID: </label>
                                                        <input type="text" id="sponsor" name="sponsor" value="<?=@$_GET['ref']?>" class="form-control" required="" />
                                                        <span id="spnDetails"></span>
                                                    </div>
                                                </div>
												<div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <input type="text" id="fetchFullname" class="form-control" readonly/>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label>Title</label>
<!--                                                        <input type="text" id="name" name="name" class="form-control" />-->
														<select class="form-control" name="title">
															<option>Select</option>
															<option value="Mr.">Mr.</option>
															<option value="Mrs.">Mrs.</option>
															<option value="Ms.">Ms.</option>
															<option value="Dr.">Dr.</option>
														</select>
                                                    </div>
                                                </div>
												<div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" required=""/>
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Email ID<span class="mendatory">*</span></label>
                                                        <input type="text" id="email" name="email" class="form-control" required="" />
                                                    </div>
                                                </div>
												<div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <input type="text" id="fetchemail" class="form-control" readonly/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Country</label>

                                                        <select class="form-control input-log-cls" id="country" name="country"><option value="1">Afghanistan</option>
<option value="2">Albania</option>
<option value="3">Algeria</option>
<option value="4">American Samoa</option>
<option value="5">Andorra</option>
<option value="6">Angola</option>
<option value="7">Anguilla</option>
<option value="8">Antigua And Barbuda</option>
<option value="9">Argentina</option>
<option value="10">Armenia</option>
<option value="11">Aruba</option>
<option value="12">Australia</option>
<option value="13">Austria</option>
<option value="14">Azerbaijan</option>
<option value="15">Bahamas</option>
<option value="16">Bahrain</option>
<option value="17">Bangladesh</option>
<option value="18">Barbados</option>
<option value="19">Belarus</option>
<option value="20">Belgium</option>
<option value="21">Belize</option>
<option value="22">Benin</option>
<option value="23">Bermuda</option>
<option value="24">Bhutan</option>
<option value="25">Bolivia</option>
<option value="26">Bosnia And Herzegovina</option>
<option value="27">Botswana</option>
<option value="28">Brazil</option>
<option value="29">British Indian Ocean Territory</option>
<option value="30">British Virgin Islands</option>
<option value="31">Brunei</option>
<option value="32">Bulgaria</option>
<option value="33">Burkina Faso</option>
<option value="34">Burma</option>
<option value="35">Burundi</option>
<option value="36">Cambodia</option>
<option value="37">Cameroon</option>
<option value="38">Canada</option>
<option value="39">Cape Verde</option>
<option value="40">Cayman Islands</option>
<option value="41">Central African Republic</option>
<option value="42">Chad</option>
<option value="43">Chile</option>
<option value="44">China</option>
<option value="45">Colombia</option>
<option value="46">Comoros</option>
<option value="47">Congo Democratic Republic</option>
<option value="48">Congo Republic</option>
<option value="49">Cook Islands</option>
<option value="50">Costa Rica</option>
<option value="51">Cote Divoire</option>
<option value="52">Croatia</option>
<option value="53">Cuba</option>
<option value="54">Cyprus</option>
<option value="55">Czech Republic</option>
<option value="56">Denmark</option>
<option value="57">Djibouti</option>
<option value="58">Dominica</option>
<option value="59">Dominican Republic</option>
<option value="60">East Timor</option>
<option value="61">Egypt</option>
<option value="62">El Salvador</option>
<option value="63">England</option>
<option value="64">Ecuador</option>
<option value="65">Equatorial Guinea</option>
<option value="66">Eritrea</option>
<option value="67">Estonia</option>
<option value="68">Ethiopia</option>
<option value="69">Falkland Islands</option>
<option value="70">Faroe Islands</option>
<option value="71">Fiji</option>
<option value="72">Finland</option>
<option value="73">France</option>
<option value="74">French Polynesia</option>
<option value="75">Gabon</option>
<option value="76">Gambia</option>
<option value="77">Georgia</option>
<option value="78">Germany</option>
<option value="79">Ghana</option>
<option value="80">Gibraltar</option>
<option value="81">Great Britain</option>
<option value="82">Greece</option>
<option value="83">Greenland</option>
<option value="84">Grenada</option>
<option value="85">Guam</option>
<option value="86">Guatemala</option>
<option value="87">Guernsey</option>
<option value="88">Guinea</option>
<option value="89">Guinea Bissau</option>
<option value="90">Guyana</option>
<option value="91">Haiti</option>
<option value="92">Honduras</option>
<option value="93">Hong Kong</option>
<option value="94">Hungary</option>
<option value="95">Iceland</option>
<option selected="selected" value="India">India</option>
<option value="97">Indonesia</option>
<option value="98">Iran</option>
<option value="99">Iraq</option>
<option value="100">Ireland</option>
<option value="101">Isle Of Man</option>
<option value="102">Israel</option>
<option value="103">Italy</option>
<option value="104">Jamaica</option>
<option value="105">Japan</option>
<option value="106">Jersey</option>
<option value="107">Jordan</option>
<option value="108">Kazakhstan</option>
<option value="109">Kenya</option>
<option value="110">Kiribati</option>
<option value="111">Kuwait</option>
<option value="112">Kyrgyzstan</option>
<option value="113">Laos</option>
<option value="114">Latvia</option>
<option value="115">Lebanon</option>
<option value="116">Lesotho</option>
<option value="117">Liberia</option>
<option value="118">Libya</option>
<option value="119">Liechtenstein</option>
<option value="120">Lithuania</option>
<option value="121">Luxembourg</option>
<option value="122">Macau</option>
<option value="123">Macedonia</option>
<option value="124">Madagascar</option>
<option value="125">Malawi</option>
<option value="126">Malaysia</option>
<option value="127">Maledives</option>
<option value="128">Mali</option>
<option value="129">Malta</option>
<option value="130">Marshall Islands</option>
<option value="131">Martinique</option>
<option value="132">Mauretania</option>
<option value="133">Mauritius</option>
<option value="134">Mexico</option>
<option value="135">Micronesia</option>
<option value="136">Moldova</option>
<option value="137">Monaco</option>
<option value="138">Mongolia</option>
<option value="139">Montserrat</option>
<option value="140">Morocco</option>
<option value="141">Mozambique</option>
<option value="142">Namibia</option>
<option value="143">Nauru</option>
<option value="144">Nepal</option>
<option value="145">Netherlands</option>
<option value="146">Netherlands Antilles</option>
<option value="147">New Zealand</option>
<option value="148">Nicaragua</option>
<option value="149">Niger</option>
<option value="150">Nigeria</option>
<option value="151">Niue</option>
<option value="152">Norfolk Island</option>
<option value="153">North Korea</option>
<option value="154">Northern Mariana Islands</option>
<option value="155">Norway</option>
<option value="156">Oman</option>
<option value="157">Pakistan</option>
<option value="158">Palau</option>
<option value="159">Panama</option>
<option value="160">Papua New Guinea</option>
<option value="161">Paraquay</option>
<option value="162">Peru</option>
<option value="163">Philippines</option>
<option value="164">Pitcairn Islands</option>
<option value="165">Poland</option>
<option value="166">Portugal</option>
<option value="167">Puerto Rico</option>
<option value="168">Qatar</option>
<option value="169">Romania</option>
<option value="170">Russia</option>
<option value="171">Rwanda</option>
<option value="172">Saint Helena</option>
<option value="173">Saint Kitts And Nevis</option>
<option value="174">Saint Lucia</option>
<option value="175">Saint Pierre And Miquelon</option>
<option value="176">Saint Vincent And The Grenadines</option>
<option value="177">Samoa</option>
<option value="178">San Marino</option>
<option value="179">Sao Tome And Principe</option>
<option value="180">Saudi Arabia</option>
<option value="181">Scotland</option>
<option value="182">Senegal</option>
<option value="183">Serbia Montenegro</option>
<option value="184">Seychelles</option>
<option value="185">Sierra Leone</option>
<option value="186">Singapore</option>
<option value="187">Slovakia</option>
<option value="188">Slovenia</option>
<option value="189">Solomon Islands</option>
<option value="190">Somalia</option>
<option value="191">South Africa</option>
<option value="192">South Georgia</option>
<option value="193">South Korea</option>
<option value="194">Spain</option>
<option value="195">Sri Lanka</option>
<option value="196">Sudan</option>
<option value="197">Suriname</option>
<option value="198">Swaziland</option>
<option value="199">Sweden</option>
<option value="200">Switzerland</option>
<option value="201">Syria</option>
<option value="202">Taiwan</option>
<option value="203">Tajikistan</option>
<option value="204">Tanzania</option>
<option value="205">Thailand</option>
<option value="206">Tibet</option>
<option value="207">Togo</option>
<option value="208">Tonga</option>
<option value="209">Trinidad And Tobago</option>
<option value="210">Tunisia</option>
<option value="211">Turkey</option>
<option value="212">Turkmenistan</option>
<option value="213">Turks And Caicos Islands</option>
<option value="214">Tuvalu</option>
<option value="215">Uganda</option>
<option value="216">Ukraine</option>
<option value="217">United Arab Emirates</option>
<option value="218">Uruquay</option>
<option value="219">UNITED STATES</option>
<option value="220">Uzbekistan</option>
<option value="221">Vanuatu</option>
<option value="222">Vatican City</option>
<option value="223">Venezuela</option>
<option value="224">Vietnam</option>
<option value="225">Virgin Islands</option>
<option value="226">Wales</option>
<option value="227">Wallis And Futuna</option>
<option value="228">Yemen</option>
<option value="229">Zambia</option>
<option value="230">Zimbabwe</option>
<option value="231">UNITED KINGDOM</option>
<option value="236">Afganista</option>
<option value="237">Uzbekistan</option>
</select>
                                                      <span id="flagimg" style="display:none;"></span>
                                                        <div class="clearfix"></div>
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
                                                        <label>&nbsp;</label>
                                                        <input type="text" id="fetchphone" class="form-control" readonly/>
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

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="text-left">Aadhaar Card<span class="mendatory">*</span></label>
                                                        <input type="number" id="aadhaar" name="aadhaar" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <input type="text" id="fetchaadhaar" class="form-control" readonly/>
                                                    </div>
                                                </div>
												
                                                <div class="col-sm-3  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Pan Card<span class="mendatory">*</span></label>
                                                        <input type="text" id="pan" name="pan" class="form-control" required/>
                                                    </div>
                                                </div>
												<div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <input type="text" id="fetchpan" class="form-control" readonly/>
                                                    </div>
                                                </div>
												
												<div class="col-sm-6  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Pin Code<span class="mendatory">*</span></label>
                                                        <input type="text" id="pincode" name="pincode" class="form-control" required/>
                                                    </div>
                                                </div>        
                                               <div class="col-sm-6  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Address<span class="mendatory">*</span></label>
                                                        <textarea id="address" name="address" class="form-control" required style="line-height: 1"></textarea>
                                                    </div>
                                                </div>
                                        		
                                                
<!--
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="text-left">Transaction Password<span class="mendatory">*</span></label>
                                                        <input type="password" id="tpassword" name="tpassword" class="form-control" />

                                                        <div class="progress progress-stripedtranscation active" style="display: none">
                                                            <div id="jak_pstrengthtransaction" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">Trasaction Password Strength</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6  pass-log-trans">
                                                    <div class="form-group">
                                                        <label class="text-left">Confirm Transaction Password<span class="mendatory">*</span></label>
                                                        <input type="password" id="tpassword2" name="tpassword2" class="form-control" />
                                                    </div>
                                                </div>
-->

												 <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="text-left">OTP Verification<span class="mendatory">*</span></label>
														<input type="text" name='otp' id='otp' placeholder="Enter Mobile Verification OTP code" class="form-control" required>
                                                    </div>
												<span id="otpmessage" style="color:red"></span>		 
                                                </div>
												<div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="text-left">&nbsp;</label>
                                                        <input type='button' id="otpbtn" value='Send Mobile OTP' class="form-control">
														
                                                    </div>
												
                                                </div>
												

												
                                                <div class="col-sm-12"  style="padding-top: 20px;">
                                                    <div id="divTerms" class="clearfix">
                                                        <input id="checkterm" type="checkbox"/>&nbsp;&nbsp;<span class="mendatory">*</span>
                                                        <span>I Accept</span> <a id="termOfUse12">Term and Conditions</a>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2" style="padding-top: 20px;">
                                                    <button type="submit" class="btn btn-primary btn-block btn-sm offset-top-22">registration</button>
                                                    
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
	
$("#phone").keyup(function(){
		    $.ajax({
		        url:'getphone.php',
		        method:'post',
		        data: JSON.stringify({phone:$(this).val()}),
		        success:function(data){
		             $("#fetchphone").val(JSON.parse(data).message);
		        }
		    })
		})
$("#email").keyup(function(){
		    $.ajax({
		        url:'getregemail.php',
		        method:'post',
		        data: JSON.stringify({email:$(this).val()}),
		        success:function(data){
		             $("#fetchemail").val(JSON.parse(data).message);
		        }
		    })
		})
$("#aadhaar").keyup(function(){
		    $.ajax({
		        url:'getaadhaar.php',
		        method:'post',
		        data: JSON.stringify({aadhaar:$(this).val()}),
		        success:function(data){
		             $("#fetchaadhaar").val(JSON.parse(data).message);
		        }
		    })
		})
$("#pan").keyup(function(){
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
