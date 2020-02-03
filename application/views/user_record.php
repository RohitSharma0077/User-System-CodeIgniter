<!DOCTYPE html>
<html lang="en">
<head>

  <style type="text/css">

    #img_css{
      width:170px;
      height: 130px;
      
      
    }

    .gallery{
      list-style-type:none;
      
    }

    .item{

      float:left;
    }
    #img_csss{
      width:70px;
      height: 30px;
    }

  </style>

  <meta charset="utf-8">
  <title>Free HTML5 Bootstrap Admin Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
  <meta name="author" content="Muhammad Usman">


  <!-- The styles -->

  <link id="bs-css" href="<?php echo base_url(); ?>css/bootstrap-cerulean.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>css/charisma-app.css" rel="stylesheet">
  <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
  <link href='<?php echo base_url(); ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/jquery.noty.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/noty_theme_default.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/elfinder.min.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/elfinder.theme.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/uploadify.css' rel='stylesheet'>
  <link href='<?php echo base_url(); ?>css/animate.min.css' rel='stylesheet'>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>bower_components/jquery/jquery.min.js"></script>

  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- The fav icon -->
  <link rel="<?php echo base_url(); ?>shortcut icon" href="img/favicon.ico">
</head>

<body>

 <div class="ch-container">
  <div class="row">

   <!-- left menu starts -->
   <div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
     <div class="nav-canvas">
      <div class="nav-sm nav nav-stacked">

      </div>
      <ul class="nav nav-pills nav-stacked main-menu">
       <li class="nav-header">Main</li>
       <li><a class="ajax-link" href="index.html"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
       </li>
       <li><a class="ajax-link" href="ui.html"><i class="glyphicon glyphicon-eye-open"></i><span> UI Features</span></a>
       </li>

       <li><a class="ajax-link" href="<?php echo base_url(); ?>admin_ctrl/user"><i
        class="glyphicon glyphicon-align-justify"></i> <span>User</span></a></li>
        <li class="accordion">

        </ul> 
      </div>
    </div>
  </div>
  <!--/span-->
  <!-- left menu ends -->

  <noscript>
    <div class="alert alert-block col-md-12">
     <h4 class="alert-heading">Warning!</h4>

     <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
     enabled to use this site.</p>
   </div>
 </noscript>

 <div id="content" class="col-lg-10 col-sm-10">
  <!-- content starts -->
  <div>
   <ul class="breadcrumb">
    <li>
     <a href="<?php echo base_url(); ?>admin_ctrl/home">Home</a>
   </li>
   <li>
     <a href="#">Tables</a>
   </li>
 </ul>

 <?php
 if ($this->session->flashdata('active')) {
  ?>
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong><?php echo $this->session->flashdata('active'); ?></strong>
  </div>

<?php }

?>

<?php
if ($this->session->flashdata('deactive')) {
  ?>
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong><?php echo $this->session->flashdata('deactive'); ?></strong>
  </div>

<?php }

?>

</div>

