<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Survey SignIn</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Resume Your Survey</h2>
  </div>
	 
  <form method="post" action="signin.php">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  		<label>First and Last Name</label>
  		<input type="text" name="name" >
  	</div>
	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="signin_user">Resume Survey</button>
  	</div>
  	<p>
  		New to Survey? <a href="login.php">Login Survey</a>
  	</p>
  </form>
</body>
</html>

<center>© 2018 kaushik Srinivasapuram.</center>