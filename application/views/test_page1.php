
<!DOCTYPE html>
<html>
<head>
	<title>Test File</title>

 <style type="text/css">

  #bg{ 

background: rgba(0,0,0,0.3);
border-radius:20px 20px 100px 100px;
box-shadow:10px 6px rgba(0,0,0,0.5);

   }

  body{

   background: rgba(255,140,0,0.8);

  }

  tr, td, th{

   padding: 10px 45px;

  }

  button{

color:black;
border-radius: 15px;

  }


  #delid:hover{

   background: red;

  }

  button:hover{

  background-color: green;
  color:white;

  }

 </style>

</head>
<!-- Latest compiled and minified CSS -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<body><div id="bg">
 
 <div class="container">
  <table style="border:1px solid skyblue; width: 100%;background: rgba(0,0,0,0.7); color:darkorange; padding-left: 10px;padding-right:10px;">

   <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Password</th>
    <th>Update</th>
    <th>Delete</th>
   </tr>
   <?php
   foreach ($key as $row) 
   {
    ?>
    <tr>
     <td><?php echo $row['id']?></td>
     <td><?php echo $row['username']?></td>
     <td><?php echo $row['password']?></td>


     <td><button data-toggle="modal" data-target="#myModal2<?php echo $row['id']?>" >Edit</button></td>
     <td><button id="delid" data-toggle="modal" data-target="#myModal3<?php echo $row['id']?>" >Delete</button></td>

    </tr>


    <!-- The Modal for get data and update -->
    <div class="modal" id="myModal2<?php echo $row['id'] ?>" style=" transform: (180deg)" >
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
        <h4 class="modal-title">Close It Here >>> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <!-- Modal body -->
       <div class="modal-body" id="modalid">


        <form method="post" action="<?php echo base_url(); ?>admin_ctrl/test_fun_update">
         <h2><center>Input Data</center> </h2>
         Id: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="id" readonly=""  value=<?php echo $row['id']?>><br>
         Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="uname" required="" value=<?php echo $row['username']?> ><br>
         Password:<input type="password" name="psw" required="" value=<?php echo $row['password']?>  ><br><br>

         <input type="submit" value="Done" name="submit">
        </form>

       </div> 
      </div>  
     </div>
    </div>


    <!-- The Modal for get data and Delete-->
    <div class="modal" id="myModal3<?php echo $row['id'] ?>" style=" transform: (180deg)" >
     <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
        <h4 class="modal-title">Close It Here >>> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <!-- Modal body -->
       <div class="modal-body" id="modalid">


        <form method="post" action="<?php echo base_url(); ?>admin_ctrl/test_fun_delete">
         <h2><center>Do You Want To Delete The Following Data !</center> </h2>
         Id: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="id" readonly="" style="border:none;"  value=<?php echo $row['id']?>><br>
         Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="uname" readonly="" required="" style="border:none;" value=<?php echo $row['username']?> ><br>
         Password:<input type="password" name="psw" required=""  readonly="" style="border:none;" value=<?php echo $row['password']?>  ><br><br>

         <input type="submit" value="Delete" name="submit">
        </form>

       </div> 
      </div>  
     </div>
    </div>



    <?php
   }
   ?> 

  </table>

 </div>


  <br>
 <center><h1>Page 1  <a href="<?php echo base_url(); ?>admin_ctrl/test_fun_page2" style="font-weight: bolder; color:darkorange; background: rgba(0,0,0,0.7);" >Go to page 2 </a>
</h1></center>
 


</div> -->
</body>

</html>



