<?php include '../DataBase/config.php'; 

$subscriberId=json_decode(file_get_contents('php://input'))->subscriberId;
$sql = "INSERT INTO subscriber (phonenumber) VALUES ( '".$subscriberId."')";
if(mysqli_query($conn, $sql)){

			echo "Records added successfully.";

		} else
		{

			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

		}
		
?>