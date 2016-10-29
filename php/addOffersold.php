<?php
session_start();

if(isset($_POST["userName"]) && isset($_POST["passWord"])){
	$_SESSION['userName'] = 'userName';
	$_SESSION['passWord'] = 'passWord';
	//set by another
	$_SESSION['brand'] = 'KFC001';
	$_SESSION['brand_image'] = "kfc.jpg";

}
?>

<html>
<head>
	<title>Add Offers</title>
			<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../styles/styles.css">


</head>
<body>

	<div class="col-md-2"></div>
	<div class="col-md-5">
		<div class="wrapper">
			 <form  action="../Database/addOffersToDB.php" method="post">
			  

			  <label for="sel1">Select list:</label>
			  <select class="form-control" id="sel1" name="brandName" >
			    <option>Kollupitiya</option>
			    <option>Dehiwala</option>
			    <option>Rawatawatta</option>
			    <option>Nugegoda</option>
			  </select>

			  <div class="form-group">
			    <label for="pwd">Offer Start Date:</label>
			    <input type="date" class="form-control" id="pwd" name="OstartDate" required=true>
			  </div>

			  <div class="form-group">
			    <label for="pwd">Offer End Date:</label>
			    <input type="date" class="form-control" id="pwd" name="OEndDate" required=true>
			  </div>

			   <div class="form-group">
				  <label for="comment">Offer Message:</label>
				  <textarea class="form-control" rows="5" id="offerMsg" name="offerMsg" required=true></textarea>
				</div>

				<input type='hidden' name="token" value=" <?php echo '123'; ?> " />  
			  
			  <button type="submit" class="btn btn-default">Add This offer</button>
			</form>
		</div>	
	</div>
		<div class="col-md-3 wrapper" >

			 <img src="../images/logos/kfc.jpg" alt="Smiley face" width="100%"> 

		</div>


</body>
</html>