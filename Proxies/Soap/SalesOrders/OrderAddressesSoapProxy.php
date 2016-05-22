<?php

namespace Proxies\Soap\SalesOrders;

use Proxies\Soap\SoapProxyBase;
use Resources\IResource;
use ProxyResults\ProxyResultBase;

final class OrderAddressesSoapProxy extends SoapProxyBase {
    
    private $order_id;
    private $address_int;

    public function SetOrderId($order_id) {
        $this->order_id = $order_id;
    }
    
    public function SetAddressType($address_int) {
        if ($address_int != 'billing' && $address_int != 'shipping') {
            throw new Exception("Address int is diferent from 'billing' or 'shipping'.");
        }
        $this->address_int = $address_int;
    }
    
    /**
     * Allows you to retrieve information on billing and shipping addresses from the required order.
     * SOAP Method: salesOrderInfo
     * @return ProxyResultBase
     */
    public function Index(IFilter $filter) {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderInfo($this->GetContext()->GetSession(), $this->order_id);
            return ProxyResultBase::CreateSuccessResult(array($result->billing_address, $result->shipping_address));
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * Allows you to retrieve information on billing or shipping addresses from the required order.
     * SOAP Method: salesOrderInfo
     * @param int $id
     * @return ProxyResultBase
     */
    public function Show($id) {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderInfo($this->GetContext()->GetSession(), $this->order_id);
            
            if ($this->address_int === 'billing') {
                return ProxyResultBase::CreateSuccessResult($result->billing_address);
            }

            if ($this->address_int === 'shipping') {
                return ProxyResultBase::CreateSuccessResult($result->shipping_address);
            }
            
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }

    /**
     * Not Implemented.
     * @param int $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Destroy($id) {
        throw new \Exceptions\NotImplementedException;
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
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Update($id, IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }

}
