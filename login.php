<?php


?>

<html>
<head>
	<title>Login page</title>

		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">


</head>
<body style="background-color: rgba(11, 99, 107, 0.65);">
	<div class="main-login">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="wrapper-white">
				<img src="images/logos/getOffers.png" width='100%'>


			 <form  action="php/addOffers.php" method="post">
			  <div class="form-group">
			    <label for="email">User Name</label>
			    <input type="text" class="form-control" id="email" name="userName" required=true>
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" id="pwd" name="passWord" required=true>
			  </div>
			  <button type="submit" class="btn btn-success">Login</button>
			</form>
				<!-- <h2 style="padding-bottom:20px">Log in to 'GET OFFERS' To add your offer</h2>
 -->
			</div>	
		</div>
	</div>

</body>
</html>