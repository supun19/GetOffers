<?php
	

?>

<html>
<head>
	<title>Login page</title>

		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">


</head>
<body>

	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="wrapper">
			 <form  action="php/addOffers.php" method="post">
			  <div class="form-group">
			    <label for="email">User Name</label>
			    <input type="text" class="form-control" id="email" name="userName">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" id="pwd" name="passWord">
			  </div>
			  <button type="submit" class="btn btn-default">Login</button>
			</form>
		</div>	
	</div>

</body>
</html>