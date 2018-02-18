<?php include_once('server.php') ;

  $data = "SELECT * FROM kitchen where kitchen_by = '".$_SESSION['name']."'";  
  
  $sql = mysqli_query($db,$data); 
	
  $data2 = mysqli_fetch_array($sql);  
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Kitchens & Dining</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h2>Kitchens & Dining Survey</h2>
</div>
<form method="post" action="survey2.php" enctype="multipart/form-data">
<?php include('errors.php'); ?>
<div class="input-group">	
  	<label>1. Program Location</label>
	<input type="text" name="kitchen_location" value="<?php echo $data2["kitchen_location"]?>"><br>
</div>
 <div class="input-group">
  	<label>2. Date of Review (YYYY-MM-DD)</label>
	<input type="text" value="<?php echo $data2["kitchen_date"]?>" name="kitchen_date"><br> 
</div>

<div class="input-group">
  	 <label>3.This form is being Completed by (First and Last Name)</label>
  	 <input type="text" name="kitchen_by" value="<?PHP echo $_SESSION['name']; ?>" readonly>
</div>

<div class="input-group">
  	 <label>4. Position/Role of the person completing this form</label>
  	 <input type="text" name="kitchen_role" value="<?php echo $data2["kitchen_role"]?>">
</div>
	<label>5. Kitchens & Dining</label><br>
<div class ="sub">
	Refrigerator/stove/ dishwasher/microwave are in working order</br>
	<input type="radio" name="kitchen_q1" value="yes">Yes
	<input type="radio" name="kitchen_q1" value="no">No
	<input type="radio" name="kitchen_q1" value="na">N/a<br>
	Work Order Date/Comments
	<input type="text" name="kitchen_comment" value="<?php echo $data2["kitchen_comment"]?>"><br>
</div> 	
<div class="input-group">
  	 <label>6. Photo of deficiencies or items that require maintenance:</label>
  	 <input type="file" name="kitchen_uploadfile" value="<?php echo $data2["kitchen_image"]?>"/>
</div>
	<center>surveyId:<input value="<?PHP echo $_SESSION['sessionID']; ?>" name="kitchen_sessionId" readonly></center>
<div class="input-group">
  	  <button type="submit" class="btn" name="submit_kitchen">Submit Survey</button>
 </div>
 <p> <a href="home.php" style="color: red;">Survey List</a> </p>
 <p> <a href="signin.php?logout='1'" style="color: red;">logout</a> </p>

 </form>		
</body>
</html>

<center>© 2018 kaushik Srinivasapuram.</center> 