<?php
function getListingsViaSoap($account) {
    $url = "http://192.168.232.207/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl";
    $user = "admin";
    $password = "pass@word1";
    $soap_request = '<?xml version="1.0"?>
                      <s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
                        <s:Header>
                          <h:CallContext xmlns:h="http://schemas.microsoft.com/dynamics/2010/01/datacontracts" xmlns="http://schemas.microsoft.com/dynamics/2010/01/datacontracts" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
                            <Company xsi:nil="true"/>
                            <Language xsi:nil="true"/>
                            <LogonAsUser xsi:nil="true"/>
                            <MessageId xsi:nil="true"/>
                            <PartitionKey xsi:nil="true"/>
                            <PropertyBag xsi:nil="true"/>
                          </h:CallContext>
                        </s:Header>
                        <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
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
                        </s:Body>
                      </s:Envelope>';
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: \"http://schemas.microsoft.com/dynamics/2008/01/services/CustomerService/read\"",
        "Content-length: ".strlen($soap_request),
    );
    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL,            "http://192.168.232.207/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl" );
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($soap_do, CURLOPT_POST,           true );
    curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
    curl_setopt($soap_do, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);

    $result = curl_exec($soap_do);
    $airings = array();

    //echo $result;

    /*if($result === false) {
        $err = 'Curl error: ' . curl_error($soap_do);
        curl_close($soap_do);
        print $err;
    } else {
        curl_close($soap_do);
        /*$content = value_in("AugustHomeResult",$result);
        $contentXML = html_entity_decode($content);

        $xml = simplexml_load_string($contentXML);

        foreach($xml->carriage[0] as $airing) {

            $tmp['station'] = strval($airing->station);
            $tmp['date'] = strval($airing->date);
            $tmp['time'] = strval($airing->time);
            $tmp['timezone'] = strval($airing->timezone);
            $tmp['episodenum'] = strval($airing->episodenum);
            $tmp['episodetitle'] = strval($airing->episodetitle);
            $airings[] = $tmp;
        }
*/
    /*  var_dump($result);
    }*/
    return $airings;
}
function value_in($element_name, $xml, $content_only = true) {
    if ($xml == false) {
        return false;
    }
    $found = preg_match('#<'.$element_name.'(?:\s+[^>]+)?>(.*?)'.
            '</'.$element_name.'>#s', $xml, $matches);
    if ($found != false) {
        if ($content_only) {
            return $matches[1];  //ignore the enclosing tags
        } else {
            return $matches[0];  //return the full pattern match
        }
    }
    // No match found: return false.
    return false;
}
/*************************************/
/*  GET LISTINGS FOR 10011 zipcode   */
/*************************************/
$account = 000003;
print_r( getListingsViaSoap($account) );
/*************************************/
?>
