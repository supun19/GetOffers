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

include_once '../lib/lbs/LbsClient.php';
include_once '../lib/lbs/LbsRequest.php';
include_once '../lib/lbs/LbsResponse.php';
include_once "../lib/lbs/KLogger.php";
include 	 '../lib/lbs-conf.php';
 
include_once '../lib/sms/SmsReceiver.php';
include_once '../lib/sms/SmsSender.php';
include_once '../lib/log.php';
ini_set('error_log', 'sms-app-error.log');

sendSMS("hello9879879hhh",array("tel:94771122346"));

function sendSMS($message,$destinationAddresses){
	try {

		$responseMsg;

		$responseMsg = $message;

		// Create the sender object server url
		$sender = new SmsSender("http://localhost:7000/sms/send"); // i changed it from "http://localhost:10001/mo-receiver"

		//sending a one message

		$applicationId = "APP_000001";
		$encoding = "0";
		$version =  "1.0";
		$password = "password";
		$sourceAddress = "77000";
		$deliveryStatusRequest = "1";
		$charging_amount = ":15.75";
		$binary_header = "";
		$res = $sender->sms($responseMsg, $destinationAddresses, $password, $applicationId, $sourceAddress, $deliveryStatusRequest, $charging_amount, $encoding, $version, $binary_header);

	} catch (SmsException $ex) {
		//throws when failed sending or receiving the sms
		error_log("ERROR: {$ex->getStatusCode()} | {$ex->getStatusMessage()}");
	}
}

function getLocation(){
	$log = new KLogger ( "lbs_debug.log" , KLogger::DEBUG );

	$subscriberId = "tel:94771122336";//.$_POST['msisdn'];
	$log->LogDebug("Received msisdn = ".$subscriberId);

	$request = new LbsRequest($LBS_QUERY_SERVER_URL);
	$request->setAppId($APP_ID);
	$request->setAppPassword($PASSWORD);
	$request->setSubscriberId($subscriberId);
	$request->setServiceType($SERVICE_TYPE);
	$request->setFreshness($FRESHNESS);
	$request->setHorizontalAccuracy($HORIZONTAL_ACCURACY);
	$request->setResponseTime($RESPONSE_TIME);

	$lbsClient = new LbsClient();
	$lbsResponse = new LbsResponse($lbsClient->getResponse($request));
	$lbsResponse->setTimeStamp(getModifiedTimeStamp($lbsResponse->getTimeStamp()));//Changing the timestamp format. Ex: from '2013-03-15T17:25:51+05:30' to '2013-03-15 17:25:51'
	$log->LogDebug("Lbs response:".$lbsResponse->toJson());
	echo $lbsResponse->toJson();

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
?>