<?php include_once('server.php') ;

  $data = "SELECT * FROM toxic where toxic_by = '".$_SESSION['name']."'";  
  
  $sql = mysqli_query($db,$data); 
	
  $data2 = mysqli_fetch_array($sql);  
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Toxic Substances</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>Toxic Substances Survey</h2>
</div>
<form method="post" action="survey1.php" enctype="multipart/form-data">
<?php include('errors.php'); ?>
<div class="input-group">	
  	<label>1. Program Location</label>
	<input type="text" name="toxic_location" value="<?php echo $data2["toxic_location"]?>"><br>
</div>

 <div class="input-group">
  	<label>2. Date of Review (YYYY-MM-DD)</label>
	<input type="text" value="<?php echo $data2["toxic_date"]?>" name="toxic_date"><br> 
</div>

<div class="input-group">
  	 <label>3.This form is being Completed by (First and Last Name)</label>
  	 <input type="text" name="toxic_by" value="<?PHP echo $_SESSION['name']; ?>" readonly>
</div>

<div class="input-group">
  	 <label>4. Position/Role of the person completing this form</label>
  	 <input type="text" name="toxic_role" value="<?php echo $data2["toxic_role"]?>">
</div>
  
	<label>5. Toxic Substances</label><br>
<div class ="sub">
	Material Safety sheets are available&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="toxic_q1" value="yes">Yes&nbsp;
	<input type="radio" name="toxic_q1" value="no">No&nbsp;
	<input type="radio" name="toxic_q1" value="na">N/a<br>
	Work Order Date/Comments
	<input type="text" name="toxic_comment" value="<?php echo $data2["toxic_comment"]?>"><br>
</div> 	
<div class="input-group">
  	 <label>6. Photo of deficiencies or items that require maintenance:</label>
  	 <input type="file" name="toxic_uploadfile" value="<?php echo $data2["toxic_image"]?>"/>
</div>
	<center>surveyId:<input value="<?PHP echo $_SESSION['sessionID']; ?>" name="toxic_sessionId" readonly></center>
<div class="input-group">
  	  <button type="submit" class="btn" name="submit_toxic">Submit Survey</button>
 </div>
  <p> <a href="home.php" style="color: red;">Survey List</a> </p>
 <p> <a href="signin.php?logout='1'" style="color: red;">logout</a> </p>
 </form>		
</body>
</html>

<center>© 2018 kaushik Srinivasapuram.</center> 