<div class="row">
 <div class="box col-md-12">
  <div class="box-inner">
   <div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-user"></i> Datatable + Responsive</h2>

    <div class="box-icon">
     <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
     <a href="#" class="btn btn-minimize btn-round btn-default"><i
      class="glyphicon glyphicon-chevron-up"></i></a>
      <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
  </div>
  <div class="box-content">
   <div class="alert alert-warning"><b>REGISTERED USERS</b></div>
   <table class="table table-striped table-bordered bootstrap-datatable" id="myTable">
    <thead>
     <tr>
      <th>Id</th>
      <th>Email</th>
      <th>Username</th>
      <th>Password</th>
      <th>Actions</th>
      <th>Status</th>
      <th>Img Files </th>
        <th>Preview</th>
      <th>Uploaded</th>
    
    </tr>
  </thead>
  <tbody>

   <?php
   foreach ($key as $row) 
   {  
     if ($row['current_status']=='1')
     {

      ?>
      <tr>
       <td><?php echo $row['id']?></td>
       <td><?php echo $row['email']?></td>
       <td><?php echo $row['username']?></td>
       <td><?php echo $row['password']?></td>


       <td  class="center">

        <button class="btn btn-info" data-toggle="modal" data-target="#myModal2<?php echo $row['id']?>" >
          <i class="glyphicon glyphicon-edit icon-white"></i>  Edit</button>


          <form style = "display: inline;" action="<?= base_url("admin_ctrl/test_fun_delete"); ?>" method="POST">
            <button type="submit" name="id" class="btn btn-danger" value="<?php echo $row['id']?>">
              <i class="glyphicon glyphicon-trash icon-white"></i>
              Delete
            </button>
          </form>

        </td>


        <td class="center">



          <?php if($row['status']=='active'): ?>

           <input type="button" title="Click Me to deactive" id="btn_<?= $row['status']; ?>" data-id="<?= $row['id']; ?>" data-status="active"
           onClick="window.location.reload();"  class="btn btn-success btn-sm toggle-status-btn" value="active" >

         <?php endif ?>

         <?php if($row['status']=='deactive'): ?>

          <input type="button" title="Click Me to active" id="btn_<?= $row['status']; ?>" data-id="<?= $row['id']; ?>" data-status="deactive"
           onClick="window.location.reload();"  class="btn btn-danger btn-sm toggle-status-btn" value="deactive" >

         
         <?php endif ?>

       </td>


       <td>
         <button class="btn btn-info" data-toggle="modal" data-target="#myModalimg<?php echo $row['id']?>" >
          <i class="glyphicon glyphicon-edit icon-white"></i>Upload</button>
        </td>


         <td>

        
                 <img src="<?php echo base_url($row['files'][0]['file_name']); ?>"  id='img_csss'>

        
        </td>

        <td>
       
              <input type="submit" class="btn btn-info" data-toggle="modal" data-target="#view<?php echo $row['id'] ?>"  
                value="View"/>
           
        </td>


       





      </tr>
      <!-- The Modal for get data and Delete-->
<div class="modal" id="view<?php echo $row['id'] ?>" style=" transform: (180deg)" >
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">

   <!-- Modal Header -->
   <div class="modal-header">
    <h4 class="modal-title">Close It Here >>> </h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>

  <!-- Modal body -->
  <div class="modal-body" id="modalid">

      
      <?php 
      foreach ($row['files'] as $path) {
       ?>

       <img src="<?php echo base_url($path)  ?>" width="120" height="120">

       <?php 
      }

      ?>
 </div> 
</div>  
</div>
</div>


      <!-- The Modal for get data and update -->
      <div class="modal" id="myModalimg<?php echo $row['id'] ?>" style=" transform: (180deg)" >
       <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
          <h4 class="modal-title">Close It Here >>> </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" id="modalid">

          <form method="post" action="<?php echo base_url(); ?>admin_ctrl/file_upload" enctype="multipart/form-data">
            <div class="form-group">
              <input type="number"  name="id" readonly="" hidden  value=<?php echo $row['id']?>><br>
              <input type="file" name="files[]"  multiple/>
            </div>
            <div class="form-group">
              <input type="submit" name="fileSubmit" value="Upload"/>
            </div>
          </form>


        </div> 
      </div>  
    </div>
  </div>


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


  <div class="box-content">
                <form role="form"  action="<?php echo base_url(); ?>admin_ctrl/test_fun_update" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Id</label>
                        <input type="number" class="form-control" name="id" readonly=""  value=<?php echo $row['id']?>>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="uname" value=<?php echo $row['username']?>>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="psw" required=""   class="form-control" value=<?php echo $row['password']?> >
                    </div>
                    
                    
                    <button type="submit"  name="submit" class="btn btn-default">Submit</button>
                </form>

            </div>    

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
     Email: &nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" name="id" readonly="" style="border:none;"  value=<?php echo $row['email']?>><br>
     Name:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="uname" readonly="" required="" style="border:none;" value=<?php echo $row['username']?> ><br>
     Password:<input type="password" name="psw" required=""  readonly="" style="border:none;" value=<?php echo $row['password']?>  ><br>
     Status: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="number" name="id" readonly="" style="border:none;"  value=<?php echo $row['current_status']?>><br><br>

     <input type="submit" value="Delete" name="submit">
   </form>

 </div> 
</div>  
</div>
</div>



<?php
}}
?> 


</tbody>
</table>
</div>
</div>
</div>

</div><!--/.fluid-container-->
<div class="row" id="fid"style="    margin-right: -1%;margin-left: -21%; margin-top: 22%;">
 <div class="box col-md-12">
    <footer class="row" >
  <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
  Usman</a> 2012 - 2015</p>

  <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
   href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
 </footer>

  </div>
</div>

</body>
</html>

<!-- external javascript -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='<?php echo base_url(); ?>bower_components/moment/min/moment.min.js'></script>
<script src='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.min.js'></script>


<!-- select or dropdown enhancer -->
<script src="<?php echo base_url(); ?>bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view-->
<script src="<?php echo base_url(); ?>bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url(); ?>js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url(); ?>bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url(); ?>js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url(); ?>js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url(); ?>js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url(); ?>js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url(); ?>js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url(); ?>js/charisma.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript">   

  $(document).ready(function() {

    $('.toggle-status-btn').click(function() {
      var status = $(this).attr("data-status");
      var id = $(this).attr("data-id");
    // console.log(status);
    $.ajax({
      type: 'POST',
      url: '<?= base_url("Admin_ctrl/activeUser") ?>',
      data: { status: status, id: id },
      success: function(response) {
        console.log(response);
        if(response == "active"){
          $(".toggle-status-btn").val("deactive");
          $(".toggle-status-btn").attr("data-status","deactive");


        }
        if(response == "deactive"){
          $(".toggle-status-btn").val("active");
          $(".toggle-status-btn").attr("data-status","active");


        }

      }
    });


  });
  });

</script>


<script type="text/javascript">


 $(document).ready( function () {
  $('#myTable').DataTable();




} );


</script>
