<?php

//$soapURL = "http://ax2012r2a.contoso.com/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc"



$soapURL = "http://ax2012r2a.contoso.com/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl" ;
$userNamePass = Array('UserName'=>"admin",'Password'=>"pass@word1");
$clientCredentials = Array('ClientCredentials'=>$userNamePass);
$windows = Array('Windows'=>$clientCredentials);
$soapParameters = Array('ClientCredentials'=>$windows);
$soapFunction = "read";//"http://schemas.microsoft.com/dynamics/2008/01/services/CustomerService/read";

$soapFunctionParameters = Array('EntityKeyList'=>Array('EntityKey'=>Array('KeyData'=>Array('KeyField'=>Array('Field'=>"AccountNum",'Value'=>000003)))));

$soapClient = new SoapClient($soapURL, $soapParameters);

$soapResult = $soapClient->__soapCall($soapFunction, $soapFunctionParameters) ;

if(is_array($soapResult) && isset($soapResult['someFunctionResult'])) {
    // Process result.
} else {
    // Unexpected result
    if(function_exists("debug_message")) {
        debug_message("Unexpected soapResult for {$soapFunction}: ".print_r($soapResult, TRUE)) ;
    }
}

/*
$username = "admin";
$password = "pass@word1";
$soapURL = "http://ax2012r2a.contoso.com/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl" ;
$soapParameters = array('userName'=>$username, 'password'=>$password);
$ns = 'http://schemas.microsoft.com/dynamics/2008/01/services';

$soapFunction = "read" ;
$soapFunctionParameters = Array('AccountNum' => "000003") ;

$soapClient = new SoapClient($soapURL);
$header = new SoapHeader($ns,'UserCredentials,$soapParameters',false);
$soapClient->__setSoapHeaders($header);
var_dump($soapClient);
$soapResult = $soapClient->__soapCall($soapFunction, array($soapFunctionParameters));

*/
echo $soapResult;

//define('USERPWD', 'contoso\\admin:pass@word1');

// we unregister the current HTTP wrapper
//stream_wrapper_unregister('http');
// we register the new HTTP wrapper
//stream_wrapper_register('http', 'NTLMStream') or die("Failed to register protocol");

// Initialize Soap Client
/*$client = new SoapClient('http://192.168.232.207/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl');

$accountNum = "000003";

$data= array('QueryCriteria' =>
          array('CriteriaElement' =>
               array('DataSourceName' => 'CustTable',
                     'FieldName'      => 'AccountNum',
                     'Operator'       => 'Equal',
                     'Value1'         => $accountNum
                    )
               )
          );


$result = $client->read($data);

$result = $result->Customer->CustTable->Name;

echo 'Name = ' . $result;
*/
?>
