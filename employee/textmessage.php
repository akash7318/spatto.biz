<?php


 function send_registration_message($user_name,$number,$userid,$password)
    {
  
      //$message = "Dear%20".$user_name."%20You%20have%20Successfully%20Registed.%20Your%20User%20ID%20is%20".$userid."%20Passord%20is%20".$password."%20Thank%20you%20for%20join%20with%20us.%20Dream%20Stars";

      $message = "Dear ".$name." Congratulations on your decision to join Play Dreams Services Pvt. Ltd. Login ID ".$userid." and Password is ".$password.".";
      
      $url="http://sms.bulksmsind.in/sendSMS?username=dreamstars&message=".$message."&sendername=PDREAM&smstype=TRANS&numbers=".$number."&apikey=808b71e9-8133-4b97-a40b-6c499fc81a85";


      //  Initiate curl
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


function send_activation_message($user_name,$number)
    {
  
      //$message = "Dear%20".$user_name."%20You%20have%20Successfully%20Registed.%20Your%20User%20ID%20is%20".$userid."%20Passord%20is%20".$password."%20Thank%20you%20for%20join%20with%20us.%20Dream%20Stars";

      $message = "Dear ".$name." Congratulations your account at Play Dreams Services Pvt. Ltd. has been successfully activated. ";
      
      $url="http://sms.bulksmsind.in/sendSMS?username=dreamstars&message=".$message."&sendername=PDREAM&smstype=TRANS&numbers=".$number."&apikey=808b71e9-8133-4b97-a40b-6c499fc81a85";


      //  Initiate curl
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


   function send_otp_message($user_name,$number,$userid,$otp)
    {
       $url = "http://sms.bulksmsind.in/sendSMS?username=dreamstars&message=Dear%20".$userid."%20Your%20one%20time%20password%20for%20change%20profile%20is%20".$otp.".%20Thank%20you%20for%20working%20with%20us.%20Play Dreams&sendername=PDREAM&smstype=TRANS&numbers=".$number."&apikey=808b71e9-8133-4b97-a40b-6c499fc81a85";

    echo $url;
       

      //  Initiate curl
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
    print_r($result);
    }



   







?>