<?php include 'config.php'; 
	
	
	$brandId=-1;
	//$_POST["offerMsg"]="success";
	$time = date('Y/m/d', time());
	
	
	$status=TRUE;
	
	if(isset($_POST["brandName"])&&isset($_POST["token"])){
		$sql = "select BrandId from client where  Token='123' AND brandName='".$_POST["brandName"]."'";
		//echo $sql;
		
		if($result=mysqli_query($conn, $sql)){

			while($row = $result->fetch_assoc()) {
						//echo $row["BrandId"];
						$brandId=$row["BrandId"];
					
				
			}

		} else
		{

			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

		}
	}
	
	if($brandId!=-1&&  isset($_POST["offerMsg"])  && isset($_POST["OstartDate"]) &&isset($_POST["OEndDate"]) &&isset($_POST["token"]) ){
	   echo "Records added successfully.";
	   $sql = "INSERT INTO offer (brandId,massege,date,offerStart,offerEnd,status) VALUES ( '".$brandId."','".$_POST["offerMsg"]."','". $time."','".$_POST["OstartDate"]."','".$_POST["OEndDate"]."','".$status."')";
		
		if(mysqli_query($conn, $sql)){

			echo "Records added successfully.";

		} else
		{

			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

		}
   }
   
?>