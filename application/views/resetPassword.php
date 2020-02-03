

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}
b{

  color:black;
}

#uname:hover{

background:lightgreen;

}

#pass:hover{

background:lightgreen;

}

#email:hover{

background:lightgreen;

}


input[type=text], input[type=password], input[type=email] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<center><h1 style="background:rgba(0,0,0,0.5);color:white">Reset Your Password Here</h1></center>

<div style="display: inline-flex;">

</div>


<form action="<?php echo base_url(); ?>admin_ctrl/test_fun_reseting" method="post">
 
  <div class="container" style="background:rgba(0,0,0,0.3); box-shadow:10px 6px rgba(0,0,0,0.5);">

   
    <input type="hidden" name="token" id="email"  value = " <?php echo $_GET['token'] ?>">

    <label for="psw"><b>New Password</b></label>
    <input type="password" placeholder="Reset Password" name="psw" required  id="pass">
        
    <button type="submit" name="register">Reset</button>
 </div>
</form>


<br>

</body>
</html>
