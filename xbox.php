<?php
/*
 * Xbox Live Authentication
 * Demo
 * OpenXBL - xbl.io - xTACTICSx
 *
 * This file can be modified to include your custom user sign in process
 * Once you have the session token you can start making requests to xbl.io
 */
session_start();

if( isset($_GET['code']) )
{
    ##
    # Create the payload for this request
    $payload = array(
        "code" => $_GET['code'],
        "app_key" => "0000000048197138"
    );

    ##
    # Get the users token via claims request
    $crl = curl_init("https://xbl.io/app/claim");
    $header = array();
    $header[] = 'X-Contract: 2';
    $header[] = 'Content-Type: application/json';
    $header[] = 'Content-Length: ' . strlen(json_encode($payload));
    curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
    curl_setopt( $crl, CURLOPT_POSTFIELDS, json_encode($payload) );
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_POST,true);
    $result = curl_exec($crl);
    curl_close($crl); 	

    $result = json_decode( $result, true );

    ##
    # Save to user session
    $_SESSION['xbox'] = array(
    	'app_key' => $result['data'][0]['app_key'], 
    	'xuid' => $result['data'][0]['xuid'],
    	'gamertag' => $result['data'][0]['gamertag'],
    	'level' => $result['data'][0]['level']
    );

    ##
    # Redirect to welcome page
    header('Location: https://regimbal.me/xblio/index.php');
}