<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Admin | Login</title>

    <style type="text/css">
    	body{
  font-family: 'Open Sans', sans-serif;
  background:#e09b40;
  margin: 0 auto 0 auto;  
  width:100%; 
  text-align:center;
  margin: 20px 0px 20px 0px;   
}

p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}

h1{
  font-size:1.5em;
  color:#525252;
}

.box {
    background: white;
    width: 300px;
    border-radius: 6px;
    margin: 0 auto 0 auto;
    padding: 0px 0px 70px 0px;
    border: #bc7c28 4px solid;
}

.email{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}

.password{
  border-radius:4px;
  background:#ecf0f1;
  border: #ccc 1px solid;
  padding: 8px;
  width:250px;
  font-size:1em;
}

.btn {
    background: #2ecc71;
    width: 125px;
    padding-top: 5px;
    padding-bottom: 5px;
    color: white;
    border-radius: 4px;
    border: #27ae60 1px solid;
    margin-top: 20px;
    margin-bottom: 20px;
    float: right;
    margin-right: 16px;
    font-weight: 800;
    font-size: 0.8em;
}

.btn:hover{
  background:#2CC06B; 
}

#btn2{
  float:left;
  background:#3498db;
  width:125px;  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #2980b9 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  margin-left:10px;
  font-weight:800;
  font-size:0.8em;
}

#btn2:hover{ 
background:#3594D2; 
}
    </style>
  </head>

  <body>
  	<br><br><br><br>
<?php echo form_open('Admin_login/login_submit', array( 'class' => 'form-login')); ?>
<div class="box">
<h1>ADMIN</h1>

<input type="text" name="user_id"   class="email" />
  
<input type="password" name="user_pass" class="email" />
  
<button class="btn" type="sumbit">Sign In</button> <!-- End Btn -->
  
</div> <!-- End Box -->
  
<?php echo form_close(); ?>


  </body>
</html>
