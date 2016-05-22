<?php

namespace Proxies\Soap\SalesOrders;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class OrderItemsSoapProxy extends SoapProxyBase {
    
    private $order_id;
    
    public function SetOrderId($order_id) {
        $this->order_id = $order_id;
    }
    
    /**
     * Allows you to retrieve the list of existing order items with detailed items information.
     * SOAP Method: salesOrderInfo
     */
    public function Index(IFilter $filter) {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderInfo($this->GetContext()->GetSession(), $this->order_id);
            return ProxyResultBase::CreateSuccessResult($result->items); 
        } catch (\Exception $ex) {
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
     * @param int $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Show($id) {
        throw new \Exceptions\NotImplementedException;
    }

    /**
     * Not Implemented.
     * @param int $id
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Update($id, IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }
    
    /**
     * Not Implemented.
     * @param int $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Destroy($id) {
        throw new \Exceptions\NotImplementedException;
    }

}
