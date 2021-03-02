<?php

$openapi_username = "put here your username";
$openapi_apikey = "put here your apikey";
$openapi_scopes = array(	"GET:test.ws.ufficiopostale.com/raccomandate",
							"POST.test.ws.ufficiopostale.com/raccomandate",
							"PATCH.test.ws.ufficiopostale.com/raccomandate",
							"GET.test.ws.ufficiopostale.com/tracking");
							
$openapi_request = array("scopes"=>$openapi_scopes);

$basic_auth = base64_encode("$openapi_username:$openapi_apikey");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://test.oauth.altravia.com/token/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($openapi_request),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic '.$basic_auth
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
