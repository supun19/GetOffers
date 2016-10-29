<?php
session_start();

if(isset($_POST["userName"]) && isset($_POST["passWord"])){
	$_SESSION['userName'] = 'userName';
	$_SESSION['passWord'] = 'passWord';
	//set by another
	$_SESSION['brandID'] = 'KFC001';
	$_SESSION['brandName'] = 'KFC';
	$_SESSION['brand_image'] = "kfc.jpg";

}
?>

<html>
<head>
	<title>Add Offers</title>
			<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="../styles/styles.css">

		
</head>
<body >
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8 ">
<!-- 		<h2>Reach to your customers efficiently with Get offers!</h2> -->
	</div>
</div>

<div class="main-wrapper row">
	<div class="col-md-2"></div>
	<div class="col-md-5">
		<div class="wrapper">
			 <form  action="../DataBase/addOfferstoDB.php" method="post">
			  

			  <label for="sel1">Select <?php echo $_SESSION['brandName'];?> Branch:</label>
			  <select class="form-control" id="sel1" name="brandName" >
			    <option>All</option>
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
			  
			  <button type="submit" class="btn btn-success">Add This offer</button>
			</form>
		</div>	
	</div>
	<div class="col-md-3 " >
		<div class="row brand-area">

			<h2>KFC</h2>

			 <img src="../images/logos/kfc.jpg" alt="Smiley face" width="100%"> 

		</div>

		<div class="row app-text">

			<h2>Reach to your customers efficiently with <br><b>Get offers!</b> <br></h2>

		</div>

	</div>

</div>
</body>
</html>