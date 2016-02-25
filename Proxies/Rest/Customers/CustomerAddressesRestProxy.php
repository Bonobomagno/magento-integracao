<?php

namespace Proxies\Rest\Customers;

use Proxies\Rest\RestProxyBase;

final class CustomerAddressesRestProxy extends RestProxyBase {
    
    private $customer_id;
    
    public function GetResourceName() {
        if (!isset($this->customer_id)) {
            return "customers/addresses";
        }
        
        return "customers/{$this->customer_id}/addresses";
    }
    
    public function SetCustomerId($customer_id) {
        $this->customer_id = $customer_id;
    }

}
