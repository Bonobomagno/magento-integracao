<?php

namespace Proxies\Soap\SalesOrders;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class OrdersSoapProxy extends SoapProxyBase {
    
    /**
     * Allows you to retrieve the list of orders. Additional filters can be applied.
     * SOAP Method: salesOrderList
     * @return ProxyResultBase
     */
    public function Index() {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderList($this->GetContext()->GetSession());
            return ProxyResultBase::CreateSuccessResult($result); 
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Not Implemented.
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Store(IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }
    
    /**
     * Allows you to retrieve the required order information.
     * SOAP Method: salesOrderInfo
     * @param type $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderInfo($this->GetContext()->GetSession(), $id);
            return ProxyResultBase::CreateSuccessResult($result);
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Not Implemented.
     * @param type $id
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Update($id, IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }
    
    /**
     * Not Implemented.
     * @param type $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Destroy($id) {
        throw new \Exceptions\NotImplementedException;
    }


}
