<?php


function send_registration_message($user_name,$number,$userid,$password)
    {
  
      $message = "Dear ".$user_name." You have Successfully Registered. Your User ID is ".$userid." Password is ".$password." Thank You for joining with us. Spatto Travel www.spattoservices.com";


      $url="http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=Spatto&smstype=TRANS&numbers=".$number."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d";

    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geocode = curl_exec($ch);
       
    if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
            // convert response
            $output = json_decode($geocode);
     if($output->status == 'OK'){
      
     }
    }
    curl_close($ch);  
    
    
      }




function send_activation_message($user_name,$number,$userid,$password)
    {
  
      $message = "Dear ".$user_name." Your account has been successfully activated.Your User ID is ".$userid." Password is ".$password.". Spatto Travel www.spattoservices.com";


      $url="http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=Spatto&smstype=TRANS&numbers=".$number."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d";

    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geocode = curl_exec($ch);
       
    if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
            // convert response
            $output = json_decode($geocode);
     if($output->status == 'OK'){
      
     }
    }
    curl_close($ch);  
    
    
      }


function send_otp($user_name,$number,$otp,$message){


      $url="http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=Spatto&smstype=TRANS&numbers=".$number."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d";

    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geocode = curl_exec($ch);
       
    if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
            // convert response
            $output = json_decode($geocode);
     if(@$output->status == 'OK'){
      
     }
    }
    curl_close($ch); 
    
    
}

function send_reg_otp($number,$message){


      $url="http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=Spatto&smstype=TRANS&numbers=".$number."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d";

    
    $ch = curl_init();
             // Disable SSL verification
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
             // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             // Set the url
            curl_setopt($ch, CURLOPT_URL,$url);
            // Execute
            $result=curl_exec($ch);
            // Closing
            curl_close($ch); 
    
    
}

   







?>