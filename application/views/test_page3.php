<?php session_start();
  if (!isset($_SESSION['admin'])) {
   header('location:'.base_url(). 'admin_ctrl/register_fun');
  } ?>


<!DOCTYPE html>
<html>
<head>
	<title>Page 3</title>
</head>
<body><br>
<h1>This is Page 3</h1>
<br>
  <a href="<?php echo base_url(); ?>admin_ctrl/logout">Logout</a>
</body>
</html>