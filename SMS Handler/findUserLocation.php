
<?php
//sendSMS($message,$destinationAddresses)
//getLocation($subscriberId)
//['long','latt']

include '../DataBase/config.php';
include '../include/app.php';

$numbers=[];
$shops=[];

$sql= "select * from subscriber";
if($result=mysqli_query($conn, $sql)){

			while($row = $result->fetch_assoc()) {
						//echo $row["BrandId"];
						array_push($numbers,$row["phonenumber"]);
						//echo $row["phonenumber"];
					
				
			}
}

$sql= "select * from client";

if($result=mysqli_query($conn, $sql)){

			while($row = $result->fetch_assoc()) {
						//echo $row["BrandId"];
						array_push($shops,$row);
						//echo $row["phonenumber"];
					
				
			}
}

//echo $shops[0]["BrandId"];

$size= sizeof($numbers);
$shopsize=sizeof($shops);
for($i=0;$i< $size;$i++){
	//echo $numbers[$i];
	$location=getLocation($numbers[$i]);
	//$location['longitude']
	//$locaion['latitude']
	print_r($location);
	//$location=array("latitude"=>"6.052300","longitude"=>"80.215612");
	for($j=0;$j< $shopsize;$j++){
		 $distance=calculateDistance($location,$shops[$j]);
		 //echo  "fffffffff".$shopsize["BrandId"] ."ssssssssssssss" ;
		 if($distance<5){
			 $sql= "select massege from offer where brandId='".$shops[$j]["BrandId"]."'";
			 if($result=mysqli_query($conn, $sql)){

			while($row = $result->fetch_assoc()) {
						echo $numbers[$i];
						sendSMS($row["massege"],'tel:'.$numbers[$i]);
					
				
			}
}
			 //
		 }
	}
}

function calculateDistance($location1,$location2) {
	$latitudeFrom=$location1["latitude"];
	$longitudeFrom=$location1["longitude"];
	$latitudeTo=$location2["Latitude"];
	$longitudeTo=$location2["Longitude"];
	//echo $latitudeTo ."latidute ";
	//echo $longitudeTo ."longitude ";
	// convert from degrees to radians
 $theta = $longitudeFrom - $longitudeTo;
$dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
$dist = acos($dist);
$dist = rad2deg($dist);
$miles = $dist * 60 * 1.1515;
//echo $distance;
  return $distance = ($miles * 1.609344);
  //echo $distance;
}


?>
