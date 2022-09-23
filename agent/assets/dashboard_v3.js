// This is new code
$(document).ready(function(){
    // check surprise for user
//    $.ajax({
//        url: "../ajax/check_surprise.php",
//        dataType : "JSON",
//        success: function(data){
//            if(data['success'] == 1)
//            {
//                $("#celebration_modal span#surprise-percentage").text(data['percentage'] + "%");
//                $("#celebration_modal").modal("show");
//            }
//        },
//        error: function(data){
//            
//        }
//    });

    // last 10 PH show
    $(document).on("click", "#last-ph", function(e){
        e.preventDefault();

        if($(this).hasClass("show"))
        {
            $(this).removeClass("btn-bordered");
            $(this).text("Hide PH Transactions");

            let html = "";
            html += "<div class='col-lg-12 loader-container'>";
            html += "<div class='loader'>";
            html += "</div></div>";
            $("#last-ph-transaction-container").html(html);

            $.ajax({
                url: "../ajax/fech_last_ph_transaction.php",
                dataType : "JSON",
                success: function(data){
                    if(data[0]['success'] == 1)
                    {
                        let html = "";
                        for(let i=1; i<data.length; i++)
                        {
                            html += "<div class='col-lg-12'>";
                            html += "<div class='card bg-success'>";
                            html += "<div class='card-body'>";
                            html += "<div class='table-responsive'>";
                            html += "<table class='table table-striped' style='padding: 0; margin: 0; color: #f4f4f4'>";
                            html += "<tr style='font-size: 1rem'><th>Order Id</th><th>Sender</th><th>Receiver</th><th>Amount</th><th>Created On</th><th>Confirmed On</th></tr>";
                            html += "<tr style='font-size: 1rem'><td>"+data[i]['orderid']+"</td><td>"+data[i]['sender_fullname']+"</td><td>"+data[i]['receiver_fullname']+" ("+ data[i]['cur_address']+")</td><td>"+data[i]['amount']+" BTC</td><td>"+data[i]['created_at']+"</td><td>"+data[i]['updated_at']+"</td></tr>";
                            html += "<tr style='font-size: 1rem;'><td colspan='5'><p style='margin-top: 10px'>Check out more details on <a href='https://www.blockchain.com/btc/tx/"+data[i]['transaction_hash']+"' class='text-primary' style='font-size: 1.1rem' title='click here to see more details' target='_blank'>&nbsp;blockchain.info</a></p></td><td><a href='javascript:void(0)' class='btn w-lg btn-rounded btn-lg btn-success waves-effect waves-light' style='font-size: 1rem'>Success</a></td></tr>";
                            html += "</table></div></div></div></div>";
                        }

                        $("#last-ph-transaction-container").html(html);
                    }
                    else
                    {
                        let html = "";
                        html += "<div class='col-lg-12'>";
                        html += "<p class='lead text-center'>No Successful PH Available</p>";
                        html += "</div>"; 
                        $("#last-ph-transaction-container").html(html);  
                    }
                },
                error: function(data){
                    

                    let html = "";
                    html += "<div class='col-lg-12'>";
                    html += "<p class='lead text-center'>No Successful PH Available</p>";
                    html += "</div>"; 
                    $("#last-ph-transaction-container").html(html);  
                }
            });
            
            $(this).removeClass("show");            
        }
        else
        {
            $("#last-ph-transaction-container").children().hide(); 

            $(this).addClass("btn-bordered");
            $(this).addClass("show");
            $(this).text("Last 10 PH Transactions");
        }
    });

    // last 10 GH show
    $(document).on("click", "#last-gh", function(e){
        e.preventDefault();

        if($(this).hasClass("show"))
        {
            $(this).removeClass("btn-bordered");
            $(this).text("Hide GH Transactions");

            let html = "";
            html += "<div class='col-lg-12 loader-container'>";
            html += "<div class='loader'>";
            html += "</div></div>";
            $("#last-gh-transaction-container").html(html);

            $.ajax({
                url: "../ajax/fetch_last_gh_transaction.php",
                dataType : "JSON",
                success: function(data){

                    if(data[0]['success'] == 1)
                    {
                        let html = "";
                        for(let i=1; i<data.length; i++)
                        {
                            html += "<div class='col-lg-12'>";
                            html += "<div class='card bg-warning'>";
                            html += "<div class='card-body'>";
                            html += "<div class='table-responsive'>";
                            html += "<table class='table table-striped' style='padding: 0; margin: 0; color: #f4f4f4'>";
                            html += "<tr style='font-size: 1rem'><th>Order Id</th><th>Sender</th><th>Receiver</th><th>Amount</th><th>Created On</th><th>Paid On</th></tr>";
                            html += "<tr style='font-size: 1rem'><td>"+data[i]['orderid']+"</td><td>"+data[i]['sender_fullname']+"</td><td>"+data[i]['receiver_fullname']+" ("+ data[i]['receiver_BTC_address']+")</td><td>"+data[i]['amount']+" BTC</td><td>"+data[i]['created_at']+"</td><td>"+data[i]['updated_at']+"</td></tr>";
                            html += "<tr style='font-size: 1rem;'><td colspan='5'><p style='margin-top: 10px'>Check out more details on <a href='https://www.blockchain.com/btc/tx/"+data[i]['transaction_hash']+"' class='text-primary' style='font-size: 1.1rem' title='click here to see more details' target='_blank'>&nbsp;blockchain.info</a></p></td><td><a href='javascript:void(0)' class='btn w-lg btn-rounded btn-lg btn-warning waves-effect waves-light' style='font-size: 1rem'>Success</a></td></tr>";
                            html += "</table></div></div></div></div>";
                        }

                        $("#last-gh-transaction-container").html(html);
                    }
                    else
                    {
                        let html = "";
                        html += "<div class='col-lg-12'>";
                        html += "<p class='lead text-center'>No Successful GH Available</p>";
                        html += "</div>"; 
                        $("#last-gh-transaction-container").html(html);  
                    }
                },
                error: function(data){
                    

                    let html = "";
                    html += "<div class='col-lg-12'>";
                    html += "<p class='lead text-center'>No Successful GH Available</p>";
                    html += "</div>"; 
                    $("#last-gh-transaction-container").html(html);     
                }
            });
            
            $(this).removeClass("show");            
        }
        else
        {
            $("#last-gh-transaction-container").children().hide(); 

            $(this).addClass("btn-bordered");
            $(this).addClass("show");
            $(this).text("Last 10 GH Transactions");
        }
    });

    // This is timer for the ph to complete 
    var tim_interval = window.setInterval(function(){
        let hours = $(".hours").text();
        let minutes = $(".minutes").text();
        let seconds = $(".seconds").text();
        
        let sec = seconds - 1;
        sec = ('0' + sec).slice(-2)
        if(sec > 0){
            $(".seconds").text(sec);
        }
        else{
            var min = minutes - 1;
            min = ('0' + min).slice(-2)
            $(".minutes").text(min);
            $(".seconds").text("60");
        }

        if(min == 0){
            if(hours > 0){
                let hour = hours - 1;
                hour = ('0' + hour).slice(-2)
                $(".hours").text(hour);
                $(".minutes").text("60");
            }
            else
            {
                clearInterval(tim_interval);  
                $(".hours").text("00");   
                $(".minutes").text("00");   
                $(".seconds").text("00");   

                // send ajax request here to check if user has completed his ph request in given time or not, if not then block his account
                $.ajax({
                    url: "../ajax/check_user_ph.php",
                    dataType : "JSON",
                    success: function(data){
                        
                        if(data['success'] == 1)
                        {
                            window.location.href = "index.php?msg=2";
                        }
                    },
                    error: function(data){
                        
                    }
                });
            }
        }   
    }, 1000);

    var tim_interval = window.setInterval(function(){
        let hours = $(".hours1").text();
        let minutes = $(".minutes1").text();
        let seconds = $(".seconds1").text();

        if(hours == "00" && minutes == "00" && seconds == "00")
        {
        }
        else
        {
            let sec = seconds - 1;
            sec = ('0' + sec).slice(-2)
            if(sec > 0){
                $(".seconds1").text(sec);
            }
            else{
                var min = minutes - 1;
                min = ('0' + min).slice(-2)
                $(".minutes1").text(min);
                $(".seconds1").text("60");
            }

            if(min == 0){
                if(hours > 0){
                    let hour = hours - 1;
                    hour = ('0' + hour).slice(-2)
                    $(".hours1").text(hour);
                    $(".minutes1").text("60");
                }
                else
                {
                    clearInterval(tim_interval);  
                    $(".hours1").text("00");   
                    $(".minutes1").text("00");   
                    $(".seconds1").text("00");

                    // send ajax request here to check if user has completed his ph request in given time or not, if not then block his account
                    $.ajax({
                        url: "../ajax/check_user_gh.php",
                        dataType : "JSON",
                        success: function(data){
                            
                            if(data['success'] == 1)
                            {
                                alert("Sorry, Your GH has been rejected. Please contact admin for more information");
                                window.location.href = "dashboard.php";
                            }
                        },
                        error: function(data){
                            
                        }
                    });   
                }
            } 
        }
    }, 1000);

    // step-1 : user will click on provide help button, then  we will show him modal box to enter amount, an amount entered by user must be greater than the previous ph amount
    $(document).on("click", "#btn-ph", function(){

        let is_disabled = $(this).hasClass("disabled");

        if(is_disabled == false)
        {
            if(confirm("Are you sure you want to PH ?"))
            {
                $("#phAmtModal").modal("show");   
            }
        }
        else
        {
            alert("You are not able to PH now. Please complete your GH before applying for PH");
        }
    });

    // step-2: this is form submission where user will submit how much amount he wants to ph, we will check here that if the entered amount by user is between 0.001 BTC to 1 BTC and entered amount is greater than the the previous ph amount
    $("#frmPHAmount").on("submit", function(e){
        e.preventDefault();
        let ph_amount = $("#frmPHAmount #PhAmount").val();
        $("#frmPHAmount #btnsubmitPhAmount").text("Processing...");

        if(ph_amount >= 5000)
        {

            $.ajax({
                url: "ajax/add_ph.php",
                method: "POST",
                data: {'amount': ph_amount},
                dataType: "JSON",
                success: function(data){
                    
                    if(data['success'] == 0)
                    {
                        alert("None");
                        $("#frmPHAmount #btnsubmitPhAmount").text("Proceed");
                        $("#frmPHAmount .ph_amt_error_msg").text(data['message']).css("color","red");
                        
                    }
                    else if(data['success'] == 1)
                    {
                        alert("Congratulations, Your PH request ( Rs. "+data['amount']+") is created.");
                        window.location.href = "dashboard.php";
                    }
                },
                error: function(data){
                    
                    $("#frmPHAmount #btnsubmitPhAmount").text("Proceed");
                }
            });
        }
        else
        {
            $("#frmPHAmount #btnsubmitPhAmount").text("Proceed");
            $("#frmPHAmount .ph_amt_error_msg").text("Amount must be Selected").css("color","red");
        }
    });

    // once a new ph link created for user, he can click on paynow button to proceed furthur and pay us BTC
    // step-3 trigger an event on paynow click
    $(document).on("click", ".pay-now", function(e){
        e.preventDefault();

        $("#paynow-modal").modal("show");

        $("#paynow-modal .wait_message").text("Please wait....");

        let ph_id = $(this).attr("data-id");
        
        //fetch details of this ph
        $.ajax({
            url: "ajax/fetch_ph_data.php",
            method: "POST",
            data: {ph_id : ph_id},
            dataType : "JSON",
            success: function(data){
                if(data['success'] == 0)
                {
                    $("#paynow-modal .wait_message").text(data['message']).css("color", "red");
                }
                else if(data['success'] == 1)
                {
                    $("#paynow-modal .wait_message").text("");


                    //$('.trsn_qr_code').attr("src","https://chart.googleapis.com/chart?chs=125x125&cht=qr&chl="+data['ph_data']['cur_address']);

//                    $(".trsn_receiver_name").text(data['ph_data']['receiver_name'] );
                    $(".trsn_bank").text(data['ph_data']['receiver_bank']);
                    $(".account").text(data['ph_data']['account']);
                    $(".ifsc").text(data['ph_data']['ifsc']);
                    $(".name").text(data['ph_data']['name']);
                    $(".phone").text(data['ph_data']['phone']);
                    $(".email").text(data['ph_data']['email']);
                    $(".trsn_amount").text(data['ph_data']['amount']);
                    
                    $(".btc").text(data['ph_data']['btc']);
                    $(".paytm").text(data['ph_data']['paytm']);
                    $(".gpay").text(data['ph_data']['gpay']);
                    $(".phonepe").text(data['ph_data']['phonepe']);
                    $(".upi").text(data['ph_data']['upi']);
                    $(".netteller").text(data['ph_data']['netteller']);
                    $(".skrill").text(data['ph_data']['skrill']);
                    $(".payoneer").text(data['ph_data']['payoneer']);
                    
                    $("#hid_gh_id").val(data['ph_data']['ph_id']);
                
                    // open BTC socket to know if transaction is completed or not. it will continously check transaction
//                    var btcs = new WebSocket('wss://ws.blockchain.info/inv');
//
//                    btcs.onopen = function()
//                    {
//                        btcs.send(JSON.stringify({"op":"addr_sub", "addr": data['ph_data']['cur_address']}));
//                    };
//
//                    btcs.onmessage = function(onmsg)
//                    {
//                      var response = JSON.parse(onmsg.data);
//                      var getOuts = response.x.out;
//                      var countOuts = getOuts.length; 
//                      for(i = 0; i < countOuts; i++)
//                      {
//                        var outAdd = response.x.out[i].addr;
//                        var specAdd = data['ph_data']['cur_address'];
//                           if (outAdd == specAdd )
//                           {
//                               var amount = response.x.out[i].value;
//                               var calAmount = amount / 100000000;
//                               alert("Payment sent of " + calAmount + " BTC")
//                               window.location.href = "dashboard.php";
//                           }
//                      } 
//                    }
                }
            },
            error : function(data){
                
            }
        });

        //set ph id in transaction code form
        $("#frmTransactionCode #trsn_code_ph_id").val(ph_id);
    });


    // Till now user has completed the process of PH and PH is successfully completed
    // step-4: now we will allow user to spin and earn his growth
    $(document).on("click", "#btn-spin", function(e){
        e.preventDefault();
        let is_disabled = $(this).hasClass("disabled");
        let url = $(this).attr("href");

        if(is_disabled == false)
        {
            if(confirm("Are you sure you want to spin the wheet to earn growth ?"))
            { 
                window.open(url,'targetWindow',
                                   'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,height='+screen.height+', width='+screen.width);
            }
        }
        else
        {
            alert("Sorry, You have no spin today, Better luck next time");   
        }
    });

    // if 11 days has been from the day of PH, so user can GH now. He will click on Get Help button
    //step-5: We will verify user's BTC address, and once it is confirmed we will display him a GH link
    // first we will fetch BTC address and display it in modal box 
    $(document).on("click", "#btn-gh", function(){

        let is_disabled = $(this).hasClass("disabled");

        if(is_disabled == false)
        {
        	if (confirm("Are you sure, you want to apply for GH ?"))
        	{
        		$.ajax({
		            url: "../ajax/add_gh.php",
		            method: "POST",
		            dataType : "JSON",
		            success: function(data)
		            {
		                if(data['success'] == 0)
		                {
		                    alert(data['message']);
		                }
		                else if(data['success'] == 1)
		                {
		                    alert("Congratulations, Your GH link is created. You will receive your GH in next 48 hours");
		                    location.reload();
		                }
		                else
		                {
		                    alert("Failed to create GH Request. Please try again");
		                    location.reload();
		                }
		            },
		            error: function(data)
		            {
		            	    
		            }
		        });
        	}
        }
        else
        {
            alert("You are not able to GH now. Please apply or complete your PH before applying for GH");
        }
    });

    // if user click on more details on gh link then we will send ajax request to fetch the data related to that gh request
    $(document).on("click", ".btn-gh-more", function(e){
        e.preventDefault();

        $("#gh-more-modal").modal("show");
        $("#gh-more-modal .wait_message").text("Please wait...");

        let gh_id = $(this).attr("data-id");
        $.ajax({
            url: "ajax/fetch_gh_details.php",
            method: "POST",
            data: {gh_id : gh_id},
            dataType : "JSON",
            success: function(data){
                
                if(data['success'] == 0)
                {
                    $("#gh-more-modal .wait_message").text(data['message']).css("color", "red");
                }
                else if(data['success'] == 1)
                {
                    let html = "<div class='row'>";
                    html += "<div class='col-lg-12'>";
                    html += "<table class='table table-bordered' width='60%' style='font-weight:bold'>";

                    html += "<tr>";
                    html += "<td width:'20%'>Original Amount</td>";
                    html += "<td>" + data['amount'];
                    html += "&nbsp;&nbsp;&nbsp;(Frozen : " + data['frozen_amount'] + ") BTC</td>";
                    html += "</tr>";

                    html += "<tr>";
                    html += "<td colspan='2'>GROWTH HISTORY</td>";
                    html += "</tr>";

                    html += "<tr>";
                    html += "<td>Created On</td>";
                    html += "<td>Growth (in BTC)</td>";
                    html += "</tr>";

                    for(let i=0; i<data['growth_data'].length; i++)
                    {
                        html += "<tr>";
                        html += "<td>" + data['growth_data'][i]['created_at'] + "</td>";
                        html += "<td>" + data['growth_data'][i]['growth_amount'] + " (";
                        html += data['growth_data'][i]['growth_per'] + "%) </td>";
                        html += "</tr>";
                    }

                    html += "<tr>";
                    html += "<td>Total Growth :</td>";
                    html += "<td>" + data['growth_amount'] + " BTC</td>";
                    html += "</tr>";

                    html += "<tr>";
                    html += "<td>Total GH Amount :</td>";
                    let total_gh_amount = parseFloat(data['original_amount']) + parseFloat(data['growth_amount']);
                    html += "<td>" + total_gh_amount.toFixed(10);
                    html + " BTC</td>";
                    html += "</tr>";

                    html += "</div>";
                    html += "</div>";
                    html += "</div>";

                    $("#gh-more-modal .wait_message").text("");
                    $("#gh-more-modal .modal-body").html(html);
                }
            },
            error: function(data){
                
            }
        });
    });

    $(document).on("click", ".btn-gh-accept", function(e){
        e.preventDefault();

        let gh_id = $(this).attr("data-id");
        $.ajax({
            url: "ajax/accept_ph.php",
            method: "POST",
            data: {gh_id : gh_id},
            dataType : "JSON",
            success: function(data){
                if(data['success'] == 0)
                {
                    $("#paynow-modal .wait_message").text(data['message']).css("color", "red");
                }
                else if(data['success'] == 1)
                {
                    //$("#paynow-modal .wait_message").text("");
                    //$(".name").text(data['ph_data']['name']);
                    alert("Congratulations, You have accepted PH request succesfully.");
                    window.location.href = "dashboard.php";
                

                }
            },
            error : function(data){
                
            }
        });
    });
    
    $(document).on("click", ".btn-gh-reject", function(e){
        e.preventDefault();

        let gh_id = $(this).attr("data-id");
        $.ajax({
            url: "ajax/reject_ph.php",
            method: "POST",
            data: {gh_id : gh_id},
            dataType : "JSON",
            success: function(data){
                if(data['success'] == 0)
                {
                    $("#paynow-modal .wait_message").text(data['message']).css("color", "red");
                }
                else if(data['success'] == 1)
                {
                    //$("#paynow-modal .wait_message").text("");
                    //$(".name").text(data['ph_data']['name']);
                    alert("Congratulations, You have rejected PH request succesfully.");
                    window.location.href = "dashboard.php";
                

                }
            },
            error : function(data){
                
            }
        });
    });

    $("#frmHapinessLetter").on("submit", function(e){
        e.preventDefault();
        
        $("#frmHapinessLetter #btnsubmitHapinessLetter").text("Submitting..");
        
        $.ajax({
            url: "../ajax/add_hapiness_letter.php",
            method: "POST",
            data: $(this).serialize(),
            dataType : "JSON",
            success: function(data){
                //
                if(data['success'] == 1)
                {
                    $("#frmHapinessLetter #btnsubmitHapinessLetter").text("Submit");
                    $("#frmHapinessLetter .hapiness_letter_error_msg").text("");
                    alert("Thanks for writing Happiness Letter. We really appriciate your initiative");
                    $("#hapinessLetterModal").modal("hide");
                }
                else
                {
                    $("#frmHapinessLetter #btnsubmitHapinessLetter").text("Submit");
                    $("#frmHapinessLetter .hapiness_letter_error_msg").text(data['message']).css("color", "red");
                }
            },
            error: function(data){
                
            }
        });

    });
    
    
    
    $("#frmSubmitSlip").on("submit", function(e){
        e.preventDefault();
        
        $("#frmSubmitSlip #btnsubmitSlip").text("Submitting..");
        var formData = new FormData(this);
        formData.append("file", this.file, this.getName());
        formData.append("upload_file", true);
        $.ajax({
            url: "ajax/add_slip.php",
            method: "POST",
            enctype: 'multipart/form-data',
            dataType : "JSON",
            //data: $(this).serialize(),
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data['success']);
                if(data['success'] == 1)
                {
                    $("#frmSubmitSlip #btnsubmitSlip").text("Submit");
                    $("#frmSubmitSlip .slip_error_msg").text("");
                    alert("Thanks for submitting proof for Payment. We really appriciate your initiative");
                    $("#paynow-modal").modal("hide");
                    $("#frmSubmitSlip .slip_error_msg").text(data['message']).css("color", "red");
                }
                else
                {
                    $("#frmSubmitSlip #btnsubmitSlip").text("Submit");
                    $("#frmSubmitSlip .hapiness_letter_error_msg").text(data['message']).css("color", "red");
                }
            },
            error: function(data){
                
            }
        });

    });
    
    
    
    
    
    
    
}); 