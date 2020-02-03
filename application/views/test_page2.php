<!-- <?php session_start();
  if (!isset($_SESSION['admin'])) {
   header('location:'.base_url(). 'admin_ctrl/register_fun');
  } ?>

 -->

<!DOCTYPE html>
<html>
<head>
	<title>Uploaded images</title>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
  <!-- <a href="<?php echo base_url(); ?>admin_ctrl/logout">Logout</a> -->

    <div class="row">
            <ul class="gallery">
              <?php if(!empty($files)){ foreach($files as $file){ ?>

                <li class="item">
               
                  <img src="<?php echo base_url($file['file_name']); ?>"  id='img_css'>
    
                </li>
              <?php } }else{ ?>
                <p>Image(s) not found.....</p>
              <?php } ?>
            </ul>
          </div>

         <!--  <?php 
           foreach($key as $file){?>

                 <img src="<?php echo base_url($file); ?>"  id='img_css'>

           <?php  }
                ?>   -->

</body>

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


</style>
</html>