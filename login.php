<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Survey Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Survey Login</h2>
  </div>
	
  <form method="post" action="Login.php">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>First and Last Name</label>
  	 <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="login_user">Begin Survey</button>
  	</div>
  	<p>
  		Submited your Survey Already? <a href="signin.php">Sign in</a>
  	</p>
  </form>
</body>
</html>

<center>© 2018 kaushik Srinivasapuram.</center>