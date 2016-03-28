<?php
function getListingsViaSoap($zipcode) {
    $url = "http://www.tracmedia.com/lol/LOLService.asmx";
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
    <AugustHome xmlns="http://tracmedia.org/">
      <zipCode>'.$zipcode.'</zipCode>
    </AugustHome>
    </soap:Body>
    </soap:Envelope>';
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: \"http://tracmedia.org/AugustHome\"",
        "Content-length: ".strlen($soap_request),
    );
    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL,            "http://www.tracmedia.com/lol/LOLService.asmx" );
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($soap_do, CURLOPT_POST,           true );
    curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $header);
    $result = curl_exec($soap_do);
    $airings = array();

    //echo $result;

    if($result === false) {
        $err = 'Curl error: ' . curl_error($soap_do);
        curl_close($soap_do);
        print $err;
    } else {
        curl_close($soap_do);
        $content = value_in("AugustHomeResult",$result);
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

    }
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
$zipcode = 94002;
print_r( getListingsViaSoap($zipcode) );
/*************************************/
?>
