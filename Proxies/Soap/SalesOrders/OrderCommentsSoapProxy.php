<?php

namespace Proxies\Soap\SalesOrders;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class OrderCommentsSoapProxy extends SoapProxyBase {
    
    private $order_id;

    public function SetOrderId($order_id) {
        $this->order_id = $order_id;
    }
    
    /**
     * Allows you to retrieve information about comments of the required order.
     * SOAP Method: salesOrderInfo
     * @return ProxyResultBase
     */
    public function Index(IFilter $filter) {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderInfo($this->GetContext()->GetSession(), $this->order_id);
            return ProxyResultBase::CreateSuccessResult($result->status_history);
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
     * Not Implemented.
     * @param type $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Show($id) {
        throw new \Exceptions\NotImplementedException;
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
