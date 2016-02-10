<?php

namespace Proxies\Rest\Customers;

use Proxies\Rest\RestProxyBase;

final class CustomerAddressesRestProxy extends RestProxyBase {
    
    private $costumer_id;
    
    public function GetResourceName() {
        if (!isset($this->costumer_id)) {
            return "customers/addresses";
        }
        
        return "customers/{$this->costumer_id}/addresses";
    }
    
    public function SetCostumerId($costumer_id) {
        $this->costumer_id = $costumer_id;
    }

}
