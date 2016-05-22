<?php

namespace Proxies\Soap\Customers;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class CustomersSoapProxy extends SoapProxyBase {

    /**
     * Allows you to retrieve the list of customers.
     * SOAP Method: customerCustomerList
     * @return ProxyResultBase
     */
    public function Index(IFilter $filter) {
        try {
            $result = $this->GetContext()->GetClient()->customerCustomerList($this->GetContext()->GetSession());
            return ProxyResultBase::CreateSuccessResult($result); 
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Create a new customer.
     * SOAP Method: customerCustomerCreate
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Store(IResource $resource) {
        try {
            $result = $this->GetContext()->GetClient()->customerCustomerCreate($this->GetContext()->GetSession(), $resource->ObjectToArray());
            return ProxyResultBase::CreateSuccessResult($result);
             
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Retrieve information about the specified customer.
     * SOAP Method: customerCustomerInfo
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->customerCustomerInfo($this->GetContext()->GetSession(), $id);
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Update information about the required customer. 
     * Note that you need to pass only those arguments which you want to be updated.
     * SOAP Method: customerCustomerUpdate
     * @param int $id
     * @param IResource $resource
     * @return ProxyResultBase
     */
    public function Update($id, IResource $resource) {
        try {
            $result = $this->GetContext()->GetClient()->customerCustomerUpdate($this->GetContext()->GetSession(), $id, $resource->ObjectToArray());
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Delete the required customer.
     * SOAP Method: customerCustomerDelete
     * @param int $id
     * @return ProxyResultBase
     */
    public function Destroy($id) {
        try {
            $result = $this->GetContext()->GetClient()->customerCustomerDelete($this->GetContext()->GetSession(), $id);
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

}
