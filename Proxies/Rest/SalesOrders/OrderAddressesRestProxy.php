<?php

namespace Proxies\Rest\SalesOrders;

use Proxies\Rest\RestProxyBase;

final class OrderAddressesRestProxy extends RestProxyBase {
    
    private $order_id;
    private $address_type;
    
    public function GetResourceName() {
        if (!isset($this->order_id)) {
            throw new Exception('The order ID was not specified.');
        }
        
        if ($this->address_type === 'billing') {
            return "/orders/{$this->order_id}/addresses/billing";
        }
        
        if ($this->address_type === 'shipping') {
            return "/orders/{$this->order_id}/addresses/shipping";
        }
        
        return "/orders/{$this->order_id}/addresses";
    }

    public function SetOrderId($order_id) {
        $this->order_id = $order_id;
    }
    
    public function SetAddressType($address_type) {
        if ($address_type != 'billing' && $address_type != 'shipping') {
            throw new Exception("Address type is diferent from 'billing' or 'shipping'.");
        }
        $this->address_type = $address_type;
    }
    
}
