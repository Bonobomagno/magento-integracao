<?php

namespace Proxies\Soap\Customers;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class CustomerAddressesSoapProxy extends SoapProxyBase {
    
    private $customer_id;
    
    public function SetCustomerId($costumer_id) {
        $this->customer_id = $costumer_id;
    }

    /**
     * Retrieve the list of customer addresses.
     * SOAP Method: customerAddressList
     * @return ProxyResultBase
     */
    public function Index() {
        try {
            $result = $this->GetContext()->GetClient()->customerAddressList($this->GetContext()->GetSession(), $this->customer_id);
            return ProxyResultBase::CreateSuccessResult($result); 
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Create a new address for the customer.
     * SOAP Method: customerAddressCreate
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        try {
            $result = $this->GetContext()->GetClient()->customerAddressCreate($this->GetContext()->GetSession(), $this->customer_id, $resource->ObjectToArray());
            return ProxyResultBase::CreateSuccessResult($result);
             
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Retrieve information about the required customer address.
     * SOAP Method: customerAddressInfo
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->customerAddressInfo($this->GetContext()->GetSession(), $id);
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Update address data of the required customer.
     * SOAP Method: customerAddressUpdate
     * @param type $id
     * @param IResource $resource
     */
    public function Update($id, IResource $resource) {
        try {
            $result = $this->GetContext()->GetClient()->customerAddressUpdate($this->GetContext()->GetSession(), $id, $resource->ObjectToArray());
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Delete the required customer address.
     * SOAP Method: customerAddressDelete
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        try {
            $result = $this->GetContext()->GetClient()->customerAddressDelete($this->GetContext()->GetSession(), $id);
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
}
