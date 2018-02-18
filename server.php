<?php
session_start();

// initializing variables
$name = "";
$email    = "";
$errors = array(); 
$toxic_q1 = empty($_POST['toxic_q1']) ? '' : $_POST['toxic_q1'];
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'survey');

// REGISTER USER
if (isset($_POST['login_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $sessionID = session_id();

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Full Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same name and/or email
  $user_check_query = "SELECT * FROM users WHERE name='$name' and email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
	
  	$query = "INSERT INTO users (sessionID, name, email, password) 
  			  VALUES('$sessionID', '$name', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	$_SESSION['sessionID'] = $sessionID;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: home.php');
  }
}

// Sign In USER
if (isset($_POST['signin_user'])) {
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $sessionID = session_id();
  if (empty($name)) {
  	array_push($errors, "email is required");
  }
  if (empty($email)) {
  	array_push($errors, "email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['name'] = $name;
	  $_SESSION['email'] = $email;
	  $_SESSION['sessionID'] = $sessionID;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}

//submit toxic survey
if (isset($_POST['submit_toxic'])) {
  // receive all input values from the form
	$filename = $_FILES['toxic_uploadfile']['name'];
	$filetmpname = $_FILES['toxic_uploadfile']['tmp_name'];
	$folder = 'imagesuploaded/';
	move_uploaded_file($filetmpname,$folder.$filename);	
  
  $toxic_location = mysqli_real_escape_string($db, $_POST["toxic_location"]);
  $toxic_date= mysqli_real_escape_string($db, $_POST["toxic_date"]);
  $toxic_by = mysqli_real_escape_string($db, $_POST["toxic_by"]);
  $toxic_role = mysqli_real_escape_string($db, $_POST["toxic_role"]);
  @$toxic_q1 = mysqli_real_escape_string($db, $_POST["toxic_q1"]);
  $toxic_comment = mysqli_real_escape_string($db, $_POST["toxic_comment"]);
  $toxic_sessionId = mysqli_real_escape_string($db, $_POST["toxic_sessionId"]);
	
	 if (empty($toxic_location)) { array_push($errors, "Program Location is required"); }
	 if (empty($toxic_date)) { array_push($errors, "Date of Review is required"); }
	 if (empty($toxic_role)) { array_push($errors, "Role of the Person filling this Survey is required"); }
	 if (empty($toxic_q1)) { array_push($errors, "Safety Sheets Answer is required"); }
	 if (empty($toxic_comment)) { array_push($errors, "Safety Sheets Comment is required"); }
 
  if (count($errors) == 0) {
  	$query = "INSERT INTO toxic (toxic_sessionId, toxic_location, toxic_date, toxic_by, toxic_role, toxic_q1, toxic_comment, toxic_image) 
  			  VALUES('$toxic_sessionId','$toxic_location','$toxic_date','$toxic_by','$toxic_role','$toxic_q1','$toxic_comment','$filename')";
	$id = mysqli_insert_id($db);		  
  	mysqli_query($db, $query);
  	header('location: home.php');
  }
}

//submit kitchen survey
if (isset($_POST['submit_kitchen'])) {
  // receive all input values from the form
	$filename = $_FILES['kitchen_uploadfile']['name'];
	$filetmpname = $_FILES['kitchen_uploadfile']['tmp_name'];
	$folder = 'imagesuploaded/';
	move_uploaded_file($filetmpname,$folder.$filename);	
  
  $kitchen_location = mysqli_real_escape_string($db, $_POST["kitchen_location"]);
  $kitchen_date= mysqli_real_escape_string($db, $_POST["kitchen_date"]);
  $kitchen_by = mysqli_real_escape_string($db, $_POST["kitchen_by"]);
  $kitchen_role = mysqli_real_escape_string($db, $_POST["kitchen_role"]);
  @$kitchen_q1 = mysqli_real_escape_string($db, $_POST["kitchen_q1"]);
  $kitchen_comment = mysqli_real_escape_string($db, $_POST["kitchen_comment"]);
  $kitchen_sessionId = mysqli_real_escape_string($db, $_POST["kitchen_sessionId"]);
	
 	 if (empty($kitchen_location)) { array_push($errors, "Program Location is required"); }
	 if (empty($kitchen_date)) { array_push($errors, "Date of Review is required"); }
	 if (empty($kitchen_role)) { array_push($errors, "Role of the Person filling this Survey is required"); }
	  if (empty($kitchen_q1)) { array_push($errors, "Refrigerator/stove/ dishwasher/microwave Answer is required"); }
	 if (empty($kitchen_comment)) { array_push($errors, "Refrigerator/stove/ dishwasher/microwave Comment is required"); }

	
  if (count($errors) == 0) {
  	$query = "INSERT INTO kitchen (kitchen_sessionId, kitchen_location, kitchen_date, kitchen_by, kitchen_role, kitchen_q1, kitchen_comment, kitchen_image) 
  			  VALUES('$kitchen_sessionId','$kitchen_location','$kitchen_date','$kitchen_by','$kitchen_role','$kitchen_q1','$kitchen_comment','$filename')";
	$id = mysqli_insert_id($db);		  
  	mysqli_query($db, $query);
  	header('location: home.php');
  }
}

//submit area survey
if (isset($_POST['submit_area'])) {
  // receive all input values from the form
	$filename = $_FILES['area_uploadfile']['name'];
	$filetmpname = $_FILES['area_uploadfile']['tmp_name'];
	$folder = 'imagesuploaded/';
	move_uploaded_file($filetmpname,$folder.$filename);	
  
  $area_location = mysqli_real_escape_string($db, $_POST["area_location"]);
  $area_date= mysqli_real_escape_string($db, $_POST["area_date"]);
  $area_by = mysqli_real_escape_string($db, $_POST["area_by"]);
  $area_role = mysqli_real_escape_string($db, $_POST["area_role"]);
  @$area_q1 = mysqli_real_escape_string($db, $_POST["area_q1"]);
  $area_comment = mysqli_real_escape_string($db, $_POST["area_comment"]);
  $area_sessionId = mysqli_real_escape_string($db, $_POST["area_sessionId"]);
	
	 if (empty($area_location)) { array_push($errors, "Program Location is required"); }
	 if (empty($area_date)) { array_push($errors, "Date of Review is required"); }
	 if (empty($area_role)) { array_push($errors, "Role of the Person filling this Survey is required"); }
	 if (empty($area_q1)) { array_push($errors, "Hallways Answer is required"); }
	 if (empty($area_comment)) { array_push($errors, "Hallways Comment is required"); }

	
  if (count($errors) == 0) {
  	$query = "INSERT INTO area (area_sessionId, area_location, area_date, area_by, area_role, area_q1, area_comment, area_image) 
  			  VALUES('$area_sessionId','$area_location','$area_date','$area_by','$area_role','$area_q1','$area_comment','$filename')";
	$id = mysqli_insert_id($db);		  
  	mysqli_query($db, $query);
  	header('location: home.php');
  }
}
?>