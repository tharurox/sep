<?php

include 'IntelliSMS.php';

function send_sms($phone_number, $message){
	// Initialize the SMS Library
	$objIntelliSMS = new IntelliSMS();

	// Set your username and passsword
	$objIntelliSMS->Username = 'i1981260';
	$objIntelliSMS->Password = 'i1981260';

	//Break Phone number to International Format
	$number = "+94" . substr($phone_number,1);

	//Send end SMS
    $SendStatusCollection  = $objIntelliSMS->SendMessage ( $number, $message, 'ecole' );
    // Return the status
    return $SendStatusCollection;
}