<?php
echo('hello');
echo "\n";
$soapUrl = "http://192.168.232.207/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl";
$soapUser = "tricia";
$soapPassword = "pass@word1";

$xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                              <soap:Body>
                                <CustomerServiceReadRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
				 <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
				  <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
				   <KeyData>
				    <KeyField>
				     <Field>AccountNum</Field> 
				     <Value>000003</Value> 
				    </KeyField>
				   </KeyData>
				  </EntityKey>
				 </EntityKeyList>
                               </CustomerServiceReadRequest>
                              </soap:Body>
                            </soap:Envelope>';

$headers = array(
		"Content-type: text/html;charset=\"utf-8\"",
		"Accept: text/xml",
		"Cache-Control: no-cache",
		"Pragma: no-cache",
		"SOAPAction: http://schemas.microsoft.com/dynamics/2008/01/services/CustomerService/read",
		"Content-length: ".strlen($xml_post_string),
		);

$url = $soapUrl;
$ch = curl_init();

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
$response = curl_exec($ch);
curl_close($ch);

// converting
$response1 = str_replace("<soap:Body>","",$response);
$response2 = str_replace("</soap:Body>","",$response1);

// convertingc to XML
$parser = simplexml_load_string($response2);
// user $parser to get your data out of XML response and to display it.
echo $response2;
?>
