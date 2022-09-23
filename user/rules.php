<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Spatto Services | Rules</title>
  <!-- Tell the browser to be responsive to screen width -->
<style>
*{
    /*color: #fe6600;*/
    color: #333;
font-family: 'Source Sans Pro',sans-serif;
}


@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}

</style>
</head>
<!--<body style="background-image: url('login-bg.jpg');">-->

<body style="background-color: #fff;margin:0px;">

<div >
  

  <div class="register-box-body" >

<!--onsubmit="return confirm('Do you agree with the Terms and Conditions?');"-->

	<form data-form-output="form-output-global" data-form-type="contact" method="post" action="signup.php" class=" text-left" >
    

                                        <div class="register">

                                            <div class="row" style="text-align: center;">
                                                <div id="GFG" >
                                                <!--<img src="/user/growth-chart-final.jpeg" style="width:-webkit-fill-available">    	    	-->
                                                <img src="/user/spatto-shopkeeper-agreement-short.jpg" style="width:-webkit-fill-available">
                                                </div>
                                                <!--<embed src="spatto-rules-consumer.pdf#page=1&zoom=300" width="575" height="500">-->
                            <!--<embed src="https://drive.google.com/viewerng/viewer?embedded=true&url=https://spatto.co/user/spatto-rules.pdf" width="380" height="575">-->
                                                
                                                   
                                                   <center>   
                                                   <!--<input type="button" value="Agree!!" style="color: white; cursor: pointer; font-size: 18px; font-weight: 900; transition: 0.5s; height: 50px; border-radius: 15px; background: #fe6600; display: inline-block; border: 0; width: 250px;" class="btn btn-primary btn-block btn-sm offset-top-22" onclick="printDiv()"> </center>-->
                                                
                                            <div class="col-sm-2" style="padding-top: 20px;float: none;margin-left: auto;margin-right: auto;">
                                                    <!--<button type="submit" style="background-color: #1f9810;border-color: #166e0b;color: #fff;width: 100px;height: 35px;font-size: 14px; " class="btn btn-primary btn-block btn-sm offset-top-22">A/C Open</button>-->
                                                    
                                                    
                                        <!--<span style="font-size: 16px;font-weight: 700; text-decoration:none;">I agree to the all the terms and conditions of the company.</span>-->
                                        
                                        <div style="font-size: 16px; font-weight: 700; text-decoration: none; width: 90%;">
                                            <input type="checkbox" required  value="check" name="cbox" id="cbox" onchange="onCbChange('cbox')" style="transform: scale(2); margin-right: 15px;"/> 
                                            I Agree!</div>
                                        
                                        
                                                    <!--<a href="profit-chart.php" target="_blank" style="font-weight: 700; font-size: 18px; text-decoration: none; color: rgb(41, 144, 235);">view Profit Chart</a>-->
                                                    <br><br>
                                                    
                                                    <button type="submit" style="color: white; cursor: pointer; font-size: 22px; font-weight: 900; transition: 0.5s; height: 50px; border-radius: 15px; background: #1f9810; display: inline-block;border: 0;width: 250px;" class="btn btn-primary btn-block btn-sm offset-top-22">A/C Open</submit>
                                                    
                                                    <!--<button type="submit" style="color: white; cursor: pointer; font-size: 32px; font-weight: 900; transition: 0.5s; height: 80px; border-radius: 15px; background: #1f9810; display: inline-block;border: 0;width: 250px;" class="btn btn-primary btn-block btn-sm offset-top-22">Profit Chart</submit>-->
                                                   
                                                    
                                                </div>
                                                
                                                
                                        </div>
                                    </form>
    
<br>
    <center><a href="#" style="font-size: 16px;font-weight: 700; text-decoration:none;" class="text-center">I am ready for A/C Opening</a></center>
    <br>
                                                 
    <br>
    <br>
    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > ');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
        
        
        function onCbChange(cb) { var b = document.getElementById(cb).checked;

            var confirmBox = confirm("Do you agree with the Terms and Conditions?");
            
            if (confirmBox == true) {
                if (b) {
                    document.getElementById(cb).checked = true;
                } else {
                    document.getElementById(cb).checked = false;
                }
            } else {
            
                document.getElementById(cb).checked = !b;
            };
        }
        
    </script>
</body>
</html>
