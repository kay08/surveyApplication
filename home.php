<?php include('server.php') ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Survey Page</h2>
</div>
<form method="post" action="home.php" enctype="multipart/form-data">
  	
<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['name'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['name']; ?></strong></p>
		<?php endif ?>

 <p>
<div class="input-group"> 
 <label>1. For Toxic Substances Survey Please Click Below:</label>
<p><a class="btn" href="survey1.php">Toxic Substances Survey</a></p><br>
 </div>
 <div class="input-group">
 <label>2. For Kitchen & Dining Survey Please Click Below:</label>
<p><a class="btn" href="survey2.php">Kitchen & Dining Survey</a></p><br>
</div>
 <div class="input-group">
 <label>3. For Common Areas Survey Please Click Below:</label>
<p><a class="btn" href="survey3.php">Common Areas Survey</a></p><br>
 </div>
 <p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>

 </form>		
</body>
</html>

<center>© 2018 kaushik Srinivasapuram.</center>