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
.clearfix {
  overflow: auto;
}
</style>
</head>
<!--<body style="background-image: url('login-bg.jpg');">-->

<body style="background-color: #fff;margin:0px;">

<div >
  

  <div class="register-box-body" >


    
<!--   -->
	<form data-form-output="form-output-global" data-form-type="contact" method="post" action="signup.php" class=" text-left" >
    

                                        <div class="register">

                                            <div class="row" style="text-align: center;">
                                                
                                                <img src="/user/growth-chart-final.jpeg" style="width:-webkit-fill-available">
                                                <!--<embed src="spatto-rules-consumer.pdf#page=1&zoom=300" width="575" height="500">-->
                            <!--<embed src="https://drive.google.com/viewerng/viewer?embedded=true&url=https://spatto.co/user/spatto-rules.pdf" width="380" height="575">-->
                                                
                                                <div id="GFG" style="display:none">	    	
                                                <img src="/user/spatto-shopkeeper-agreement.jpg" style="width:-webkit-fill-available">
                                                </div>
                                        <!--<div style="width:100%">       -->
                                        <!--<div style="float:left;width:33%">       -->
                                        <!--       <center>   <input type="button" value="<< Back" style="color: white; cursor: pointer; font-size: 18px; font-weight: 900; transition: 0.5s; height: 80px; border-radius: 15px; background: #fe6600; display: inline-block; border: 0; width: 250px;" class="btn btn-primary btn-block btn-sm offset-top-22" onclick="window.history.go(-1); return false;"> </center>-->
                                        <!--</div>        -->
                                        <!--    <div style="float:left;width:33%">-->
                                                    
                                        <!--            <button type="submit" style="color: white; cursor: pointer; font-size: 32px; font-weight: 900; transition: 0.5s; height: 80px; border-radius: 15px; background: #1f9810; display: inline-block;border: 0;width: 250px;" class="btn btn-primary btn-block btn-sm offset-top-22">A/C Open</submit>-->
                                        <!--        </div>-->
                                                
                                        <!--<div style="float:right;width:33%">       -->
                                        <!--       <center>   <input type="button" value="Print Agreement!!" style="color: white; cursor: pointer; font-size: 18px; font-weight: 900; transition: 0.5s; height: 80px; border-radius: 15px; background: #fe6600; display: inline-block; border: 0; width: 250px;" class="btn btn-primary btn-block btn-sm offset-top-22" onclick="printDiv()"> </center>-->
                                        <!--</div>          -->
                                                
                                                
                                                
                                        <!--</div>-->
                                    </form>
    
<br>
<!--<div class="clearfix" style="width: 100%; margin-top: 100px;">    -->
<!--    <center><a href="#" style="font-size: 16px;font-weight: 700; text-decoration:none;" class="text-center">I am ready for A/C Opening</a></center>-->
<!--</div>    -->
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
    </script>

</body>
</html>
