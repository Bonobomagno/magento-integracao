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
     * 
     * @return ProxyResultBase
     */
    public function Index() {
        try {
            $result = $this->GetContext()->GetClient()->salesOrderInfo($this->GetContext()->GetSession(), $this->order_id);
            return ProxyResultBase::CreateSuccessResult(array($result->billing_address, $result->shipping_address));
        } catch (\SoapFault $ex) {
            $errors = array();
            return ProxyResultBase::CreateErrorResult($errors, $ex->getMessage());
        }
    }
    
    /**
     * 
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
     * 
     * @param int $id
     * @throws \Exceptions\NotImplementedException
     */
    public function Destroy($id) {
        throw new \Exceptions\NotImplementedException;
    }

    /**
     * 
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Store(IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }

    /**
     * 
     * @param int $id
     * @param IResource $resource
     * @throws \Exceptions\NotImplementedException
     */
    public function Update($id, IResource $resource) {
        throw new \Exceptions\NotImplementedException;
    }

}
