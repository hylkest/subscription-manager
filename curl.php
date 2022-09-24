<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://ergast.com/api/f1/current/last/results',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$dom = new \DOMDocument('1.0');
$dom->preserveWhiteSpace = true;
$dom->formatOutput = true;
$dom->loadXML($response);
$xml_pretty = $dom->saveXML();


$array = array($xml_pretty);

