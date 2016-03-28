<?php
require_once ('SoapClientCurl.php');
echo('hello');
echo "\n";

$wsdlfile = "/var/www/example.com/public_html/xppservice.svc?wsdl";
echo $wsdlfile;

$url = "http://192.168.232.207/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl";
//Define options
$options = array(
    'url'=>$url, // e.g. 'https://webservice.example.com/'
);
//Init client
$client = new SoapClientCurl($wsdlfile,$options);
//Request:
$client->read($data);

?>
