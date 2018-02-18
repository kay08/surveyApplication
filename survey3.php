<?php include_once('server.php') ;

  $data = "SELECT * FROM area where area_by = '".$_SESSION['name']."'";  
  
  $sql = mysqli_query($db,$data); 
	
  $data2 = mysqli_fetch_array($sql);  
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Common Areas</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>Common Areas Survey</h2>
</div>
<form method="post" action="survey3.php" enctype="multipart/form-data">
<?php include('errors.php'); ?>	
<div class="input-group">	
  	<label>1. Program Location</label>
	<input type="text" name="area_location" value="<?php echo $data2["area_location"]?>"><br>
</div>
 <div class="input-group">
  	<label>2. Date of Review (YYYY-MM-DD)</label>
	<input type="text" value="<?php echo $data2["area_date"]?>" name="area_date"><br> 
</div>

<div class="input-group">
  	 <label>3.This form is being Completed by (First and Last Name)</label>
  	 <input type="text" name="area_by" value="<?PHP echo $_SESSION['name']; ?>" readonly>
</div>

<div class="input-group">
  	 <label>4. Position/Role of the person completing this form</label>
  	 <input type="text" name="area_role" value="<?php echo $data2["area_role"]?>">
</div>
	<label>5. Common area</label><br>
<div class ="sub">
	Hallways are clear of clutter&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="area_q1" value="yes">Yes&nbsp;
	<input type="radio" name="area_q1" value="no">No&nbsp;
	<input type="radio" name="area_q1" value="na">N/a<br>
	Work Order Date/Comments 
	<input type="text" name="area_comment" value="<?php echo $data2["area_comment"]?>"><br>
</div> 	
<div class="input-group">
  	 <label>6. Photo of deficiencies or items that require maintenance:</label>
  	 <input type="file" name="area_uploadfile" value="<?php echo $data2["area_image"]?>"/>
</div>
	<center>surveyId:<input value="<?PHP echo $_SESSION['sessionID']; ?>" name="area_sessionId" readonly></center>
<div class="input-group">
  	  <button type="submit" class="btn" name="submit_area">Submit Survey</button>
 </div>
 <p> <a href="home.php" style="color: red;">Survey List</a> </p>
 <p> <a href="signin.php?logout='1'" style="color: red;">logout</a> </p>

 </form>		
</body>
</html>

<center>© 2018 kaushik Srinivasapuram.</center> 