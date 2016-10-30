<?php
/**
 *   (C) Copyright 1997-2013 hSenid International (pvt) Limited.
 *   All Rights Reserved.
 *
 *   These materials are unpublished, proprietary, confidential source code of
 *   hSenid International (pvt) Limited and constitute a TRADE SECRET of hSenid
 *   International (pvt) Limited.
 *
 *   hSenid International (pvt) Limited retains all title to and intellectual
 *   property rights in these materials.
 */

include_once '../lib2/lbs/LbsClient.php';
include_once '../lib2/lbs/LbsRequest.php';
include_once '../lib2/lbs/LbsResponse.php';
include_once "../lib2/lbs/KLogger.php";
include 	 '../lib2/lbs-conf.php';
 
include_once '../lib2/sms/SmsReceiver.php';
include_once '../lib2/sms/SmsSender.php';
include_once '../lib2/log.php';
ini_set('error_log', 'sms-app-error.log');
	
	//getLocation("tel:94771234567");
	//sendSMS("hello",array("tel:94771234567"));
	//getSendSMS();
function sendSMS($message,$destinationAddresses){
	try {

		$responseMsg;

		$responseMsg = $message;

		// Create the sender object server url
		$sender = new SmsSender("http://localhost:7000/sms/send"); // i changed it from "http://localhost:10001/mo-receiver"

		//sending a one message

		$APP_ID = "APP_000001";
		$encoding = "0";
		$version =  "1.0";
		$PASSWORD = "password";
		$sourceAddress = "77177";
		$deliveryStatusRequest = null;
		$charging_amount = null;
		$binary_header = "";
		$res = $sender->sms($responseMsg, $destinationAddresses, $PASSWORD, $APP_ID, $sourceAddress, $deliveryStatusRequest, $charging_amount, $encoding, $version, $binary_header);

	} catch (SmsException $ex) {
		//throws when failed sending or receiving the sms
		error_log("ERROR: {$ex->getStatusCode()} | {$ex->getStatusMessage()}");
	}
}
function getLocation($subscriberId){

$SERVICE_TYPE = "IMMEDIATE";
$RESPONSE_TIME ="DELAY_TOLERANCE";
$FRESHNESS = "LOW";
$HORIZONTAL_ACCURACY = "1000";

$LBS_QUERY_SERVER_URL = "http://127.0.0.1:7000/lbs/locate";

	$log = new KLogger ( "lbs_debug.log" , KLogger::DEBUG );

	//$subscriberId = "tel:AZ110Hl+vyiF+tlIRcvcKkSj6suMlWv2tZ5VtJJSo1fW++R+rHD8UVs5OCHC1+D6GPxM2";//.$_POST['msisdn'];
	$log->LogDebug("Received msisdn = ".$subscriberId);

	$request = new LbsRequest($LBS_QUERY_SERVER_URL);
	$request->setAppId("APP_029687");
	$request->setAppPassword("61edd1efc9c45174a95486715753cc7c");
	$request->setSubscriberId($subscriberId);
	$request->setServiceType($SERVICE_TYPE);
	$request->setFreshness($FRESHNESS);
	$request->setHorizontalAccuracy($HORIZONTAL_ACCURACY);
	$request->setResponseTime($RESPONSE_TIME);

	$lbsClient = new LbsClient();
	$lbsResponse = new LbsResponse($lbsClient->getResponse($request));
	$lbsResponse->setTimeStamp(getModifiedTimeStamp($lbsResponse->getTimeStamp()));//Changing the timestamp format. Ex: from '2013-03-15T17:25:51+05:30' to '2013-03-15 17:25:51'
	$log->LogDebug("Lbs response:".$lbsResponse->toJson());
	//print_r(json_decode($lbsResponse->toJson(), true)['latitude']);
	//echo $lbsResponse->toJson();
	$location['longitude']=79.850327;
	$location['latitude']=6.912419;
	return $location;

}


function getModifiedTimeStamp($timeStamp){
    try {
        $date= new DateTime($timeStamp,new DateTimeZone('Asia/Colombo'));
    } catch (Exception $e) {
        echo $e->getMessage();
        exit(1);
    }
    return $date->format('Y-m-d H:i:s');
}
/*
function getSendSMS(){
	try {
    $receiver = new SmsReceiver(); // Create the Receiver object

    $content = $receiver->getMessage(); // get the message content
    $address = $receiver->getAddress(); // get the sender's address
    $requestId = $receiver->getRequestID(); // get the request ID
    $applicationId = $receiver->getApplicationId(); // get application ID
    $encoding = $receiver->getEncoding(); // get the encoding value
    $version = $receiver->getVersion(); // get the version
	logFile(serialize($reciver));
    logFile("[ content=$content, address=$address, requestId=$requestId, applicationId=$applicationId, encoding=$encoding, version=$version ]");

    $responseMsg;

    //your logic goes here......
    $split = explode(' ', $content);
    $responseMsg = "thank you";

    // Create the sender object server url
    $sender = new SmsSender("http://api.dialog.lk:8080/sms/send"); // i changed it from "http://localhost:10001/mo-receiver"

    //sending a one message

 	$applicationId = "APP_029687";
 	$encoding = "440";
 	$version =  "1.0";
    $password = "61edd1efc9c45174a95486715753cc7c";
    $sourceAddress = "77177";
    $deliveryStatusRequest = "1";
    $charging_amount = ":15.75";
    $destinationAddresses = $address;
    $binary_header = "";
    $res = $sender->sms($responseMsg, $destinationAddresses, $password, $applicationId, $sourceAddress, $deliveryStatusRequest, $charging_amount, $encoding, $version, $binary_header);

	$f=fopen("log.txt","a");
	fwrite($f,"SUCCESS to send:".$address. "\n");
	fclose($f);
	
  } catch (SmsException $ex) {
    //throws when failed sending or receiving the sms
    error_log("ERROR: {$ex->getStatusCode()} | {$ex->getStatusMessage()}");
	
	$f=fopen("log.txt","a");
	fwrite($f,"ERROR: {$ex->getStatusCode()} | {$ex->getStatusMessage()}" . "\n");
	fclose($f);
  }

}*/
?>