<?php
include 'NTLMStream.php';

class AXCustCustomerHandler{
    protected $url;
    protected $client;

    function __construct(){
      $this->url = 'http://192.168.232.207/MicrosoftDynamicsAXAif60/CustCustomerServoceHTTP/xppservice.svc?wsdl';
      $this->client = new MyServiceNTLMSoapClient($this->url);
    }

    function read($custAccount){
      try{

        stream_wrapper_unregister('http');
        stream_wrapper_register('http','MyServiceProviderNTLMStream') or die ('Failed to register protocol');
        $customerReadXML = '
        <CustomerServiceReadRequest xmlns="http://schemas.microsoft.com/dynamics/2008/01/services">
          <EntityKeyList xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKeyList">
             <EntityKey xmlns="http://schemas.microsoft.com/dynamics/2006/02/documents/EntityKey">
              <KeyData>
                <KeyField>
                  <Field>AccountNum</Field>
                  <Value>'.$custAccount.'</Value>
                </KeyField>
              </KeyData>
            </EntityKey>
          </EntityKeyList>
        </CustomerServiceReadRequest>';

        //$options =  Array('EntityKeyList'=>Array('EntityKey'=>Array('KeyData'=>Array('KeyField'=>Array('Field'=>"AccountNum",'Value'=>$custAccount)))));
        $options = new SoapVar($customerReadXML,XSD_ANYXML);

        $response = $this->client->read($options);

        $custTable =  $response->Customer->CustTable;
        //var_dump($custTable);
        //echo $custTable->AccountNum;
        //echo $custTable->Name;

        // restore the original http protocole
        stream_wrapper_restore('http');

        return $custTable;

      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

    function findKeys(){
      try{

        stream_wrapper_unregister('http');
        stream_wrapper_register('http','MyServiceProviderNTLMStream') or die ('Failed to register protocol');
        $axCustomers = array();
        $queryCriteria = Array('QueryCriteria'=>"");

        $response = $this->client->findKeys($queryCriteria);

        foreach($response->EntityKeyList->EntityKey as $entityKey){
          //echo $entityKey->KeyData->KeyField->Field;
          array_push($axCustomers,$entityKey->KeyData->KeyField->Value);
        }

        // restore the original http protocole
        stream_wrapper_restore('http');
        return $axCustomers;

      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

    function create($customerDetails){
      try{

        stream_wrapper_unregister('http');
        stream_wrapper_register('http','MyServiceProviderNTLMStream') or die ('Failed to register protocol');

        $axCustomerResponse = $this->client->create($customerDetails);

        // restore the original http protocole
        stream_wrapper_restore('http');

        return $axCustomerResponse;

      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

    function update($customerDetails){
      try{
        stream_wrapper_unregister('http');
        stream_wrapper_register('http','MyServiceProviderNTLMStream') or die ('Failed to register protocol');

        $axCustomerUpdateResponse = $this->client->update($customerDetails);

        // restore the original http protocole
        stream_wrapper_restore('http');

        return $axCustomerUpdateResponse;
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }
}

?>
